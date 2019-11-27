<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\UserNotification;
use App\Notifications\UserNotificationDB;
use App\User;
use DB;
use Storage;
use Auth;

class NotificationSystem extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except(['deleteNotification']);
    }

    public function userNotify(Request $request){
        $validatedData = $request->validate([
            'rollno' => 'required|max:6|exists:users,rollno',
            'msg' => 'required',
        ]);
        $user =  DB::table('users')->where('rollno', $request->rollno)->get();
        // blog log create
        $data = json_decode(Storage::disk('local')->get('NotificationLog.json'));
        $arr = [
            "from_admin_id"=>Auth::guard('admin')->user()->id,
            "user_roll_no"=>$user[0]->rollno,
            "time_stamp"=>date("l jS \of F Y h:i:s A"),
            "notification_msg"=>$request->msg,
            "action"=>"sent using mail"
        ];
        array_push($data->log,$arr);
        Storage::put('NotificationLog.json',json_encode($data));
        // blog log created 
        User::find($user[0]->id)->notify(new UserNotification($request->msg));
        return redirect('/admin/notification');
    }
    public function userNotifyDB(Request $request){
        $validatedData = $request->validate([
            'rollno' => 'required|max:6|exists:users,rollno',
            'msg' => 'required',
        ]);
        $user =  DB::table('users')->where('rollno', $request->rollno)->get();
        // blog log create
        $data = json_decode(Storage::disk('local')->get('NotificationLog.json'));
        $arr = [
            "from_admin_id"=>Auth::guard('admin')->user()->id,
            "user_roll_no"=>$user[0]->rollno,
            "time_stamp"=>date("l jS \of F Y h:i:s A"),
            "notification_msg"=>$request->msg,
            "action"=>"sent using db"
        ];
        array_push($data->log,$arr);
        Storage::put('NotificationLog.json',json_encode($data));
        // blog log created 
        User::find($user[0]->id)->notify(new UserNotificationDB($request->msg));
        return redirect('/admin/notification');
    }
    public function deleteNotification($id){
        DB::table('notifications')->where('id',$id)->delete();
        // blog log create
        $data = json_decode(Storage::disk('local')->get('NotificationLog.json'));
        $arr = [
            "admin_id"=>Auth::guard('admin')->user()->id,
            "notification_id"=>$id,
            "action"=>"delete"
        ];
        array_push($data->log,$arr);
        Storage::put('NotificationLog.json',json_encode($data));
        // blog log created 
        return redirect()->back();
    }
    public function validateRollno($rollno){
        $user =  DB::table('users')->where('rollno', $rollno)->get();
        if(count($user)>0)
        return "true";
        else
        return "false";
    } 
}

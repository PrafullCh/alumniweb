<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studentdirectory;
use DB;
use Storage;
class students extends Controller
{
    
    public function verifyUser(Request $request)
    {
        $settings  = Storage::disk('local')->get('settings.json');
        $data = json_decode($settings,true);
        if($data['register_view']==1)
        {
            $request->session()->put('key', 'register');
            return view('auth.verifyregister');
        }
        else
        {
            return redirect('/');
        }
        
    }
    public function checkUser(Request $request)
    {

        $data = DB::table('studentdirectory')->where('rollno',$request->input('rollno'))
                                    ->get();
        // print_r($_POST);
        //  print_r($data);
        if(DB::table('studentdirectory')->where('rollno',$request->input('rollno'))
        ->exists())
        {
            // record found here
            // echo "record found";
            if(DB::table('users')->where('rollno',$request->input('rollno'))
            ->exists())
            {
                //user already exists return error
                return view('auth.verifyregister')->with('error','User already exist'); 
            }
            else
            {
                //user doesnt exist and can continue registartion 
                if(
                    strcasecmp($data[0]->rollno,$request->input('rollno'))==0 &&
                    strcasecmp($data[0]->firstname,$request->input('firstname'))==0&&
                    strcasecmp($data[0]->lastname,$request->input('lastname'))==0 &&
                    strcasecmp($data[0]->dept,$request->input('dept'))==0 &&
                    strcasecmp($data[0]->yearofgrad,$request->input('yearofgrad'))==0
                )
                {   
                    
                    return view('auth.register')->with('data',$_POST);
                }
                else
                {
                    return view('auth.verifyregister')->with(['error'=>"wrong information filled",'data'=>$_POST]);
                }
            }
        }
        else
        {
            // record not found
            return view('auth.verifyregister')->with('error','Record does not exist');
            
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use App\Gallery;
use App\GalleryImage;
use DB;
use Illuminate\Http\Response;
use File;
use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard')->with(['page'=>'dashboard']);
    }
    public function icons()
    {
        return view('admin.icons')->with(['page'=>'icons']);
    }
    public function map()
    {
        return view('admin.map')->with(['page'=>'map']);
    }
    public function notifications()
    {
        return view('admin.notifications')->with(['page'=>'notifications']);
    }
    // public function rtl()
    // {
    //     return view('admin.rtl')->with(['page'=>'rtl
    //     ']);
    // }
    public function gallery()
    {
        $gallery=Gallery::all();
        return view('admin.gallery')->with(['page'=>'gallery','gallery'=>$gallery]);
    }
    public function newGallery()
    {
        return view('admin.newGallery')->with(['page'=>'gallery']);
    }
    public function storeNewGallery(Request $request)
    {
        if(isset($request->images))
        {
        
        $record = new Gallery();
        
        $record->name = $request->input('galleryname');
        $record->admin_id = Auth::guard('admin')->user()->id;
        if($request->hasFile('coverimage'))
        {
            $filenameWithExt=$request->file('coverimage')->getClientOriginalName();
            //Get just filename
            $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension=$request->file('coverimage')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //Upload the image
            $path=$request->file('coverimage')->storeAs('public/GalleryCoverImage',$fileNameToStore);
        }
        $record->cover_image = $fileNameToStore;
        $record->save(); 
        $count = 0;
        foreach ($request->images as $index => $ItemName) {
            $imgToStore = new GalleryImage();
            // $image = $request->file('images')[$index]->getClientOriginalName();
            $imagenameWithExt=$request->file('images')[$index]->getClientOriginalName();
            //Get just filename
            $imagename=pathinfo($imagenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension=$request->file('images')[$index]->getClientOriginalExtension();
            //Filename to store
            $imageNameToStore=$imagename.'_'.time().'.'.$extension;
            //Upload the image
            $path=$request->file('images')[$index]->storeAs('public/GalleryImages',$imageNameToStore);
            
            $imgToStore->name = $imageNameToStore;
            // echo "<pre>";
            // echo "</pre>";
            if($request->input('title')[$count]=="")
            $imgToStore->title = "Photo from ".$request->input('galleryname');
            else
            $imgToStore->title = $request->input('title')[$count];    
            $imgToStore->album_id = $record->getKey();
            $imgToStore->admin_id = Auth::guard('admin')->user()->id;
            $imgToStore->save();
            $count++;
        }
        // blog log create
        $data = json_decode(Storage::disk('local')->get('GalleryLog.json'));
        $arr = [
             "admin_id"=>Auth::guard('admin')->user()->id,
             "gallery_id"=>$record->getKey(),
             "time_stamp"=>date("l jS \of F Y h:i:s A"),
             "action"=>"gallery created"
        ];
        array_push($data->log,$arr);
        Storage::put('GalleryLog.json',json_encode($data));
        //  blog log created  
        return redirect('/admin/admingallery');
        }
        else{
            return redirect()->back();
        }
    }
    public function viewadmingallery($id){
        $images = DB::table('gallery_images')->where('album_id', '=', $id)->get();
        $gallery = DB::table('gallery')->where('album_id', '=', $id)->get();
        $galleryName = $gallery[0]->name; 
        return view('admin.gallery')->with(['page'=>'gallery','images'=>$images,'galleryname'=>$galleryName,'id'=>$id]);
    } 
    public function deleteGallery($id){
        $gallery=Gallery::find($id);
        $photos = DB::table('gallery_images')->where('album_id', '=', $id)->get();
        //  echo "<pre>";
        // print_r($photos);
        // echo "</pre>";
        $arr = [];
        foreach ($photos as $photo) {
            $image_path = public_path($photo->name);
                // echo $image_path."<br>";
                array_push($arr,$photo->id);
                if(Storage::delete('public/GalleryImages/'.$photo->name))
                {
                    // echo "true";
                }
        }
        // blog log create
        $data = json_decode(Storage::disk('local')->get('GalleryLog.json'));
        $arr = [
             "admin_id"=>Auth::guard('admin')->user()->id,
             "gallery_id"=>$gallery->album_id,
             "image_id"=>$arr,
             "time_stamp"=>date("l jS \of F Y h:i:s A"),
             "action"=>"gallery deleted"
        ];
        array_push($data->log,$arr);
        Storage::put('GalleryLog.json',json_encode($data));
        //  blog log created 
        DB::table('gallery_images')->where('album_id', '=', $id)->delete();
        $gallery->delete();
        return redirect('/admin/admingallery');
    }
    public function deleteImage($id){
        $image = GalleryImage::find($id);
         // blog log create
         $data = json_decode(Storage::disk('local')->get('GalleryLog.json'));
         $arr = [
              "admin_id"=>Auth::guard('admin')->user()->id,
              "gallery_id"=>$image->album_id,
              "image_id"=>$image->id,
              "time_stamp"=>date("l jS \of F Y h:i:s A"),
              "action"=>"image deleted"
         ];
         array_push($data->log,$arr);
         Storage::put('GalleryLog.json',json_encode($data));
         //  blog log created 
        $image->delete();
        return redirect()->back();
    }
    public function addImages($id)
    {
        $gallery = DB::table('gallery')->where('album_id', '=', $id)->get();
        $galleryName = $gallery[0]->name; 
        return view('admin.editGallery')->with(['page'=>'gallery','galleryName'=>$galleryName,'id'=>$id]);
    }
    public function storeNewImages(Request $request){
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        if(isset($request->images))
        {
        $gallery = DB::table('gallery')->where('album_id', '=', $request->galleryid)->get();
        $count=0;
        echo "<pre>";
        print_r($gallery);
        echo "</pre>";
        $arr = [];
        foreach ($request->images as $index => $ItemName) {
            $imgToStore = new GalleryImage();
            // $image = $request->file('images')[$index]->getClientOriginalName();
            $imagenameWithExt=$request->file('images')[$index]->getClientOriginalName();
            //Get just filename
            $imagename=pathinfo($imagenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension=$request->file('images')[$index]->getClientOriginalExtension();
            //Filename to store
            $imageNameToStore=$imagename.'_'.time().'.'.$extension;
            //Upload the image
            $path=$request->file('images')[$index]->storeAs('public/GalleryImages',$imageNameToStore);
            
            $imgToStore->name = $imageNameToStore;
            // echo "<pre>";
            // echo "</pre>";
            if($request->input('title')[$count]=="")
            $imgToStore->title = "Photo from ".$request->input('galleryname');
            else
            $imgToStore->title = $request->input('title')[$count];    
            $imgToStore->album_id = $gallery[0]->album_id;
            $imgToStore->admin_id = Auth::guard('admin')->user()->id;
            $imgToStore->save();
            array_push($arr,$imgToStore->getKey());
            $count++;
        }
         // blog log create
         $data = json_decode(Storage::disk('local')->get('GalleryLog.json'));
         $arr = [
              "admin_id"=>Auth::guard('admin')->user()->id,
              "gallery_id"=>$gallery[0]->album_id,
              "image_id"=>$arr,
              "time_stamp"=>date("l jS \of F Y h:i:s A"),
              "action"=>"images added"
         ];
         array_push($data->log,$arr);
         Storage::put('GalleryLog.json',json_encode($data));
         //  blog log created 
        return redirect('/admin/admingallery/'.$gallery[0]->album_id);
        }
        else{
            return redirect()->back();
        }
    }
    public function typography()
    {
        return view('admin.typography')->with(['page'=>'typography']);
    }
    public function user()
    {
        $record = DB::table('users')->where('verification', 'unauthorised')->get();
         //    return view('admin.userTable')->with(['page'=>'user','records'=>$record]);
        return $record;
    }
    public function viewRecord($id)
    {
        $record = DB::table('users')->where('id','=', $id)->get();
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        $user = User::find($id);
        $user->status = 'seen';
        $user->save();
        return view('admin.user',['page'=>'studentdirectory','record'=>$record]);
    }
    public function markAsVerified($id)
    {
        $user = User::find($id);
        $user->verification = 'verified';
        $user->save();
        return redirect()->back();
    }
    public function markAsFake($id)
    {
        $user = User::find($id);
        $user->verification = 'fake';
        $user->save();
        return redirect()->back();
    }
    public function adminblog()
    {
        $posts= Post::orderBy('created_at','desc')->paginate(10);
        // return view('posts.index')->with([,'page'=>'posts']);
        return view('admin.adminblog')->with(['page'=>'adminblog','posts'=>$posts]);
    }
    public function adminblogedit($id)
    {
        $post= Post::find($id);
        // return view('posts.index')->with([,'page'=>'posts']);
        return view('admin.adminblogedit')->with(['post'=>$post,'page'=>'posts']);
    }
    public function notification()
    {
        $notifications = DB::table('notifications')->get();
        $arr =array();
        foreach ($notifications as $notification) {
            if(!(in_array($notification->notifiable_id,$arr)))
                array_push($arr,$notification->notifiable_id);
        }
        // print_r($arr);
        $user = DB::table('users')->whereIn('id',$arr)->get();
        return view('admin.notification')->with(['page'=>'notification','notifications'=>$notifications,'users'=>$user]);
    }
    public function settings(){
        $data = json_decode(Storage::disk('local')->get('settings.json'));
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        return view('admin.settings2')->with(['page'=>'settings','data'=>$data]);
    }
    public function studentDirectory(){
        return view('admin.studentdirectory')->with(['page'=>'studentdirectory']);
    }
    public function fakeStudent(Request $request)
    {
        $record = DB::table('users')->where('verification', 'fake')->get();
        return $record;
    }
    public function authorisedStudent(Request $request)
    {
        $record = DB::table('users')->where('verification', 'verified')->get();
        return $record;
    }
    public function rollnoList(Request $request){
        
        $users = DB::table('users')->get();
        $arr=[];
        foreach ($users as $item) {
            array_push($arr,$item->rollno);
        }
        return $arr;
    }
    public function deleteUser($id)
    {
        User::find($id)->delete();
        DB::table('notifications')->where('notifiable_id',$id)->delete();
        return redirect()->route('admin.user');
    }
}

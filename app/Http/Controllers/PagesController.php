<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Schema;
use DB;
use Exception;
use Storage;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Gallery;
use App\GalleryImage;

class PagesController extends Controller
{
    protected $data;
    protected $date=[];
    public function __construct()
    {
        $settings  = Storage::disk('local')->get('settings.json');
        $this->data = json_decode($settings,true); 
        $data = json_decode(Storage::disk('local')->get('ip_registry.json'));
        $arr=[];
        for($i = 0 ;$i<count($data->log);$i++) {
            array_push($arr,$data->log[$i]->ip);
            array_push($this->date,$data->log[$i]->time_stamp);
            // echo "<pre>";
            // print_r($item);
            // echo "</pre>";
        }
        // echo "<pre>";
        // print_r($data->log[0]->ip);
        // echo "</pre>";
        // exit;
        if(in_array($_SERVER['REMOTE_ADDR'],$arr)!=1)
        {
        // ip log create
        $arr = [
            "ip"=>$_SERVER['REMOTE_ADDR'],
            "time_stamp"=>date("l jS \of F Y h:i:s A")
        ];
        array_push($data->log,$arr);
        Storage::put('ip_registry.json',json_encode($data));
        }
    }
    public function index()
    {
        $count = DB::table('users')->count();
        $visits = 0;
        $date2 = date("F Y");
        for($i = 0 ;$i<count($this->date);$i++)
        {
            if(strpos($this->date[$i], $date2) !== false){
                $visits++;
            }
        }
        // Test if string contains the word 
        // print_r($visits);
        return view('index')->with(['page'=>"index",'count'=>$count,'visits'=>$visits]);
    }
    public function sample()
    {
        return view('pages.sample')->with('page',"sample");
    }
    public function about()
    {
        if($this->data['about_us_view']==1)
        {
            return view('pages.about')->with('page',"about");
        }
        else
        {
            return redirect('/');
        }
    }
    public function gallery()
    {
        if($this->data['gallery_view']==1)
        {
            $gallery=Gallery::all();
            return view('gallery.gallery')->with(['page'=>"gallery",'gallery'=>$gallery]);
        }
        else
        {
            return redirect('/');
        }
        
    }
    public function viewgallery($id){
        if($this->data['gallery_view']==1)
        {
            $images = DB::table('gallery_images')->where('album_id', '=', $id)->get();
            if(count($images)>0)
            return view('gallery.gallery')->with(['page'=>'gallery','images'=>$images]);
            else
            return view('gallery.gallery')->with(['page'=>'gallery']);
        }
        else
        {
            return redirect('/');
        }
        
    }
    public function contact()
    {
        if($this->data['contact_us_view']==1)
        {
            return view('pages.contact')->with('page',"contact");
        }
        else
        {
            return redirect('/');
        }
        
    }
    public function directory()
    {
        if($this->data['directory_view']==1)
        {
            return view('studentData.directory')->with('page',"directory");
        }
        else
        {
            return redirect('/');
        }
        
    }
    public function donation()
    {
        if($this->data['donation_view']==1)
        {
            return view('pages.donation')->with('page',"donation");
        }
        else
        {
            return redirect('/');
        }
        
    }
    public function yearbook()
    {
        if($this->data['yearbook_view']==1)
        {
            return view('studentData.yearbook')->with(['page'=>"yearbook",'data'=>$this->data]);
        }
        else
        {
            return redirect('/');
        }
        
    }
    public function showDept(Request $request,$year)
    {
        if($this->data['yearbook_view']==1)
        {
            return view('studentData.departments')->with(['page'=>"departments",'year'=>$year,'data'=>$this->data]);
        }
        else
        {
            return redirect('/');
        }
        
    }
    public function showBatches(Request $request,$year,$dept)
    {
        if($this->data['yearbook_view']==1)
        {
            $data = DB::table('users')->where('yearofgrad',$year)
                                    ->where('dept',$dept)
                                    ->get();
            /*echo "<pre>";
            print_r ($data[0]->firstname);
            echo "</pre>";*/
            return view('studentData.batches')->with(['page'=>"batches",'year'=>$year,'data'=>$data]);
        }
        else
        {
            return redirect('/');
        }
        
    }
    public function map()
    {
        return view('pages.map')->with(['page'=>'map']);
    }
    public function directoryRecords(Request $request)
    {
        $response=[];
        if(isset($request['searchfor']))
        {
            $arr2 = DB::table('users')->orWhereIn('role',$request['searchfor'])->get();
            $response = $arr2->merge($response);
            //$arr = array_merge($arr,$arr2);
        }
        if(isset($request['branch']))
        {
            $arr3 = DB::table('users')->orWhereIn('dept',$request['branch'])->get();
            $response = $arr3->merge($response);
        }
        if(isset($request['designation']))
        {
            $arr4 = DB::table('users')->orWhereIn('designation',$request['designation'])->get();
            $response = $arr4->merge($response);
        }
        if(isset($request['yearofgrad']))
        {
            $arr5 = DB::table('users')->orWhereIn('yearofgrad',[$request['yearofgrad']])->get();
            $response = $arr5->merge($response);
        }
        if(isset($request['hometown']))
        {
            $arr6 = DB::table('users')->orWhereIn('hometown',[$request['hometown']])->get();
            $response = $arr6->merge($response);
        }
        if(isset($request['currloc']))
        {
            $arr7 = DB::table('users')->orWhereIn('currloc',[$request['currloc']])->get();
            $response = $arr7->merge($response);
        }
        /*->orWhereIn('dept',$request['branch'])
        ->orWhereIn('designation',$request['designation'])
        ->orWhereIn('yearofgrad',[$request['year']])
        ->orWhereIn('hometown',[$request['hometown']])
        ->orWhereIn('currloc',[$request['currloc']])*/
        
        try{
            Schema::hasTable('users');
           // $response = $arr7->merge($arr6,$arr5,$arr4,$arr3,$arr2,$arr1);
            //$response=$response->all();
            return $response;
        }
        catch(\Exception $e)
        {
            return "failed";
        };


        return $response;
    }
}

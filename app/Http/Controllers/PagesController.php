<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Schema;
use DB;
use Exception;
use Illuminate\Support\Facades\Input;
use App\User;

class PagesController extends Controller
{
    public function index()
    {
        return view('index')->with('page',"index");
    }
    public function sample()
    {
        return view('pages.sample')->with('page',"sample");
    }
    public function about()
    {
        return view('pages.about')->with('page',"about");
    }
    public function contact()
    {
        return view('pages.contact')->with('page',"contact");
    }
    public function directory()
    {
        return view('studentData.directory')->with('page',"directory");
    }
    public function yearbook()
    {
        return view('studentData.yearbook')->with('page',"yearbook");
    }
    public function showDept(Request $request,$year)
    {
        return view('studentData.departments')->with(['page'=>"departments",'year'=>$year]);
    }
    public function showBatches(Request $request,$year,$dept)
    {
        $data = DB::table('users')->where('yearofgrad',$year)
                                    ->where('dept',$dept)
                                    ->get();
        /*echo "<pre>";
        print_r ($data[0]->firstname);
        echo "</pre>";*/
        return view('studentData.batches')->with(['page'=>"batches",'year'=>$year,'data'=>$data]);
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

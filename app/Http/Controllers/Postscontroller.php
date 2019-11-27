<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use Auth;
use DB;
use App\User;

class Postscontroller extends Controller
{
    protected $data;
    protected $date=[];
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth:admin',['except'=>['index','show']]);
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        if($this->data['blog_view']==1)
        {
            $posts= Post::orderBy('created_at','desc')->paginate(10);
        //    echo "<pre>";
        //     print_r($posts);
        //    echo "</pre>";
            return view('posts.index')->with(['posts'=>$posts,'page'=>'posts']);
        }
        else
        {
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with(['page'=>'posts']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999',
        ]);

        if($request->hasFile('cover_image'))
        {
            $filenameWithExt=$request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //Upload the image
            $path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }
        else{
            $fileNameToStore='noimage.jpg';
        }
        $post= new Post;
        $post->title=$request->input('title');
        //$post->excerpt
        $post->content=$request->input('body');
        $data=$request->input('body');
        //$data=wp_trim_words($data,55,'...');
        if($data){
            $content_arr=explode("<p>",$data);
            foreach($content_arr as $key=>$phrase){
                if($key<6){
                    $excerpt =$phrase;
                }
            }
        }
        //$lines=explode('<p>',$data,2);
        //$arr=implode(2,$lines);
        $post->excerpt=$excerpt;
        $post->user_id= Auth::guard('admin')->user()->id;//auth()->user()->id;
        //$post->published_at=time();
       
        
        $post->cover_image=$fileNameToStore;
        $post->save();

        // blog log create
        $data = json_decode(Storage::disk('local')->get('BlogLog.json'));
        $arr = [
            "admin_id"=>Auth::guard('admin')->user()->id,
            "blog_id"=>$post->getKey(),
            "time_stamp"=>date("l jS \of F Y h:i:s A"),
            "action"=>"created"
        ];
        array_push($data->log,$arr);
        Storage::put('BlogLog.json',json_encode($data));
        // blog log created 
        return redirect('/admin/adminblog')->with('success','Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($this->data['blog_view']==1)
        {
            $recentPost = Post::orderBy('id','desc')->take(3)->get();
            $post= Post::find($id);
            return view('posts.show')->with(['post'=>$post,'page'=>'posts','recentPost'=>$recentPost]);
        }
        else
        {
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::find($id);
        if(auth()->user()->id !=$post->user_id)
        {
            return redirect('http://localhost:82/alumniweb/public/posts')->with('error','unauthorised page');
        }
        return view('posts.edit')->with(['post'=>$post,'page'=>'posts']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999',
        ]);

        if($request->hasFile('cover_image'))
        {
            $filenameWithExt=$request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //Upload the image
            $path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }
        
        $post=Post::find($id);
        $post->title=$request->input('title');
        //$post->excerpt
        $post->content=$request->input('body');
        $data=$request->input('body');
        //$data=wp_trim_words($data,55,'...');
        if($data){
            $content_arr=explode("<p>",$data);
            foreach($content_arr as $key=>$phrase){
                if($key<6){
                    $excerpt =$phrase;
                }
            }
        }
        //$lines=explode('<p>',$data,2);
        //$arr=implode(2,$lines);
        $post->excerpt=$excerpt.".....";
        $post->user_id= auth()->user()->id;
        //$post->published_at=time();
       
        if($request->hasFile('cover_image'))
        $post->cover_image=$fileNameToStore;
        $post->save();
        // blog log create
        $data = json_decode(Storage::disk('local')->get('BlogLog.json'));
        $arr = [
            "admin_id"=>Auth::guard('admin')->user()->id,
            "blog_id"=>$post->getKey(),
            "time_stamp"=>date("l jS \of F Y h:i:s A"),
            "action"=>"updated"
        ];
        array_push($data->log,$arr);
        Storage::put('BlogLog.json',json_encode($data));
        // blog log created 
        return redirect('/admin/adminblog')->with('success','Post updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
         // blog log create
         $data = json_decode(Storage::disk('local')->get('BlogLog.json'));
         $arr = [
             "admin_id"=>Auth::guard('admin')->user()->id,
             "blog_id"=>$post->id,
             "time_stamp"=>date("l jS \of F Y h:i:s A"),
             "action"=>"deleted"
         ];
         array_push($data->log,$arr);
         Storage::put('BlogLog.json',json_encode($data));
        //  blog log created 
        if(auth()->user()->id!==$post->user_id)
        {
            return redirect('/posts')->with('error','unauthorised page');
        }

        if($post->cover_image !='noimage.jpg'){
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->delete();

        return redirect('/posts')->with('success','Post deleted');


    }
    public function adminDestroy($id)
    {
        $post=Post::find($id);
        // blog log create
        $data = json_decode(Storage::disk('local')->get('BlogLog.json'));
        $arr = [
             "admin_id"=>Auth::guard('admin')->user()->id,
             "blog_id"=>$post->id,
             "time_stamp"=>date("l jS \of F Y h:i:s A"),
             "action"=>"deleted"
        ];
        array_push($data->log,$arr);
        Storage::put('BlogLog.json',json_encode($data));
        //  blog log created    
        if(auth()->user()->id!==$post->user_id)
        {
            return redirect('/posts')->with('error','unauthorised page');
        }

        if($post->cover_image !='noimage.jpg'){
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->delete();

        return redirect('/admin/adminblog');


    }
}

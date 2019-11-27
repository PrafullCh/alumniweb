@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-9" style=" background-color:white !important;">
            <a href="{{route('posts.index')}}">
                <i class="fas fa-arrow-left"  id="back-button"></i>
            </a>
            <div class="single-blog">  
            <h1>{{$post->title}}
                <hr>
                <img  src="../public/storage/cover_images/{{$post->cover_image}}">
            </h1>
            </div>
            <hr>
            <div class="blog-text">
            <h1> {{$post->title}}</h1>
        
    {!!  $post->content !!}
        
                 </div>
                <hr>
                <h6 class="created-info">Created On : {{$post->created_at}} by {{$post->user->firstname}}</h6>  
                <hr>
                @if(Auth::guard('admin')->check())
                    @if(Auth::guard('admin')->user()->id==$post->user_id)
                        
                        
                        <hr>
                        {!!Form::open(['action'=>['Postscontroller@destroy',$post->id],'method'=>'POST','class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        <a href="../posts/{{$post->id}}/edit" data-text="Edit" class="button-hover">Want to Edit?</a>
                        {{Form::submit('Delete',['data-text'=>'Delete','class'=>'button-hover'])}}
                        {!!Form::close()!!}
                    @endif
                @endif
        </div>
        <div class="col-lg-3">
            <div class="table-responsive">
                <table class="table">
                    @foreach ($recentPost as $post)
                    <tr class="blog-cell">
                        <td style="padding:10px">
                           <h2 style="text-align:left">{{$post->title}}</h2>
                           <a href="{{route('posts.show',$post->id)}}" style="text-align:left;color:black;text-decoration:none;">
                            {!!$post->excerpt!!}
                           </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
<br>
<br>

@endsection



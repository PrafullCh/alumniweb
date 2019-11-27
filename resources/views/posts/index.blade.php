@extends('layouts.app')

@section('content')

<div class="blog-cover">
	<h1 class="text-center" style="font-family: 'Acme', sans-serif;"><span class="blog-page-title">This is our blog..</span></h1>
</div>
	
	<div class="container" style="margin-top: -35px;">
    <div class="row">
	@if(count($posts) > 0)
	@foreach($posts as $post)
    	<div class="col-md-4">
			<div class="single-blog">
			<p class="blog-meta" style="text-align:left;">By {{$post->user->firstname}}<span>{{explode(" ",$post->created_at)[0]}}</span></p>	
            <img style="width:100%" src="public/storage/cover_images/{{$post->cover_image}}">
			<h2 id="blog-heading" style=" text-align:left;"><i class="fas fa-quote-left"></i>&nbsp;<a href="./posts/{{$post->id}}">{{$post->title}}</a></h2>
			<p class="two-line" id="excerpt-line" style="text-align:left;">{!!$post->excerpt!!}</p>
			<p style="text-align:left;"><a href="{{route('posts.show',$post->id)}}" class="read-more-btn" id="read-more">Read more</a></p>
            </div>
		</div>
		@endforeach 
	{{$posts->links()}}
	@else
	<p>No post found</p>
	@endif

	</div>
  
</div>
<br><br>
@endsection
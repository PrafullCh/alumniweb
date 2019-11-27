@extends('layouts.app')
@section('content')
<div class="blog-cover">
	<h1 class="text-center" style="font-family: 'Acme', sans-serif;"><span class="blog-page-title">Yearbook</span></h1>
</div>
<div class="container p-4" style="background-color:snow;margin-top:-30px;box-shadow:0px 0px 30px black;">
    <div class="row" style="padding:40px">
        <?php $year;?>
        @foreach ($data['me'] as $item)
            <?php $year =$item ?>
            <?php break;?>
        @endforeach
        @for ($i = $year; $i < date("Y"); $i++)
            <a href="{{route('departments',['year'=>$i])}}" class="m-3 p-3 btn btn-default border border-primary">{{$i}}</a>    
        @endfor
        
    
    </div>
</div>
    
@endsection
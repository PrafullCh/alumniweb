@extends('layouts.app')
@section('content')

<div class="container pt-4 px-6">
    <div class="row mx-auto">
        <a href="{{route('batches',['year'=>$year,'dept'=>'computer technology'])}}" class="border border-primary btn btn-default p-3 m-2 animated fadeInDown delay-1s">{{$year}}'th batch of Computer Technology</a>
        <a href="{{route('batches',['year'=>$year,'dept'=>'cm'])}}" class="border border-primary btn btn-default p-3 m-2 animated fadeInDown delay-1s">{{$year}}'th batch of Information Technology</a>
        <a href="{{route('batches',['year'=>$year,'dept'=>'cm'])}}" class="border border-primary btn btn-default p-3 m-2 animated fadeInDown delay-1s">{{$year}}'th batch of Mechanical Engineering</a>
        <a href="{{route('batches',['year'=>$year,'dept'=>'cm'])}}" class="border border-primary btn btn-default p-3 m-2 animated fadeInDown delay-2s">{{$year}}'th batch of Civil Engineering</a>
        <a href="{{route('batches',['year'=>$year,'dept'=>'cm'])}}" class="border border-primary btn btn-default p-3 m-2 animated fadeInDown delay-2s">{{$year}}'th batch of Electrical Engineering</a>
        <a href="{{route('batches',['year'=>$year,'dept'=>'cm'])}}" class="border border-primary btn btn-default p-3 m-2 animated fadeInDown delay-2s">{{$year}}'th batch of Electronics & Telecommunication</a>
        <a href="{{route('batches',['year'=>$year,'dept'=>'cm'])}}" class="border border-primary btn btn-default p-3 m-2 animated fadeInDown delay-3s">{{$year}}'th batch of Plastic Engineering</a>
        <a href="{{route('batches',['year'=>$year,'dept'=>'cm'])}}" class="border border-primary btn btn-default p-3 m-2 animated fadeInDown delay-3s">{{$year}}'th batch of Automobile Engineering</a>
    </div>
</div>
    
@endsection
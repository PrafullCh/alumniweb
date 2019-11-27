@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mx-auto mt-3">
            @if (count($data)>0)
            @foreach($data as $user)
            <div class="card animated fadeInDown delay-0.5s" style="width:180px;    margin: 15px;">
                    <img class="card-img-top" src="{{asset('public/images/profile.png')}}" alt="Card image">
                    <div class="card-body" style="padding:0;">
                      <h4 class="card-title">{{$user->firstname." ".$user->lastname}}</h4>
                      <p class="card-text">{{$user->dept}}</p>
                      <a href="#" class="stretched-link btn btn-primary">See Profile</a>
                    </div>
            </div>
            @endforeach    
            @else
            <div class="container" style="padding-top:150px;padding-bottom:150px;">
                <h3>No records Found</h3>
            </div>
            @endif
        </div>
    </div>
@endsection
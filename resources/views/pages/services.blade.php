@extends('layouts.app')
@section('content')
    <h1>{{$title}}</h1>
@if($services > 0)
    <ul class="list-group">
        @foreach($services as $service)
            <li class="list-group-item">{{$service}}</li>
        @endforeach
    </ul>
@endif
@endsection

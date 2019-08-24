@extends('layouts.app')
@section('content')

<div class="container p-4">
    <div class="row">
        @for ($i = 2018; $i > 2005; $i--)
            <a href="{{route('departments',['year'=>$i])}}" class="m-3 p-3 btn btn-default border border-primary">{{$i}}</a>    
        @endfor
        
    
    </div>
</div>
    
@endsection
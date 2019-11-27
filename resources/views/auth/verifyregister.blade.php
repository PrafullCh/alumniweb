@extends('layouts.app')
<?php
    // print_r($data);
?>

@section('content')
<div class="container p-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body"  style="padding:20px">
                    <form method="POST" action="{{ route('userregister') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Roll Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="number" maxlength="6" minlength="6" class="form-control @error('name') is-invalid @enderror" name="rollno" value="@if(isset($data['rollno'])) {{ $data['rollno']}} @endif" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="firstname" value="@if(isset($data['firstname']))  {{ $data['firstname']}} @endif" required autocomplete="name" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="lastname" value="@if(isset($data['lastname']))  {{ $data['lastname']}} @endif" required autocomplete="name" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>

                            <div class="col-md-6">
                                
                                <select id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="dept" value="@if(isset($data['dept']))  {{ $data['dept']}} @endif" required autocomplete="name" >
                                    <option selected>Select Department</option>
                                    <option class="computer technology">Computer Technology</option>
                                    <option class="information technology">Information Technology</option>
                                    <option class="civil engineering">Civil Engineering</option>
                                    <option class="electrical engineering">Electrical Engineering</option>
                                    <option class="mechanical engineering">Mechanical Engineering</option>
                                    <option class="electronics and telecommunication">Electronics And Tele-Communication</option>
                                    <option class="plastic engineering">Plastic Engineering</option>
                                    <option class="automobile engineering">Automobile Engineering</option>
                                    <option class="interior designing">Interior Designing</option>
                                    <option class="dress design and garment manufacture">Dress Design & Garment Manufacture</option>
                                </select>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Year of Passing') }}</label>

                            <div class="col-md-6">
                                
                                <select class="form-control @error('yearofgrad') is-invalid @enderror" value="@if(isset($data['yearofgrad'])) {{ $data['yearofgrad']}} @endif " name="yearofgrad"   id="name" required autocomplete="name" >
                                    <option selected>Select Year</option>
                                    @for ($i = 2005; $i < 2019; $i++)
                                        <option value="{{$i}}">{{$i}}</option>   
                                    @endfor
                                </select>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

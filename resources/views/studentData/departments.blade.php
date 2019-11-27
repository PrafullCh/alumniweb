@extends('layouts.app')
@section('content')
        @if ($year < $data['me'][array_keys($data['me'])[0]]||$year > date("y"))
            <div class="container" style="padding-top:150px;padding-bottom:150px;">
              <h1 style="text-align:center;">Invalid Year</h1>  
            </div>
        @else
            
        <div class="container">
                <div class="table-responsive">
                <table class="table table-bordered table-hover table-info" style="margin-top:50px;margin-bottom:50px;box-shadow:2px 2px 28px;">
                    <tr>
                        <td>
                                @if ($year>=$data['ae'][array_keys($data['ae'])[0]])
                                <a href="{{route('batches',['year'=>$year,'dept'=>'cm'])}}" class="animated fadeInDown delay-1s" style="color: black;font-size: 16px;">{{$year}}'th batch of Automobile Engineering</a>
                                @endif
                        </td>
                        <td>
                                @if ($year>=$data['cm'][array_keys($data['cm'])[0]])
                                <a href="{{route('batches',['year'=>$year,'dept'=>'computer technology'])}}" class=" animated fadeInDown delay-1s" style="color: black;font-size: 16px;">{{$year}}'th batch of Computer Technology</a>
                                @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                                @if ($year>=$data['if'][array_keys($data['if'])[0]])
                                <a href="{{route('batches',['year'=>$year,'dept'=>'cm'])}}" class="animated fadeInDown delay-1s" style="color: black;font-size: 16px;">{{$year}}'th batch of Information Technology</a>    
                                @endif
                        </td>
                        <td>
                                @if ($year>=$data['ce'][array_keys($data['ce'])[0]])
                                <a href="{{route('batches',['year'=>$year,'dept'=>'cm'])}}" class="animated fadeInDown delay-1s" style="color: black;font-size: 16px;">{{$year}}'th batch of Civil Engineering</a>
                                @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                                @if ($year>=$data['ee'][array_keys($data['ee'])[0]])
                                <a href="{{route('batches',['year'=>$year,'dept'=>'cm'])}}" class="animated fadeInDown delay-1s" style="color: black;font-size: 16px;">{{$year}}'th batch of Electrical Engineering</a>
                                @endif
                        </td>
                        <td>
                                @if ($year>=$data['entc'][array_keys($data['entc'])[0]])
                                <a href="{{route('batches',['year'=>$year,'dept'=>'cm'])}}" class="animated fadeInDown delay-1s" style="color: black;font-size: 16px;">{{$year}}'th batch of Electronics & Telecommunication</a>
                                @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                                @if ($year>=$data['pe'][array_keys($data['pe'])[0]])
                                <a href="{{route('batches',['year'=>$year,'dept'=>'cm'])}}" class="animated fadeInDown delay-1s" style="color: black;font-size: 16px;">{{$year}}'th batch of Plastic Engineering</a>
                                @endif
                        </td>
                        <td>
                                @if ($year>=$data['me'][array_keys($data['me'])[0]])
                                <a href="{{route('batches',['year'=>$year,'dept'=>'cm'])}}" class=" animated fadeInDown delay-1s" style="color: black;font-size: 16px;">{{$year}}'th batch of Mechanical Engineering</a>
                                @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                                @if ($year>=$data['ddgm'][array_keys($data['ddgm'])[0]])
                                <a href="{{route('batches',['year'=>$year,'dept'=>'cm'])}}" class="animated fadeInDown delay-1s" style="color: black;font-size: 16px;">{{$year}}'th batch of Dress Design and Garment Manufacture</a>
                                @endif
                        </td>
                        <td>
                                @if ($year>=$data['idd'][array_keys($data['idd'])[0]])
                                <a href="{{route('batches',['year'=>$year,'dept'=>'cm'])}}" class="animated fadeInDown delay-1s" style="color: black;font-size: 16px;">{{$year}}'th batch of Interior Designing</a>
                                @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        @endif
@endsection
@extends('layouts.app')
@section('content')
<header>
        <div class="overlay"></div>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
          <source src="https://storage.googleapis.com/coverr-main/mp4/Mt_Baker.mp4" type="video/mp4">
        </video>
        <div class="container h-100">
          <div class="d-flex h-100 text-center align-items-center">
            <div class="w-100 text-white">
              <h1 class="display-3">Video Header</h1>
              <p class="lead mb-0">With HTML5 Video and Bootstrap 4</p>
            </div>
          </div>
        </div>
      </header>
      
      <section class="my-5">
        <div class="container">
          <div class="row">
            <div class="col-md-8 mx-auto">
                    <h1>Institute Overview</h1>
                    <p>Government Polytechnic, Nashik was established in the year 1980. The Government of Maharashtra allotted 30 Acres of land on which stands the majestic & sprawling Government Polytechnic campus. The Institute is located at Samangaon Road at 1.5 Km. from Nashik-Pune Highway, about 3 Km. from Nashik-Road Railway Station & 12 Km. from Central Bus Stand, Nashik. Rickshaw facilities are available from Nashik-Road to the Institute. Initially Diploma programme in Civil Engineering with 60 intake was introduced in 1980 & now the institute conducts 10 (Ten) regular Diploma programmes in conventional and diversified areas in two shifts with total intake of 780+66 (Fee waiver scheme).</p>
                    <div class="know-more-wrapper"> <a href="http://gpnashik.ac.in/AboutUs/institute" class="know-more">Know More <span class="icon-more-icon"></span></a> </div>
            </div>
            <br><br>
            <div class="col-md-8 mx-auto">
                    <h2>Vision</h2>
                    <p>GTo be a premier Technical Training and Development Institute catering to the skill and professional development in multi-domain for Successful employment/self-employment by offering certified and accredited NSQF compliant programmes. The Institute shall be the center for Excellence in skill development and community development through different training programmes, business incubation and Entrepreneurship development.</p>
            </div>
            <div class="col-md-8 mx-auto">
                    <h2>Mission</h2>
                    <p>The Government Polytechnic, Nashik, an Autonomous Institute of Government of Maharashtra has the Mission to provide Education for skill Development, Engineering Diploma and continuing education Programmes for enhancement of employability skills of the aspirants in the job/self-employment through continually developing quality learning systems. The Institute aims at holistic and the student centric education in collaboration with business, industry and having practice based education.</p>
            </div>
          </div>
        </div>
      </section>
@endsection
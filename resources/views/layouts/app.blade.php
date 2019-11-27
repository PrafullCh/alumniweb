<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title of page -->
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CSS - links -->
    <!-- Bootsrtap CDN -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/menuBarStyle.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/svgstyle.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet">
      <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700|Muli:300,400" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alatsi|PT+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bitter|Lobster&display=swap" rel="stylesheet">
    <link href="{{ asset('public/css/carousel.css') }}" rel="stylesheet">
    <!-- Animate - links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="{{ asset('public/css/aos.css') }}">
    
    <!-- Owl Corousel -->
    <link rel="stylesheet" href="{{asset('public/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/owl.theme.default.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <!-- Jquery -->
    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    @if (isset($page))
              @if($page=="contact")
                    <link rel="stylesheet" href="public/fonts/icomoon/style.css">
                    <link rel="stylesheet" href="public/css/jquery-ui.css">
                    {{-- <link rel="stylesheet" href="public/css/owl.carousel.min.css"> --}}
                    {{-- <link rel="stylesheet" href="public/css/owl.theme.default.min.css"> --}}
                    {{-- <link rel="stylesheet" href="public/css/owl.theme.default.min.css"> --}}
                    <link rel="stylesheet" href="{{asset('public/css/jquery.fancybox.min.css')}}">
                    <link rel="stylesheet" href="{{asset('public/css/bootstrap-datepicker.css')}}">
                    <link rel="stylesheet" href="{{asset('public/fonts/flaticon/font/flaticon.css')}}">
                    
                    <link href="public/css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">
                    {{-- <link rel="stylesheet" href="public/css/style.css"> --}}
              @endif  

              @if($page=="about")
                    <script src="{{ asset('public/js/jquery.slim.min.js') }}" ></script>
                    <link rel="stylesheet" href="{{asset('public/css/about.css')}}">
              @endif

              @if ($page=="directory")
                    <link href="{{ asset('public/css/borderHover.css') }}" rel="stylesheet">
              @endif
              @if ($page=="donation")
                    <link href="public/donationStyle/css/font-awesome.min.css" rel="stylesheet">
                    <link href="public/donationStyle/css/ionicons.min.css" rel="stylesheet">
                    <link href="public/donationStyle/css/owl.carousel.min.css" rel="stylesheet">
                    <!-- Main Stylesheet File -->
                    <link href="public/donationStyle/css/style.css" rel="stylesheet">
              @endif
              @if($page == "posts")
                <link rel="stylesheet" href="{{asset('public/css/post_style.css')}}">
                <link href="https://fonts.googleapis.com/css?family=Jomolhari|Merriweather|Poppins&display=swap" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Acme|Alata|Calistoga|Lobster|Roboto+Condensed&display=swap" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Literata&display=swap" rel="stylesheet">
              @endif
              @if($page == "gallery")
              <link rel="stylesheet" href="{{asset('public/css/gallery.css')}}">
              <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
              @endif
    @endif
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
     #dropdownButton .dropdown-toggle::after { 
          content: none; 
      } 
    </style>
</head>
<body @if(isset($page)) @if($page=="contact") data-spy="scroll" data-target=".site-navbar-target" data-offset="300" @endif @endif>
        @include('inc.navbar')
       
        @include('inc.messages')
        @yield('content') 
        @include('inc.footer')
</body>
</html>

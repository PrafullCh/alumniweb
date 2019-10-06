<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title of page -->
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CSS - links -->
      <!-- Fonts -->
          <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700|Muli:300,400" rel="stylesheet">
          <link rel="dns-prefetch" href="//fonts.gstatic.com">
          <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('public/css/carousel.css') }}" rel="stylesheet">
    <!-- Animate - links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="public/css/aos.css">
    <!-- Bootsrtap CDN -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/menuBarStyle.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/svgstyle.css') }}" rel="stylesheet">
    <!-- Jquery -->
    <script src="{{ asset('public/js/app.js') }}" ></script>
    <script src="{{asset('public/js/jquery-3.3.1.min.js')}}"></script>
    <script src="public/js/popper.min.js"></script>
    <script src="https://kit.fontawesome.com/73e553a836.js"></script>
    @if (isset($page))
              @if($page=="contact")
                    <link rel="stylesheet" href="public/fonts/icomoon/style.css">
                    <link rel="stylesheet" href="public/css/jquery-ui.css">
                    <link rel="stylesheet" href="public/css/owl.carousel.min.css">
                    <link rel="stylesheet" href="public/css/owl.theme.default.min.css">
                    <link rel="stylesheet" href="public/css/owl.theme.default.min.css">
                    <link rel="stylesheet" href="public/css/jquery.fancybox.min.css">
                    <link rel="stylesheet" href="public/css/bootstrap-datepicker.css">
                    <link rel="stylesheet" href="public/fonts/flaticon/font/flaticon.css">
                    
                    <link href="public/css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">
                    <link rel="stylesheet" href="public/css/style.css">
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
      
    </style>
</head>
<body @if(isset($page)) @if($page=="contact") data-spy="scroll" data-target=".site-navbar-target" data-offset="300" @endif @endif>
        @include('inc.navbar')
       
        @include('inc.messages')
        @yield('content') 
        @include('inc.footer')
</body>
</html>

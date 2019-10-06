  <!-- FOOTER -->
  @isset($page)
  @if ($page=="about"||$page=="contact")
  <script src="{{asset('public/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('public/js/jquery-ui.js')}}"></script>
  
  
  <script src="{{asset('public/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('public/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('public/js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('public/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('public/js/jquery.easing.1.3.js')}}"></script>
 
  <script src="{{asset('public/js/jquery.fancybox.min.js')}}"></script>
  <script src="{{asset('public/js/jquery.sticky.js')}}"></script>
  <script src="{{asset('public/js/jquery.mb.YTPlayer.min.js')}}"></script>




  
   @endif
  @endisset
  <script src="{{ asset('public/js/aos.js') }}" ></script>
  <script>
    AOS.init();
  </script>
  <footer class="container bg-light">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy;2019 Goverment Polytechnic. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
  
  <script src="https://kit.fontawesome.com/73e553a836.js"></script>
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
  @if ($page=="index")
  <script src="{{asset('public/js/countUp.js')}}"></script>

  <script src="{{asset('public/js/jquery.countTo.js')}}"></script>
  <script src="{{asset('public/js/jquery.waypoints.min.js')}}"></script>
  <script>
      var counter = function() {
      $('.js-counter').countTo({
         formatter: function (value, options) {
          return value.toFixed(options.decimals);
        },
      });
    };
  var counterWayPoint = function() {
      if ($('#colorlib-counter').length > 0 ) {
        $('#colorlib-counter').waypoint( function( direction ) {
                      
          if( direction === 'down' && !$(this.element).hasClass('animated') ) {
            setTimeout( counter , 400);					
            $(this.element).addClass('animated');
          }
        } , { offset: '90%' } );
      }
    };
      counterWayPoint();
  </script>



  <script src="{{asset('public/js/owl.carousel.min.js')}}"></script> 

  <script>
      $('.owl-carousel').owlCarousel({
      margin:10,
      autoWidth:true,
      items:1
      });
  </script>
   @endif
   @if($page == "gallery")
   <script src="{{asset('public/js/gallery.js')}}"></script>
    @endif
  @endisset
  <script src="{{ asset('public/js/aos.js') }}" ></script>
  <script>
    AOS.init();
  </script>
  
  
  
  <div class="pt-3 footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-xs-12 about-company" id="footer-brand">
          <h2>Government Polytechnic Nashik</h2>
          <h4 class="text-white-50">Alumni Portal</h4>
          <p><i class="fab fa-facebook-square"></i>&nbsp;&nbsp;&nbsp;<i class="fab fa-twitter-square"></i></p>
        </div>
        <div class="col-lg-3 col-xs-12 links">
          <h4 class="mt-lg-0 mt-sm-3" id="footer-link-title">Links</h4>
            <ul class="m-0 p-0" id="footer-list">
              <li>- <a href="#">Lorem ipsum</a></li>
              <li>- <a href="#">Nam mauris velit</a></li>
              <li>- <a href="#">Etiam vitae mauris</a></li>
              <li>- <a href="#">Fusce scelerisque</a></li>
              <li>- <a href="#">Sed faucibus</a></li>
              <li>- <a href="#">Mauris efficitur nulla</a></li>
            </ul>
        </div>
        <div class="col-lg-4 col-xs-12 location" id="footer-location">
          <h4 class="mt-lg-0 mt-sm-4">Location</h4>
          <p><i class="fas fa-search-location"></i>&nbsp;&nbsp;Samangaon Road, Nashik Road, Nashik</p>
          <p class="mb-0"><i class="fa fa-phone mr-3"></i>(541) 754-3010</p>
          <p><i class="fa fa-envelope-o mr-3"></i>admin@gpnashik.com</p>
        </div>
      </div>
      <div class="row">
        <div class="col copyright">
          <p class=""><small class="text-white-50">© 2019. All Rights Reserved.</small></p>
        </div>
      </div>
    </div>
    </div>


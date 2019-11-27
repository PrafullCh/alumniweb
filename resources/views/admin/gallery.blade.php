<!--
=========================================================
 Material Dashboard - v2.1.1
=========================================================

 Product Page: https://www.creative-tim.com/product/material-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/material-dashboard/blob/master/LICENSE.md)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

@include('dashboard_component.header')
  <div class="wrapper ">
    {{-- navigation bar --}}
    @include('dashboard_component.navigationBar')
    {{-- navigation bar end --}}
    <div class="main-panel">
      <!-- Navbar -->
      @include('dashboard_component.navbar')
      <!-- End Navbar -->
      <div class="content">
        <div class="container">
          <h2>Gallery</h2>
          @if (isset($galleryname))
            <h1>{{$galleryname}}</h1>
          @endif
          @if (isset($id))
          <a href="{{route('admin.addNewImages',$id)}}" class="btn btn-primary">Add New Images</a>
          @else
          <a href="{{route('admin.createnewgallery')}}" class="btn btn-primary">New Gallery</a>
          @endif
        
        </div>

        <div class="container">
          <div class="row">
            @if (isset($gallery))
            @if ($gallery->count())
             
            @foreach ($gallery as $item)
                <div class="col-md-4">
                    <div class="card bg-light">
                    <img class="card-img-bottom" src="{{asset('public/storage/GalleryCoverImage/'.$item->cover_image)}}" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title border-bottom pb-3" style="color:black;text-align:center">
                          {{$item->name}}
                        </h5>
                        <p class="card-text" style="color:black;text-align:center">Hey</p>
                        <a href="{{route('admin.viewgallery',$item->album_id)}}" class="btn btn-outline stretched-link" style="text-align:center">See Photos</a>
                       
                        {!!Form::open(['action'=>['AdminController@deleteGallery',$item->album_id],'method'=>'POST','class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}  
                        {{Form::submit('Delete',['data-text'=>'Delete','class'=>'btn btn-primary'])}}
                        {!!Form::close()!!}
                      </div>
                    </div>
                </div>
               @endforeach
                   
            @else
                <h1>No gallery found</h1>
            @endif 
            @elseif(isset($images)) 
            <div class="container">
              <div class="row">
                
              
              @foreach ($images as $image)
              <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle" style="    box-shadow: 0px 0px 5px;
              padding-top: 23px;">
                  <img src="{{asset('public/storage/GalleryImages/'.$image->name)}}" class="img-responsive single-image" width="100%">
                  <P style="text-align:center;margin:0;">{{$image->title}}</P>
                  {!!Form::open(['action'=>['AdminController@deleteImage',$image->id],'method'=>'POST','class'=>'pull-right'])!!}
                  {{Form::hidden('_method','DELETE')}}  
                  {{Form::submit('Delete',['data-text'=>'Delete','class'=>'btn btn-primary'])}}
                  {!!Form::close()!!}
                </div>
              @endforeach  

              
            </div>
          </div>
          <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                  </div>
                </div>
              </div>
            </div>
            @endif
           
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('dashboard_component.plugin')
  @include('dashboard_component.footer')
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  {{-- <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initGoogleMaps();
    });
  </script> --}}
</body>

</html>

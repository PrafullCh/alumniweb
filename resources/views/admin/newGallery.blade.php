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
    @include('dashboard_component.navigationBar')
    <div class="main-panel">
      <!-- Navbar -->
      @include('dashboard_component.navbar')
      <!-- End Navbar -->
      <div class="content">
        <div class="container">
          <h3><b>Create New Gallery</b></h3>
        </div>
        <div class="container">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            {{-- {!! Form::open(['action' =>'AdminController@storeNewGallery','method' => 'POST','enctype' => 'multipart/form-data']) !!} --}}
            <form method="POST" action="http://localhost:82/alumniWeb/admin/storeNewGallery" accept-charset="UTF-8" enctype="multipart/form-data">
              @csrf
              {{-- <label for="images">Selsect Images</label>
              <input type='file'name="images" id="imgInp" multiple/><br> --}}
              <div class="row mt-3">
                <div class="col-md-12">
                  <label for="coverimage">Select Cover photo for gallery</label><br>
                  <input type='file'name="coverimage"/>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-12">
                  <div class="form-group">
                        <label class="bmd-label-floating">Gallery Name</label>
                        {{Form::text('galleryname','',['class' => 'form-control','required'=>'required'])}}
                  </div>
                </div>
              </div>
              <label for="images">Select Images</label>
              <br>
              <input type='file'name="images[]" id="imgInp" multiple/><br>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="card">
                            <div class="card-header card-header-primary">
                              <h4 class="card-title ">Uploaded Images</h4>
                              <p class="card-category"> Give name to images</p>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table">
                                  <thead class=" text-primary">
                                    <th>
                                      Name
                                    </th>
                                    <th>
                                      Photo Discription
                                    </th>
                                    <th>
                                      Preview
                                    </th>
                                    
                                  </thead>
                                  <tbody id="testing">
                                    
                                  </tbody>
                                </table>
                                
                                          <div class="row mt-3">
                                              <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="btn btn-primary" type="submit" value="Submit">
                                                </div>
                                              </div>
                                            </div>
                              </div>
                            </div>
                          </div>
                      </div>
                  </div>
                  </form>
                </div>
              </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="https://creative-tim.com/presentation">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/license">
                  Licenses
                </a>
              </li>
            </ul>
          </nav>
          
      </footer>
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
    function readURL(input) {
                  for(i=0;i<input.files.length;i++)
                  {
                    
                    if (input.files && input.files[i]) {
                    var reader = new FileReader();
                    // console.log(input.files[i].name);
                    var n = input.files[i].name;
                    var  j = i;
                    reader.onload = function(e) {
                      // console.log(n);
                      document.getElementById('testing').innerHTML += "<tr><td scope='col'>"+n+"</td><td scope='col'><input type='text' name='title[]' class='val'></td><td scope='col'><img src='"+e.target.result+"' width='100px' height='50px'></td></tr>"; 
                      }
                    reader.readAsDataURL(input.files[i]);
                    }
                  }
                  // document.getElementById('testing').innerHTML = "<input type='text' name='aaaaaaaa' value='dsfsd' hidden>";
          }

          $("#imgInp").change(function() {
             document.getElementById('testing').innerHTML="";
            readURL(this);
          });
          
  </script>
</body>

</html>

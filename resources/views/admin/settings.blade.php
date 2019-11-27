
@include('dashboard_component.header')
  <div class="wrapper ">
    @include('dashboard_component.navigationBar')
    <div class="main-panel">
      <!-- Navbar -->
      @include('dashboard_component.navbar')
      <!-- End Navbar -->
      <div class="content">
        <div class="container">
          <h1>Change Setting for site</h1>
            <!-- Rounded switch -->
            

            <table class="table">
              <tr>
                <td>
                  <label class="switch">
                    <input type="checkbox" @if($data->blog_view==1) checked @endif id="blog">
                    <span class="slider round"></span>
                  </label>
                </td>
                <td>
                  <h3>Blog View</h3>
                </td>
              </tr>
              <tr>
                <td>
                  <label class="switch">
                    <input type="checkbox" @if($data->directory_view==1) checked @endif id="directory">
                    <span class="slider round"></span>
                  </label>
                </td>
                <td>
                  <h3>Directory View</h3>
                </td>
              </tr>
              <tr>
                <td>
                  <label class="switch">
                    <input type="checkbox" @if($data->yearbook_view==1) checked @endif id="yearbook">
                    <span class="slider round"></span>
                  </label>
                </td>
                <td>
                  <h3>Yearbook View</h3>
                </td>
              </tr>
              <tr>
                <td>
                  <label class="switch">
                    <input type="checkbox" @if($data->about_us_view==1) checked @endif id="about_us">
                    <span class="slider round"></span>
                  </label>
                </td>
                <td>
                  <h3>"About Us" View</h3>
                </td>
              </tr>
              <tr>
                <td>
                  <label class="switch">
                    <input type="checkbox" @if($data->contact_us_view==1) checked @endif id="contact_us">
                    <span class="slider round"></span>
                  </label>
                </td>
                <td>
                  <h3>"Contact Us" View</h3>
                </td>
              </tr>
              <tr>
                <td>
                  <label class="switch">
                    <input type="checkbox" @if($data->gallery_view==1) checked @endif id="gallery">
                    <span class="slider round"></span>
                  </label>
                </td>
                <td>
                  <h3>"Gallery" View</h3>
                </td>
              </tr>
              <tr>
                  <td>
                    <label class="switch">
                      <input type="checkbox" @if($data->donation_view==1) checked @endif id="donation">
                      <span class="slider round"></span>
                    </label>
                  </td>
                  <td>
                    <h3>"Donation" View</h3>
                  </td>
                </tr>
                <tr>
                    <td>
                      <label class="switch">
                        <input type="checkbox" @if($data->login_view==1) checked @endif id="login">
                        <span class="slider round"></span>
                      </label>
                    </td>
                    <td>
                      <h3>"Login" View</h3>
                    </td>
                  </tr>
                  <tr>
                      <td>
                        <label class="switch">
                          <input type="checkbox" @if($data->register_view==1) checked @endif id="register">
                          <span class="slider round"></span>
                        </label>
                      </td>
                      <td>
                        <h3>"Registration" View</h3>
                      </td>
                    </tr>
            </table>


        </div>
      </div>
    </div>
  </div>
  {{-- @include('dashboard_component.plugin') --}}
  @include('dashboard_component.footer')
  <script src="{{asset('public/js/settings.js')}}"></script>
  



</body>

</html>

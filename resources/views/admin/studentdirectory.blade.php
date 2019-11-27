
@include('dashboard_component.header')
  <div class="wrapper ">
    @include('dashboard_component.navigationBar')
    <div class="main-panel">
      <!-- Navbar -->
      @include('dashboard_component.navbar')
      <!-- End Navbar -->
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
              {{-- for margin --}}
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2">
              <a href="#" class="btn btn-primary" id="authorised">
                Authorised
              </a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2">
              <a href="#"  class="btn btn-primary" id="fake">
                Fake
              </a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2">
              <a href="#"  class="btn btn-primary" id="unauthorised">
                UnAuthorised
              </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              {{-- for margin --}}
            </div>
          </div>
          {{-- table start --}}
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title "><span class="title-entries">Authorised</span> Users</h4>
              <p class="card-category">All <span class="title-entries">Authorised</span> users are listed below</p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      Id
                    </th>
                    <th>
                      First Name
                    </th>
                    <th>
                      Last Name
                    </th>
                    <th>
                      Role
                    </th>
                    <th>
                      Year of Passing
                    </th>
                    <th>
                      Action
                    </th>
                  </thead>
                  <tbody id="entries">
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          {{-- table end --}}
        </div>
      </div>
    </div>
  </div>
  <form action="route('admin.record')" method="post" id="myForm">
    @csrf
    <input type="hidden" name="page" value="studentdirectory">
  </form>
  @include('dashboard_component.plugin')
  @include('dashboard_component.footer')
  <script src="{{asset('public/js/adminstudentdirectory.js')}}"></script>
</body>

</html>

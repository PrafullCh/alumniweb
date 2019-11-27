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
          @if ($errors->any())    
                  @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                      </button>
                      <span>
                          {{ $error }}
                      </span>
                  </div>
                  @endforeach
        @endif
          <div class="container">
              <h2><b>
                  Send Notification  
                  </b></h2>
            <div class="row">
              <a href=""></a>
              <a href=""></a>
            </div>
          </div>
        <div class="container">
        <form action="{{route('admin.notifyEmail')}}" method="post" id="myForm">
          @csrf
         <div class="container">
          <div class="row">
            
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">Roll No of User</label>
                <input type="text" class="form-control" name="rollno" id="rollno">
              </div>
            </div>
            
              <div class="col-md-12">
                <div class="form-group">
                    <label class="bmd-label-floating"> Enter Message to send to user</label>
                    <textarea class="form-control" rows="5" name="msg" id="msg"></textarea>
                </div>
              </div>
            
            
          </div>
          {{Form::submit('Notify User through Email',['data-text'=>'Notify User','class'=>'btn btn-primary pull-right my-notification-button','id'=>'submit-btn1'])}}
          {{Form::submit('Notify User through Web Meassage',['data-text'=>'Notify User','class'=>'btn btn-primary pull-right my-notification-button','id'=>'submit-btn2','formaction'=>route('admin.notifyDB')])}}
        </form>
      </div>
            <br>

            <h2>Sent Notification</h2>
            <small><b>*notification sent as email are not viewed here</b></small>
              <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title ">Notification</h4>
                    {{-- <p class="card-category">All Unauthorised users are listed below</p> --}}
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                          <th>
                            Id
                          </th>
                          <th>
                            Roll No
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Notification Content
                          </th>
                          <th>
                            Action
                          </th>
                        </thead>
                        <tbody>
                          @foreach ($notifications as $notification)
                              <tr>
                                <td>{{$notification->notifiable_id}}</td>
                                @foreach ($users as $user)
                                    @if($user->id==$notification->notifiable_id)
                                    <td>{{$user->rollno}}</td>
                                    <td>{{$user->firstname.' '.$user->lastname}}</td>
                                    @endif
                                @endforeach
                                <td>
                                   {{-- @foreach($notification->data as $item)
                                    {{$item}}
                                   @endforeach --}}
                                   <?php print_r(json_decode($notification->data)->data)?>
                                  </td>
                                  <td>
                                  <a href="{{route('admin.delete.notification',$notification->id)}}"><i class="material-icons">delete</i></a>
                                </td>
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
         
        </div>
      </div>
    </div>
  
  {{-- @include('dashboard_component.plugin') --}}
  @include('dashboard_component.footer')

  <script src="{{asset('public/js/validation.js')}}">
  
  </script>
  
  <script src="{{asset('public/js/autosearch.js')}}">
  
  </script>
</body>

</html>

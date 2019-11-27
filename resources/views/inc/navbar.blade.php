        <div id="navbar-style" id="nav-title-color"   data-aos="fade-up"   data-aos-delay="50">
              <h1 id="alumni-association">Alumni Association</h1>
              <h1 id="gpn" >Governement Polytechnic Nashik</h1>
        </div>
    <nav class="navbar transparent navbar-expand-md navbar-color sticky-top">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" id="toggle-button">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active">
          <a class="nav-link link-color link-transition-parent draw"  href="{{route('index')}}">Home <span class="sr-only">(current)</span></a>
          </li>
          @if ((json_decode(Storage::disk('local')->get('settings.json')))->blog_view==1)
          <li class="nav-item active">
            <a class="nav-link link-color link-transition-parent draw" href="{{route('posts.index')}}">Blog <span class="sr-only">(current)</span></a>
          </li>
          @endif
          @if ((json_decode(Storage::disk('local')->get('settings.json')))->donation_view==1)
            <li class="nav-item active">
              <a class="nav-link link-color link-transition-parent draw" href="{{route('donation')}}">Donation<span class="sr-only">(current)</span></a>
            </li>
            @endif
            @if ((json_decode(Storage::disk('local')->get('settings.json')))->gallery_view==1)
          <li class="nav-item dropdown">
            <a class="nav-link link-color link-transition-parent draw" href="{{route('gallery')}}">Gallery<span class="sr-only">(current)</span></a>
            </li>
            @endif
          <li class="nav-item dropdown">
            @if ((json_decode(Storage::disk('local')->get('settings.json')))->yearbook_view==1 || (json_decode(Storage::disk('local')->get('settings.json')))->directory_view==1)
              <a class="nav-link dropdown-toggle link-color link-transition-parent draw" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Find Batchmate&nbsp;&nbsp;<i class="fas fa-caret-down"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"id="fndbatchmte">
                @if ((json_decode(Storage::disk('local')->get('settings.json')))->yearbook_view==1)
                <a class="dropdown-item" href="{{route('yearbook')}}">Yearbook</a>
                @endif
                @if ((json_decode(Storage::disk('local')->get('settings.json')))->directory_view==1)
                <a class="dropdown-item" href="{{route('directory')}}">Directory</a>
                @endif
              </div>
            </li>
            @endif
            @if ((json_decode(Storage::disk('local')->get('settings.json')))->contact_us_view==1||(json_decode(Storage::disk('local')->get('settings.json')))->about_us_view==1)
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle link-color link-transition-parent draw" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Contact&nbsp;&nbsp;<i class="fas fa-caret-down"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"id="contact">
                @if ((json_decode(Storage::disk('local')->get('settings.json')))->contact_us_view==1)
                <a class="dropdown-item" href="{{route('contact')}}">Contact</a>
                @endif
                @if ((json_decode(Storage::disk('local')->get('settings.json')))->about_us_view==1)
                <a class="dropdown-item" href="{{route('about')}}">About</a>
                @endif
                <a class="dropdown-item" href="{{route('index')}}">Governing Body</a>
              </div>
            </li>
            @endif
            @guest
                            @if((json_decode(Storage::disk('local')->get('settings.json')))->login_view==1||(json_decode(Storage::disk('local')->get('settings.json')))->register_view==1)
                            @if ((json_decode(Storage::disk('local')->get('settings.json')))->login_view==1)
                              <li class="nav-item">
                                  <a class="nav-link link-color link-transition-parent draw" href="{{ route('login') }}">{{ __('Login') }}</a>
                              </li>
                            @endif
                            @if ((json_decode(Storage::disk('local')->get('settings.json')))->register_view==1)
                              @if (Route::has('register'))
                                  <li class="nav-item">
                                      <a class="nav-link link-color link-transition-parent draw" href="{{ route('verify') }}">{{ __('Register') }}</a>
                                  </li>
                              @endif
                            @endif
                            @endif
                        @else
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown link-color link-transition-parent draw" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->firstname }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelleSSdby="navbarDropdown" id="name">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">
                                
                              </a>
                            </li>

                            <li class="nav-item dropdown" id="dropdownButton">
                              <a class="nav-link dropdown-toggle  link-color  " id="bell-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                <i class="fa fa-bell">

                                </i>
                                @if (auth()->user()->unReadNotifications->count()>0)
                                <span class="badge badge-light">{{auth()->user()->unReadNotifications->count()}}</span>
                                @endif
                              
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="dropmenu">
                                @if (auth()->user()->notifications->count() > 0)
                                @if (auth()->user()->unReadNotifications->count()>0)
                                <a class="dropdown-item" href="{{route('markAllRead')}}" id="markallbtn">
                                  Mark All as Read
                              </a>
                                @endif
                                
                                
                                    
                                
                                <?php $count=0;?>
                                @foreach (auth()->user()->unReadNotifications as $notification)
                                    <a class="dropdown-item" href="{{route('markRead',$count)}}" style="background-color: lightgray;">
                                    @foreach ($notification->data as $item)
                                     {{$item}}   
                                    @endforeach
                                  </a>  
                                @endforeach  
                                @foreach (auth()->user()->readNotifications as $notification)
                                  <p class="dropdown-item" href="" >
                                    
                                    @foreach ($notification->data as $item)
                                     {{$item}}   
                                    @endforeach
                                    <a href="{{route('user.delete.notification',$notification->id)}}" style="color:white">&nbsp;&nbsp;<i class="fa fa-trash"></i></a>
                                  </p>  
                                @endforeach
                                @else
                                <p class="dropdown-item" href="#" >
                                    <b>There are not any notifications for you</b>
                                </p>
                                @endif
                              </div>
                          </li>
                        @endguest
        </ul>
      </div>
    </nav>

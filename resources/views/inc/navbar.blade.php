@if(isset($page))
@if($page=="index")
<div class="container">
  <div class="row">
      <img src="{{asset('public/images/main-logo.png')}}" class="animated fadeIn delay-1s img-responsive mx-auto" width="80%"  height="30%" alt="">
  </div>
</div>
@endif
@endif
    <nav class="navbar transparent navbar-expand-md navbar-dark bg-dark ">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active">
          <a class="nav-link" href="{{route('index')}}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
              <a class="nav-link" href="{{route('index')}}">Blog <span class="sr-only">(current)</span></a>
            </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Events & Updates
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Event</a>
                <a class="dropdown-item" href="#">Updates</a>
                <a class="dropdown-item" href="#">Gallery</a>
              </div>
            </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Find Batchmate
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{route('yearbook')}}">Yearbook</a>
                <a class="dropdown-item" href="{{route('directory')}}">Directory</a>
              </div>
            </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Contact
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{route('contact')}}">Contact</a>
                <a class="dropdown-item" href="{{route('about')}}">About</a>
                <a class="dropdown-item" href="{{route('index')}}">Governing Body</a>
              </div>
            </li>
            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->firstname }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                        @endguest
        </ul>

        
      </div>
    </nav>

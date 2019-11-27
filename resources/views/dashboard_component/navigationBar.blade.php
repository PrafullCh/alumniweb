<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('public/admin-assets/img/sidebar-1.jpg')}}">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      Alumni Association
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item @if(isset($page)) @if($page=="dashboard") active  @endif @endif">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item  @if(isset($page)) @if($page=="user") active  @endif @endif">
        <a class="nav-link" href="{{route('admin.user')}}">
          <i class="material-icons">person</i>
          <p>User Profile</p>
        </a>
      </li>
      <li class="nav-item  @if(isset($page)) @if($page=="studentdirectory") active  @endif @endif">
        <a class="nav-link" href="{{route('admin.studentdirectory')}}">
          <i class="material-icons">description</i>
          <p>Student Directory</p>
        </a>
      </li>
      <li class="nav-item  @if(isset($page)) @if($page=="gallery") active  @endif @endif">
        <a class="nav-link" href="{{route('admin.admingallery')}}">
          <i class="material-icons">photo_library</i>
          <p>Gallery</p>
        </a>
      </li>
      {{-- <li class="nav-item  @if(isset($page)) @if($page=="typography") active  @endif @endif">
        <a class="nav-link" href="{{route('admin.typography')}}">
          <i class="material-icons">library_books</i>
          <p>Typography</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item  @if(isset($page)) @if($page=="icons") active  @endif @endif">
        <a class="nav-link" href="{{route('admin.icons')}}">
          <i class="material-icons">bubble_chart</i>
          <p>Icons</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item  @if(isset($page)) @if($page=="map") active  @endif @endif">
        <a class="nav-link" href="{{route('admin.map')}}">
          <i class="material-icons">location_ons</i>
          <p>Maps</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item  @if(isset($page)) @if($page=="notifications") active  @endif @endif">
        <a class="nav-link" href="{{route('admin.notifications')}}">
          <i class="material-icons">notifications</i>
          <p>Notifications</p>
        </a>
      </li> --}}
      <li class="nav-item  @if(isset($page)) @if($page=="adminblog") active  @endif @endif">
        <a class="nav-link" href="{{route('admin.adminblog')}}">
          <i class="material-icons">Blog</i>
          <p>Blog</p>
        </a>
      </li>
      <li class="nav-item  @if(isset($page)) @if($page=="notification") active  @endif @endif">
        <a class="nav-link" href="{{route('admin.notification')}}">
          <i class="material-icons">chat</i>
          <p>Notification</p>
        </a>
      </li>
      {{-- <li class="nav-item  @if(isset($page)) @if($page=="settings") active  @endif @endif">
        <a class="nav-link" href="">
          <i class="material-icons">settings_applications</i>
          <p>Settings</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item  @if(isset($page)) @if($page=="rtl") active  @endif @endif">
        <a class="nav-link" href="{{route('admin.rtl')}}">
          <i class="material-icons">language</i>
          <p>RTL Support</p>
        </a>
      </li> --}}
    </ul>
  </div>
</div>
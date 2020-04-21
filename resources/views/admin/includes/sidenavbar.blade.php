<div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">
  <a class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border">
  SYNZSTEGO
  </a>
<div class="bottom-border pb-3">
  @yield('userimg')
  <a href="#" class="text-white">@yield('username')</a>
</div>

<ul class="navbar-nav flex-column mt-4">



@if(Auth::user()->admin)
  <li class="nav-item"><a href="{{ asset(route('stats')) }}" class="nav-link text-white p-3 mb-2
 {{ asset(route('stats')) == asset('/'.request()->path()) ? 'current' : '' }}">
    <i class="fas fa-align-justify text-light fa-lg mr-3"></i>
    Statistics</a></li>
@endif

    <li class="nav-item"><a href="{{ route('watermark.view') }}" class="nav-link text-white p-3 mb-2 sidebar-link
 {{ asset(route('watermark.view')) == asset('/'.request()->path()) ? 'current' : '' }}">
    <i class="fas fa-copyright text-light fa-lg mr-3"></i>
    Watermark</a></li>

    <li class="nav-item"><a href="{{ asset(route('stgimgs.index')) }}" class="nav-link text-white p-3 mb-2 sidebar-link
 {{ asset(route('stgimgs.index')) == asset('/'.request()->path()) ? 'current' : '' }}">
    <i class="fas fa-eye-slash text-light fa-lg mr-3"></i>
    Hide data</a></li>

    <li class="nav-item"><a href="{{ route('stgimgs.extract') }}" class="nav-link text-white p-3 mb-2 sidebar-link
 {{ asset(route('stgimgs.extract')) == asset('/'.request()->path()) ? 'current' : '' }}">
    <i class="fas fa-unlock-alt text-light fa-lg mr-3"></i>
    Extract data</a></li>

    <li class="nav-item"><a href="{{ route('folders') }}" class="nav-link text-white p-3 mb-2 sidebar-link
 {{ asset(route('folders')) == asset('/'.request()->path()) ? 'current' : '' }}
 {{ asset(route('stegimgs.view.downloads')) == asset('/'.request()->path()) ? 'current' : '' }}
 {{ asset(route('user.watermark.download')) == asset('/'.request()->path()) ? 'current' : '' }}">
  <i class="fas fa-images text-light fa-lg mr-3"></i>
    My Images</a></li>


 <li class="nav-item"><a href="{{ route('images.trashed') }}" class="nav-link text-white p-3 mb-2 sidebar-link
 {{ asset(route('images.trashed')) == asset('/'.request()->path()) ? 'current' : '' }}">
   <i class="fas fa-trash text-light fa-lg mr-3"></i>
   Trashed Images</a></li>

    <li class="nav-item"><a href="{{ route('user.profile') }}" class="nav-link text-white p-3 mb-2 sidebar-link
   {{ asset(route('user.profile')) == asset('/'.request()->path()) ? 'current' : '' }}">
    <i class="fas fa-user text-light fa-lg mr-3"></i>
    My Profile</a></li>

    <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link">
    <i class="fas fa-desktop text-light fa-lg mr-3"></i>
    Download</a></li>

 @if(Auth::user()->admin)
    <li class="nav-item"><a href="{{ route('users') }}" class="nav-link text-white p-3 mb-2 sidebar-link
 {{ asset(route('users')) == asset('/'.request()->path()) ? 'current' : '' }}">
    <i class="fas fa-users text-light fa-lg mr-3"></i>
    Users</a></li>



 <li class="nav-item"><a href="{{ route('users.trashed') }}" class="nav-link text-white p-3 mb-2 sidebar-link
 {{ asset(route('users.trashed')) == asset('/'.request()->path()) ? 'current' : '' }}">
     <i class="fas fa-users text-light fa-lg mr-3"></i>
     Trashed Users</a></li>


    <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link">
    <i class="fas fa-wrench text-light fa-lg mr-3"></i>
    Settings</a></li>
 @endif

 <li class="nav-item"><a href="{{ asset(route('home')) }}" class="nav-link text-white p-3 mb-2
   {{ asset(route('home')) == asset('/'.request()->path()) ? 'current' : '' }}">
     <i class="fas fa-question-circle text-light fa-lg mr-3"></i>
     Help</a></li>

  
</ul>

</div>
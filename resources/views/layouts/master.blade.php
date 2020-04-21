@include('includes.head')

<!-- New -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <title>Login - Snzstego</title>


</head>
    <body>
       
    <script>
        
    </script>  
    
<!-- header -->
  <header>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg fixed-top custom-navbar">

      <a href="{{ url('/') }}" class="navbar-brand text-light text-uppercase"><span class="h2 text-light
         {{ asset(route('welcome')) == asset('/'.request()->path()) ? 'text-muted' : '' }}">SynzStego</span>
      </a>
        
      <button class="navbar-toggler nav-button" type="button" data-toggle="collapse" data-target="#myNavbar">
        <div class="bg-light line1"></div>
        <div class="bg-light line2"></div>
        <div class="bg-light line3"></div>
      </button>
  
       
    <div class="collapse navbar-collapse justify-content-end text-uppercase font-weight-bold" id="myNavbar">
       
        <ul class="navbar-nav">
        
        
       
           <!-- Authentication Links -->
     @guest
          <li class="nav-item">
            
            <a href="{{ route('login') }}" class="nav-link m-2 menu-item p-2
            {{ asset(route('login')) == asset('/'.request()->path()) ? 'nav-active' : ''}}">
              <i class="fas fa-sign-in-alt fa-lg mr-3"></i>
            Login</a>
          </li>


       
          @if (Route::has('register'))
          <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link m-2 menu-item">
              <i class="fas fa-user-plus fa-lg mr-3"></i>
            Register</a>
          </li>
          @endif
    @else
        <li class="nav-item">
            <a href="#" class="nav-link m-2 menu-item p-2">
                {{ Auth::user()->name }}
            </a>
            
            <div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}></a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
            </div>
        </li>
        @endguest




        </ul>
     
      </div>
    </nav>
    <!-- end of navbar -->

    <main class="py-4 mb-4 mt-4">
      <br><br><br>  
            @yield('content')

        </main>


@include('includes.footer')







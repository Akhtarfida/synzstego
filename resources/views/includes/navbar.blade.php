<body>

<!-- header -->
  <header>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg fixed-top nav-menu">

    <a href="{{ url('/') }}" class="navbar-brand text-light text-uppercase"><span class="h2 text-light
         {{ route('welcome') == asset(request()->path()) ? 'nav-active' : '' }}">SynzStego</span>
      </a>
      <button class="navbar-toggler nav-button" type="button" data-toggle="collapse" data-target="#myNavbar">
        <div class="bg-light line1"></div>
        <div class="bg-light line2"></div>
        <div class="bg-light line3"></div>
      </button>

      <div class="collapse navbar-collapse justify-content-end text-uppercase font-weight-bold" id="myNavbar">
        <ul class="navbar-nav">
          @if (Route::has('login'))


          @auth
          <li class="nav-item">
            <a href="{{ route('watermark.view')}}" class="nav-link m-2 menu-item
            {{ asset(route('watermark.view')) == asset('/'.request()->path()) ? 'current' : '' }}">
              <i class="fas fa-home fa-lg mr-3"></i>
            Dashboard</a>
          </li>

          @else

          <li class="nav-item">

            <a href="{{ route('login') }}" class="nav-link m-2 menu-item">
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
                @endauth

        @endif
          </ul>
      </div>
    </nav>
    <!-- end of navbar -->





    <!-- banner -->
    <div class="text-light text-md-right text-center banner">
      <h1 class="display-4 banner-heading">Welcome to </span><span class="display-3">Synzstego</span></h1>
      <p class="lead banner-par">Image Watermarking & Image Steganography</p>
    </div>
    <!-- end of banner -->
  </header>
  <!-- end of header -->



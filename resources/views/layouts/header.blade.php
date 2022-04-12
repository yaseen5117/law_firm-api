  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <!--<h1 class="text-light"><a href="index.html"><img src="./assets/img/logo.png"></img></a></h1>-->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.html"><img src="{{ asset('dog-prive/assets/img/logo.png')}}" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="{{ url('/') }}">Home</a></li>
         
          <li><a href="#">Cai Ciama</a></li>
          <li><a href="#">Dog</a></li>
          <li><a href="#">Faq</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Contact</a></li>
          @if(Auth::user())
          <li class="dropdown"> 
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @if(Auth::user()->profile_image)
              <img src="{{asset('').'storage/users/'.Auth::user()->id.'/'.Auth::user()->profile_image}}" width="40" height="40" class="rounded-circle">
            @else
            <img src="{{ asset('dog-prive/assets/img/user.png') }}" width="40" height="40" class="rounded-circle">
            @endif
            </a>
            <ul>
              <li><a href="{{ url('dashboard') }}">DashBoard</a></li>
              <li><a data-toggle="tooltip" title="Logout" type="button"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">LogOut</a></li>
              <!-- <li><a href="{{ route('login') }}">Team</a></li>
              <li><a href="{{ route('login') }}">Team</a></li>              -->
            </ul>
          </li>
          @else
          <li class="dropdown"> 
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              More
            </a>
            <ul>
              <li><a href="{{ url('register') }}">Register</a></li>
              <li><a href="{{ url('login') }}">Login</a></li>            
            </ul>
          </li>
          @endif
          <!-- <li><a class="getstarted" href="{{ route('login') }}">Login</a></li>
          <li><a class="getstarted" href="{{ route('register') }}">Register</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
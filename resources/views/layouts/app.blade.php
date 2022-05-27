<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.partials.head')

</head>

<body>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="" >
                      <!-- ======= Header ======= -->
                    <header id="header" class="fixed-top ">
                      <div class="container d-flex align-items-center justify-content-between">
                        <h1 class="logo"><a href="https://elawfirmpk.com/">E LAW FIRM </a></h1>
                        
                        <nav id="navbar" class="navbar">
                          <ul>
                            <li><a class="nav-link" href="https://elawfirmpk.com/">Home</a></li>
                            <li><a class="nav-link" href="https://elawfirmpk.com/login">Login</a></li>
                            <li><a class="nav-link" href="https://elawfirmpk.com/sign-up">Sign Up</a></li>          
                            
                          </ul>
                          <i class="bi bi-list mobile-nav-toggle"></i>
                        </nav><!-- .navbar -->

                      </div>
                    </header><!-- End Header -->
                   
                              @yield('content')
                     
                </div>

            </div>

        </div>

    </div>

    @include('layouts.partials.footer-scripts')

</body>

</html>
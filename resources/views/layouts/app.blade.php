<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.partials.head')

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center justify-content-between">
            <h1 class="logo"><a href="https://elawfirmpk.com/" class="text-color">ELAWFIRM </a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link text-color" href="https://elawfirmpk.com/">Home</a></li>
                    <li><a class="nav-link text-color" href="https://elawfirmpk.com/#about">About Us
                        </a></li>
                    <li><a class="nav-link text-color" href="https://elawfirmpk.com/#features">Features</a></li>
                    <li><a class="nav-link text-color" href="https://elawfirmpk.com/#pricing">Pricing</a>
                    </li>


                    <li><a class="nav-link text-color" href="https://elawfirmpk.com/sign-up">Sign
                            Up</a></li>
                    <li><a class="nav-link text-color" href="https://elawfirmpk.com/login">Login</a>
                    </li>


                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->


    @yield('content')



    @include('layouts.partials.footer-scripts')

</body>

</html>
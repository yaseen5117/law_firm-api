<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title') | Dog Prive -Home</title>

  <!-- Favicons -->
  <link href="{{ asset('dog-prive/assets/img/logo.png') }}" rel="icon">
  <link href="{{ asset('dog-prive/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('dog-prive/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('dog-prive/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('dog-prive/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('dog-prive/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('dog-prive/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('dog-prive/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  
  <!-- Template Main CSS File -->
  <link href="{{ asset('dog-prive/assets/css/style.css')}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    @yield('css')     

    <style>
          
  </style>               

</head>

<body>

            <!-- Main Content -->
            <div id="content">

            @include('layouts.header')

                <!-- Begin Page Content -->
                 
                @yield('content')                    
                 
            

            </div>
            <!-- End of Main Content -->

           @include('layouts.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
 
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Logout</a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('dog-prive/assets/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('dog-prive/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('dog-prive/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dog-prive/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('dog-prive/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('dog-prive/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dog-prive/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('dog-prive/assets/js/main.js') }}"></script>

    
<script type="text/javascript">

    $(document).ready(function($) {
        $("#region_id").select2();
        $("#province_id").select2();
        $("#city_id").select2();
        $('#overlay').hide();
        //active header buttons
        // $(function () {

        // $('.box li a').click(function (e) {
        //     e.preventDefault();
        //     $(this).closest('li').addClass('active').siblings().removeClass('active');
        // });

        // });
    });
     
    $( document ).ajaxStart(function() {
      $('#overlay').show();
    });

    $( document ).ajaxComplete(function(response,status) {
      $('#overlay').fadeOut();
      if(status.status==401){
        alert("Opps! Seems you couldn't submit form for a longtime your session is expired. Please try again");
        location.reload();
      }
    });
  </script>

    @yield('javascript')                    



</body>

</html>
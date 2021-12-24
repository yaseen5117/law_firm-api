<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title') | Law Firm</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="{{ asset('admin-template/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{url('/')}}/plugins/filepond/css/filepond.css" rel="stylesheet">

    <!-- Links for multi-select dropdown-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />

    <!-- Custom styles for this template-->
    @yield('css')     

    <style>
      .custom_fieldset{
        margin: 8px 2px;
        padding:0px  2px 0px 3px;
        border: 1px solid #cfcfcf;
      }
      .datepicker.datepicker-dropdown.dropdown-menu {
              z-index: 999999;
      }
      input[type='number'] {
          -moz-appearance:textfield;
      }
      
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
          /* display: none; <- Crashes Chrome on hover */
          -webkit-appearance: none;
          margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
      }

      form.cmxform label.error, label.error {
          color: red;
      }
      #overlay { 
        
        opacity:    0.5; 
          background: #000; 
          width:      100%;
          height:     100%; 
          z-index:    2000;
          top:        0; 
          left:       0; 
          position:   fixed; 
        }
        #img-load {
            width: 50px;
            height: 57px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -28px 0 0 -25px;
        }
        .field-required:after{
              content:" *";
              color:red;
        }

        .required:after{
          content:" *";
          color:red;
        }
        .text-danger{
          color: red!important;
        }

        /*<!-- style for active/inactive users in Ro's page -->*/
 
        .switch {
        margin-top: 8px;
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        }

        .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
        }

        .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #d9534f;;
        -webkit-transition: .4s;
        transition: .4s;
        }

        .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        }

        input:checked + .slider {
        background-color: #5cb85c;
        }

        input:focus + .slider {
        box-shadow: 0 0 1px #5cb85c;
        }

        input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
        border-radius: 34px;
        }

        .slider.round:before {
        border-radius: 50%;
        }
  </style>               

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
    <div id="overlay">
     <i id="img-load"  class="fas fa-cog fa-spin fa-4x "></i>

    </div>

    @include('layouts.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            @include('layouts.header')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                @yield('content')                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           @include('layouts.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin-template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin-template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- multi-select dropdown scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin-template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin-template/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin-template/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin-template/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin-template/js/demo/chart-pie-demo.js') }}"></script>

    <!-- phone number mask scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

    <!-- Customer scripts and CSS -->
    <script type="text/javascript" src="{{asset('jquery_widgets/masked_input.js')}}"></script>
    <script src="{{url('/')}}/plugins/sweetalert/sweetalert.min.js"></script>
    <link rel="stylesheet" href="{{url('/')}}/plugins/sweetalert/sweetalert.css">
    <script src="{{url('/')}}/plugins/moment/moment.js"></script>
    <script src="{{url('/')}}/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="{{url('/')}}/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <script src="{{url('/')}}/plugins/select2/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="{{url('/')}}/plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/full_calender.css')}}"/>
    <script type="text/javascript" src="{{asset('plugins/full_calender.js')}}"></script>
    <script src="{{url('/')}}/plugins/tiny_mce/tinymce.min.js"></script>

    <script src="{{ asset('plugins/chart.js/new-2.7.2/Chart.bundle.js') }}"></script>

    <script src="{{url('/')}}/js/main.js?v={{time()}}"></script>
  
    <script src="{{url('/')}}/plugins/filepond/js/filepond.js"></script>
    <script src="{{url('/')}}/plugins/filepond/js/filepond.min.js"></script>
    <script src="{{url('/')}}/plugins/filepond/js/filepond-plugin-image-preview.min.js"></script>
    <script src="{{url('/')}}/plugins/filepond/js/filepond.jquery.js"></script>
    <script type="text/javascript">
        tinymce.init({
        theme: "modern",
        mode : "specific_textareas",
        editor_selector : "mceEditor",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern imagetools moxiemanager",
             "insertdatetime media table contextmenu jbimages"
        ],
      
      relative_urls : false,
      remove_script_host : false,
      convert_urls : true,
      document_base_url : "{{url('/')}}",
      
        image_advtab: true,
        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ]
    });
    var g_readTerms = false;
    </script>

    <script>
      @if(Session::has('success'))
        flashMessage = {
          type: "success",
          description: "{{ Session::pull('success') }}"
        };
      @elseif(Session::has('info'))
        flashMessage = {
          type: "info",
          description: "{{ Session::pull('info') }}"
        };
      @elseif(Session::has('warning'))
        flashMessage = {
          type: "warning",
          description: "{{ Session::pull('warning') }}"
        };
      @elseif(Session::has('error'))
        flashMessage = {
          type: "error",
          description: "{{ Session::pull('error') }}"
        };
      @endif

      if(typeof flashMessage !== 'undefined'){
        GLOBAL.displayFlashMessage(flashMessage);
      }
    </script>
<script type="text/javascript">

    $(document).ready(function($) {
        $('#overlay').hide();
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
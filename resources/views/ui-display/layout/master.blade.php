<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <title>Job Portal Site</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <script src="https://kit.fontawesome.com/eed2990b31.js" crossorigin="anonymous"></script>
  {{-- bootstrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

  
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}"><h2>Job Agency<em>.</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item {{ request()-> is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/') }}">Home
                </a>
              </li> 

              <li class="nav-item {{ request()-> is('jobs') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('jobs') }}">Jobs</a>
              </li>
              @if (Auth::user())
                
              @else
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">FOR RECRUITERS</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('/employerLogin') }}">Login</a>
                        <a class="dropdown-item" href="{{ url('/employerRegister') }}">Register</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">FOR JOBSEEKERS</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('/login') }}">Login</a>
                        <a class="dropdown-item" href="{{ url('/register') }}">Register</a>
                    </div>
                  </li>
              @endif
             
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ url('/about') }}">About Us</a>
                    <a class="dropdown-item" href="{{ url('/team') }}">Team</a>
                    <a class="dropdown-item" href="{{ url('/testimonials') }}">Testimonials</a>
                    <a class="dropdown-item" href="{{ url('/terms') }}">Terms</a>
                  </div>
              </li>
              <li class="nav-item {{ request()-> is('contact') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
              </li>
              @if (Auth::check())
                  <li class="nav-item {{ request()-> is('profile') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                  </li>
                @else
              @endif

              {{-- {{ Auth::user()->name }} --}}
             
            </ul>
          </div>
        </div>
      </nav>
    </header>
  

    @yield('content')

    <footer>
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <ul class="social-icons">
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Behance</a></li>
                <li><a href="#">Linkedin</a></li>
              </ul>
            </div>
            <div class="col-lg-12">
              <div class="copyright-text">
                <p>
                  Copyright © 2020 Company Name
                  | Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </footer>
  
      <!-- Bootstrap core JavaScript -->
      <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  
      <!-- Additional Scripts -->
      <script src="{{ asset('assets/js/custom.js') }}"></script>
      <script src="{{ asset('assets/js/owl.js')  }}"></script>
      <script src="{{ asset('assets/js/slick.js') }}"></script>
      <script src="{{ asset('assets/js/isotope.js') }}"></script>
      <script src="{{ asset('assets/js/accordions.js"') }}""></script>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  
      <script language = "text/Javascript"> 
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t){                   //declaring the array outside of the
        if(! cleared[t.id]){                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value='';         // with more chance of typos
            t.style.color='#fff';
            }
        }
      </script>
      
        @yield('script')
  
    </body>
</html>
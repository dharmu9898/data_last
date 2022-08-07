<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Welcome to Holiday Landmark </title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('img/brand/holiday.png')}}" type="image/png">
  
  <link rel="stylesheet" href="{{asset('theme/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('theme/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('css/argon.css')}}" type="text/css">

  <!-- Toaster CSS -->
   <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}" type="text/css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  
  
  

  <style type="text/css">
    body{
     overflow-x: hidden;
    }

    table, th, td {
  border: 1px solid;
  border-collapse: collapse;
   padding: 5px;
  text-align: left;  
  width: 150px;  
  }
  </style>
  
</head>

<body>

  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="#">
          <img src="#" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            @include('layouts.backend.sidebar')
          </ul>          
        </div>
      </div>
    </div>
  </nav>
<!-- Sidenav END -->

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <div class="bg-primary ">
    <nav class="navbar navbar-top navbar-expand navbar-dark ">

      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">          
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item">
            </li>
            <li class="nav-item dropdown">
             <!-- Login As SR -->
            </li>
            <li class="nav-item dropdown">
              <!-- Login As SM -->
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="col-md-11">
      <h2 class="text-center" id="head" style="margin-top:-40px; font-size: 50px; color: white; ">Holiday Landmark</h2>
    </div>
    </div>
  <!-- <h2 class="text-center">Bheekho Foundation</h2> -->
    <!-- Header -->   
    <div class="main-content" id="panel">
    <div class="container mt-6">
      <div class="row">
         <div class="col-md-11">
    <!-- Page content -->
    @yield('content')
      </div>
    </div>
  </div>
</div>
  
     
      
   
  <script src="{{asset('theme/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('theme/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('theme/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('theme/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('theme/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('js/argon.js?v=1.1.0')}}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('js/location.js')}}"></script>

    <!-- for search funtionality -->    
  <script src="{{asset('js/popper.min.js')}}"></script>    

    <!-- Toaster Js -->
<script src="{{asset('js/toastr.min.js')}}"></script> 

@stack('js')

    

</body>
</html>






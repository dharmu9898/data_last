<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="icon" href="{{asset('img/brand/favicon.png')}}" type="image/png">
    <link rel="stylesheet" href="{{asset('theme/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('theme/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/argon.css?v=1.1.0')}}" type="text/css">
    <!-- CSRF Token -->
   
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css">

    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">



    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Holiday Landmark </title>

 

</head>
<body>
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v6.0&appId=524233834947846&autoLogAppEvents=1"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div id="app">
        
    <div class="">
        @yield('content')
        </div>
    </div>


    <style type="text/css">
    .footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;   
   color: white;
   
}</style>

<!-- Footer -->
  <footer class=" footer  " style="margin-bottom: 10px ;" id="footer-main">
    <div class="container">
      <div class="row justify-content-xl-between">
        <div class="col-xl-12">
          <div class="copyright text-center text-muted">
            &copy; 2020 <a href="http://bheekho.com/" class="font-weight-bold ml-1 " target="_blank">Holiday Landmark</a>
          </div>
        </div>       
      </div>
    </div>
  </footer>

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
    
</body>
</html>

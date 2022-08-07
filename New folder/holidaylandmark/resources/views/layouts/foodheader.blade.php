<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DevopsSchool') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
<!-- ========side bar === open======= -->

<link href="{{ asset('css/main.css') }}" rel="stylesheet">

<!-- slider -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/togglesnew.js')}}"> </script>
<!-- ======side bar cloe-================= -->
<style> @media only screen and (max-width: 700px) {.mob{ display:none; }}
    th{
       font-family: "Times New Roman", Times, serif;
    }
 </style>


</head>
<body>



<!----login open------->
@guest
<li class="nav-item">
    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
</li>
@if (Route::has('register'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
    </li>
@endif
@else
@endguest
<!-----login close------->
 <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
    </div>
<!---country----17-04--2020---->
<script src="{{asset('js/location.js')}}"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">  </script>
 
<!----country---17----04--2020------>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  
 <script src="js/bootstrap-datetimepicker.min.js"></script>
<script src="js/jquery.min.js"></script>
  

</body>
</html>

<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
  <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta name="author" content="">
    <!-- Favicon icon -->
   
    <title>Holiday Landmark</title>
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">



    <title>Holidaylandmark</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

   

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />


<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">








   
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css"
      integrity="sha256-x8PYmLKD83R9T/sYmJn1j3is/chhJdySyhet/JuHnfY="
      crossorigin="anonymous"
    />
  
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">

<!-- slider -->




  </head>

  <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
  
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                           
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                           
                             <!-- Light Logo text -->    
                            <h3>Holiday Landmark</h3>
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->                                                                            
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('assets/images/users/1.jpg') }}" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                            <a class="text-bg-dark" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"  style="font-size:18px; color:black;"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout  </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>   </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                <div class="user-pic"><img src="{{ asset('assets/images/users/1.jpg') }}" alt="users" class="rounded-circle" width="40" /></div>
                                <div class="user-content hide-menu m-l-10">
                                    <a style="text-decoration:none;"  href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="m-b-0 user-name font-medium">{{ Auth::user()->name }} <i class="fa fa-angle-down"></i></h5>
                                                   </a>


                                   


                            <div class="dropdown-menu">
                                     
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"  style="font-size:18px; position: relative; color:black;"><i class="fa fa-power-off m-r-5 m-l-5"></i>Logout  </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            </form>                    
                            
                                          </div>






                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        <li style="font-size: 18px;" class="p-15 m-t-10"><a href="{{route('admin.dashboard')}}" style="font-size: 18px;" class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i class="mdi mdi-view-dashboard"></i> <span style="font-family:Trirong', serif !important;" class="hide-menu m-l-5">Dashboard </span> </a></li>
                        <li style="font-size: 18px;color:black;" class="sidebar-item"> <a style="font-size: 18px;color:black;" class="sidebar-link waves-effect waves-dark sidebar-link" href='{{url("admin/operator")}}' aria-expanded="false"><i class="mdi mdi-account-network"></i><span style="font-family:Trirong', serif !important;font-size: 18px;" class="hide-menu">Tour Operator</span></a></li>
                                <li style="font-size: 18px;color:black;" class="sidebar-item"> <a style="font-size: 18px;color:black;" class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.tripdetail') }}" aria-expanded="false"><i class="mdi mdi-shopping"></i><span style="font-family:Trirong', serif !important;font-size: 18px;" class="hide-menu">Tour Detail</span></a></li>
                         <li style="font-size: 18px;color:black;" class="sidebar-item"> <a style="font-size: 18px;color:black;" class="sidebar-link waves-effect waves-dark sidebar-link" href='{{url("admin/tourcategory")}}' aria-expanded="false"><i class="mdi mdi-shape-plus"></i><span style="font-family:Trirong', serif !important;font-size: 18px;" class="hide-menu">category</span></a></li>
                           <li style="font-size: 18px;color:black;" class="sidebar-item"> <a style="font-size: 18px;color:black;" class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.internationaltour') }}" aria-expanded="false"><i class="mdi mdi-web"></i><span style="font-family:Trirong', serif !important;font-size: 18px;" class="hide-menu">International Tour </span></a></li>
                          <li style="font-size: 18px;color:black;" class="sidebar-item"> <a style="font-size: 18px;color:black;" class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.statestour') }}" aria-expanded="false"><i class="mdi  mdi-airplane"></i><span style="font-family:Trirong', serif !important;font-size: 18px;" class="hide-menu">Famous State</span></a></li>
                          <li style="font-size: 18px;color:black;" class="sidebar-item"> <a style="font-size: 18px;color:black;" class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.citiestour') }}" aria-expanded="false"><i class="mdi  mdi-airplane"></i><span style="font-family:Trirong', serif !important;font-size: 18px;" class="hide-menu">Famous Places</span></a></li>
      
                        <!-- User Profile-->
                    
                    </ul>
                    
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                       
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                          </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7">
                       
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div style=" min-height: calc(100vh);" class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                @yield('content')
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <footer style="background-color:#eef5f9;" class="footer text-center">
               Holiday Landmark <a href=""> Website</a>.
            </footer>
    </div>
   
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"
      integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"
      integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI="
      crossorigin="anonymous"
    ></script>
 
    <script src="{{asset('js/location.js')}}"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  
  








<script src="{{asset('js/location.js')}}"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 
<!----country---17----04--2020------>
 
 

  
 





<script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>






   
     <!-- ============================================================== -->
     <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist/js/custom.js') }}"></script>
  </body>
</html>

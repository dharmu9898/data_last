<!DOCTYPE html>
<html lang="en">
<head>
  <title>Holidaylandmark</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="{{ asset('css/category.css') }}" rel="stylesheet">
 
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  .avatar {
  vertical-align: middle;
  width: 30px;
  height: 100px;
  border-radius: 50%;
}
  </style>
</head>
<body>


      
        

<div class="container-fluid fixed-top" style="height: 40px;background-color: #292930;" id="topContent"><div class="row">
                    <div class="col-md-4 ">
                       
                           <a target="_blank" href="https://www.facebook.com/holidaylandmark"><i class="fa fa-facebook mt-2 mr-4" style="font-size:20px; color:white;"></i></a> 
                           <a target="_blank" href="https://twitter.com/HolidayLandmark"><i class="fa fa-twitter mt-2 mr-4"style="font-size:20px; color:white;"></i></a>
                           <a target="_blank" href="https://www.instagram.com/holidaylandmark/"><i class="fa fa-instagram mt-2 mr-4" style="font-size:20px;color:white;"></i></a>
                           <a target="_blank" href="http://www.youtube.com/user/HolidayLandmark"><i class="fa fa-youtube mt-2 mr-4"style="font-size:20px;color:white;"></i></a>
                                </div>	
                                <div class="col-md-3 ">
                                </div>
                                <div class="col-md-2 ">
                                </div>
                    <div class="col-md-3 ">

                    <a style="color:white;" href="mailto:mail@example.com"> <i class="fa fa-envelope mt-2 mr-4" style="font-size:18px;color:white;">Info@HolidayLandmark.com</i></a>
                  
                    </div>

                </div></div>
                <header >
        <nav style="background-color:#373B44;margin-top:-5px;" class="navbar navbar-expand-sm  navbar-dark fixed-top">
        
       <div class="container-fluid">
        <a class="navbar-brand" href="#"><img style="width:70%;height:70%" alt="" src="{{ asset('assets/images/logo/holiday-landmark2.png') }}"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
       <li class="nav-item">
      <a style="color:white;" class="nav-link" href="http://www.holidaylandmark.com/">Trips</a>
      </li>
       <li class="nav-item">
        <a style="color:white;" class="nav-link " href="{{ route('login') }}">Create Trips</a>
      </li>
      <li class="nav-item">
        <a style="color:white;" class="nav-link" href="http://www.holidaylandmark.com/india/index.html">India</a>
      </li>
      <li class="nav-item">
        <a style="color:white;" class="nav-link " href="http://www.holidaylandmark.com/blog">Blogs</a>
      </li>
      <li class="nav-item">
        <a style="color:white;" class="nav-link " href="http://www.holidaylandmark.com/cookbooks">Cookbooks</a>
      </li>
      <li class="nav-item">
        <a style="color:white;" class="nav-link " href="https://www.youtube.com/user/HolidayLandmark">Video</a>
      </li>
    
      <li class="nav-item">
       @if (Route::has('login'))
                <div class="top-right links ">
                       @auth
                    <a style="color:white;" href="{{ route('user.dashboard') }}" class="nav-link "> Hi {{ auth::user()->name }}</a>
                      
                    @else
                  
                        <a style="color:white;" href="{{route('login')}}" class="nav-link ">Login</a>                      
                    @endauth
                </div>
            @endif
      </li>
      <li class="nav-item">
      @if (Route::has('login'))
                <div class="top-right links ">
                       @auth
                       <a  class="nav-link " href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"  style="font-size:18px; color:white;">&nbsp;Signout  </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>    
                    @else
                  
                             @endauth
                </div>
            @endif
     
                              </li>
      </ul>
    </div>
  </div>
  </div>
</nav>

</header>
  <br> <br> <br><br> <br>
  <div class="container-fluid" style="padding-left:0px;padding-right:0px;">
<div style="" class="row">






</div>
</div>
     

<div class="container-fluid" style="padding-left:0px;padding-right:0px;">
<div style="margin-left:0px;" class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-lg-12">
				
			 <div  style="margin-left:0px;" class="row">
        <div  class="col-md-3">
        <div class="card">
  <div class="card-body">
  <img src="{{ asset('avtar.jpg') }}"  class="avatar" alt="John" style="height:100px; padding-right:1px; margin-top: 1rem; width:100px;border-radius: round; transition: .3s;cursor: pointer;">
  <h1> Hi {{ auth::user()->name }}</h1>
  <p class="title">  {{ auth::user()->email }}</p>
  @foreach(App\User::all() as $cat)
  <a href="{{ route('user.upload', $cat->id) }}" class="btn btn-success">upload</a>@break;

  @endforeach
  @foreach(App\User::all() as $cat)
 
  <a href="" class="btn btn-success">Add  Review</a>@break;
  @endforeach
  </div>
</div>
        </div>
        <div  class="col-md-9">
    
      
                    <div  style="margin-left:0px;margin-right:0px;"class="row">
                    <div class="col-md-12 ">
                   
<div class="form-group">
<div class="row">






</div>
</div>


<br>


     <table class="table-bordered"  id="myTable">


<tbody>

<tr  >
<td style="border-radius:2px;">
<div style="margin-right: 8px;" class="row">
    
     
<div class="col-md-4">            

<?php
foreach (json_decode($gallery->Image)as $picture) { ?>

     <img class="center" src="{{ asset('public/image/'. $picture) }}"
      style="height:240px; padding:1px; width:300px;border-radius: 5px; transition: .3s;cursor: pointer;"/>
    
        @break <?php 



} ?>

<h1 style="text-decoration:none;" class="centered"><a style="text-decoration:none;" href="{{ route('show',[ 'tour' => ($gallery->c_s_c_cat) ]) }}" >
   <b style="font-size:24px;color:white;">View
    </b></a> </h1>
</div>
<div class="col-md-8">            

<h2 class="ml-2" style="text-transform: capitalize;padding:5px; font-weight: normal;"><a href=" {{ route('show',[ 'tour' => ($gallery->c_s_c_cat) ]) }}"  style="color:#d34205; font-size:20px;" >
   <b>
    {{$gallery->TripTitle}}</b></a> &nbsp;  &nbsp; &nbsp;<span  style="color:#d34205; font-size:18px;">  {{$gallery->NoOfDays}} </span> &nbsp; 
    </h2>
     <h4  class="ml-2" style="text-transform: capitalize;"><i>
     </i><span  style="margin-right:0px; font-weight: normal;font-size:18px" > <b>Country:</b>&nbsp;</span> <span style="color:gray;font-size:18px">  {{$country->country_name}} </span> &nbsp; &nbsp; &nbsp; &nbsp;<span style="margin-right:0px;font-size:18px;" ><b> State:&nbsp;</b></span> <span style="color:gray;font-size:18px">  {{$state->state_name}} </span> &nbsp; &nbsp; &nbsp; &nbsp;<span style="margin-right:0px;font-size:18px;" ><b> City:&nbsp;</b></span><span style="color:gray;font-size:18px">   {{$citi->city_name}}</span>
     </h4> 
     <h4 class="ml-2" style="text-transform: capitalize;"><span style="margin-right:0px;font-size:18px;" ><b> Date:&nbsp;</b></span> <span style="color:gray;font-size:18px">   {{$gallery->datetime}}</span> <span style="margin-right:0px;font-size:18px;" >&nbsp;&nbsp;&nbsp;&nbsp;<b> Time:</b>&nbsp;</span>  <span style="color:gray;font-size:18px;">  {{$gallery->time}}  </span> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; <span style="color:gray;font-size:18px;">  {{$gallery->Destination}} </span></h4> 
    
     <p class="ml-2" style="text-transform: capitalize;color:black;"><i>
     </i><span style="margin-right:0px" > <b>Trip Highlight:</b>&nbsp;</span> <span style="color:gray;">     {{Str::words($gallery->Description, 40)}} </span>
</p> 
 
</div>




     </div>
               <br>
               </td>
            </tr> 
            
            

            </tbody>
                </table>

                      
    
                </div>

                  

          
            </div>
        
        </div>
			</div>
      </div>
      </div>
      </div>

				
		
		
		
	<br><br>

		
        <!-- End Portfolio Section -->
		
        <!-- Start Text & image Section -->
	
		<br><br>
        <!-- End Text & image Section -->
		
		<!-- Start Latest Blog Section -->
      
        <!-- End Latest Blog Section -->
		
	

		
        <!-- Start Team Member Section -->
    
        <!-- End Team Member Section -->
		
		
        <!-- Start  Copyright Section -->
        <footer id="footer" class="d-flex-column bg-dark">
        <hr class="mt-0">
        <!--Social buttons-->
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <ul class="list-unstyled list-inline mt-3">


                    


                        <li class="list-inline-item">
                        <a  class="sbtn btn-large mx-2" style="color:white;" href="https://www.facebook.com/holidaylandmark">
                                <i class="fa fa-facebook-square fa-2x"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                        <a class="sbtn btn-large mx-2" style="color:white;"  href="https://www.linkedin.com/company/holidaylandmark/" >
                                <i class="fa fa-linkedin fa-2x"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                        <a  class="sbtn btn-large mx-2" style="color:white;"  href="https://twitter.com/HolidayLandmark">
                                <i class="fa fa-twitter-square fa-2x"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                        <a class="sbtn btn-large mx-2" style="color:white;"  href="http://www.youtube.com/user/HolidayLandmark">
                                <i class="fa fa-youtube-square fa-2x"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                        <a class="sbtn btn-large mx-2" style="color:white;" target="_blank" href="https://www.instagram.com/holidaylandmark/">        <i class="fa fa-instagram-square fa-2x"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2">
                </div>
                <div class="col-lg-3">
                    <h6 class="text-white"><b>
                    Plan your  holiday tour package.</b></h6>
                    <span>
                        <h1 class="text-white">holidaylandmark</h1>
                    </span>
                </div>
            </div>
                    



            <!--/.Social buttons-->
            <hr class="bg-white">
            <!--Footer Links-->
            <div class="container text-left text-md-center">
                <div class="row">
                    <!--First column-->
                    <div class="col-md-2 mx-auto shfooter">
                    <a href="index.html" class=" mr-2" style="color:white">Home</a>  
                    </div>
                    <!--/.First column-->
                  
                    <!--Second column-->
                    <div class="col-md-2 mx-auto shfooter">
                    <a href="blog.html" class=" mr-2" style="color:white">Blog</a>
                    </div>
                    <!--/.Second column-->
                  
                    <!--Third column-->
                    <div class="col-md-2 mx-auto shfooter">
                    <a href="holiday-landmarker.html"  class=" mr-2" style="color:white">Holiday Landmarker</a> 
                    </div>
                    <!--/.Third column-->
                   
                    <!--Fourth column-->
                    <div class="col-md-2 mx-auto shfooter">
                    <a href="#"  class=" mr-4" style="color:white">Destination</a>  
                    </div>
                    <div class="col-md-2 mx-auto shfooter">
                    <a href="youtube.html"  class="mr-2" style="color:white">You tube</a> 
                    </div>
                    <div class="col-md-2 mx-auto shfooter">
                    <a href="contact.html"  class="mr-2" style="color:white">Contact</a> 
                    </div>
                    <!--/.Fourth column-->
                </div>
            </div>
            <!--/.Footer Links-->
            <hr class="bg-white">
            <!--Copyright-->
            <div class="py-3 text-center text-primary">
                Copyright
                <script>
                    document.write(new Date().getFullYear())
                    
                </script> <a href="#">HolidayLandmark.com</a> | reserved to no immitation
            </div>
            <!--/.Copyright-->
    </footer>
        <!-- End Copyright Section -->

      


        <!-- all js include start -->
        <!-- jquery latest version -->
     
        <!-- bootstrap latest version -->
        <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

        <!-- revolution slider js files start -->
        <script src="{{ asset('assets/js/rev_slider/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset('assets/js/rev_slider/jquery.themepunch.revolution.min.js') }}"></script>
        
        <!-- revolution slider js files end -->
		
		<!-- Other jQuery library -->
        <script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.countTo.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.isotope.min.js') }}"></script>
        <script src="{{ asset('assets/js/lightbox.js') }}"></script>
       
        <script src="{{ asset('assets/js/jquery.easypiechart.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.mb.YTPlayer.js') }}"></script>
        <script src="{{ asset('assets/js/countdown.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.fitvids.js') }}"></script>

        <!-- template main js file -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <!-- all js include end -->
		

		
		<!-- Youmax Call -->
    
    <!-- ends -->
	
	<!-- Search  -->
	
	
 


       


<script>

function goBack() {

window.history.back();

  }

</script> 
<script src="{{asset('js/location.js')}}"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>   </div>    
    </body>

</html>
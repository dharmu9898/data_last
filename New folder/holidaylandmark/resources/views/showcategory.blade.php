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
</head>
<body   >


      
        

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
        <a class="navbar-brand" href="http://www.holidaylandmark.com/"><img style="width:70%;height:70%" alt="" src="{{ asset('assets/images/logo/holiday-landmark2.png') }}"></a>
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
      </ul>
    </div>
  </div>
  </div>
</nav>

</header>
  <br> <br> <br><br> <br>
  <div class="container-fluid" style="padding-left:0px;padding-right:0px;">
<div style="" class="row">
<div class="col-xl-12 col-md-12 col-sm-12 col-lg-12">
 
           @foreach ($gallery as $gall)
   <h2 style="word-spacing:5px;">  <button style="font-size:14px;margin-left:25px;" onclick="goBack()"> Back</button>
 
   <span style="margin-left:350px;">{{$gall->Category}} Tour Package</span> </h2>@break;
     @endforeach
     
</div>

<div class="col-xl-7 col-md-7 col-sm-7 col-lg-7">
@foreach ($gallery as $gall)
<p class="text-center ml-2" align="justify" style="font-size:18px;word-spacing:18px;">  {!! Str::words($gall->Describe,80)!!} </p>@break;
@endforeach
</div>

<div class="col-xl-5 col-md-5 col-sm-5 col-lg-5">
@foreach ($galliries as $galls)

<img class="w-100 py-3" style="height:240px; padding:1px;padding-right:15px; width:300px;border-radius: 5px; transition: .3s;cursor: pointer;" src="{{ URL::to('/') }}/public/category/{{ $galls->Image }}">@break;
           
           @endforeach 
</div>


</div>
</div>
     

<div class="container-fluid" style="padding-left:0px;padding-right:0px;">
<div style="margin-left:0px;" class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-lg-12">
				
			 <div  style="margin-left:0px;" class="row">
        <div  class="col-md-3">
        <div class="card">
  <div class="card-body">
    <h4 class="card-title">Package By Intrest</h4>
    @foreach(App\TripCategory::all() as $cat)
                       
    <a style="font-size:20px;color:#d34205;" href="{{ route('showcategory',[ 'name' => str_slug($cat->category) ]) }}" class="card-link mt-2">&#9675; &nbsp;{{$cat->category}}</a><br>
    @endforeach 
    
    <h4  class="card-title mt-4">International Tour</h4>
    @foreach(App\Destination::all() as $cat)
                       
    <a  style="font-size:20px;color:#d34205;"href="{{ route('showcountry',[ 'names' => str_slug($cat->slug) ]) }}" class="card-link  mt-2">&#9675;&nbsp;{{$cat->slug}}</a><br>
    @endforeach
    <h4  class="card-title mt-4">Famous State</h4>
    @foreach(App\AddState::all() as $cat)
                       
    <a  style="font-size:20px;color:#d34205;"href="{{ route('showstate',[ 'state' => ($cat->country_state) ]) }}" class="card-link  mt-2">&#9675;&nbsp;{{$cat->slug}}</a><br>
    @endforeach



    <h4  class="card-title mt-4">Famous Places</h4>
    @foreach(App\AddCity::all() as $cat)
                       
    <a  style="font-size:20px;color:#d34205;"href="{{ route('showcity',[ 'city' => ($cat->country_state_city) ]) }}" class="card-link  mt-2">&#9675;&nbsp;{{$cat->slug}}</a><br>
    @endforeach
  </div>
</div>
        </div>
        <div  class="col-md-9">
    
        @foreach ($gallery as $gall) 
        <center><h3  style="background-color:black;color:white;font-size:25px; text-align: center;text-transform: capitalize;word-spacing:6px;"> Best  {{$gall->Category}} Tour  Package in Places</h3></center><br>@break;
        @endforeach
                    <div  style="margin-left:0px;margin-right:0px;"class="row">
                    <div class="col-md-12 ">
                   
<div class="form-group">
<div class="row">

<div class="col-md-6">
<select class="form-control " name="manual_filter_table2" id="manual_filter_table2">
<option value="all" class="form-control cnfontsize_2" > Select Your City</option>
@foreach($cities as $row)
<option value="{{$row->city_id}}">{{$row->city_name }}</option>
@endforeach
</select>
</div>
<div class="col-md-6">
<input type="text" class="form-control" name="manual_filter_tablesm" id="manual_filter_tablesm" placeholder="Search Keyword.." style="font-size:18px;">

</div>
@foreach ($gallery as $gall) 
<div class="col-md-3">
<input type="hidden" class="form-control"  value="{{$gall->Category}}" name="CatId" id="CatId" placeholder="Search Keyword.." style="font-size:18px;">

</div>
@endforeach
</div>
</div>


<br>


     <table class="table-bordered"  id="myTable">


<tbody>


@include('category')
            </tbody>
                </table>

                      
        {!! $gallery->links() !!}
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
    function welcome_fetch_search(){
        manual_filter = $("#manual_filter_tablesm").val();
        cat = $("#CatId").val();
                $.ajax({
                url:"{{ url('showcategory/welcome_manualfilterall')}}?manual_filter_tablesm="+manual_filter+"&CatId="+cat,
                success:function(data){
                    console.log(data);
                    $('#myTable tbody').html('');
                    $('#myTable tbody').html(data);
                }
                })
            } 
            $(document).on('keyup', '#manual_filter_tablesm', function(){
              welcome_fetch_search();
            });
</script>


        <script>

function filter_data(){
  manual_filter = $("#manual_filter_table2").val();
    cat = $("#CatId").val();
  $.ajax({
          url:"{{ url('showcategory/welcome_manualfiltercity') }}?filter_city="+manual_filter+"&CatId="+cat,
          success:function(data){
            console.log(data);
            $('#myTable tbody').html('');
            $('#myTable tbody').html(data);
          }
        })   }
      $("#manual_filter_table2").change(function() {
          filter_data();
      });
</script>	


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
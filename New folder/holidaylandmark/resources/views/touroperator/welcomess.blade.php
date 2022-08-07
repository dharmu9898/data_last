<!DOCTYPE html>
<html lang="en">
<head>

        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>HolidayLandmark</title>
        <meta name="author" content="HolidayLandmark">
        <meta name="keywords" content="HolidayLandmark, tourism in india, tourism in egypt, tourism thailand, Tour Package India, Hidden Tourist Destination">
		<meta name="description" content="Find unique tours of India, Thailand, Malaysia and around the world, things to do, experiences, adventure activities and offbeat places to stay.">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- favicons -->
        <link rel="shortcut icon" width="300" height="300" href="assets/favicon/favicon.png" >
        <link rel="apple-touch-icon" href="assets/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
    
        <!-- load google font -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
        
        <!-- all stylesheets include start -->
        <!-- Bootstrap css -->
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
        <!-- revolution slider css -->
        <link rel="stylesheet" href="{{ asset('assets/css/rev_slider/settings.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/rev_slider/layers.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/rev_slider/navigation.css') }}">
        <!-- fontawesome css -->
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <!-- ET Lineicon CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/lineicon.css') }}">
        <!-- Light Box CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">
        <link rel="stylesheet" href="assets/css/animate.css') }}">

        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.transitions.css') }}">

        <!-- theme style css -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <!-- responsive css -->
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
        <!-- all stylesheets include end -->
		
		<link href="css/youmax.min.css" rel="stylesheet" type="text/css">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<script language="Javascript" src="select-list/jquery.js"></script>
		<script type="text/JavaScript" src="select-list/state.js"></script>
		<link rel="stylesheet" type="text/css" href="select-list/style.css">

		<script type="text/javascript" src="countries.js"></script>
		<link href="css/youmax.min.css" rel="stylesheet" type="text/css">
		
		 <script>
					function showProvinces() {
			var selectbox = document.getElementById('myInput');
			var userInput = selectbox.value;
			if(userInput == 'Karnataka') {
			window.open('india/karnataka/index.html','_blank');
			}
			else if(userInput == 'Maharashtra') {
			window.open('india/maharashtra/index.html','_blank');
			}
			else if(userInput == 'Kerala') {
			window.open('india/kerala/index.html','_blank');
			}
			else if(userInput == 'Gujarat') {
			window.open('india/gujarat/index.html','_blank');
			}
			else if(userInput == 'Madhya Pradesh') {
			window.open('india/madhyapradesh/index.html','_blank');
			}
			else if(userInput == 'Tamilnadu') {
			window.open('india/tamilnadu/index.html','_blank');
			}
			else if(userInput == 'Orissa') {
			window.open('india/odisha/index.html','_blank');
			}
			}
		 </script>
		
		<style>
			.button {
				background-color: black;
				border: none;
				color: white;
				padding: 20px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
				margin: 4px 2px;
				cursor: pointer;
			}

			.button5 {border-radius: 60%;}

			.button:hover {background-color: red}

			.button:active {
			  background-color: # red;
			  box-shadow: 0 5px #666;
			  transform: translateY(4px);
			}
      select.form-control:not([size]):not([multiple]) {
    height: calc(3.0925rem + 4px);
    font-size: 18px;
}
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
		</style>
		
		<style>
		* {
		  box-sizing: border-box;
		}
		body {
		  font: 16px "Lato", sans-serif;  
		}
		.autocomplete {
		  /*the container must be positioned relative:*/
		  position: relative;
		  display: inline-block;
		}
		input {
		  border: 1px solid transparent;
		  background-color: #f1f1f1;
		  padding: 10px;
		  font-size: 16px;
		  color: #000000;
		  
		}
		input[type=text] {
		  background-color: #FFFFFF;
		  width: 100%;
		  background-image: url('assets/images/logo/search-icon.png');
		  background-position: 10px 10px; 
		  background-repeat: no-repeat;
		  padding: 8px 18px 9px 40px;
		}
		input[type=submit] {
		  background-color: DodgerBlue;
		  color: #fff;
		  cursor: pointer;
		}
		.autocomplete-items {
		  position: absolute;
		  border: 1px solid #d4d4d4;
		  border-bottom: none;
		  border-top: none;
		  z-index: 99;
		  /*position the autocomplete items to be the same width as the container:*/
		  top: 100%;
		  left: 0;
		  right: 0;
		  color: #000000;
		}
		.autocomplete-items div {
		  padding: 10px;
		  cursor: pointer;
		  background-color: #fff; 
		  border-bottom: 1px solid #d4d4d4; 
		}
		.autocomplete-items div:hover {
		  /*when hovering an item:*/
		  background-color: #e9e9e9; 
		}
		.autocomplete-active {
		  /*when navigating through the items using the arrow keys:*/
		  background-color: DodgerBlue !important; 
		  color: #ffffff; 
		}


 

    @media only screen and (max-width: 420px) and (min-width: 260px)
  {



.table td, .table th {

  font-size:12.5px;
  padding: .16rem;
}
  .btn
{

  padding: .005rem .45rem;
    font-size: 0.8rem;
    line-height: 1.3;
}
.col-12 {
  padding-right: 0;
    padding-left: 0px;

}

.card-body {
  padding: 0.00rem;
}

.table {
margin-bottom:0.1rem;
}
  }
  
</style>
		
    </head>
    <body>
    <div  id="container">

        <!-- Start Top Header Section -->
        <section class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <ul class="social-icons">
                            <li><a target="_blank" href="https://www.facebook.com/holidaylandmark"><i class="fa fa-facebook" style="font-size:20px;"></i></a></li>
                            <li><a target="_blank" href="https://twitter.com/HolidayLandmark"><i class="fa fa-twitter"style="font-size:20px;"></i></a></li>
                            <li><a target="_blank" href="https://www.instagram.com/holidaylandmark/"><i class="fa fa-instagram" style="font-size:20px;"></i></a></li>
                            <li><a target="_blank" href="http://www.youtube.com/user/HolidayLandmark"><i class="fa fa-youtube"style="font-size:20px;"></i></a></li>
                        </ul>
                    </div>	
                    <div class="col-md-7">
                        <div class="contact-info">
                            <li>
                                <i class="fa fa-envelope"></i>
                                <a href="mailto:mail@example.com">Info@HolidayLandmark.com</a>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Top Header Section -->

        <!-- Start Header & Navigation Section -->
        <header class="clearfix" id="header">
            <!-- Static navbar -->
            <nav class="navbar navbar-default">
                 
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.html"><img alt="" src="assets/images/logo/holiday-landmark2.png"></a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="drop"><a class="active" href="index.html">Home</a>
                            </li>
                            <li class="drop"><a href="blog.html">Blog</a></li>
                            <li class="drop"><a href="holiday-landmarker.html">Holiday Landmarker</a></li>
                            <li class="megadrop"><a href="#">Top Destination</a>
                                <div class="megadrop-down">
                                    <div class="container">
                                        <div class="dropdown">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-6">
                                                    <ul>
                                                        <li>
                                                            <a href="india/karnataka/index.html" title="Karnataka" target="_blank">Karnataka</a>
                                                        </li>
                                                        <li>
                                                            <a href="india/maharashtra/index.html" title="Maharashtra" target="_blank">Maharashtra</a>
                                                        </li>
                                                        <li>
                                                            <a href="india/kerala/index.html" title="Kerala" target="_blank">Kerala</a>
                                                        </li>
                                                        <li>
                                                            <a href="india/gujarat/index.html" title="Gujarat" target="_blank">Gujarat</a>
                                                        </li>
														<li>
                                                            <a href="india/madhyapradesh/index.html" title="Madhya Pradesh" target="_blank">Madhya Pradesh</a>
                                                        </li>
														
                                                    </ul>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <ul>
                                                        <li>
                                                            <a href="india/tamilnadu/index.html" title="Tamilnadu" target="_blank">Tamilnadu</a>
                                                        </li>
                                                        <li>
                                                            <a href="india/odisha/index.html" title="Orissa" target="_blank">Orissa</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">Arunachal Pradesh</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">Assam</a>
                                                        </li>
														<li>
                                                            <a href="#" target="_blank">Bihar</a>
                                                        </li>
														
                                                    </ul>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <ul>
                                                        <li>
                                                            <a href="#" target="_blank">Chhattisgarh</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">Goa</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">Haryana</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">Himachal Pradesh</a>
                                                        </li>
														<li>
                                                            <a href="#" target="_blank">Jammu and Kashmir</a>
                                                        </li>
														
                                                    </ul>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <ul class="last-child">
                                                        <li>
                                                            <a href="#" target="_blank">Jharkhand</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">Manipur</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">Meghalaya</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank">Mizoram</a>
                                                        </li>
														<li>
                                                            <a href="#" target="_blank">Nagaland</a>
                                                        </li>
														
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                          
                            <li><a href="contact.html">Contact</a></li>
                            <li class="drop"><a href="{{ route('login') }}">login</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- End Header -->
        <!-- End Header & Navigation Section -->

	   <!-- Start Breadcrumb Section -->
        <section class="breadcrumb-section parallax" style="background-image: url(assets/images/bg/bg3.jpg);" width="400px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="float:center">
                        <div class="page-title">
                            <h1>Wel Come To Holiday Landmark</h1>
                        </div>
					
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Section -->
		
		<br>
		
		 <!-- Start Destination Section -->
		 
     <section>

     <div class="container" style="padding-left:0px;padding-right:0px;width:1250px;">
<div style="" class="row">
                <div class="col-md-12">
				
				<center><h3 style="background-color:black;color:white;font-size:25px; text-align: center;text-transform: capitalize;">Trip Plan</h3></center><br>
        <div class="row">

        <div class="col-md-12">
                    <div class="card">
                    <div class="row">
                    <div class="col-md-12">
                   
                    <div class="card-body">

<div class="form-group">
<div class="row">
<div class="col-md-3">
<select class="form-control countries" name="manual_filter_table" id="manual_filter_table">
<option value="">Select Your Country</option>
</select>
</div>
<div class="col-md-3">
<select class="form-control states" name="manual_filter_table1" id="manual_filter_table1">
<option value="">Select Your State</option>
</select>
</div>
<div class="col-md-3">
<select class="form-control cities" name="manual_filter_table2" id="manual_filter_table2">
<option value="">Select Your City</option>
</select>
</div>
<div class="col-md-3">
<input type="text" class="form-control" name="manual_filter_tablesm" id="manual_filter_tablesm" placeholder="Search Keyword.." style="font-size:18px;">

</div>
</div>
</div>

<br>


     <table class="table-bordered"  id="myTable">


<tbody>


@include('page')
            </tbody>
                </table>
                </div>

                    </div>  </div>

            </div>  </div>
            </div>
        
        </div>
			</div>
      </div>
		

				</section>
		
		<section class="pad25">
			<center><div class="container">
			  <a href="" target="_blank"><button type="button" class="btn btn-primary">Andra Pradesh</button></a>
			  <a href="" target="_blank"><button type="button" class="btn btn-primary">Arunachal Pradesh</button></a>
			  <a href="" target="_blank"><button type="button" class="btn btn-primary">Assam</button></a>
			  <a href="" target="_blank"><button type="button" class="btn btn-primary">Bihar</button></a>
			  <a href="" target="_blank"><button type="button" class="btn btn-primary">Chhattisgarh</button></a>
			  <a href="" target="_blank"><button type="button" class="btn btn-primary">Goa</button></a>
			  <a href="" target="_blank"><button type="button" class="btn btn-primary">Haryana</button></a>
			</div></center><br>
			<center><div class="container">
			  <a href="" target="_blank"><button type="button" class="btn btn-primary">Himachal Pradesh</button></a>
			  <a href="" target="_blank"><button type="button" class="btn btn-primary">Jammu and Kashmir</button></a>
			  <a href="" target="_blank"><button type="button" class="btn btn-primary">Jharkhand</button></a>
			  <a href="" target="_blank"><button type="button" class="btn btn-primary">Manipur</button></a>
			  <a href="" target="_blank"><button type="button" class="btn btn-primary">Meghalaya</button></a>
			  <a href="" target="_blank"><button type="button" class="btn btn-primary">Mizoram</button></a>
			  
			  
			</div></center><br>
			<center><div class="container">
			  <a href="" target="_blank"><button type="button" class="btn btn-primary">Nagaland</button></a>
			  <a href="india/odisha/index.html" target="_blank"><button type="button" class="btn btn-primary">Orissa</button></a>
			  <a href="" target="_blank"><button type="button" class="btn btn-primary">Punjab</button></a>
			  <a href="" target="_blank"><button type="button" class="btn btn-primary">Tamil Nadu</button></a>
			  <a href="" target="_blank"><button type="button" class="btn btn-primary">Tripura</button></a>
			  <a href="" target="_blank"><button type="button" class="btn btn-primary">Uttaranchal</button></a>
			  <a href="" target="_blank"><button type="button" class="btn btn-primary">Uttar Pradesh</button></a>
			  <a href="" target="_blank"><button type="button" class="btn btn-primary">West Bengal</button></a>
			  
			</div></center>
			
		</section>
		
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
        <section class="copyright-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
						
						<center><ul class="list-inline">
                            <li><a href="index.html" style="color:white">Home</a></li>
                            <li><a href="blog.html" style="color:white">Blog</a></li>
                            <li><a href="holiday-landmarker.html" style="color:white">Holiday Landmarker</a></li>
                            <li><a href="#" style="color:white">Destination</a></li>
                            <li><a href="youtube.html" style="color:white">You tube</a></li>
                            <li><a href="contact.html" style="color:white">Contact</a></li>
						</ul></center>
						&nbsp;
                        <div class="copyright-text text-center">
                            <p style="color:white">All Rights Reserved. Developed by HolidayLandmark.com</a></p>
                        </div>
						&nbsp;
						<center><div class="footer-social">
                            <ul class="top-social">
                                <li><a href="https://www.facebook.com/holidaylandmark" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/HolidayLandmark" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://in.pinterest.com/holidaylandmark/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="http://www.youtube.com/user/HolidayLandmark" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/holidaylandmark/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="https://plus.google.com/+HolidayLandmark" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div></center>
						
                    </div>
                </div>
            </div>
        </section>
        <!-- End Copyright Section -->

        <div id="back-to-top" class="back-to-top reveal">
            <img src="{{ asset('assets/images/logo/up.png') }}" alt="" class="img-responsive">
        </div>


        <!-- all js include start -->
        <!-- jquery latest version -->
        <script src="{{ asset('assets/js/jquery-3.1.1.min.js') }}"></script>
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
        <script src="assets/js/owl.carousel.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.easypiechart.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.mb.YTPlayer.js') }}"></script>
        <script src="{{ asset('assets/js/countdown.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.fitvids.js') }}"></script>

        <!-- template main js file -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <!-- all js include end -->
		
		<script src="https://code.jquery.com/jquery-3.1.1.min.js') }}"></script>
		<script src="js/youmax.min.js"></script>
		
		<!-- Youmax Call -->
    <script>

        $(document).ready(function(){

            $(".youmax").youmax({
                apiKey:"AIzaSyAlhAqP5RS7Gxwg_0r_rh9jOv_5WfaJgXw",

                channelLink:"https://www.youtube.com/channel/UCEW84pb8ovYVfWNGM7tWHTQ",
                playlistLink:"https://www.youtube.com/playlist?list=PL6_h4dV9kuuIOBDKgxu3q9DpvvJFZ6fB5",
                
                defaultTab:"Uploads",         //Uploads|Playlists|Featured
                videoDisplayMode:"popup",       //popup|link|inline

                maxResults:"6",
                autoPlay:false,
                displayFirstVideoOnLoad:true,       //for inline video display mode only
                

                responsiveBreakpoints   :[600,900,2000,2500],

                loadMoreText            :"<i class=\"fa fa-plus\"></i>&nbsp;&nbsp;Show me more videos..",
                previousButtonText      :"<i class=\"fa fa-angle-left\"></i>&nbsp;&nbsp;Previous",
                nextButtonText          :"Next&nbsp;&nbsp;<i class=\"fa fa-angle-right\"></i>",
                loadingText             :"loading...",
                allDoneText             :"<i class=\"fa fa-times\"></i>&nbsp;&nbsp;All done..",

                hideHeader              :false,
                hideTabs                :false,
                hideLoadingMechanism    :false,


            });
        });


    </script>
    <!-- ends -->
	
	<!-- Search  -->
	
		<script>
	function autocomplete(inp, arr) {
	  /*the autocomplete function takes two arguments,
	  the text field element and an array of possible autocompleted values:*/
	  var currentFocus;
	  /*execute a function when someone writes in the text field:*/
	  inp.addEventListener("input", function(e) {
		  var a, b, i, val = this.value;
		  /*close any already open lists of autocompleted values*/
		  closeAllLists();
		  if (!val) { return false;}
		  currentFocus = -1;
		  /*create a DIV element that will contain the items (values):*/
		  a = document.createElement("DIV");
		  a.setAttribute("id", this.id + "autocomplete-list");
		  a.setAttribute("class", "autocomplete-items");
		  /*append the DIV element as a child of the autocomplete container:*/
		  this.parentNode.appendChild(a);
		  /*for each item in the array...*/
		  for (i = 0; i < arr.length; i++) {
			/*check if the item starts with the same letters as the text field value:*/
			if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
			  /*create a DIV element for each matching element:*/
			  b = document.createElement("DIV");
			  /*make the matching letters bold:*/
			  b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
			  b.innerHTML += arr[i].substr(val.length);
			  /*insert a input field that will hold the current array item's value:*/
			  b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
			  /*execute a function when someone clicks on the item value (DIV element):*/
			  b.addEventListener("click", function(e) {
				  /*insert the value for the autocomplete text field:*/
				  inp.value = this.getElementsByTagName("input")[0].value;
				  /*close the list of autocompleted values,
				  (or any other open lists of autocompleted values:*/
				  closeAllLists();
			  });
			  a.appendChild(b);
			}
		  }
	  });
	  /*execute a function presses a key on the keyboard:*/
	  inp.addEventListener("keydown", function(e) {
		  var x = document.getElementById(this.id + "autocomplete-list");
		  if (x) x = x.getElementsByTagName("div");
		  if (e.keyCode == 40) {
			/*If the arrow DOWN key is pressed,
			increase the currentFocus variable:*/
			currentFocus++;
			/*and and make the current item more visible:*/
			addActive(x);
		  } else if (e.keyCode == 38) { //up
			/*If the arrow UP key is pressed,
			decrease the currentFocus variable:*/
			currentFocus--;
			/*and and make the current item more visible:*/
			addActive(x);
		  } else if (e.keyCode == 13) {
			/*If the ENTER key is pressed, prevent the form from being submitted,*/
			e.preventDefault();
			if (currentFocus > -1) {
			  /*and simulate a click on the "active" item:*/
			  if (x) x[currentFocus].click();
			}
		  }
	  });
	  function addActive(x) {
		/*a function to classify an item as "active":*/
		if (!x) return false;
		/*start by removing the "active" class on all items:*/
		removeActive(x);
		if (currentFocus >= x.length) currentFocus = 0;
		if (currentFocus < 0) currentFocus = (x.length - 1);
		/*add class "autocomplete-active":*/
		x[currentFocus].classList.add("autocomplete-active");
	  }
	  function removeActive(x) {
		/*a function to remove the "active" class from all autocomplete items:*/
		for (var i = 0; i < x.length; i++) {
		  x[i].classList.remove("autocomplete-active");
		}
	  }
	  function closeAllLists(elmnt) {
		/*close all autocomplete lists in the document,
		except the one passed as an argument:*/
		var x = document.getElementsByClassName("autocomplete-items");
		for (var i = 0; i < x.length; i++) {
		  if (elmnt != x[i] && elmnt != inp) {
			x[i].parentNode.removeChild(x[i]);
		  }
		}
	  }
	  /*execute a function when someone clicks in the document:*/
	  document.addEventListener("click", function (e) {
		  closeAllLists(e.target);
		  });
	}

	/*An array containing all the country names in the world:*/
	var countries = ["Andra Pradesh","Arunachal Pradesh","Assam","Bihar","Chhattisgarh","Goa","Haryana","Himachal Pradesh","Jammu and Kashmir","Jharkhand","Karnataka","Kerala","Maharashtra","Madhya Pradesh","Manipur","Meghalaya","Mizoram","Nagaland","Orissa","Gujarat","Punjab","Rajasthan","Sikkim","Tamil Nadu","Tripura","Uttaranchal","Uttar Pradesh","West Bengal"];

	/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
	autocomplete(document.getElementById("myInput"), countries);
	</script>
 <script>
    function welcome_fetch_data(page, manual_filter, manual_filter_tablesm){

    
      
                $.ajax({
                url:"{{ url('welcome/welcome_manualfilter')}}?page="+page+"&manual_filter_table="+manual_filter+"&manual_filter_tablesm="+manual_filter_tablesm,
                success:function(data){
                 
                    console.log(data);
                    $('#myTable tbody').html('');
                    $('#myTable tbody').html(data);
                }
                });
            }
            $(document).ready(function() {
              $("#manual_filter_table").change(function() {
                $('#manual_filter_tablesm').val('');
                var manual_filter_tablesm = $('#manual_filter_tablesm').val();
                manual_filter = $("#manual_filter_table").val();
                 var page = $('#hidden_page').val();
                 $('#manual_filter_table1 option').prop('selected', function() {
                    return this.defaultSelected;
                });
                 $('#manual_filter_table2 option').prop('selected', function() {
                    return this.defaultSelected;
                });
                welcome_fetch_data(page, manual_filter, manual_filter_tablesm);
              })
            });
        $(document).ready(function() {
              $("#manual_filter_table1").change(function() {
                $('#manual_filter_tablesm').val('');
                var manual_filter_tablesm = $('#manual_filter_tablesm').val();
                manual_filter = $("#manual_filter_table1").val();
                 var page = $('#hidden_page').val();
                 $('#manual_filter_table option').prop('selected', function() {
                    return this.defaultSelected;
                });
                 $('#manual_filter_table2 option').prop('selected', function() {
                    return this.defaultSelected;
                });
                welcome_fetch_data(page, manual_filter, manual_filter_tablesm);
              })
            });
        $(document).ready(function() {
              $("#manual_filter_table2").change(function() {
                $('#manual_filter_tablesm').val('');
                var manual_filter_tablesm = $('#manual_filter_tablesm').val();
                manual_filter = $("#manual_filter_table2").val();
                 var page = $('#hidden_page').val();
                 $('#manual_filter_table option').prop('selected', function() {
                    return this.defaultSelected;
                });
                 $('#manual_filter_table1 option').prop('selected', function() {
                    return this.defaultSelected;
                });
                welcome_fetch_data(page, manual_filter, manual_filter_tablesm);
              })
            });
            $(document).on('keyup', '#manual_filter_tablesm', function(){
             
            var manual_filter_tablesm = $('#manual_filter_tablesm').val();
            manual_filter = $("#manual_filter_table").val();
            var page = $('#hidden_page').val();
            $('#manual_filter_table option').prop('selected', function() {
                    return this.defaultSelected;
                });
            $('#manual_filter_table1 option').prop('selected', function() {
                    return this.defaultSelected;
                });
            $('#manual_filter_table2 option').prop('selected', function() {
                    return this.defaultSelected;
                });
                welcome_fetch_data(page, manual_filter, manual_filter_tablesm);
           });
          $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
             var manual_filter_tablesm = $('#manual_filter_tablesm').val();
            var page = $(this).attr('href').split('page=')[1];
            manual_filter = $("#manual_filter_table").val();
            welcome_fetch_data(page, manual_filter, manual_filter_tablesm);
          });
</script>
<script src="{{asset('js/location.js')}}"> </script>
		
    </div>    
    </body>

</html>
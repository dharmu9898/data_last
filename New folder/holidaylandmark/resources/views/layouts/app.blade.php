<!DOCTYPE html>
<html lang="en">
<head>
  <title>Holidaylandmark</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 
  <style>

  @media (min-width: 992px) { 
   .navbar{
      margin-top:0;
      top:45px;
    }
}
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
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body  style="background-color:#113967">


      
        

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
      <a style="color:white;" class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a style="color:white;" class="nav-link" href="#">Blog</a>
      </li>
      <li class="nav-item">
        <a style="color:white;" class="nav-link" href="#">HolidayLandmarker</a>
      </li>
      <li class="nav-item">
        <a style="color:white;" class="nav-link disabled" href="#">TopDestination</a>
      </li>
      <li class="nav-item">
        <a style="color:white;" class="nav-link disabled" href="#">Contact</a>
      </li>
      <li class="nav-item">
        <a style="color:white;" class="nav-link " href="{{ route('login') }}">Login</a>
      </li>
      </ul>
    </div>
  </div>
  </div>
</nav>

</header>
<br><br><br> <br><br><br>
<main class="py-4 mt-4">
            @yield('content')
        </main>
     


   <!-- End Text & image Section -->

<!-- Start Latest Blog Section -->
 
   <!-- End Latest Blog Section -->




   <!-- Start Team Member Section -->

   <!-- End Team Member Section -->


   <!-- Start  Copyright Section -->
  
   <!-- End Copyright Section -->

  


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
                url:"{{ url('welcome/welcome_manualdashboard')}}?page="+page+"&manual_filter_table="+manual_filter+"&manual_filter_tablesm="+manual_filter_tablesm,
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
                 $('#category_filter option').prop('selected', function() {
                    return this.defaultSelected;
                });
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
                $('#category_filter option').prop('selected', function() {
                    return this.defaultSelected;
                });
                 $('#manual_filter_table2 option').prop('selected', function() {
                    return this.defaultSelected;
                });
                welcome_fetch_data(page, manual_filter, manual_filter_tablesm);
              })
            });
            $(document).ready(function() {
              $("#category_filter").change(function() {
                $('#manual_filter_tablesm').val('');
                var manual_filter_tablesm = $('#manual_filter_tablesm').val();
                manual_filter = $("#category_filter").val();
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
                $('#category_filter option').prop('selected', function() {
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
            $('#category_filter option').prop('selected', function() {
                    return this.defaultSelected;
                });
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

<script src="{{asset('js/location.js')}}"> </script><script src="{{asset('js/location.js')}}"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>   </div>    
   
    </body>

</html>


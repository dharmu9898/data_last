<!DOCTYPE html>
<html lang="en">
<head>
<style>
.navbar {
    transition: all 0.4s;
}

.navbar .nav-link {
    color: #fff;
}

.navbar .nav-link:hover,
.navbar .nav-link:focus {
    color: #fff;
    text-decoration: none;
}

.navbar .navbar-brand {
    color: #fff;
}


/* Change navbar styling on scroll */
.navbar.active {
    background: #fff;
    box-shadow: 1px 2px 10px rgba(0, 0, 0, 0.1);
}

.navbar.active .nav-link {
    color: #555;
}

.navbar.active .nav-link:hover,
.navbar.active .nav-link:focus {
    color: #555;
    text-decoration: none;
}

.navbar.active .navbar-brand {
    color: #555;
}
.navbar-inverse {

    border-color: white;
}
.container {
    padding-right: 0px;
    padding-left: 0px;
    margin-right: auto;
    margin-left: auto;
}


.scrollable-panel{
      height:600px;
      overflow-y:scroll;
      overflow-x:scroll;
     
      }


.carousel-inner .a:hover {
  background-color: black;
}
/* Change navbar styling on small viewports */
@media (max-width: 991.98px) {
    .navbar {
        background: white;
    }

    .navbar .navbar-brand, .navbar .nav-link {
        color: #555;
    }
}

</style>
  <title>Holiday Landmark</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<header class="header">
<nav  style=" border-color: white;background-color:blue"   class="navbar navbar-inverse navbar-fixed-top">
  <div style="color: white; background-color:bg-light" class="container-fluid">
    <div class="navbar-header">
    <a style ="padding: 6px 2px"class="navbar-brand" href="">
                        <img class="img-responsive" src="{{asset('images/holiday-landmark2.png')}}" alt="logo">
                    </a> 
    </div>
    
    
    <ul style="float: right" class="nav navbar-nav">
      <li class=""> <span><i style="margin-right: 20px;font-size: 30px;" class="fa fa-user"></i> </span></a></li>
     
      <li> <span><a style="font-size: 25px;color:white" href="{{ route('login') }}">login </a></span></li>
    </ul>
  </div>
</nav>
</header>
<div style= "p:0px;width:1300px;height:600px;padding-left: 0px;"class="container">
  <h2></h2>  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="images/home/1.jpg" alt="Los Angeles" style="width:120%;height:40%">
      </div>

      <div class="item">
        <img src="images/home/2.jpg" alt="Chicago" style="width:120%;height:40%">
      </div>
    
      <div class="item">
        <img src="images/home/3.jpg" alt="New york" style="width:120%;height:40%">
      </div>
      <div class="item">
        <img src="images/home/4.jpg" alt="New york" style="width:120%;height:40%">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


           
            
        <br>
        <br>  <br>
<section class="pad25"  >
			<div class="container">
				<center><h3></h3></center><br><br><br>
				<div class="row">
					<div class="panel panel-default">
						<div class="panel-heading" style="background-color: blue; color:white; text-align:center;font-size:17px">Top Destination</div>
						<div class="panel-body" style="box-sizing: border-box; padding: 5px;">
								<div class="col-sm-12">   
									<div class="panel panel-default" style="margin-bottom:0px;">
									<div class="panel-body">
											<div class="sidebar-heading-3 uppercase">
											
											
											
                                               
                                            
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                               
  
                            
                       
                
                <select style="height:35px width: 500px" name="city_filter"  class="form-control states" id="city_filter">
                <option value="all" class="form-control" >Search By City</option>
                    @foreach($city as $row)
                    <option value="{{$row->city_id}}">{{$row->city_name }}</option>

                    
                    @endforeach
                      </select>
                    </div>


       
      </div>
      <br><br>
      <div class="form-group">
     <input id="myInput" type="text" class="form-control"  placeholder="Search by country,city,state,noofdays,location"> 
     </div>
    


<table  id="myTable">


<tbody>


@include('page')
            </tbody>
                </table>
                
            
        </div>
                                            
                                            
                                  
                                            
                                            				</div>
									
								</div>
								
								
						</div>
						
						
					</div>
				</div>
			
			</div>
		</section>
  
    <footer style="width:1300px;height:200px ; background-color:blue;padding: 3px;text-align: center;color:white">
  <p>Author: Hege Refsnes<br>
  <a href="mailto:hege@example.com">hege@example.com</a></p>
  
</footer>

<style>
            @media only screen and (max-width: 700px) {
                .mob {
                    display: none;
                }
            }
        </style>

<!-- manual filter -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


<script>

    function filter_data(){
      city_filter = $("#city_filter").val();
      $.ajax({
              url:"{{ url('welcome_country') }}?filter_city="+city_filter,
              success:function(data){
               
                $('#myTable tbody').html('');
                $('#myTable tbody').html(data);
              }
            })   }
          $("#city_filter").change(function() {
              filter_data();
          });
</script>

<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>  
    <script type="text/javascript" src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.parallax.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/smoothscroll.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.nav.js')}}"></script>   
    
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script> 
</body>

</html>


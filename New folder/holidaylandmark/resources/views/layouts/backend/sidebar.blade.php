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
<style>
body{
  overflow-x:hidden;
  font-family: "Times New Roman", Times, serif;
}
.tab1{
margin-left:-4%;
}
@media only screen and (max-width: 1412px) {
  .tab1{
margin-left:0%;
}
}
@media only screen and (max-width: 1300px) {
  .tab1{
margin-left:2%;
}
}
table{
    font-family: "Times New Roman", Times, serif;
}
th{
    font-family: "Times New Roman", Times, serif;

}
td{
    font-family: "Times New Roman", Times, serif;

}

tr{
    font-family: "Times New Roman", Times, serif;

}
.myrow
{
    margin-left:275px;  
}
/* @media only screen and (max-width: 1200px) {
  .tab1{
margin-left:0%;
}
} */
</style>


<div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-0 col-0">
      <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu  fa fa-list"></i></button>
        <header id="header">
          <div class="d-flex flex-column">
            <div class="profile">
                <img src="{{asset('img/holiday.png')}}" class="img rounded-circle"/>
            </div>

                <nav class="nav-menu">
                <ul>
                        <div class="col-12  text-white" style="font-size:22px;text-align:center"> Hi, {{ Auth::user()->name }}</div> <br>
                        <div class="col-12 btn btn-outline-primary mb-1"> <a href="{{ route('touroperator.dashboard') }}" class="fa fa-home text-white" style="font-size:22px"> &nbsp; Dashboard </a>
                        </div>

                        

                        


                        <div class="col-12 btn btn-outline-primary mb-1">
                            <a class="text-danger fa fa-sign-out text-white" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"  style="font-size:22px">&nbsp;Logout  </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                        </div>

                    </ul>
                </nav><!-- .nav-menu -->
            <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu fa fa-list"></i></button>

          </div>
        </header><!-- End Header -->
    </div><!-- ====col lg- close=== -->
  
</div> <!-- conrainer close -->

   

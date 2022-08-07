@extends('layouts.withoutheaderfooter')

@section('content')

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


{{-- testing  --}}
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
                        <div class="col-12 btn btn-outline-primary mb-1"> <a href="{{ route('touroperator.dashboard') }}"class="fa fa-home text-white" style="font-size:22px"> &nbsp; Dashboard </a>
                        </div>

                        <div class="col-12 btn btn-outline-primary mb-1"> <a href='{{url("touroperator/create")}}'class="fa fa-users text-white" style="font-size:22px"> &nbsp; Add Trip </a>
                        </div>


                        <div class="col-12 btn btn-outline-primary mb-1"> <a href='' class="fa fa-list text-white" style="font-size:22px"> &nbsp; Trip List  </a>
                        </div>

                        <div class="col-12 btn btn-outline-primary mb-1"> <a href='{{url("touroperator/gallery/addgallery")}}' class="fa fa-list text-white" style="font-size:22px"> &nbsp; Add Gallery  </a>
                        </div>

                        <div class="col-12 btn btn-outline-primary mb-1"> <a href='{{url("touroperator/gallery")}}' class="fa fa-list text-white" style="font-size:22px"> &nbsp; Show Gallery  </a>
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
<div class="col-lg-12 margin-tb">
        <div class="pull-right">
           
        </div>
                        <div class="pull-right">
                             @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
            </div>
        </div>
<div class="form-group col-md-12"> 
      <div class="myrow">
      


    <!-- Search Start --> 
    
    <br>
<div  style="max-width: 840px" class="container  w-4 mr-4 ">
   
<form method="post" action="{{route('touroperator.update',$data->id)}}" enctype="multipart/form-data">
@csrf 
  
  
   
            <div class="form-group">
                <strong>Email Id:</strong>
                <input type="text" name="emailid" class="form-control" value="{{ $data->emailid }}" placeholder="emailid">
            </div>
      
          <div class="form-group">
                <strong>Phone no:</strong>
                <input type="text" name="Phoneno" class="form-control" value="{{ $data->Phoneno }}" placeholder="Phoneno">
            </div>
      
   <div class="form-group">
                <strong>Trip Title:</strong>
                <input type="text" name="triptitle" class="form-control" value="{{ $data->triptitle }}" placeholder="triptitle">
            </div>
      <div class="form-group">
                <strong>No of days:</strong>
                <input type="text" name="Noofdays" class="form-control" value="{{ $data->Noofdays }}" placeholder="Noofdays">
            </div>
      
<div class="form-group">
                <strong>Location:</strong>
                <input type="text" name="location" class="form-control"  value="{{ $data->location }}" placeholder="location">
            </div>
      
            <div class="form-group">
                <strong>iternary Form:</strong>
                <textarea class="form-control" id="iternary" value="{{ $data->iternary }}" name="iternary">{{ $data->iternary }}</textarea>   
                <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'iternary' );
</script>
                  </div>
      


   <div class="form-group">
    <input type="submit" class="btn btn-primary"  />
   </div>
  </form>
</div>
   
@endsection
@section('js')
<script>
$(document).ready(function(){
  $("#manual_filter_tablesm").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>



Above JavaScript 
    
@append
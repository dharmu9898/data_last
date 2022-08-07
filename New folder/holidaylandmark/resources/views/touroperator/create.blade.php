@extends('layouts.withoutheaderfooter')
@section('content')
<!-- <div class="container-fluid">    -->
<style>
body{
  overflow-x:hidden;
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

.myrow
{
    margin-left: 185px;




}
/* @media only screen and (max-width: 1200px) {
  .tab1{
margin-left:0%;
}
} */
</style>

<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu  fa fa-list"></i></button>
<!-- ======= Header ======= -->



<header id="header">
    <div class="d-flex flex-column">
        <div class="profile">
        <img src="{{asset('img/holiday.png')}}" class="img rounded-circle"/>
            <nav class="nav-menu">
            <ul>
                        <div class="col-12  text-white" style="font-size:22px;text-align:center"> Hi, {{ Auth::user()->name }}</div> <br>
                        <div class="col-12 btn btn-outline-primary mb-1"> <a href=""class="fa fa-home text-white" style="font-size:22px"> &nbsp; Dashboard </a>
                        </div>

                        <div class="col-12 btn btn-outline-primary mb-1"> <a href='{{url("admin/operator/create")}}' class="fa fa-users text-white" style="font-size:22px"> &nbsp; Add TourOperator </a>
                        </div>


                        <div class="col-12 btn btn-outline-primary mb-1"> <a href='{{url("admin/operator")}}' class="fa fa-list text-white" style="font-size:22px"> &nbsp; TourOperator List  </a>
                        </div>

                        <div class="col-12 btn btn-outline-primary mb-1"> <a href='{{url("touroperator/gallery/create")}}'  class="fa fa-list text-white" style="font-size:22px"> &nbsp; Add Gallery  </a>
                        </div>

                        <div class="col-12 btn btn-outline-primary mb-1"> <a href='{{url("touroperator/gallery")}}' class="fa fa-list text-white" style="font-size:22px"> &nbsp; Show Gallery  </a>
                        </div>

                        
                        


                        <div class="col-12 btn btn-outline-primary mb-1">
                            <a class=" fa fa-sign-out text-white" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"  style="font-size:22px">&nbsp;Logout  </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                        </div>

                    </ul>
            </nav><!-- .nav-menu -->
            <button type="button" class="mobile-nav-toggle d-xl-none"><i
                    class="icofont-navigation-menu fa fa-list"></i></button>
        </div>
    </div>
</header>

<div class="container">
<div class="row">
<div class="col-xl-2 col-md-2 col-0 col-lg-2 col-sm-0"> </div>

<div class="col-xl-10 col-12 col-sm-10 col-lg-10 col-md-10 tab1">
                      {{-- messsage pop up open --}}
                      @if(session()->get('success'))
                      <div class="alert alert-success col-xl-9 col-9 col-sm-10 col-lg-10 col-md-10">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          {{ session()->get('success') }}
                      </div>
                  @endif
                  <div class="col-xl-10 col-12 col-sm-10 col-lg-10 col-md-10">
                      @if(session()->get('danger'))
                          <div class="alert alert-danger">
                              <button type="button" class="close" data-dismiss="alert">×</button>
                              {{ session()->get('danger') }}
                          </div>
                      @endif
                  </div>
                  @if(count($errors) > 0)
                      <div class="row">
                          <div class="col-xl-10 col-12 col-sm-10 col-lg-10 col-md-10 error">
                              <ul>
                                  @foreach($errors->all() as $error)
                                  <div class="alert alert-danger">
                                      <button type="button" class="close" data-dismiss="alert">×</button>
                                  <p class="text-center"> {{$error}}</p>
                          </div>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                  {{-- messsage pop up close --}}
<br><br>
                              
                            </div>
                          </div>
      <div>
    </div>
  </div>

@endsection

<div class="container">
                                  <div class="col-md-12">
                                    <div  class="myrow">
                                      <div class="col-12">
                                          <div class="card">
                                            <div class="card-header bg-dark text-white fa fa-user"> &nbsp; New Trips</div>
                                            <div class="card-body shadow" style="border-bottom:3px solid red;">
                                            <form method="post" action="{{route('touroperator.store')}}" enctype="multipart/form-data">
   {{csrf_field()}}   
      
 
    
   <div class="form-group">
   <select name="country" class="form-control countries" id="countryId">
    <option value="">Select Country</option>
</select>
   </div>   
   <div class="form-group">
   <select name="state" class="form-control states" id="stateId">
    <option value="">Select State</option>
</select>
   </div>
   <div class="form-group">
   <select name="city" class="form-control cities" id="cityId">
    <option value="">Select City</option>
</select>
   </div>
          
            <div class="form-group">
                <strong>Email Id:</strong>
                <input type="email" name="emailid" class="form-control" placeholder="emailid">
            </div>
      
          <div class="form-group">
                <strong>Phone no:</strong>
                <input type="text" name="Phoneno" class="form-control" placeholder="Phoneno">
            </div>
      
   <div class="form-group">
                <strong>Trip Title:</strong>
                <input type="text" name="triptitle" class="form-control" placeholder="triptitle">
            </div>
      <div class="form-group">
                <strong>No of days:</strong>
                <input type="number" name="Noofdays" class="form-control" placeholder="Noofdays">
            </div>
      
<div class="form-group">
                <strong>Location:</strong>
                <input type="text" name="location" class="form-control" placeholder="location">
            </div>
      
            <div class="form-group">
                <strong>iternary Form:</strong>
                <textarea class="form-control" id="iternary" name="iternary"></textarea>   
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
                                          </div>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <div>
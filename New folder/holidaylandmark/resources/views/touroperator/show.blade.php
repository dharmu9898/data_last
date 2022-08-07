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


                        <div class="col-12 btn btn-outline-primary mb-1"> <a href='{{url("touroperator.admin/operator")}}' class="fa fa-list text-white" style="font-size:22px"> &nbsp; TourOperator List  </a>
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
    
              <!-- Serach End -->
            </div>
          </div>


                
            </div>
    <br>
    <div style="margin-left: 300px; class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>country</strong>
                <td>{{ $touroperator->country_name }}</td>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>state:</strong>
          {{ $touroperator->state_name }} 
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>email:</strong>
                {{ $touroperator->emailid }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone:</strong>
                {{ $touroperator->Phoneno }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Trip Title:</strong>
                {{ $touroperator->triptitle }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No OF Days:</strong>
                {{ $touroperator->Noofdays }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Location:</strong>
                {{ $touroperator->location }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Iternary:</strong>
                {!!$touroperator->iternary!!}
            </div>
        </div>
        
           <div style="padding-left:10px;font-size:16px;" class="form-group">
                  <a href="{{ url()->previous() }}" class="btn btn-dark fa fa-arrow-left  "> &nbsp; Back</a> 
 
            </div>  
    </div>
  


  
@endsection


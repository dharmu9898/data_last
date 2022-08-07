@extends('layouts.toursidebar')
@section('content')
<!-- <div class="container-fluid">    -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />
<link href="jquery.datetimepicker.min.js" rel="stylesheet">
 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

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
.countries,.states,.cities{
display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  }

  
/* @media only screen and (max-width: 1200px) {
  .tab1{
margin-left:0%;
}
} */
</style>
<div  class="col-xl-10 col-12 col-sm-10 col-lg-10 col-md-10 tab1">
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
          </div>


    <div   class="container-fluid">
  <div  class="welcome">
      <div  class="row">
      <div  class="col-md-12">
      <div class="card">
     
                        <div class="card-body">
        <div  class="col-md-11">
        <h2  class="header"> Add Trip Category </h2>

        <div class="text-left upgrade-btn">
                                  <a href="{{ route('touroperator.destination') }}"  style="font-size:20px;padding:4px;width: 110px;float:left" class="btn btn-primary text-white" target="_blank">Country</a>&nbsp;&nbsp;
                                    <a href="{{ route('touroperator.state') }}"  style="font-size:20px;padding:4px;width: 110px;" class="btn btn-primary text-white" target="_blank">State</a>&nbsp;&nbsp;
                                    <a href="{{ route('touroperator.city') }}"  style="font-size:20px;padding:4px;width: 110px;" class="btn btn-primary text-white" target="_blank">City</a>
                             
                        </div>
          <div style="margin-top: 60px;" class="content">
         
          <form method="post" action="{{ route('touroperator.uploadstate') }}" enctype="multipart/form-data">
                  @csrf
    
                  <div class="form-group">
                  <strong>Country:</strong>
                                      
                                      <select name="country" class="countries w-100 p-2" id="countryId"  value="{{old('country')}}" required>
                                      <option value=""   > Select Country </option>
                                     </select> 
                                     
                                      </div> 
                  <div class="form-group">
                  <strong>State:</strong>
         <select name="state"  class="states w-100 p-2" id="stateId" value="{{old('state')}}" required>
                                <option value=""   > Select state </option>
                               </select>  </div> 
                 
                  

                  <div class="form-group">
                    <input type="file" name="Image" class="form-control">
                </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-dark"  />
                    <a href="{{ url()->previous() }}" class="btn btn-dark fa fa-arrow-left  "> &nbsp; Back</a> 

                  </div>
                  </form>
</div>
      </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.css"></script>
<script src="jquery.datetimepicker.full.min.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>


          
        </div>
      </div>
    </div>
  </div>


<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu  fa fa-list"></i></button>
<!-- ======= Header ======= -->





<div class="container">
<div class="row">



                  {{-- messsage pop up close --}}
<br><br>
                              
                            </div>
                          </div>
      <div>
    </div>
  </div>
<script>
function check()
{

    var pass1 = document.getElementById('Phoneno');


    var message = document.getElementById('message');

   var goodColor = "#0C6";
    var badColor = "#FF9B37";

    if(Phoneno.value.length!=10){

      Phoneno.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "required 10 digits, match requested format!"
    }}
</script>
@endsection

  
                              
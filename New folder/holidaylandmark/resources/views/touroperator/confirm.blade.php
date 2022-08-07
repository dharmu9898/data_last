@extends('layouts.toursidebar')
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



});
/* @media only screen and (max-width: 1200px) {
  .tab1{
margin-left:0%;
}
} */
</style>


<div class="welcome" style="background-color:#303337; height:30px; margin-top:25px; color:white">
    <div  style="background-color:#303337;" class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="content">
            <h2> Rvsp List </h2>
           
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="welcome">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-9">
          <div  style="margin-top:100px;" class="content">
          <form method="post" action="{{ route('touroperator.updates',$data->id) }}" enctype="multipart/form-data">
          @csrf
                                            
          <div class="form-group">
                                                <label for="email">Email </label>
                                                <input type="email" class="form-control"  name="email" value="{{ $data->emailid }}" readonly />
                                            </div>
                                            <div class="form-group">
                                                <label for="Name">Name </label>
                                                <input type="text" class="form-control"  name="name" value="{{ $data->Name }}" readonly />
                                            </div>
                                           
                                          
                                             
                                              <button type="submit"  style="color:white;" class="btn btn-dark float-right"> &nbsp;Confirm</button>
                                              <td><a href="{{ url()->previous() }}" class="btn btn-dark fa fa-arrow-left float-right mr-2"> &nbsp; Back</a> </td>
                                 
</form>


           
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="container">
<div class="row">


<div class="col-xl-10 col-12 col-sm-10 col-lg-10 col-md-10 tab1">
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->
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



<div class="container">
                                  <div class="col-md-12">
                                    <div  class="myrow">
                                      <div class="col-12">
                                         
                                    </div>
                                  </div>
                                </div>
                              <div>

                              @endsection
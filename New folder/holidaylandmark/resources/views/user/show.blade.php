@extends('layouts.usersidebar')

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
font-size:16px;
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

  <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        
                        <div style="margin-top:40px;"  class="card mb-4">
                        <h1>Show Trip</h1>
                            <div style="font-size:18px;" class="card-header">
                                
                               <b> Trip Image</b>
                            </div>
                            <div style="padding: 0.25rem;"  class="card-body">
                            <div class="form-group">
                <strong></strong>
                <?php foreach (json_decode($user->Image)as $picture) { ?>
                 <img src="{{ asset('public/image/'. $picture) }}" style="height:230px; width:250px"/>
                <?php } ?>
            </div>
                            </div>
                            
                        </div>
                        <div class="card mb-4">
                            <div style="font-size:18px;"  class="card-header">
                                
                            <b>  Details</b>
                            </div>
                            <div class="card-body"></div>
                            <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong>Trip Title:</strong>
                {{ $user->TripTitle }}
            </div>
            

            <div  style="padding-left:10px;font-size:16px;" class="form-group">
                <strong>Destination:</strong>
                {{ $user->Destination }}
            </div>
           
            <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong>City:</strong>
                {{ $cities->city_name }}
            </div>


            <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong>No Of Days:</strong>
                {{ $user->NoOfDays }}
            </div>
            <div  style="padding-left:10px;font-size:16px;" class="form-group">
                <strong>date:</strong>
                {{ $user->datetime }}
            </div>
            <div  style="padding-left:10px;font-size:16px;" class="form-group">
                <strong>Time:</strong>
                {{ $user->time }}
            </div>
           <div  style="padding-left:10px;font-size:16px;" class="form-group">
                <strong >Description:</strong>
                {{ $user->Description }}
            </div>
            <div  style="padding-left:10px;font-size:16px;" class="form-group">
                <strong >Trip Highlight:</strong>
                {!!$user->Keyword!!}
            </div> <div  style="padding-left:10px;font-size:16px;" class="form-group">
                <strong >Iternary:</strong>
                {!!$user->Iternary!!}
            </div>
                        </div>
                    </div>
                </main>
                
            </div>
        </div>



{{-- testing  --}}

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
<div style="margin-top:100px;" class="form-group col-md-12"> 
      <div class="myrow">
      


    <!-- Search Start --> 
    
              <!-- Serach End -->
            </div>
          </div>


                
            </div>
    <br>
    
  
   
  

  
@endsection



@extends('layouts.toursidebar')

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
<div class="welcome" style="background-color:#303337; height:30px; margin-top:25px; color:white">
    <div  style="background-color:#303337;" class="container-fluid">
      <div  class="row">
        <div class="col-md-12">
          <div class="content">
          <h2> Show Gallery </h2>
           
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        
                        <div style="margin-top:40px;"  class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                                Trip Image
                            </div>
                            <div  class="card-body"><canvas id="myAreaChart"  width="100%" height="10"></canvas>
                            <div class="form-group">
                <strong></strong>
                <?php foreach (json_decode($gallery->Image)as $picture) { ?>
                 <img src="{{ asset('public/image/'. $picture) }}" style="height:200px; width:250px"/>
                <?php } ?>
            </div>
                            </div>
                            
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                              Details
                            </div>
                           <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas>
                            <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong>Trip Title:</strong>
                {{ $gallery->TripTitle }}
            </div>
             <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong>City Name:</strong>
                {{ $gallery->city_name }}
            </div>

             <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong>Destination:</strong>
                {{ $gallery->Destination }}
            </div>
             <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong>Keyword:</strong>
                {!! $gallery->Keyword !!}
            </div>
             <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong>No OF Days:</strong>
                {{ $gallery->NoOfDays }}
            </div>
            <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong>Datetime:</strong>
                {{ $gallery->datetime }}
            </div>
             <div style="padding-left:10px;font-size:16px;" class="form-group">
               <strong>Trip Highlight:</strong>
                {!!$gallery->Keyword!!}
            </div>
               <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong >Description:</strong>
                  {{ $gallery->Description  }}
            </div>
             <div style="padding-left:10px;font-size:16px;" class="form-group">
                 <strong >Iternary Details:</strong>
                {!!$gallery->Iternary!!}
            </div>
             <div style="padding-left:10px;font-size:16px;" class="form-group">
                 
 <button style="font-size:16px;margin-left:10px;" onclick="goBack()"> Back</button>  
 
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
    
  
   <script>

function goBack() {

window.history.back();

  }

</script> 
  

  
@endsection



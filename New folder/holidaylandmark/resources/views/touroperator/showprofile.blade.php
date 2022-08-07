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

  <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                    <h2 class="header">  Profile </h2>
                        
                        <div  class="card mb-4">
                        <div style="font-size:18px;"  class="card-header">
                                
                              Details
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas>
                            <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong>Name:</strong>
                {{ $operators->name }}
            </div>
            

            <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong>Email:</strong>
                {{ $operators->email }}
            </div>
            
            <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong>Country:</strong>
                {{ $operators->country_name }}
            </div>
            <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong>State:</strong>
                {{ $operators->state_name }}
            </div>
            <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong>City:</strong>
                {{ $operators->city_name }}
            </div>


            <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong>Phone No:</strong>
                {{ $operators->Phoneno }}
            </div>
            <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong>Experience:</strong>
                {{ $operators->Experience }}
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



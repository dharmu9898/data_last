@extends('layouts.adminsidebar')

@section('content')

<link href="{{ asset('css/adminshow.css') }}" rel="stylesheet">
<div class="welcome" style="background-color:#303337; height:30px; margin-top:25px; color:white">
    <div  style="background-color:#303337;" class="container-fluid">
      <div  class="row">
        <div class="col-md-12">
          <div class="content">
          <h2> Show International Tours </h2>
           
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
                               International Tour Image
                            </div>
                            <div  class="card-body"><canvas id="myAreaChart"  width="100%" height="10"></canvas>
                            <div class="form-group">
                <strong></strong>
                <img src="{{ URL::to('/') }}/public/category/{{ $international->Image }}" style="height:230px; width:250px" />
            </div>
                            </div>
                            
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                              Details
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                            <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong>Country:</strong>
                {{ $international->country_name }}
            </div>
            <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong>Description:</strong>
                {!!$international->desc!!}
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



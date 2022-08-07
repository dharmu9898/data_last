@extends('layouts.toursidebar')

@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body{
  overflow-x:hidden;
  font-family: "Times New Roman", Times, serif;
}
.tab1{
margin-left:-4%;
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

th {
  font-size: 17px;
}
td {
  font-size: 17px;
}
.action
{
  padding-left:90px;
}



}
 .content3 {
  position: absolute;
  bottom: 0;
  font-size:18px;
  color: #f1f1f1;
  width: 100%;
  

}
/* @media only screen and (max-width: 1200px) {
  .tab1{
margin-left:0%;
}
} */
</style>
<br><br>

<div class="row mt-4">
      <div class="col-12">
    
       <div class="content3 mt-4 ">
{{-- messsage pop up open --}}
                      @if(session()->get('success'))
                      <div class="alert alert-success col-xl-9 col-9 col-sm-10 col-lg-10 col-md-10">
                          <button type="button" class="close" data-dismiss="alert"><span style="font-size:27px;"><b>×</b></span></button>
                          {{ session()->get('success') }}
                      </div>
                  @endif
                  <div class="col-xl-10 col-12 col-sm-10 col-lg-10 col-md-10">
                      @if(session()->get('danger'))
                          <div class="alert alert-danger">
                              <button type="button" class="close" data-dismiss="alert"><span style="font-size:27px;"><b>×</b></span></button>
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
                                      <button type="button" class="close" data-dismiss="alert"><span style="font-size:27px;"><b>×</b></span></button>
                                  <p class="text-center"> {{$error}}</p>
                          </div>
                              @endforeach
                          </ul>
                      </div>
                  @endif 


                  </div>
                           </div>                 <div class="col-12">
                        <div class="card">
                        <div class="col-12">
                            <button style="font-size:22px;margin-left:1px;border-radius:9px;" onclick="goBack()"> Back</button>
                        <h2  class="header"> My Profile </h2>
                        
                        
                        
                      
                    </div>
                            <div class="card-body">

                          
                     
      


                                                        <div class="table-responsive">

                                                      
                                <table id="myTable"  class="table table-bordered">
   <thead     style="color:black"><tr>
    
   


                                                  
                                                <th  class="mob">Name</th>
                                                <th >Country</th>
                                                <th >State</th>
                                                <th >City</th>
                                                <th >Email</th>
                                               
                                                <th >Action</th>
    </tr>
   </thead>
   <tbody style="color:black" id="myTable">
   @include('touroperator.pages_data')

   </tbody>
  </table> 
                                </div>
                                  </div>
                            </div>
                            </div>

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
       
@endsection
@push('js')

 <script>

function goBack() {

window.history.back();

  }

</script> 
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>  
    <script type="text/javascript" src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.parallax.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/smoothscroll.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.nav.js')}}"></script>   
    
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script> 
@endpush
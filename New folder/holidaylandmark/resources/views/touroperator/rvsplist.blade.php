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
/* @media only screen and (max-width: 1200px) {
  .tab1{
margin-left:0%;
}
} */
</style>

<div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="col-12">
                        <h2  class="header"> Subscriber List </h2>
                    </div>
                            <div class="card-body">

                          
                     
      


                                                        <div class="table-responsive">

                                                      
                                <table id="myTable"  class="table table-bordered">
   <thead     style="color:black"><tr>
    
   


                                                  
                                                <th  class="mob">Trip Title</th>
                                                <th >Total Count</th>
                                                                                              
                                             
    </tr>
   </thead>
   @foreach ($res as $tour)
   <tbody style="color:black" id="myTable">
   <tr>
   <td >{{ $tour->TripTitle }}</td>
   
   <td >{{ $tour-> total_member}} &nbsp;&nbsp;&nbsp;&nbsp;<a  class="btn btn-success" href="{{ route('touroperator.list',$tour->TripTitle) }}">List</a></td>
   
  
   </tr>

   </tbody>
   @endforeach
   <tfoot  style="color:black">
  
  <td >Total Subscriber</td>
  
  <td >{{ count($touroperator)}}</td>
  

  </tfoot>

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
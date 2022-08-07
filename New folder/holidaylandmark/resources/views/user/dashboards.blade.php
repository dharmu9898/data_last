@extends('layouts.usersidebar')

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
@media only screen and (max-width: 1412px) {
  .tab1{
margin-left:0%;
}
}
@media only screen and (max-width: 1300px) {
  .tab1{

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

  <div class="welcome">
    <div class="container-fluid">
      <div   style="margin-left: -30px;margin-right: -30px;" class="row">
   
        <div class="col-md-12 col-sm-12 col-12">
        <div class="card">
        <h1>Dashboard</h1>
                            <div  style ="padding: 0.3rem;"class="card-body">
                              . <div class="table-responsive m-t-20">
                                <table  style=" font-size: 18px;" class="table table-bordered table-responsive-sm">     
 
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
        
        </div>
      </div>
    </div>
  </div>


{{-- testing  --}}





                
            </div>
    <br>

   

   
@endsection
@push('js')
<script>
$(document).ready(function(){
  $("#manual_filter_tablesm").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
    
@endpush
 @extends('layouts.backend.app')

@section('content')
<div class="container-fluid">
        <div class="header-body">
<div class="container mt--6" >
<div class="row">
 <div class="col-md-11">
  <br/>
  <h1 align="center"><strong>My Requests List</strong></h1>
  <br/>
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
    <!-- Search Start -->
    <div class="input-group input-group-alternative input-group-merge mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" id="myInput"  placeholder="Search by name, country, state, city, concern" type="text">
              </div>
              <!-- Serach End -->

  <table class="table table-bordered table-striped"  style="width:100%"  >
   <thead><tr>
     <th scope="col">Name</th>
                <th scope="col">Country</th>
               <th scope="col">State</th>
               <th scope="col">City</th>                
               <th scope="col">Concern</th>
                     
     
    <th scope="col" width="15%" style="text-align:center;">Action</th>
   </tr>
   </thead>
   <tbody id="myTable">
  
  @include('socialrevolutionaries.myrequests_paginated_data')  
   </tbody>
  </table> 
  {!! $socialrevolutionaries->links() !!}
 </div>
</div>
</div>
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
@endpush



@extends('layouts.backend.app')

@section('content')
<h1 align="center">View Profile</h1>
<div align="right"><br>
  <a href=" {{ url()->previous() }}" class="btn btn-primary"> Go Back</a>
 </div>

 <div class="table-responsive">
 <table class="table table-striped table-bordered">  
     <tr>
          <th scope="row"><h3>Name </h3></th>
        <td><h3>{{$socialmembers->name}} </h3></td>
     </tr>
      <tr>
          <th scope="row"><h3>E-mail </h3></th>
          <td><h3>{{$socialmembers->email}} </h3></td>
      </tr>
       <tr>
          <th scope="row"><h3>Phone No. </h3></th>
          <td><h3>{{$socialmembers->phone}} </h3></td>
      </tr>
      <tr>
          <th scope="row"><h3>Country </h3></th>
          <td><h3>{{$socialmembers->country_name}} </h3></td>
      </tr>
       <tr>
          <th scope="row"><h3>State </h3></th>
          <td><h3>{{$socialmembers->state_name}} </h3></td>
      </tr>
       <tr>
          <th scope="row"><h3>City </h3></th>
          <td><h3>{{$socialmembers->city_name}} </h3></td>
      </tr> 
      <br>     
 </table>
 
</div>


@endsection
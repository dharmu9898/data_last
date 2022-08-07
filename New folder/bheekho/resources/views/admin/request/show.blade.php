@extends('layouts.backend.app')

@section('content')
<h1 align="center">View Request</h1>
<div class="table-responsive">
  <div align="right"><br>
  <a href=" {{ url()->previous() }}" class="btn btn-primary"> Go Back</a>
 </div>
 
 <div class="table-responsive">
 <table class="table table-striped table-bordered">  
 <tr>
  <th scope="row"><h3>Name </h3></th>
<td><p>{{$allrequests->name}} </p></td>
 </tr>
  <tr>
  <th scope="row"><h3>E-mail </h3></th>
  <td><p>{{$allrequests->email}} </p></td>
  </tr>
   <tr>
  <th scope="row"><h3>Phone No. </h3></th>
  <td><p>{{$allrequests->phone}} </p></td>
  </tr>
  <tr>
  <th scope="row"><h3>Country </h3></th>
  <td><p>{{$allrequests->country_name}} </p></td>
  </tr>
   <tr>
  <th scope="row"><h3>State </h3></th>
  <td><p>{{$allrequests->state_name}} </p></td>
  </tr>
   <tr>
  <th scope="row"><h3>City </h3></th>
  <td><p> {{$allrequests->city_name}} </p></td>
  </tr>
   <tr>
  <th scope="row"><h3>Concern </h3></th>
  <td><p>{{$allrequests->concern}} </p></td>
  </tr>
  <tr>
  <th scope="row"><h3>Message </h3></th>
  <td><p>{{$allrequests->message}} </p></td>
  </tr>
  <br>
 </table>
 <br>
</div>
</div>

@endsection
@extends('layouts.backend.app')

@section('content')
<h1 align="center">View Request</h1>
<div align="right"><br>
  <a href="{{url()->previous()}}" class="btn btn-primary">Go Back</a>
 </div> 
 <div  class="table-responsive">
 <table class="table table-striped table-bordered">
   <tbody>  

     <tr>
          <th scope="row"><h3>Name </h3></th>
        <td><p>{{$socialmembers->name}}</p> </td>
     </tr>
      <tr>
          <th scope="row"><h3>E-mail </h3></th>
          <td><p>{{$socialmembers->email}}</p> </td>
      </tr>
       <tr>
          <th scope="row"><h3>Phone No. </h3></th>
          <td><p>{{$socialmembers->phone}}</p> </td>
      </tr>
      <tr>
          <th scope="row"><h3>Country </h3></th>
          <td><p>{{$socialmembers->country_name}}</p> </td>
      </tr>
       <tr>
          <th scope="row"><h3>State</h3></th>
          <td><p>{{$socialmembers->state_name}} </p></td>
      </tr>
       <tr>
          <th scope="row"><h3>City </h3></th>
          <td><p>{{$socialmembers->city_name}} </p></td>
      </tr>
       <tr>
          <th scope="row"><h3>Your Concern </h3></th>
          <td><p>{{$socialmembers->concern}} </p></td>
      </tr>
      <tr>
          <th scope="row" ><h3>Your Message </h3></th>
          <td><p>{{$socialmembers->message}}</p></td>
      </tr>
      <br>
    </tbody>  
 </table>

</div>


@endsection
@extends('layouts.backend.app')

@section('content')
<h1 align="center">View Profile</h1>
 <div align="right"><br>
  <a href="{{url()->previous()}}" class="btn btn-primary">Go Back</a>
 </div>
 
 <div class="table-responsive">
 <table class="table table-striped table-bordered">  
     <tr>
          <th scope="row"><h3>Name</h3></th>
        <td><p>{{$socialrevolutionaries->name}} </p></td>
     </tr>
      <tr>
          <th scope="row"><h3>E-mail</h3></th>
          <td><p>{{$socialrevolutionaries->email}} </p></td>
      </tr>
       <tr>
          <th scope="row"><h3>Phone No.</h3></th>
          <td><p>{{$socialrevolutionaries->phone}} </p></td>
      </tr>
      <tr>
          <th scope="row"><h3>Country</h3></th>
          <td><p>{{$socialrevolutionaries->country_name}} </p></td>
      </tr>
       <tr>
          <th scope="row"><h3>State</h3></th>
          <td><p>{{$socialrevolutionaries->state_name}} </p></td>
      </tr>
       <tr>
          <th scope="row"><h3>City</h3></th>
          <td><p> {{$socialrevolutionaries->city_name}} </p></td>
      </tr>
       <tr>
          <th scope="row"><h3>Your Concern</h3></th>
          <td><p>{{$socialrevolutionaries->concern}} </p></td>
      </tr>
      <tr>
          <th scope="row"><h3>Your Message</h3></th>
          <td><p>{{$socialrevolutionaries->message}} </p></td>
      </tr>
      <br>
 </table>
 <br><br>
</div>


@endsection
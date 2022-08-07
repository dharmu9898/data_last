@extends('layouts.backend.app')

@section('content')
<h1 align="center">View Profile</h1>
  <div align="right"><br>
  <a href=" {{ url()->previous() }}" class="btn btn-primary"> Go Back</a>
 </div>

 <div class="table-responsive">
 <table class="table table-striped table-bordered">  
     <tr>
          <th><h3>Name </h3></th>
        <td><p>{{$social_revolutionaries->name}} </p></td>
     </tr>
      <tr>
          <th><h3>E-mail </h3></th>
          <td><p>{{$social_revolutionaries->email}} </p></td>
      </tr>
       <tr>
          <th><h3>Phone No. </h3></th>
          <td><p>{{$social_revolutionaries->phone}} </p></td>
      </tr>
      <tr>
          <th><h3>Country </h3></th>
          <td><p>{{$social_revolutionaries->country_name}} </p></td>
      </tr>
       <tr>
          <th><h3>State </h3></th>
          <td><p>{{$social_revolutionaries->state_name}} </p></td>
      </tr>
       <tr>
          <th><h3>City </h3></th>
          <td><p> {{$social_revolutionaries->city_name}} </p></td>
      </tr>
      <br>
 </table>
 
</div>


@endsection
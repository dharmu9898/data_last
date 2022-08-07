@extends('layouts.backend.app')

@section('content')
<div class="row">
 <div class="col-md-12">
  <br />
  <h1 align="center">Add Data</h1>
  <br />
  @if(count($errors) > 0)
  <div class="alert alert-danger">
   <ul>
   @foreach($errors->all() as $error)
    <li>{{$error}}</li>
   @endforeach
   </ul>
  </div>
  @endif
  @if(\Session::has('success'))
  <div class="alert alert-success">
   <p>{{ \Session::get('success') }}</p>
  </div>
  @endif

  <form method="post" action="{{action('SocialMember\SocialMemberController@update', auth::user()->id)}}" enctype="multipart/form-data">
   {{csrf_field()}}
   <!-- <div class="form-group">    -->
   <div class="form-group">
    <input type="text" name="phone" class="form-control" placeholder="Enter Your Phone Number With Country Code" value="{{ old("phone")}}"/>
   </div>
   <div class="form-group">
   <select name="country" class="form-control-2 countries" id="countryId">
    <option value="">Select Country</option>
</select>
   </div>   
   <div class="form-group">
   <select name="state" class="form-control-2 states" id="stateId">
    <option value="">Select State</option>
</select>
   </div>
   <div class="form-group">
   <select name="city" class="form-control-2 cities" id="cityId">
    <option value="">Select City</option>
</select>
   </div>
       
   

   <!-- <div class="form-group">
    <input type="file" name="image"  placeholder="Select Profile Image"  />
   </div> -->
   <div class="form-group">
    <input type="submit" class="btn btn-primary"  />
   </div>
  </form>
 </div>
</div>
@endsection

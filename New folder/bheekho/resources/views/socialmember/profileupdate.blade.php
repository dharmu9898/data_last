@extends('layouts.backend.app')

@section('content')

<div class="row">
 <div class="col-md-11">
 
  <h1 align="center">Profile Update</h1>
  
  <br />
  <div id="mydiv">
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
</div>
  </div>
  <div class="container">
  <form method="post" action="{{action('SocialMember\SocialMemberController@profileupdate', auth::user()->id)}}" >
     {{csrf_field()}}
     {{ method_field('PUT') }}
     <input type="hidden" name="_method" value="POST" />
     <div class="form-group">
      <input type="text" name="name" class="form-control" value="{{$socialmembers->name}}" placeholder="Enter Name"  />
     </div>
     <div class="form-group">
      <input type="text" name="email" class="form-control" value="{{$socialmembers->email}}" placeholder="Enter Your E-mail" disabled />
     </div>
     <div class="form-group">
      <input type="text" name="phone" class="form-control" value="{{$socialmembers->phone}}" placeholder="Enter Your Phone Number With Country Code"  />
     </div>
                        <div class="form-group">                                    
                                <select name="country" class="updatecountries form-control-2 w-100 p-2" id="updatecountryId" value="{{old('country')}}">  
                                  <option value="{{$country->country_id}}"> {{$country->country_name}} </option>      
                                  <option value=""> Select Country </option>
                                </select>
                                <select name="" class="countries form-control-2 w-100 p-2" id="countryId">        
                                  <option value="" >Select Country </option>
                                </select>
                             </div>                            
                            <div class="form-group"> 
                                                         
                                <select name="state" class="updatestates form-control-2 w-100 p-2" id="updatestateId" >
                                  <option value="{{$state->state_id}}"> {{$state->state_name}}</option>
                                  <option value="">Select State</option>
                                </select>
                                <select name="" class="states form-control-2 w-100 p-2" id="stateId" >
                                  <option value="">Select State</option>
                                </select>
                              </div>
                            
                            <div class="form-group"> 
                                                            
                                <select name="city" class="updatecities form-control-2 w-100 p-2" id="updatecityId">
                                  <option value="{{$city->city_id}}" > {{$city->city_name}}</option>
                                  <option value="">Select City</option>
                                </select>
                                <select name="" class="cities form-control-2 w-100 p-2" id="cityId">
                                  <option value="">Select City</option>
                                </select>
                              
                            </div>
       <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Update" />
    <a href="{{ route('socialmember.dashboard') }}" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>Back</a>
   </div>
  </form>
  </div>
 </div>





    
@endsection
@push('js')
<script> 
              $(document).ready(function(){
                $(".countries").hide();
                $(".states").hide();
                $(".cities").hide();
                $( ".updatecountries" ).change(function() {
              $(".updatecountries").hide();
              $(".countries").show();
              $('.countries').attr('name', 'country');
               $(".updatestates").hide();
              $(".states").show();
              $('.states').attr('name', 'state');
              $(".updatecities").hide();
              $(".cities").show();
              $('.cities').attr('name', 'city');
            });
          });
      
  setTimeout(function() {
    $('#mydiv').fadeOut('fast');
}, 3000); // <-- time in milliseconds
</script>

@endpush  
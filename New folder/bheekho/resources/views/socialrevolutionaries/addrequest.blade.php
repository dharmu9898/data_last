@extends('layouts.backend.app')

@section('content')
<div class="row mt--6 ">
 <div class="col-md-11">
  <br />
  <h1 align="center">Add a New Request </h1>
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

  <form method="POST" action="{{action('SocialRevolutionaries\SocialRevolutionaryController@addnewrequest', auth::user()->id)}}" enctype="multipart/form-data">
   {{csrf_field()}}   
    
 
       <div class="form-group">   
    		<select class="form-control-2" type="concern" name="concern">
           <option value="">--Select Your Consern--</option>
          @foreach(App\AdminCategory::all() as $cat)
          <option value="{{$cat->category}}" >{{$cat->category}}</option>
           @endforeach                                        
            </select>
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
   <div class="form-group">
    <textarea type="text" rows="7" name="message" class="form-control" placeholder="Describe Your Issues" value="{{old("message")}}" ></textarea>
   </div>
   
   <div class="form-group">
    <input type="submit" class="btn btn-primary"  />
   </div>
  </form>
 </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
  setTimeout(function() {
    $('#mydiv').fadeOut('fast');
}, 3000); // <-- time in milliseconds


</script>
@endpush
@extends('layouts.toursidebar')
@section('content')
<!-- <div class="container-fluid">    -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />

 


 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />



<style>
body{
  overflow-x:hidden;
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
margin-left:2%;
}
}

.myrow
{
    margin-left: 185px;




}
.updatecountries,.updatestates,.updatecities{
  display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.imgss {
  border: 1px solid #ccc;
  width:100%;
  height: 40px;
  border:round;
  border-radius: 10px;
  background-color:white;
  margin-left:15px;
  margin-right:15px;
}
.countries,.states,.cities,.category{
display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  }
/* @media only screen and (max-width: 1200px) {
  .tab1{
margin-left:0%;
}
} */
</style>
<div  class="col-xl-10 col-12 col-sm-10 col-lg-10 col-md-10 tab1">
                      {{-- messsage pop up open --}}
                      @if(session()->get('success'))
                      <div class="alert alert-success col-xl-9 col-9 col-sm-10 col-lg-10 col-md-10">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          {{ session()->get('success') }}
                      </div>
                  @endif
                  <div class="col-xl-10 col-12 col-sm-10 col-lg-10 col-md-10">
                      @if(session()->get('danger'))
                          <div class="alert alert-danger">
                              <button type="button" class="close" data-dismiss="alert">×</button>
                              {{ session()->get('danger') }}
                          </div>
                      @endif
                  </div>
                  @if(count($errors) > 0)
                      <div class="row">
                          <div class="col-xl-10 col-12 col-sm-10 col-lg-10 col-md-10 error">
                              <ul>
                                  @foreach($errors->all() as $error)
                                  <div class="alert alert-danger">
                                      <button type="button" class="close" data-dismiss="alert">×</button>
                                  <p class="text-center"> {{$error}}</p>
                          </div>
                              @endforeach
                          </ul>
                      </div>
                  @endif 
          </div>


       

          <div class="container" style="padding:0% 10%;">
                <div class="row mt-5 shadow-sm p-3" style="
    color: #495057;
    background-color: #F8FAFC;
    border-color: none;">
                    <div class="col-md-12 mx-auto">
                        <div class="form-wrapper">
                            <div class="row">
                                <div class="col-md-12">
                                    <button style="font-size:22px;margin-left:1px;border-radius:9px;" onclick="goBack()"> Back</button>
                                    <h4>Update Trip</h4>
                                    
                                </div>
                            </div>
                            <form method="post" action="{{ route('touroperator.updategallery',$data->id) }}" enctype="multipart/form-data">
          @csrf  
                
                                <div style="margin-top: 30px;" class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <strong>Trip Category</strong>
<select class="category" name="category">
@foreach(App\TripCategory::all() as $cat)
                      <option  value="{{$cat->category}}">{{$cat->category}}</option>
                     
                    
                        @endforeach                                 
                        </select>      </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <strong>Trip Title:</strong>
             <input type="text" name="TripTitle" class="form-control"   value="{{ $data->TripTitle }}" placeholder="TripTitle" required>
        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <strong>Country:</strong>
                                      
                                     
         <select name="country" class="updatecountries form-control-2 w-100 p-2" id="updatecountryId" value="{{old('country')}}"  required>
            <option value="{{$country_id}}"> {{$country_name}} </option>
                     <option value=""   >Select Country </option>
                    </select>

                <select name="" class="countries form-control-2 w-100 p-2" id="countryId"  >
                   <option value=""   >Select Country </option>
                </select>
                                     </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <strong>State:</strong>
                                        <select name="state" class="updatestates form-control-2 w-100 p-2" id="updatestateId"  required >
                                                    <option value="{{$state_id}}"> {{$state_name}}</option>
                                                    <option value="">Select State</option>
                                                </select>
                                                <select name="" class="states w-100 p-2" id="stateId" >
                                                    <option value="">Select State</option>
                                                </select>     
                                                   </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <strong>City:</strong>
                                      
                                        <select name="city" class="updatecities form-control-2 w-100 p-2" id="updatecityId"  required>
                                                    <option value="{{$city_id}}"> {{$city_name}}</option>
                                                    <option value="">Select City</option>
                                                </select>
                                                <select name="" class="cities w-100 p-2" id="cityId">
                                                    <option value="">Select City</option>
                                                </select>        </div>
                                    </div>
                                   
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <strong>Number of days:</strong>

                                        <input type="text"  name="NoOfDays" class="form-control" pattern="[0-9]{1,2}days/[0-9]{1,2}night" title="starts with digit like 3days/4night"    value="{{ $data->NoOfDays }}" placeholder="NoOfDays(3days/4night)" required>                                    </div>
                                        </div>
                                   <div class="col-md-6">
                                        <div class="form-group">
                                        <strong>Date:</strong>

                                       

                                          <div class="input-group date"  >
                                          <input   type="datetime"  value="{{ $data->datetime }}"   onfocus="(this.type='date')" onblur="(this.type='text')" id="datepicker"  width="576"  name="datetime" class="form-control datetimepicker-input" required />
                              
                                            
                                            </div>
                                            
                                            </div>
                                            <script>
     $('#datepicker').datepicker({
         format: 'dd/mm/yy',
        
        uiLibrary: 'bootstrap'
     });
 </script>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Time:</strong>
                                        <div class="form-group">
       <div class="input-group date">
       <input id="timepicker" width="355" placeholder="hh:mm:ss" name="time" value="{{ $data->time }}" type="text" required />
   
 
           
          </div>
         <script>
      
        $('#timepicker').timepicker({
            uiLibrary: 'bootstrap4'
        });
     
    </script>  
          
                </div>
                                    </div>
                                    <div class="input-group hdtuto control-group lst increment" >

<input type="file" name="Image[]"  id="img"  style="display:none;"   class="myfrm form-control" >
<label class="imgss" for="img">{{ $data->Image }}</label>
<div  style="margin-left:15px;" class="input-group-btn"> 

<button  class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Upload</button>

</div>

</div>

<div class="clone hide">

<div class="hdtuto control-group lst input-group" style="margin-top:10px">

<input type="file" name="Image[]" class="myfrm form-control">

<div class="input-group-btn"> 

 <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>

</div>

</div>

</div>

<br>
<script type="text/javascript">

 $(document).ready(function() {

   $(".btn-success").click(function(){ 

       var lsthmtl = $(".clone").html();

       $(".increment").after(lsthmtl);

   });

   $("body").on("click",".btn-danger",function(){ 

       $(this).parents(".hdtuto control-group lst").remove();

   });

 });

</script>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <strong>Destination:</strong>
         
           
                                        <input type="text" name="Destination" class="form-control" value="{{ $data->Destination }}" placeholder="Destination">
      </div>
                                    </div>
                                    <div class="col-md-12">
                                   
                                    </div>
                                   
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <strong>Description:</strong>

   <textarea rows="3" cols="10"  class="form-control" id="Description"  name="Description" required>{{ $data->Description }}</textarea> 
      
</div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <strong>Trip Highlight:</strong>
                                        <textarea rows="10" cols="60" class="form-control" id="Keyword"     value="{{ old('Keyword') }}" name="Keyword" required>{{ $data->Keyword}}</textarea>   
             <script src="{{ asset('ckeditor/ckeditor.js') }}" required var editor = CKEDITOR.replace( 'Keyword', {
    language: 'en',
    extraPlugins: 'notification'
});

editor.on( 'required', function( evt ) {
    editor.showNotification( 'This field is required.', 'warning' );
    evt.cancel();
} ); ></script>
<script>
CKEDITOR.replace( 'Keyword' );
$("form").submit( function(e) {
            var messageLength = CKEDITOR.instances['Keyword'].getData().replace(/<[^>]*>/gi, '').length;
            if( !messageLength ) {
                alert( 'Please fill all field' );
                e.preventDefault();
            }
        });

</script>     </div>
                                    </div>
                                  
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <input type="submit" class="btn btn-dark"  />
        </div>
                                    </div>
                                    
                                </div>
                               
                            </form>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>








<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>


                        </div>
                    </div>
                </div>
            </div>


<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu  fa fa-list"></i></button>
<!-- ======= Header ======= -->





<div class="container">
<div class="row">



                  {{-- messsage pop up close --}}
<br><br>
                              
                            </div>
                          </div>
      <div>
    </div>
  </div>
   <script>

function goBack() {

window.history.back();

  }

</script> 
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
      </script> 

      <script type="text/javascript">
  setTimeout(function() {
    $('#mydiv').fadeOut('fast');
}, 3000); // <-- time in milliseconds
</script>
@endsection

  
                              
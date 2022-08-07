@extends('layouts.backend.app')

@section('content')
<div class="container-fluid">
        <div class="header-body">

<div class="container mt--6" >
<div class="row">
 <div class="col-md-11">
  <br/>
  <h1 align="center"><strong>Social Members Requests</strong></h1>
  <br/>
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
      <div class="form-group col-md-12"> 
      <div class="row">
      <div class="col-md-3">  
        <select class="form-control-2" name="manual_filter_table" id="manual_filter_table">
                      <option value="">--Select Your Consern--</option>
                      @foreach(App\AdminCategory::all() as $cat)
                      <option value="{{$cat->category}}" >{{$cat->category}}</option>
                      @endforeach                    
        </select>
      </div>


    <!-- Search Start --> 
    <div class="col-md-8">    
     <div class="input-group input-group-alternative input-group-merge mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" name="manual_filter_tablesm" id="manual_filter_tablesm" placeholder="Search by name, country, state, city, concern" type="text">
                </div>
              </div>
              <!-- Serach End -->
            </div>
          </div>


  <table class="table table-bordered table-striped" id="mytable" style="width:100%">
   <thead><tr>
     <th scope="col">Name</th>
                <th scope="col">Country</th>
               <th scope="col">State</th>
               <th scope="col">City</th>
               <th scope="col">Concern</th>
    
     
    <th scope="col" width="15%" style="text-align:center;">Action</th>
   </tr>
   </thead>
   <tbody>
   @include('socialrevolutionaries.paginated_data')
   </tbody>
  </table> 
  <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
 </div>
</div>
</div>
</div>
</div>
  






@endsection
@push('js')
<!-- manual filter -->
<script>  

    $(document).on('keyup', '#manual_filter_tablesm', function(){
            var manual_filter_tablesm = $('#manual_filter_tablesm').val();
            manual_filter = $("#manual_filter_table").val();
            var page = $('#hidden_page').val();
            fetch_data(page, manual_filter_tablesm, manual_filter);
           });

           
              
   
        $(document).ready(function() {   
              $("#manual_filter_table").change(function() {
                var manual_filter_tablesm = $('#manual_filter_tablesm').val();
                manual_filter = $("#manual_filter_table").val();
                 var page = $('#hidden_page').val();
                fetch_data(page, manual_filter, manual_filter_tablesm);
              })
            });
          
          $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
             var manual_filter_tablesm = $('#manual_filter_tablesm').val();
            var page = $(this).attr('href').split('page=')[1];
            manual_filter = $("#manual_filter_table").val();
            fetch_data(page, manual_filter, manual_filter_tablesm);
          });

        function fetch_data(page, manual_filter, manual_filter_tablesm)
            {
              $.ajax({
                  url:"{{ url('socialrevolutionaries/welcome_manualfilter')}}?page="+page+"&manual_filter_table="+manual_filter+"&manual_filter_tablesm="+manual_filter_tablesm,
                  success:function(data){
                  console.log(data);
                  $('#mytable tbody').html('');
                $('#mytable tbody').html(data);
                }
            });
            }
    </script>

    <script type="text/javascript">
  setTimeout(function() {
    $('#mydiv').fadeOut('fast');
}, 3000); // <-- time in milliseconds
</script>
@endpush

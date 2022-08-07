@extends('layouts.backend.app')

@section('content')
<div class="container">
    <div class="row">
 <div class="col-md-12">
              <div class="panel-heading text-center"><strong style="font-size: 25px;">Social Revolutionaries List </strong></div><br>

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
             
                  
              <!-- Search -->
               <div class="input-group input-group-alternative input-group-merge mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" id="myInput" placeholder="Search by name, country, state, city" type="text">
              </div>
              <!-- Search End -->

              <!-- Table Start -->
               <div class="table-responsive">
             <table class="table table-bordered table-striped display"   style="width:100%">
             <thead><tr>
             <th scope="col">Name</th>
                <th scope="col">Country</th>
               <th scope="col">State</th>
               <th scope="col">City</th>
                 
    
              <th scope="col" width="15%" style="text-align:center;">Action</th>
             </tr>
            </thead>
            <tbody id="myTable">
            @include('admin.socialrevolutionaries.paginated_data')
               </tbody>
            </table>
            {!! $social_revolutionaries->links() !!}
          </div>
          </div>
        </div>
      </div>

      

@endsection   

@push('js')
<script type="text/javascript">
  $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

  setTimeout(function() {
    $('#mydiv').fadeOut('fast');
}, 3000); // <-- time in milliseconds
</script>
@endpush       
@extends('layouts.backend.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
               <div class="panel-heading text-center"><strong style="font-size: 25px;">Add Help Category </strong></div>
               <br>
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
                <div class="panel-body text-center">
                    
                    <form method="post" action="{{action('Admin\AdminCategoryController@store', auth::user()->id)}}" enctype="multipart/form-data">
                  @csrf
    
                  <div class="form-group">
                    <input type="text" name="category" class="form-control" placeholder="Enter New Category"/>
                  </div> 
                      
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary"  />
                  </div>
                  </form>
                </div>
            </div>
        </div>
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

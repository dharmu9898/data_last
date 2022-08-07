@extends('layouts.adminsidebar')

@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body{
  overflow-x:hidden;
  font-family: "Times New Roman", Times, serif;
}
.tab1{
margin-left:-4%;
}

table{
    font-family: "Times New Roman", Times, serif;
}
th{
    font-family: "Times New Roman", Times, serif;

}
td{
    font-family: "Times New Roman", Times, serif;

}

tr{
    font-family: "Times New Roman", Times, serif;

}
.myrow
{
    margin-left:275px;  
}

th {
  font-size: 17px;
}
td {
  font-size: 17px;
}
.action
{
  padding-left:90px;
}



}
/* @media only screen and (max-width: 1200px) {
  .tab1{
margin-left:0%;
}
} */
</style>

<div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="col-12">
                       
                    </div>
                            <div class="card-body">

                          
                     
      


                            <div  class="col-md-11">
                                <button style="font-size:22px;margin-left:1px;border-radius:9px;" onclick="goBack()"> Back</button>
                            <h2  class="header"> Subscriber Trip List </h2>
          <div style="margin-top: 30px;" class="content">
          @foreach ($data as $tour)
          <form  action="{{ route('admin.updatervsp') }}" enctype="multipart/form-data">
         
          @endforeach
          {!! csrf_field() !!}

          
          <div class="table-responsive">

                                                      
      <table id="myTable"  class="table table-bordered">
            <thead     style="color:black"><tr>
   <th style="text-align:centre; font-size:25px;" width="250px">All<input type="checkbox" id="select-all" name="selectAll" value="all" ></th>

     <th  >Name</th>
            <th  >Email</th>
            <th  >Phone</th>
             <th  >Address</th>
           
            
                    
                              
   </tr>
   </thead>
   <tbody   style="color:black" id="myTable">
   @php($i=1)
   @foreach ($data as $tour)
        <tr>

        <td > <input type="checkbox" id="select-row" onclick ="CheckAll(this)"  value1="{{ $tour->Name }}"
         value="{{$tour->emailid}}"  name1="rv_id[]" name="rvsp_id[]">  </td>


        <td  ><input type="checkbox" style="display:none;"
          value="{{ $tour->Name }}" name="rv_id[]"> {{ $tour->Name }}</td>
            <td  >{{ $tour->emailid }}</td>
          
            <td ><input type="checkbox" style="display:none;"
          value="{{ $tour->Phoneno }}" name="rvp_id[]">{{ $tour->Phoneno }}</td>
            
            <td ><input type="checkbox" style="display:none;"
          value="{{ $tour->Address }}" name="rva_id[]"> <input type="checkbox" style="display:none;"
          value="{{ $tour->TripTitle }}" name="rvt_id[]">{{ $tour->Address }}</td>
            
        
                           



        </tr>
        @php($i++)
        @endforeach



   </tbody>
  </table> 
  </div>

  <button type="submit"  class="btn btn-dark" class="checkbox" style="float: right;line-height: 1.4;margin-left:20px;">Submit</button>



</form>
</div>
      </div>
    </div>
                                  </div>
                            </div>
                            </div>

                            <div class="col-lg-12 margin-tb">
        <div class="pull-right">
           
        </div>
                        <div class="pull-right">
                             @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
            </div>
        </div>
        <script type ="text/javascript">
    function CheckAll(obj)
    {
        var row = obj.parentNode.parentNode;
        var inputs = row.getElementsByTagName("input") ;
        for(var i=0;i<inputs.length;i++)
        {
            if(inputs[i].type=="checkbox")
            {
                inputs[i].checked=obj.checked;
            }
        }
    }
</script> 
    <script>
$(document).ready(function() {
  $('#select-all').click(function() {
    $('input[type="checkbox"]').prop('checked', this.checked);
  })

 
});
</script> 
 
@endsection
@push('js')

 <script>

function goBack() {

window.history.back();

  }

</script> 
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>  
    <script type="text/javascript" src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.parallax.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/smoothscroll.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.nav.js')}}"></script>   
    
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script> 
@endpush
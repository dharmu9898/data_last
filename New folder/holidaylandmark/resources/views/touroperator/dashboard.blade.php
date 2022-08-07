@extends('layouts.toursidebar')
@section('content')
<style>
body {
    overflow-x: hidden;
    font-family: "Times New Roman", Times, serif;
}

.tab1 {
    margin-left: -4%;
}

@media only screen and (max-width: 1412px) {
    .tab1 {
        margin-left: 0%;
    }
}

@media only screen and (max-width: 1300px) {
    .tab1 {
        margin-left: 2%;
    }
}

table {
    font-family: "Times New Roman", Times, serif;
}

th {
    font-family: "Times New Roman", Times, serif;
    font-size: 50px;
}

td {
    font-family: "Times New Roman", Times, serif;
}

tr {
    font-family: "Times New Roman", Times, serif;
}

.myrow {
    margin-left: 275px;
}

/* @media only screen and (max-width: 1200px) {
  .tab1{
margin-left:0%;
}
} */
</style>
{{-- testing  --}}
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
<div class="form-group col-md-12">
    <div class="myrow">
        <!-- Search Start -->

        <!-- Serach End -->
    </div>
</div>



</div>
<br>


<table style="width:70%; margin-left:350px;margin-top:100px;" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="font-size:20px;">Country</th>
            <th style="font-size:20px;">State</th>
            <th style="font-size:20px;">City</th>
            <th style="font-size:20px;">Email</th>
            <th style="font-size:20px;">Phone No</th>

            <th style="text-align:centre;font-size:20px;" width="250px">Action</th>
        </tr>
    </thead>
    <tbody id="myTable">
        @include('touroperator.paginated_data')

    </tbody>
</table>
@foreach ($gallery as $gall)
@if(Auth::user()->email==$gall->email)
<h2>Total Subscriber:{{ $sub }}</h2> @break;
@endif

@endforeach
{!! $gallery->links() !!}

@endsection
@push('js')
<script>
$(document).ready(function() {
    $("#manual_filter_tablesm").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>

@endpush
@extends('layouts.adminsidebar')

@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
    overflow-x: hidden;
    font-family: "Times New Roman", Times, serif;
}

.tab1 {
    margin-left: -4%;
}

table {
    font-family: "Times New Roman", Times, serif;
}

th {
    font-family: "Times New Roman", Times, serif;

}

td {
    font-family: "Times New Roman", Times, serif;

}

tr {
    font-family: "Times New Roman", Times, serif;

}

.myrow {
    margin-left: 235px;
}

th {
    font-size: 16px;
}

td {
    font-size: 16px;
}

.action {
    padding-left: 70px;
}

.table td,
.table th {

    font-size: 15px;
    padding: .rem;
}

.btn {

    padding: .002rem .25rem;
    font-size: 0.9rem;
    line-height: 1.2;
}

.content3 {
    position: absolute;
    bottom: 0;
    font-size: 18px;
    color: #f1f1f1;
    width: 100%;


}


/* @media only screen and (max-width: 1200px) {
  .tab1{
margin-left:0%;
}
} */
</style>
<br><br>

<div class="row mt-4">
    <div class="col-12">

        <div class="content3 mt-4 ">
            {{-- messsage pop up open --}}
            @if(session()->get('success'))
            <div class="alert alert-success col-xl-9 col-9 col-sm-10 col-lg-10 col-md-10">
                <button type="button" class="close" data-dismiss="alert"><span
                        style="font-size:27px;"><b>×</b></span></button>
                {{ session()->get('success') }}
            </div>
            @endif
            <div class="col-xl-10 col-12 col-sm-10 col-lg-10 col-md-10">
                @if(session()->get('danger'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert"><span
                            style="font-size:27px;"><b>×</b></span></button>
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
                            <button type="button" class="close" data-dismiss="alert"><span
                                    style="font-size:27px;"><b>×</b></span></button>
                            <p class="text-center"> {{$error}}</p>
                        </div>
                        @endforeach
                    </ul>
                </div>
                @endif


            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="col-12">
                    <h2 class="header"> Trip Feature </h2>

                </div>
                <div class="card-body">




                    <div class="card-body shadow" style="border-bottom:3px solid red;">

                        @foreach ($gallery as $gall)
                        <form action="{{ route('admin.updates') }}" enctype="multipart/form-data">

                            @endforeach
                            {!! csrf_field() !!}




                            <div class="table-responsive">

                                <table id="myTable" class="table table-bordered table-striped bg-light"
                                    style="color:white; border:none">
                                    <thead class="bg-light" style="color:black">
                                        <tr>



                                            <th class="mob"> All<input type="checkbox" id="select-all" name="selectAll"
                                                    value="all"
                                                    style="width: 2.0em;height: 1.0em; border: 2px solid red;"></th>
                                            <th>Permission</th>

                                            <th class="mob">Image</th>
                                            <th> Title</th>
                                            <th>Country</th>
                                            <th>state</th>
                                            <th>City</th>


                                        </tr>
                                    </thead>
                                    <tbody style="color:black" id="myTable">
                                        @php($i=1)
                                        @foreach ($gallery as $gall)
                                        <tr>
                                            <td> <input type="checkbox" onclick="CheckAll(this)"
                                                    style="width: 2.0em;height: 1.0em; border: 1px solid #a9a9a9;"
                                                    value="{{ $gall->id }}" name="Perm[]"> </td>
                                            <td> <input type="checkbox" style="display:none;"
                                                    value="{{ $gall->Permission }}" name="Permission[]">
                                                {{ $gall->Permission }}</td>
                                            <td>
                                                <?php
       foreach (json_decode($gall->Image)as $picture) { ?>
                                                <img class="center" src="{{ asset('public/image/'. $picture) }}"
                                                    style="height:35px;  width:60px;border-radius: 5px; transition: .3s;cursor: pointer;" />

                                                @break <?php 
            
           
            
            } ?>
                                            </td>

                                            <td> {{str_limit($gall->TripTitle, 35)}}</td>
                                            <td>{{str_limit($gall->country_name, 12)}}</td>
                                            <td>{{str_limit($gall->state_name, 12)}}</td>
                                            <td>{{str_limit($gall->city_name, 12)}}</td>



                                            </td>






                                        </tr>
                                        @php($i++)
                                        @endforeach
                                    </tbody>
                                </table>

                                <button type="submit" class="btn btn-primary ml-4" class="checkbox"
                                    style="float: right;height: 1.5em;font-size:20px;">Submit</button>

                                {!! $gallery->links() !!}




                            </div>

                        </form>
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
        <script type="text/javascript">
        function CheckAll(obj) {
            var row = obj.parentNode.parentNode;
            var inputs = row.getElementsByTagName("input");
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].type == "checkbox") {
                    inputs[i].checked = obj.checked;
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
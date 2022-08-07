@extends('layouts.adminsidebar')

@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="{{ asset('css/adminindex.css') }}" rel="stylesheet">
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
                    <div class="text-left upgrade-btn">
                        <a href="{{ route('admin.addinternationaltour') }}"
                            style="font-size:16px;padding:4px;width: 180px;" class="btn btn-primary text-white"> Add
                            International Tour</a>&nbsp;&nbsp;

                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="col-md-2">
                            <select name="country_filter" class="form-control" id="country_filter">
                                <option value="all" class="form-control cnfontsize_2">All Country</option>
                                @foreach(App\Destination::all() as $cat)
                                <option value="{{$cat->slug}}">{{$cat->slug}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-striped bg-light"
                                style="color:white; border:none">
                                <thead class="bg-light" style="color:black">
                                    <tr class="text-center">
                                        <th width="10%">Image</th>
                                        <th>Country</th>
                                        <th>Description</th>
                                        <th width="30%">Action</th>
                                    </tr>
                                <tbody style="color:black; font:blod; background:#ffff" id="myTable">

                                    @include('admin.paginations2_data')

                                </tbody>
                            </table>
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
            <script>
            function filter_data() {
                country_filter = $("#country_filter").val();
                $.ajax({
                    url: "{{ url('admin/tourcountry/welcome_country') }}?filter_country=" +
                        country_filter,
                    success: function(data) {
                        console.log(data);
                        $('#myTable tbody').html('');
                        $('#myTable tbody').html(data);
                    }
                })
            }
            $("#country_filter").change(function() {
                filter_data();
            });
            </script>
            @endsection
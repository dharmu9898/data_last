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
                    <br>
                    <div class="text-left upgrade-btn">
                        <a href="{{ route('admin.addtripcategory') }}" style="font-size:16px;padding:4px;width: 150px;"
                            class="btn btn-primary text-white">Add Category</a>&nbsp;&nbsp;
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="card-body">
                            <div class="col-md-2">
                                <select name="category_filter" class="form-control" id="category_filter">
                                    <option value="all" class="form-control cnfontsize_2">All Category</option>
                                    @foreach(App\TripCategory::all() as $cat)
                                    <option value="{{$cat->category}}">{{$cat->category}}</option>
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
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th width="30%">Action</th>
                                        </tr>
                                    <tbody style="color:black; font:blod; background:#ffff" id="myTable">
                                        @include('admin.paginations1_data')
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
                    category_filter = $("#category_filter").val();
                    $.ajax({
                        url: "{{ url('admin/tourcategory/welcome_category') }}?filter_category=" +
                            category_filter,
                        success: function(data) {
                            console.log(data);
                            $('#myTable tbody').html('');
                            $('#myTable tbody').html(data);
                        }
                    })
                }
                $("#category_filter").change(function() {
                    filter_data();
                });
                </script>
                @endsection
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
                    <h2 class="header"> Dashboard </h2>
                    <div class="text-left upgrade-btn">


                        <a href="{{ route('admin.list') }}" style="font-size:20px;padding:4px;width: 15%;"
                            class="btn btn-primary text-white"> Trip Permission</a>


                    </div>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <select class="form-control countries" name="manual_filter_table"
                                    id="manual_filter_table">
                                    <option value="">Select Your Country</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control states" name="manual_filter_table1"
                                    id="manual_filter_table1">
                                    <option value="">Select Your State</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control cities" name="manual_filter_table2"
                                    id="manual_filter_table2">
                                    <option value="">Select Your City</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <input type="text" class="form-control" name="manual_filter_tablesm" id="manual_filter_tablesm"
                            placeholder="Search Keyword.." style="font-size:18px;">
                    </div>


                    <div class="table-responsive">

                        <table id="myTable" class="table table-bordered table-striped bg-light"
                            style="color:white; border:none">
                            <thead class="bg-light" style="color:black">
                                <tr>





                                    <th class="mob">Image</th>
                                    <th> Title</th>
                                    <th>Country</th>
                                    <th>state</th>
                                    <th>City</th>
                                    <th>Subscriber</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="color:black" id="myTable">
                                @include('admin.paginations_data')
                            </tbody>
                        </table>

                        @foreach ($gallery as $gall)

                        <h2>Total Subscriber:{{ $sub }} &nbsp; &nbsp; &nbsp; &nbsp; Total Trip: {{ count($galleries) }}
                        </h2> @break;


                        @endforeach
                        {!! $gallery->links() !!}




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
        function welcome_fetch_data(page, manual_filter, manual_filter_tablesm) {



            $.ajax({
                url: "{{ url('admin/tripdetail/welcome_manualfilter')}}?page=" + page +
                    "&manual_filter_table=" + manual_filter + "&manual_filter_tablesm=" + manual_filter_tablesm,
                success: function(data) {

                    console.log(data);
                    $('#myTable tbody').html('');
                    $('#myTable tbody').html(data);
                }
            });
        }
        $(document).ready(function() {
            $("#manual_filter_table").change(function() {
                $('#manual_filter_tablesm').val('');
                var manual_filter_tablesm = $('#manual_filter_tablesm').val();
                manual_filter = $("#manual_filter_table").val();
                var page = $('#hidden_page').val();
                $('#manual_filter_table1 option').prop('selected', function() {
                    return this.defaultSelected;
                });
                $('#manual_filter_table2 option').prop('selected', function() {
                    return this.defaultSelected;
                });
                welcome_fetch_data(page, manual_filter, manual_filter_tablesm);
            })
        });
        $(document).ready(function() {
            $("#manual_filter_table1").change(function() {
                $('#manual_filter_tablesm').val('');
                var manual_filter_tablesm = $('#manual_filter_tablesm').val();
                manual_filter = $("#manual_filter_table1").val();
                var page = $('#hidden_page').val();
                $('#manual_filter_table option').prop('selected', function() {
                    return this.defaultSelected;
                });
                $('#manual_filter_table2 option').prop('selected', function() {
                    return this.defaultSelected;
                });
                welcome_fetch_data(page, manual_filter, manual_filter_tablesm);
            })
        });
        $(document).ready(function() {
            $("#manual_filter_table2").change(function() {
                $('#manual_filter_tablesm').val('');
                var manual_filter_tablesm = $('#manual_filter_tablesm').val();
                manual_filter = $("#manual_filter_table2").val();
                var page = $('#hidden_page').val();
                $('#manual_filter_table option').prop('selected', function() {
                    return this.defaultSelected;
                });
                $('#manual_filter_table1 option').prop('selected', function() {
                    return this.defaultSelected;
                });
                welcome_fetch_data(page, manual_filter, manual_filter_tablesm);
            })
        });
        $(document).on('keyup', '#manual_filter_tablesm', function() {

            var manual_filter_tablesm = $('#manual_filter_tablesm').val();
            manual_filter = $("#manual_filter_table").val();
            var page = $('#hidden_page').val();
            $('#manual_filter_table option').prop('selected', function() {
                return this.defaultSelected;
            });
            $('#manual_filter_table1 option').prop('selected', function() {
                return this.defaultSelected;
            });
            $('#manual_filter_table2 option').prop('selected', function() {
                return this.defaultSelected;
            });
            welcome_fetch_data(page, manual_filter, manual_filter_tablesm);
        });
        </script>

        @endsection
@extends('layouts.toursidebar')

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
                        <a href="{{ route('touroperator.addimage') }}" style="font-size:16px;padding:4px;width: 150px;"
                            class="btn btn-primary text-white">AddImage</a>&nbsp;&nbsp;

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered table-striped bg-dark" style="color:white; border:none">
                            <tr class="text-center">

                                <th width="10%">Image</th>
                                <th>Trips</th>
                                <th width="30%">Action</th>
                            </tr>
                            @foreach($gallery as $employee)
                            <tbody style="color:black; font:blod; background:#ffff">
                                <tr class="text-center">
                                    <td><img src="{{ URL::to('/') }}/public/images/{{ $employee->image_name}}"
                                    class="rounded-circle" width="60" height="50"/></td>
                                    <td>{{ $employee->trips }}</td>
                                   
                                    <td width="25%">
                                        <!-- here is the button action side where you can edit . view and delete the employee record -->
                                        <form action="{{ route('touroperator.destroytripimage', $employee->id) }}" method="get">
                                            <a href="{{ route('touroperator.showtripsimage', $employee->id) }}"
                                                class="btn btn-sm btn-warning"><span class="fa fa-eye"></span> Show</a>
                                            <a href="{{ route('touroperator.edittripimage', $employee->id) }}"
                                                class="btn btn-sm btn-info"><span class="fa fa-edit"></span> Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><span
                                                    class="fa fa-trash"></span> Delete</button>
                                        </form>
                                        <!-- ends here -->
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
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


        @endsection
        @push('js')


        <script>
        $(document).ready(function() {
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
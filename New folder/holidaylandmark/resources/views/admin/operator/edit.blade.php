@extends('layouts.adminsidebar')
@section('content')
<!-- <div class="container-fluid">    -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css"
    integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<link href="{{ asset('css/mains.css') }}" rel="stylesheet">
<div class="col-xl-10 col-12 col-sm-10 col-lg-10 col-md-10 tab1">
    {{-- messsage pop up open --}}
    @if(session()->get('success'))
    <div class="alert alert-success col-xl-9 col-9 col-sm-10 col-lg-10 col-md-10">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session()->get('success') }}
    </div>
    @endif
    <div class="col-xl-10 col-12 col-sm-10 col-lg-10 col-md-10">
        @if(session()->get('danger'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
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
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <p class="text-center"> {{$error}}</p>
                </div>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="container-fluid">
        <div class="welcome">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="col-md-11">
                                <button style="font-size:22px;margin-left:1px;border-radius:9px;" onclick="goBack()">
                                    Back</button>
                                <h2 class="header"> Update Profile </h2>

                                <div style="margin-top: 20px;" class="content">
                                    <form method="post" action="{{ route('admin.operator.update',$data->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <strong>Name:</strong>
                                                <input type="text" class="form-control " value="{{ $data->name }}"
                                                    name="name" />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <strong>Country:</strong>
                                                <select name="country" class="updatecountries form-control-2 w-100 p-2"
                                                    id="updatecountryId" value="{{old('country')}}">
                                                    <option value="{{$country_id}}"> {{$country_name}} </option>
                                                    <option value="">Select Country </option>
                                                </select>
                                                <select name="" class="countries form-control-2 w-100 p-2"
                                                    id="countryId">
                                                    <option value="">Select Country </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <strong>State:</strong>
                                                <select name="state" class="updatestates form-control-2 w-100 p-2"
                                                    id="updatestateId">
                                                    <option value="{{$state_id}}"> {{$state_name}}</option>
                                                    <option value="">Select State</option>
                                                </select>
                                                <select name="" class="states w-100 p-2" id="stateId">
                                                    <option value="">Select State</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <strong>City:</strong>

                                                <select name="city" class="updatecities form-control-2 w-100 p-2"
                                                    id="updatecityId">
                                                    <option value="{{$city_id}}"> {{$city_name}}</option>
                                                    <option value="">Select City</option>
                                                </select>
                                                <select name="" class="cities w-100 p-2" id="cityId">
                                                    <option value="">Select City</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <strong>Phone No:</strong>
                                                <input type="mobile" placeholder="Phone" pattern="[123456789][0-9]{9}"
                                                    title="Phone number with 6-9 and remaing 9 digit with 0-9"
                                                    name="Phoneno" value="{{ $data->Phoneno }}" minlength="10"
                                                    maxlength="10" class="form-control" id="Phoneno" required>

                                            </div>

                                            <div class="form-group col-md-6">
                                                <strong>Experience:</strong>


                                                <select class="form-control" id="experience" name="experience"
                                                    value="{{ $data->Experience }}" required>
                                                    <option>{{ $data->Experience }}</option>
                                                    <option>0 years</option>
                                                    <option>1-5 years</option>
                                                    <option>6-10 years</option>
                                                    <option>10-15 years</option>
                                                    <option>15-20 years</option>
                                                    <option>20-25 years</option>
                                                    <option>25-30 years</option>
                                                    <option>above 30 years</option>
                                                </select>
                                            </div>
                                        </div>





                                        <div class="form-group">
                                            <input type="submit" class="btn btn-dark" />


                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>






                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
                            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
                        </script>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>

                        <script
                            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"
                            integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous">
                        </script>



                    </div>
                </div>
            </div>
        </div>


        <button type="button" class="mobile-nav-toggle d-xl-none"><i
                class="icofont-navigation-menu  fa fa-list"></i></button>
        <!-- ======= Header ======= -->





        <div class="container">
            <div class="row">



                {{-- messsage pop up close --}}
                <br><br>

            </div>
        </div>
        <div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $(".countries").hide();
        $(".states").hide();
        $(".cities").hide();
        $(".updatecountries").change(function() {
            $(".updatecountries").hide();
            $(".countries").show();
            $('.countries').attr('name', 'country');
            $(".updatestates").hide();
            $(".states").show();
            $('.states').attr('name', 'state');
            $(".updatecities").hide();
            $(".cities").show();
            $('.cities').attr('name', 'city');
        });
    });
    </script>

    <script type="text/javascript">
    setTimeout(function() {
        $('#mydiv').fadeOut('fast');
    }, 3000); // <-- time in milliseconds
    </script>
    <script>
    function goBack() {

        window.history.back();

    }
    </script>
    @endsection
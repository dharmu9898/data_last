@extends('layouts.adminsidebar')
@section('content')
<!-- <div class="container-fluid">    -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css"
    integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

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
                                <h2 class="header"> Add Tour Opertor </h2>
                                <div style="margin-top: 20px;" class="content">
                                    <form method="post" action="{{ route('admin.operator.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <strong>Name:</strong>
                                                <input type="text" class="form-control " value="{{ old('name') }}"
                                                    name="name" required />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <strong>Country:</strong>
                                                <select name="country" class="countries w-100 p-2" id="countryId"
                                                    value="{{old('country')}}" required>
                                                    <option value=""> Select Country </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <strong>State:</strong>
                                                <select name="state" class="states w-100 p-2" id="stateId"
                                                    value="{{old('state')}}" required>
                                                    <option value=""> Select state </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <strong>City:</strong>
                                                <select name="city" class="cities w-100 p-2" id="cityId"
                                                    value="{{old('city')}}" required>
                                                    <option value=""> Select City </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <strong>Phone No:</strong>
                                                <input type="mobile" name="Phoneno" value="{{ old('Phoneno') }}"
                                                    pattern="[123456789][0-9]{9}"
                                                    title="Phone number with 6-9 and remaing 9 digit with 0-9"
                                                    class="form-control" id="Phoneno" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <strong>Experience:</strong>
                                                <select class="form-control" id="experience" name="experience"
                                                    value="{{ old('Experience') }}" required>
                                                    <option label="Select a Experience"></option>
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
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <strong>Email:</strong>
                                                <input type="email" name="email" value="{{ old('email') }}"
                                                    class="form-control" id="emailid" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <strong>Password:</strong>
                                                <input type="text" name="password" minlength="8"
                                                    value="{{ old('password') }}" class="form-control" id="password"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-dark" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
                        </script>
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
    function check() {
        var pass1 = document.getElementById('Phoneno');
        var message = document.getElementById('message');
        var goodColor = "#0C6";
        var badColor = "#FF9B37";
        if (Phoneno.value.length != 10) {
            Phoneno.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = "required 10 digits, match requested format!"
        }
    }
    </script>
    <script>
    function goBack() {
        window.history.back();
    }
    </script>
    @endsection
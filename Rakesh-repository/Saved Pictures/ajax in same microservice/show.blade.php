@extends('layouts.home')

@section('content')

<style>
.col-md-3 {
    display: inline-block;
    margin-left: -4px;
}

.col-md-3 img {
    width: 100%;
    height: auto;
}

body .carousel-indicators li {

    background-color: blue;
    color: red;
}

body .carousel-control-prev-icon,
body .carousel-control-next-icon {

    background-color: blue;
    color: red;
}

body .no-padding {
    padding-left: 0;
    padding-right: 0;
}

.carousel-inner img {
    width: 100%;
    height: 100%;
}
body {
  font-family: Verdana, sans-serif;
  margin: 0;
}

* {
  box-sizing: border-box;
}

.row > .column {
  padding: 0 8px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.column {
  float: left;
  width: 25%;
}

/* The Modal (background) */
.modals {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: black;
}

/* Modal Content */
.modals-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 90%;
  max-width: 1200px;
}

/* The Close Button */
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

.mySlides {
  display: none;
}

.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

img {
  margin-bottom: -4px;
}

.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}

.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s;
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>

<br>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container-fluid ">
    <div class="row">
        <div style="padding:0px;" class="col-md-12">
            <img src="{{ URL::to('/') }}/category/{{ $gallery->image_name }}" class="d-block w-100"
                style="width:100%;height:500px;border-radius: 5px; transition: .3s;cursor: pointer;" />


            <div class="content3">
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



                <div class="content">

                    <h4><b> {{$gallery->daynight}}<b></h4>
                    <h1><b> {{$gallery->TripTitle}}</b></h1>
                    <h4><b> {{$gallery->Destination}}<b></h4>
                    <h4><b> {{$gallery->slug}}/{{$gallery->slug1}}/{{$gallery->slug2}}<b></h4>

                </div>

                <div style="float:right;" class="content1">

                </div>
            </div>
        </div>
    </div>
    <div id="ImageFormModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header container-fluid">
                    <h5 class="modal-title-image" id="TripimageModaltouropertor">Your Details Submit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="image_tour_result" aria-hidden="true"></span>
                    <div class="row">
                        <section class="col-12">
                            <form id="image_add_form" role="form" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Email address:</label>
                                            <input type="email" name="useremail" class="form-control" id="useremail"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password:</label>
                                            <input type="password" name="userpassword" class="form-control"
                                                id="userpassword" required>
                                        </div>
                                        <div class="form-group">
                                            <label></label>
                                            <input type="hidden" name="trip_image_action" id="trip_image_action" />
                                            <input type="hidden" name="TripsTitle" value="{{ $gallery->TripTitle }}"
                                                readonly class="form-control" id="TripsTitle" required>
                                            <input type="hidden" name="scountry" value="{{ $gallery->slug }}" readonly
                                                class="form-control" id="scountry" required>
                                            <input type="hidden" name="uemail" value="{{ $gallery->operator_email }}"
                                                readonly class="form-control" id="uemail" required>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" name="trip_image_action_button"
                                                id="trip_image_action_button" class="btn btn-primary btn-info-full"
                                                value="Add" />
                                        </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid  mt-2">
        <div class="row">
            <div style="padding:0px;" class="col-md-12" style="float:right;max-width:140px;">

                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog" style="width:40%;">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Your Details</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">


                                {{csrf_field()}}
                                <div class="modal-body">


                                    <div class="form-group">
                                        <label>Email address:</label>
                                        <input type="email" name="emailid" class="form-control" id="emailid" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input type="text" name="Name" class="form-control" id="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone No:</label>
                                        <input type="mobile" name="Phoneno" value="{{ old('Phoneno') }}"
                                            pattern="[123456789][0-9]{9}"
                                            title="Phone number with 6-9 and remaing 9 digit with 0-9"
                                            class="form-control" id="Phoneno" required>

                                    </div>
                                    <div class="form-group">
                                        <label>Address:</label>
                                        <input type="text" name="Address" class="form-control" id="Address" required>
                                    </div>

                                    <div class="form-group">
                                        <label></label>
                                        <input type="hidden" name="TripTitle" value="{{ $gallery->TripTitle }}" readonly
                                            class="form-control" id="TripTitle" required>
                                        <input type="hidden" name="email" value="{{ $gallery->operator_email }}"
                                            readonly class="form-control" id="email" required>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-secondary">Submit</button>
                                </div>
                                <form>
                        </div>
                    </div>
                </div>





                <div class="col-md-12">
                    <h5 class="card-header head4 " style="background-color:black;color:white;">
                        @if($pubs==1)
                        <span class="ml-5">
                            <button type="button" data-toggle="modal" data-target="#myModal"> Confirm|RVSP|I Would
                                attend</button> </span>
                        <span class="float-right mr-5">
                            If you are already user => <button type="button" name="create_trip_image"
                                id="create_trip_image">Login</button>
                        </span>
                        @endif
                        @if($pubs==-1)
                        <center>
                            <span style="text-align:center;">
                                <button style="background-color: red;" type="button"> Trip is expired</button> </span>
                        </center>
                        @endif
                        @if($pubs==0)
                        <center>
                            <span>
                                <button style="background-color: red;" type="button"> Trip is expired</button> </span>
                        </center>
                        @endif
                    </h5>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">


            <div class="content2">
                <button onclick="goBack()">Back</button>
            </div>
            <div class="row">
                <h2> <span style="margin-left:500px;color:#d34205;"> Explore Trip Details </span></h2>
                <div class="col-md-7">

                    <div class="card-body">
                        <div style="padding-left:10px;font-size:16px;" class="form-group">
                            <strong style="font-size:20px;color:#d34205;">Overview:</strong>
                            <br>
                            {!! $gallery->Description !!}
                        </div>
                        <div style="padding-left:10px;font-size:16px;" class="form-group">
                            <strong style="font-size:20px;color:#d34205;">Trip Highlight:</strong>
                            {!! $gallery->Keyword !!}
                        </div>

                        <div style="padding-left:10px;font-size:16px;" class="form-group">
                            <strong style="font-size:20px;color:#d34205;">Iternary Details:</strong><br>

                            @foreach ($iternary as $gall)

                            {{$gall->Days}}:&nbsp;&nbsp;&nbsp;{{$gall->location}}<div id="my"></div><span
                                id="jquery">{!!
                                $gall->explanation !!}</span>
                            @endforeach<br>


                            @foreach ($iternary1 as $gall1)

                            {{$gall1->Days}}:&nbsp;&nbsp;&nbsp;{{$gall1->location}}<div id="my2"></div><span
                                id="jquery2">{!!
                                $gall1->explanation !!}</span>
                            @endforeach<br>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mt-4 ">


                    <div id="demo" class="carousel slide" data-ride="carousel">

                        

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img  src="{{ URL::to('/') }}/category/{{ $gallery->image_name }}" onclick="openModal();currentSlide(1)" class="d-block w-100 hover-shadow cursor"
                                    style="width:100%;height:150px;border-radius: 5px; transition: .3s;cursor: pointer;" />
                            </div>

                            @foreach($image as $cat)
                            <div class="carousel-item ">
                                <img src="{{ URL::to('/') }}/category/{{ $cat->image_name }}"onclick="openModal();currentSlide(1)" class="d-block w-100 hover-shadow cursor"
                                    style="width:100%;height:150px;border-radius: 5px; transition: .3s;cursor: pointer;" />
                            </div>
                            @endforeach
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="dhaModal" class="modals">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modals-content">

    <div class="mySlides">
      <div class="numbertext">1 / 4</div>
      <img src="{{ URL::to('/') }}/category/{{ $gallery->image_name }}" style="width:100%">
    </div>
    @foreach($image as $cat)
    <div class="mySlides">
      <div class="numbertext">2 / 4</div>
      <img src="{{ URL::to('/') }}/category/{{ $cat->image_name }}" style="width:100%">
    </div>
    @endforeach
    
    
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div class="caption-container">
      <p id="caption"></p>
    </div>
 
    @foreach($image->take(4)  as $cat)
    <div class="column">
      <img class="demo cursor" src="{{ URL::to('/') }}/category/{{ $cat->image_name }}" style="width :100%;min-height:50%;" onclick="currentSlide(1)" alt="{{$gallery->TripTitle}}">
    </div>
    @endforeach
  </div>
</div>
    <div class="row">
        <div class="col-lg-10">
            <div id="umodal" class="modal fade" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h5 style="color:green;" class="tool-modal-title" id="republishModaltouropertor">your
                                message send successfully </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10">
            <div id="uerrormodal" class="modal fade" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h5 style="color:green;" class="tool-modal-title" id="republishModaltouropertor">pleaseclick
                                confirm button your email not exist </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </script>
    <script>
    function goBack() {

        window.history.back();

    }
    </script>
    <script>
    $(document).ready(function() {
        $("#jquery").hide();

        $("#my").append('<div class="expBut">+</div>');
        $("#my").click(function() {
            butVal = $(this).find(".expBut").text();
            if (butVal == '+') {
                $(this).parent().children("#jquery").slideDown('1000');
                $(this).find(".expBut").text('-');
            } else {
                $(this).parent().children("#jquery").slideUp('1000');
                $(this).find(".expBut").text('+');
            }

        });
    });
    $(document).ready(function() {

        $("#jquery2").show();
        $("#my2").append('<div class="expBut">+</div>');
        $("#my2").click(function() {
            butVal = $(this).find(".expBut").text();
            if (butVal == '+') {
                $(this).parent().children("#jquery2").slideDown('1000');
                $(this).find(".expBut").text('-');
            } else {
                $(this).parent().children("#jquery2").slideUp('1000');
                $(this).find(".expBut").text('+');
            }
        });
    });
    </script>
    <script>
    $('#create_trip_image').click(function() {
        console.log('working create_trip_image button');
        $('#tourimagetitle').show();
        $('#tourimages').show();
        $('#image_add_form')[0].reset();
        $('#image_tour_result').html('');
        $('.modal-title-image').text("Your Details Submit");
        $('#ImageFormModal').modal('show');
        $('#trip_image_action_button').val("Add");
        $('#trip_image_action').val("Add");
    });

    $('#image_add_form').on('submit', function(event) {
        event.preventDefault();
        if ($('#trip_image_action').val() == 'Add') {
            console.log("inside add");

            $.ajax({
                type: "post",

                url: "{{url('/stores')}}",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {

                    console.log(data);
                    if (data.success) {
                        $('#ImageFormModal').hide();
                        $('#umodal').modal('show');
                        setTimeout(function() {
                            window.location.reload(true);
                        }, 1200);

                    } else {
                        console.log('inside else part here');
                        $('#ImageFormModal').hide();
                        $('#uerrormodal').modal('show');
                        setTimeout(function() {
                            window.location.reload(true);
                        }, 1000);
                    }
                }
            });
        }
    });
    </script>

    <script>
    function openModal() {
        document.getElementById("dhaModal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("dhaModal").style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
    </script>
    @endsection
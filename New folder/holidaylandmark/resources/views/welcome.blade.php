<!DOCTYPE html>
<html lang="en">

<head>
    <title>Holidaylandmark</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Krona+One&display=swap');
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js"></script>
</head>

<body style="background-color:#fff">





    <div class="container-fluid fixed-top" style="height: 40px;background-color: #292930;" id="topContent">
        <div class="row">
            <div class="col-md-4 ">

                <a target="_blank" href="https://www.facebook.com/holidaylandmark"><i class="fa fa-facebook mt-2 mr-4"
                        style="font-size:20px; color:white;"></i></a>
                <a target="_blank" href="https://twitter.com/HolidayLandmark"><i class="fa fa-twitter mt-2 mr-4"
                        style="font-size:20px; color:white;"></i></a>
                <a target="_blank" href="https://www.instagram.com/holidaylandmark/"><i
                        class="fa fa-instagram mt-2 mr-4" style="font-size:20px;color:white;"></i></a>
                <a target="_blank" href="http://www.youtube.com/user/HolidayLandmark"><i class="fa fa-youtube mt-2 mr-4"
                        style="font-size:20px;color:white;"></i></a>
            </div>
            <div class="col-md-3 ">
            </div>
            <div class="col-md-2 ">
            </div>
            <div class="col-md-3 ">

                <a style="color:white;" href="mailto:mail@example.com"> <i class="fa fa-envelope mt-2 mr-4"
                        style="font-size:18px;color:white;">Info@HolidayLandmark.com</i></a>

            </div>

        </div>
    </div>
    <header>
        <nav style="background-color:#373B44;margin-top:-5px;" class="navbar navbar-expand-sm  navbar-dark fixed-top">

            <div class="container-fluid">
                <a class="navbar-brand" href="http://www.holidaylandmark.com"><img style="width:70%;height:70%" alt=""
                        src="{{ asset('assets/images/logo/holiday-landmark2.png') }}"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a style="color:white;" class="nav-link" href="http://www.holidaylandmark.com/">Trips</a>
                        </li>
                        <li class="nav-item">
                            <a style="color:white;" class="nav-link " href="{{ route('login') }}">Create Trips</a>
                        </li>
                        <li class="nav-item">
                            <a style="color:white;" class="nav-link"
                                href="http://www.holidaylandmark.com/india/index.html">India</a>
                        </li>
                        <li class="nav-item">
                            <a style="color:white;" class="nav-link "
                                href="http://www.holidaylandmark.com/blog">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a style="color:white;" class="nav-link "
                                href="http://www.holidaylandmark.com/cookbooks">Cookbooks</a>
                        </li>
                        <li class="nav-item">
                            <a style="color:white;" class="nav-link "
                                href="https://www.youtube.com/user/HolidayLandmark">Video</a>
                        </li>

                        <li class="nav-item">
                            @if (Route::has('login'))
                            <div class="top-right links ">
                                @auth
                                <a style="color:white;" href="{{ route('user.dashboard') }}" class="nav-link "> Hi
                                    {{ auth::user()->name }}</a>
                                @else

                                <a style="color:white;" href="{{route('login')}}" class="nav-link ">Login</a>
                                @endauth
                            </div>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            </div>
        </nav>

    </header>
    <br> <br> <br> <br> <br>



    <div class="container-fluid ">
        <div style="background-color:#fff;" class="row mt-4">
            <div class="col-md-12 ">



                <div class="card"
                    style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.4); transition: 0.4s;background-image: url('my.jpg');">
                    <center>
                        <h5 class="card-header head4" style="color:black;background-color:#ECF0F1;">Find Your Nearest
                            Tour
                        </h5>
                    </center>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <select class="form-control countries" name="manual_filter_table"
                                        id="manual_filter_table">
                                        <option value="">Select Your Country</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control states" name="manual_filter_table1"
                                        id="manual_filter_table1">
                                        <option value="">Select Your State</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control cities" name="manual_filter_table2"
                                        id="manual_filter_table2">
                                        <option value="">Select Your City</option>
                                    </select>


                                </div>
                                <div class="col-md-2">
                                    <select name="category_filter" class="form-control" id="category_filter">
                                        <option value="all" class="form-control cnfontsize_2">All Category</option>
                                        @foreach(App\TripCategory::all() as $cat)
                                        <option value="{{$cat->category}}">{{$cat->category }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="manual_filter_tablesm"
                                        id="manual_filter_tablesm" placeholder="Search Keyword.."
                                        style="font-size:18px;">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div id="mainWrap">
                    <div class="col-lg-12 bgtop-header">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 toptxt-head">
                                    <div>
                                        <h3 class="text-center mt-3 head4">Explore the Best Places and Travel
                                            Experiences</h3>
                                        <p class="text-center mt-4">Plan your Indian holiday with our collection of
                                            personalized India tour packages. Explore our collection of travel
                                            destinations or just select your holiday style. We also offer city breaks,
                                            staycations, destination weddings and private charters in select
                                            destinations across India.</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div style="background-color:#e5e4e5;" class="card ">
                    <div class="card-body">
                        <table style="border-color:white;" id="myTable">
                            <tbody id="myTable">
                                @include('pagess')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="container-fluid ">
        <div style="background-color:#fff;" class="row mt-4">
            <div class="col-md-12 ">
                <div id="mainWrap">
                    <div class="col-lg-12 bgtop-header">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 toptxt-head">
                                    <div>
                                        <h3 class="text-center mt-3 head4">Explore Popular Destination</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div style="background-color:#e5e4e5;" class="card ">
                    <div class="card-body">
                        <table style="border-color:white;">
                            <tbody>
                                <tr>
                                    <td style="border-radius:2px;">
                                        <div style="margin-right: 8px;" class="row">
                                            @foreach ($galleries as $indexKey=>$gall)
                                            <div class="col-md-4">

                                                <?php
                    foreach (json_decode($gall->Image)as $picture) { ?>

                                                <img class="w-100 py-1" style="height:160px;"
                                                    src="{{ asset('public/image/'. $picture) }}"
                                                    style="border-radius: 5px; transition: .3s;cursor: pointer;" />

                                                @break <?php 



} ?>

                                                <h1 class="centered"><a
                                                        href="{{ route('showcategory',[ 'name' => str_slug($gall->Category) ]) }}">
                                                        <b style="font-size:16px;">{{$gall->Category}}
                                                        </b></a> </h1>

                                                <button style="font-family: 'Krona One', sans-serif !important;"
                                                    id10={{ $indexKey }} id9={{ $indexKey }} id8={{ $indexKey }}
                                                    id7={{ $indexKey }} id6={{ $indexKey }} id5={{ $indexKey }}
                                                    id4={{ $indexKey }} id3={{ $indexKey }} id2={{ $indexKey }}
                                                    id1={{ $indexKey }} id={{ $indexKey }} class="centered4 "
                                                    data-id="{{$gall->TripTitle}}" data-id1="{{$gall->country_name}}"
                                                    data-id2="{{$gall->state_name}}" data-id3="{{$gall->city_name}}"
                                                    data-id4="{{ $gall->Destination }}"
                                                    data-id5=" {{ $gall->NoOfDays }}" data-id6="{{ $gall->datetime }}"
                                                    data-id7="{{ $gall->time }}" data-id8="{!!$gall->Keyword!!}"
                                                    data-id9="{{ $gall->Description  }}"
                                                    data-id10="{!!$gall->Iternary!!}" data-toggle="modal"
                                                    data-target="#myModal">
                                                    Detail
                                                </button>
                                                <div class="modal" id="myModal">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Trip Detail</h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>

                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <div class="card">
                                                                    <div class="card-body">

                                                                        <div style="padding-left:10px;font-size:16px;"
                                                                            class="form-group">
                                                                            <strong style="color:#d34205;">Trip
                                                                                Title:</strong>
                                                                            <strong id='candidate_name'></strong>
                                                                        </div>
                                                                        <div style="padding-left:10px;font-size:16px;"
                                                                            class="form-group">
                                                                            <strong style="color:#d34205;">Country
                                                                                Name:</strong>
                                                                            <strong id='country_name'></strong>
                                                                        </div>
                                                                        <div style="padding-left:10px;font-size:16px;"
                                                                            class="form-group">
                                                                            <strong style="color:#d34205;">State
                                                                                Name:</strong>
                                                                            <strong id='state_name'></strong>
                                                                        </div>
                                                                        <div style="padding-left:10px;font-size:16px;"
                                                                            class="form-group">
                                                                            <strong style="color:#d34205;">City
                                                                                Name:</strong>
                                                                            <strong id='city_name'></strong>
                                                                        </div>

                                                                        <div style="padding-left:10px;font-size:16px;"
                                                                            class="form-group">
                                                                            <strong
                                                                                style="color:#d34205;">Destination:</strong>
                                                                            <strong id='destination'></strong>
                                                                        </div>

                                                                        <div style="padding-left:10px;font-size:16px;"
                                                                            class="form-group">
                                                                            <strong style="color:#d34205;">No OF
                                                                                Days:</strong>
                                                                            <strong id='noofdays'></strong>
                                                                        </div>
                                                                        <div style="padding-left:10px;font-size:16px;"
                                                                            class="form-group">
                                                                            <strong
                                                                                style="color:#d34205;">Date:</strong>
                                                                            <strong id='date'></strong>
                                                                        </div>
                                                                        <div style="padding-left:10px;font-size:16px;"
                                                                            class="form-group">
                                                                            <strong
                                                                                style="color:#d34205;">Time:</strong>
                                                                            <strong id='time'></strong>
                                                                        </div>
                                                                        <div style="padding-left:10px;font-size:16px;"
                                                                            class="form-group">
                                                                            <strong style="color:#d34205;">Trip
                                                                                Highlight:</strong>
                                                                            <strong id='highlight'></strong>
                                                                        </div>
                                                                        <div style="padding-left:10px;font-size:16px;"
                                                                            class="form-group">
                                                                            <strong
                                                                                style="color:#d34205;">Description:</strong>
                                                                            <strong id='description'></strong>
                                                                        </div>
                                                                        <div style="padding-left:10px;font-size:16px;"
                                                                            class="form-group">
                                                                            <strong style="color:#d34205;">Iternary
                                                                                Details:</strong>
                                                                            <strong id='iternary'></strong>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="text-block1">
                                                    <h6><a
                                                            href="{{ route('showcountry',[ 'names' => str_slug($gall->slug2) ]) }}"><b>{{str_limit($gall->country_name, 15)}}</b></a>/<span><a
                                                                href="{{ route('showstate',['state' => ($gall->country_state)]) }}"><b>{{str_limit($gall->state_name, 15)}}</a></span>/<span><a
                                                                href="{{ route('showcity',[ 'city' => ($gall->country_state_city) ]) }}">{{str_limit($gall->city_name, 15)}}</a></span>
                                                        </b> </h6>

                                                </div>
                                            </div>

                                            @endforeach
                                        </div>
                                        <br>
                                    </td>
                                </tr>

                            </tbody>
                        </table>









                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>

    </div>




    <div class="container mt-4">
        <div class="row ">
            <div class="col-lg-12">






            </div>
        </div>
        <div id="mainWrap">
            <div class="col-lg-12 bgtop-header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 toptxt-head">
                            <div>
                                <h3 class="text-center mt-3 head4">Explore Travel Experiences</h3>
                                <p class="text-center mt-4">Plan your Indian holiday with our collection of personalized
                                    India tour packages. Explore our collection of travel destinations or just select
                                    your holiday style. We also offer city breaks, staycations, destination weddings and
                                    private charters in select destinations across India.</p>
                            </div>


                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-1">
            <div class="col-lg-12">



                <!-- Flickity HTML init -->
                <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true }'>
                    @foreach(App\TripCategory::all() as $cat)
                    <div class="gallery-cell"><img class="w-100 "
                            style="height:240px; padding-right:5px; width:270px;border-radius: 5px; transition: .3s;cursor: pointer;"
                            src="{{ URL::to('/') }}/public/category/{{ $cat->Image }}">
                        <div class="text-block">
                            <h5><a
                                    href="{{ route('showcategory',[ 'name' => str_slug($cat->category) ]) }}">{{ $cat->category }}</a>
                            </h5>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    </div>



    <br>

    <div id="mainWrap">
        <div class="col-lg-12 bgtop-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 toptxt-head">
                        <div>
                            <h3 class="text-center mt-3 head4">Explore International Tour</h3>
                            <p class="text-center mt-4">Plan your Indian holiday with our collection of personalized
                                India tour packages. Explore our collection of travel destinations or just select your
                                holiday style. We also offer city breaks, staycations, destination weddings and private
                                charters in select destinations across India.</p>
                        </div>




                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="container mt-1">
        <div class="row ">
            <div class="col-lg-12">






            </div>
        </div>
        <div class="row mt-1">
            <div class="col-lg-12">



                <!-- Flickity HTML init -->
                <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true }'>
                    @foreach(App\Destination::all() as $cat)
                    <div class="gallery-cell"><img class="w-100 "
                            style="height:240px; padding:1px;padding-right:5px; width:300px;border-radius: 5px; transition: .3s;cursor: pointer;"
                            src="{{ URL::to('/') }}/public/category/{{ $cat->Image }}">
                        <div class="text-block">
                            <h5><a
                                    href="{{ route('showcountry',[ 'name' => str_slug($cat->slug) ]) }}">{{ $cat->slug }}</a>
                            </h5>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    </div>
    <br>
    <div id="mainWrap">
        <div class="col-lg-12 bgtop-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 toptxt-head">
                        <div>
                            <h3 class="text-center mt-3 head4">Explore Famous State</h3>
                            <p class="text-center mt-4">Plan your Indian holiday with our collection of personalized
                                India tour packages. Explore our collection of travel destinations or just select your
                                holiday style. We also offer city breaks, staycations, destination weddings and private
                                charters in select destinations across India.</p>
                        </div>


                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="container mt-1">
        <div class="row ">
            <div class="col-lg-12">






            </div>
        </div>
        <div class="row mt-1">
            <div class="col-lg-12">



                <!-- Flickity HTML init -->
                <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true }'>
                    @foreach(App\AddState::all() as $cat)
                    <div class="gallery-cell"><img class="w-100 "
                            style="height:240px; padding:1px;padding-right:5px; width:300px;border-radius: 5px; transition: .3s;cursor: pointer;"
                            src="{{ URL::to('/') }}/public/category/{{ $cat->Image }}">
                        <div class="text-block">
                            <h5><a
                                    href="{{ route('showstate',[ 'state' => ($cat->country_state) ]) }}">{{ Str::ucfirst($cat->slug) }}</a>
                            </h5>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>

    <br>
    <div id="mainWrap">
        <div class="col-lg-12 bgtop-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 toptxt-head">
                        <div>
                            <h3 class="text-center mt-3 head4">Explore Famous Places</h3>
                            <p class="text-center mt-4">Plan your Indian holiday with our collection of personalized
                                India tour packages. Explore our collection of travel destinations or just select your
                                holiday style. We also offer city breaks, staycations, destination weddings and private
                                charters in select destinations across India.</p>
                        </div>


                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Flickity HTML init -->
    <!-- Flickity HTML init -->
    <div class="container mt-1">
        <div class="row ">
            <div class="col-lg-12">






            </div>
        </div>
        <div class="row mt-1">
            <div class="col-lg-12">



                <!-- Flickity HTML init -->
                <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true }'>
                    @foreach(App\AddCity::all() as $cat)
                    <div class="gallery-cell"><img class="w-100 "
                            style="height:230px; padding:1px;padding-right:5px; width:300px;border-radius: 5px; transition: .3s;cursor: pointer;"
                            src="{{ URL::to('/') }}/public/category/{{ $cat->Image }}">
                        <div class="text-block">
                            <h5><a
                                    href="{{ route('showcity',[ 'city' => ($cat->country_state_city) ]) }}">{{ $cat->slug }}</a>
                            </h5>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    </div>







    </section>


    <br>


    <!-- End Portfolio Section -->

    <!-- Start Text & image Section -->

    <br><br>
    <!-- End Text & image Section -->

    <!-- Start Latest Blog Section -->

    <!-- End Latest Blog Section -->




    <!-- Start Team Member Section -->

    <!-- End Team Member Section -->


    <!-- Start  Copyright Section -->
    <footer id="footer" class="d-flex-column bg-dark">
        <hr class="mt-0">
        <!--Social buttons-->
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <ul class="list-unstyled list-inline mt-3">





                        <li class="list-inline-item">
                            <a class="sbtn btn-large mx-2" href="https://www.facebook.com/holidaylandmark">
                                <i class="fa fa-facebook-square fa-2x"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="sbtn btn-large mx-2" href="https://www.linkedin.com/company/holidaylandmark/">
                                <i class="fa fa-linkedin fa-2x"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="sbtn btn-large mx-2" href="https://twitter.com/HolidayLandmark">
                                <i class="fa fa-twitter-square fa-2x"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="sbtn btn-large mx-2" href="http://www.youtube.com/user/HolidayLandmark">
                                <i class="fa fa-youtube-square fa-2x"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="sbtn btn-large mx-2" target="_blank"
                                href="https://www.instagram.com/holidaylandmark/"> <i
                                    class="fa fa-instagram-square fa-2x"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2">
                </div>
                <div class="col-lg-3">
                    <h6 class="text-white"><b>
                            Plan your holiday tour package.</b></h6>
                    <span>
                        <h1 class="text-white">holidaylandmark</h1>
                    </span>
                </div>
            </div>




            <!--/.Social buttons-->
            <hr class="bg-white">
            <!--Footer Links-->
            <div class="container text-left text-md-center">
                <div class="row">
                    <!--First column-->
                    <div class="col-md-2 mx-auto shfooter">
                        <a href="index.html" class=" mr-2" style="color:white">Home</a>
                    </div>
                    <!--/.First column-->

                    <!--Second column-->
                    <div class="col-md-2 mx-auto shfooter">
                        <a href="blog.html" class=" mr-2" style="color:white">Blog</a>
                    </div>
                    <!--/.Second column-->

                    <!--Third column-->
                    <div class="col-md-2 mx-auto shfooter">
                        <a href="holiday-landmarker.html" class=" mr-2" style="color:white">Holiday Landmarker</a>
                    </div>
                    <!--/.Third column-->

                    <!--Fourth column-->
                    <div class="col-md-2 mx-auto shfooter">
                        <a href="#" class=" mr-4" style="color:white">Destination</a>
                    </div>
                    <div class="col-md-2 mx-auto shfooter">
                        <a href="youtube.html" class="mr-2" style="color:white">You tube</a>
                    </div>
                    <div class="col-md-2 mx-auto shfooter">
                        <a href="contact.html" class="mr-2" style="color:white">Contact</a>
                    </div>
                    <!--/.Fourth column-->
                </div>
            </div>
            <!--/.Footer Links-->
            <hr class="bg-white">
            <!--Copyright-->
            <div class="py-3 text-center text-primary">
                Copyright
                <script>
                document.write(new Date().getFullYear())
                </script> <a href="#">HolidayLandmark.com</a> | reserved to no immitation
            </div>
            <!--/.Copyright-->
    </footer>
    <!-- End Copyright Section -->


    <script type="text/javascript">
    $('.centered4').click(function() {
        var a = '';
        if (typeof $(this).data('id') !== 'undefined') {

            a = $(this).data('id');
        }
        $('#candidate_name').html(a);

        var b = '';
        if (typeof $(this).data('id1') !== 'undefined') {

            b = $(this).data('id1');
        }
        $('#country_name').html(b);
        var c = '';
        if (typeof $(this).data('id2') !== 'undefined') {

            c = $(this).data('id2');
        }
        $('#state_name').html(c);
        var d = '';
        if (typeof $(this).data('id3') !== 'undefined') {

            d = $(this).data('id3');
        }
        $('#city_name').html(d);
        var e = '';
        if (typeof $(this).data('id4') !== 'undefined') {

            e = $(this).data('id4');
        }
        $('#destination').html(e);
        var f = '';
        if (typeof $(this).data('id5') !== 'undefined') {

            f = $(this).data('id5');
        }
        $('#noofdays').html(f);
        var g = '';
        if (typeof $(this).data('id6') !== 'undefined') {

            g = $(this).data('id6');
        }
        $('#date').html(g);
        var h = '';
        if (typeof $(this).data('id7') !== 'undefined') {

            h = $(this).data('id7');
        }
        $('#time').html(h);
        var i = '';
        if (typeof $(this).data('id8') !== 'undefined') {

            i = $(this).data('id8');
        }
        $('#highlight').html(i);
        var j = '';
        if (typeof $(this).data('id9') !== 'undefined') {

            j = $(this).data('id9');
        }
        $('#description').html(j);
        var k = '';
        if (typeof $(this).data('id10') !== 'undefined') {

            k = $(this).data('id10');
        }
        $('#iternary').html(k);
    })
    </script>

    <!-- all js include start -->
    <!-- jquery latest version -->

    <!-- bootstrap latest version -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- revolution slider js files start -->
    <script src="{{ asset('assets/js/rev_slider/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('assets/js/rev_slider/jquery.themepunch.revolution.min.js') }}"></script>

    <!-- revolution slider js files end -->

    <!-- Other jQuery library -->
    <script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countTo.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mb.YTPlayer.js') }}"></script>
    <script src="{{ asset('assets/js/countdown.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fitvids.js') }}"></script>

    <!-- template main js file -->

    <!-- all js include end -->




    <!-- Youmax Call -->

    <!-- ends -->

    <!-- Search  -->



    <script>
    function welcome_fetch_data(page, manual_filter, manual_filter_tablesm) {



        $.ajax({
            url: "{{ url('welcome/welcome_manualdashboard')}}?page=" + page + "&manual_filter_table=" +
                manual_filter + "&manual_filter_tablesm=" + manual_filter_tablesm,
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
            $('#category_filter option').prop('selected', function() {
                return this.defaultSelected;
            });
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
            $('#category_filter option').prop('selected', function() {
                return this.defaultSelected;
            });
            $('#manual_filter_table2 option').prop('selected', function() {
                return this.defaultSelected;
            });
            welcome_fetch_data(page, manual_filter, manual_filter_tablesm);
        })
    });
    $(document).ready(function() {
        $("#category_filter").change(function() {
            $('#manual_filter_tablesm').val('');
            var manual_filter_tablesm = $('#manual_filter_tablesm').val();
            manual_filter = $("#category_filter").val();
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
            $('#category_filter option').prop('selected', function() {
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
        $('#category_filter option').prop('selected', function() {
            return this.defaultSelected;
        });
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

    <script src="{{asset('js/location.js')}}"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>

</body>

</html>
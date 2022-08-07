
@extends('layouts.home')

@section('content')
<style>
.book {
    position: absolute;
    background: rgba(0, 0, 0, 0.3);
    color: white;
}

.ok {
    display: inline-block;
}

.ok a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
    margin: 0 4px;
}

.ok a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}

.ok a:hover:not(.active) {
    background-color: #ddd;


}

.read-more-show{
      cursor:pointer;
      color: #ED8323;
    }
    .read-more-hide{
      cursor:pointer;
      color: #ED8323;
    }
    .hide_content{
      display: none;
    }
.col-md-3 {
    display: inline-block;
    margin-left: -4px;
}

.col-md-3 img {
    width: 100%;
    height: auto;
}

body .carousel-indicators li {
    background-color: red;
}

body .carousel-control-prev-icon,
body .carousel-control-next-icon {
    background-color: red;
}

body .no-padding {
    padding-left: 0;
    padding-right: 0;
}
</style>


<div class="container-fluid ">
    <div style="background-color:#fff;" class="row">
        <div class="col-md-12 ">
            <div
                style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.4); transition: 0.4s;background-image: url('../img_logo/my.jpg');">
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
                            <div class="col-md-3">
                                <select class="form-control states" name="manual_filter_table1"
                                    id="manual_filter_table1">
                                    <option value="">Select Your State</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control cities" name="manual_filter_table2"
                                    id="manual_filter_table2">
                                    <option value="">Select Your City</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="category_filter" class="form-control" id="category_filter">
                                    <option value="all" class="form-control cnfontsize_2">All Category</option>
                                    @foreach(App\TripCategory::all() as $cat)
                                    <option value="{{$cat->category}}">{{$cat->category }}</option>
                                    @endforeach
                                </select>
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
                                    <h3 class="text-center mt-3 head4">Explore Latest Trips
                                    </h3>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="lgx-schedule lgx-schedule-dark"  style="background-image: url(http://hl-events/eventmie-assets?path=img%2Fbg-pattern.png); background-color:#000033">
               <div class="card-body">
              <div  id="trip_iternary_opertor" class="row mb-3">
                 </div>
                   
             <div class="nav-btn-container">
                    <button class="btn btn-danger prev-btn mr-1">Prev</button>
                    <span id="pages"></span>
                    <button class="btn btn-success next-btn">Next</button>
                </div>
                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="users.id" />
                <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="desc" />
                </div>
            </div>
       


        <div id="mainWrap">
                <div class="col-lg-12 bgtop-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 toptxt-head">
                                <div>
                                    <h3 class="text-center mt-3 head4">Latest Events
                                    </h3>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="lgx-schedule lgx-schedule-dark"  style="background-image: url(http://hl-events/eventmie-assets?path=img%2Fbg-pattern.png); background-color:#000033">
                <div class="card-body">
                    <table style="border-color:white;">
                        <tbody id="myTable">
                            @if(empty($mygallery))
                            @include('events')
                        </tbody>
                        @endif
                    </table> 
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
                            <h3 class="text-center mt-3 head4">Trip Category</h3>
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
            <div class="gallery js-flickity lgx-schedule lgx-schedule-dark" data-flickity-options='{ "wrapAround": true }'  style="background-image: url(http://hl-events/eventmie-assets?path=img%2Fbg-pattern.png); background-color:white">
            @foreach(App\TripCategory::all() as $cat)
                <div class="gallery-cell"><img class="w-100"
                        style="height:240px; padding-right:5px; width:270px;border-radius: 5px; transition: .3s;cursor: pointer; margin: top 5px;"
                        src="{{ URL::to('/') }}/category/{{ $cat->Image }}">
                    <div class="text-block">
                   
                        <h5><a
                                href="{{ route('showstate',[ 'state' => str_slug($cat->category) ]) }}">{{ $cat->category }}</a>
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
                            <h3 class="text-center mt-3 head4">Event Category</h3>
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
            <div class="gallery js-flickity lgx-schedule lgx-schedule-dark" data-flickity-options='{ "wrapAround": true }'  style="background-image: url(http://hl-events/eventmie-assets?path=img%2Fbg-pattern.png); background-color:white" >
            @foreach(App\Category::all() as $cata)
                <div class="gallery-cell">
                <img class="w-100"style="height:240px; padding-right:5px; width:270px;border-radius: 5px; transition: .3s;cursor: pointer;"
                src="http://hl-events/storage/{{ $cata->thumb }}">
                        <div class="text-block">
                        <h5>
                                <a href="http://hl-events/events/{{ $cata->name }}">{{ $cata->name }}</a>
                        </h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>

<div id="mainWrap">
    <div class="col-lg-12 bgtop-header ">
        <div class="container">
            <div class="row mt-3" >
                <div class="col-lg-12 toptxt-head">
                    <div>
                        <h3 class="text-center mt-3 head4">All Website user</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="lgx-schedule lgx-schedule-dark"  style="background-image: url(http://hl-events/eventmie-assets?path=img%2Fbg-pattern.png); background-color:#000033">
    <div class="card-body">
        <table style="border-color:white;">
            <tbody >
                @include('subscribe')
            </tbody>
        </table>
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
                                    <h3 class="text-center mt- head4">All Tour Operator User</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <br>


            <div class="lgx-schedule lgx-schedule-dark"  style="background-image: url(http://hl-events/eventmie-assets?path=img%2Fbg-pattern.png); background-color:#000033">

                <div class="card-body">
                    <table style="border-color:white;" >
                        <tbody>
                        @include('unsubscribe')
                        </tbody>
                    </table>

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
                                    <h3 class="text-center mt- head4">Explore Popular Destination</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <br>


            <div class="lgx-schedule lgx-schedule-dark"  style="background-image: url(http://hl-events/eventmie-assets?path=img%2Fbg-pattern.png); background-color:#000033">

                <div class="card-body">
                    <table style="border-color:white;">
                        <tbody>
                            <tr>
                                <td style="border-radius:2px;">
                                    <div  class="row"style="margin-left:-1px;">
                                        @foreach ($galleries as $indexKey=>$gall)
                                                   <div class="col-md-3 mt-4 card"style="margin-left:px;">
               <img src="{{ URL::to('/') }}/category/{{ $gall->image_name }}" class="w-100 py-1" style="height:180px;"
                    style="border-radius: 5px; transition: .3s;cursor: pointer;" />
                        <div  class="card-header ">
                        <center>
                    <a href="{{ route('showstate',[ 'state' => ($gall->c_s_c_cat) ]) }}">
                        <b style="font-size:16px; color:black;">{{Str::limit($gall->TripTitle,32)}}
                        </b></a>   </center>            


                <button  type="button" id10={{ $indexKey }}
                    id9={{ $indexKey }} id8={{ $indexKey }} id7={{ $indexKey }} id6={{ $indexKey }} id5={{ $indexKey }}
                    id4={{ $indexKey }} id3={{ $indexKey }} id2={{ $indexKey }} id1={{ $indexKey }} id={{ $indexKey }}
                    class="centered4 " data-id="{{$gall->TripTitle}}" data-id1="{{$gall->slug}}"
                    data-id2="{{$gall->slug1}}" data-id3="{{$gall->slug2}}" data-id4="{{ $gall->Destination }}"
                    data-id5=" {{ $gall->daynight }}" data-id6="{{ $gall->datetime }}" data-id7="{{ $gall->time }}"
                    data-id8="{!!str_limit($gall->Keyword,115)!!}" data-id9="{{str_limit($gall->Description,115)}}"
                    data-id10="{!!str_limit($gall->explanation,115)!!}" data-toggle="modal" data-target="#myModal">
                    Summary    
                </button>

                </div>        
<div class="card-body bg-light">
<h6 style="margin-bottom:-15px;margin-top:-10px;">
<a style="color:black" href="{{ route('showstate',[ 'state' => str_slug($gall->slug) ]) }}"><b>{{str_limit($gall->slug, 15)}}</b>
                        </a><b> / </b><span >
     <a style="color:black" href="{{ route('showstate',['state' => ($gall->country_state)]) }}"><b>{{str_limit($gall->slug1, 15)}}</b></a>
                        </span><b> / </b>
                        <span><a style="color:black"
                                href="{{ route('showstate',[ 'state' => ($gall->country_state_city) ]) }}"><b>{{str_limit($gall->slug2, 15)}}</b></a></span>
                        </b> </h6>
</div>
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
                                                                        <strong style="color:#d34205;">Date:</strong>
                                                                        <strong id='date'></strong>
                                                                    </div>
                                                                    <div style="padding-left:10px;font-size:16px;"
                                                                        class="form-group">
                                                                        <strong style="color:#d34205;">Time:</strong>
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

</div>
<br>
<br><br>
<!-- Fetch data Script All-->
<script>
$(document).ready(function() {
    $(function() {
        console.log('command ka function me hai');
        var curtpage = 1,
            pagelimit = 10,
            totalrecord = 0;
        query = '';
        fetchiternaryData(curtpage, query);
        // handling the prev-btn
        $(".prev-btn").on("click", function() {
            if (curtpage > 1) {
                curtpage--;
            }
            console.log("Prev Page: " + curtpage);
            fetchiternaryData(curtpage, query);
        });
        $(document).on('keyup', '#iternarysearch', function() {
            console.log('search input click hua');
            var query = $('#iternarysearch').val();
            console.log(query);
            var curtpage = 1;
            pagelimit = 10,
                totalrecord = 0;
            fetchiternaryData(curtpage, query);
        });

        // handling the next-btn
        $(".next-btn").on("click", function() {
            if (curtpage * pagelimit < totalrecord) {
                curtpage++;
            }
            console.log("Next Page: " + curtpage);
            fetchiternaryData(curtpage, query);
        });
        $(document).on('click', '.link-click', function(event) {
            curtpage = $(this).attr('page');
            $(this).addClass('active');
            console.log(this);
            fetchiternaryData(curtpage, query);
        });

        function fetchiternaryData(page, query) {
            var email = $('#operator_auth_email').val();
            console.log('command ka dharmu fetchiternary function');
            $.ajax({

        
                type: "get",
                url: "{{url('/tripss')}}",
                data: "page=" + page + "&query=" + query,
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                
                success: function(html) {
                    console.log(html.data);
                    if (html.data) {
                        var dataArr = html.data.data;

                        totalrecord = html.data.total;
                        console.log(totalrecord + ' total record aa rha hai');
                        lastpage = html.data.last_page;
                        console.log(lastpage + ' last page record aa rha hai');
                        var link = "";
                        for (var j = 1; j <= lastpage; j++) {
                            if (html.data.current_page == j) {
                                link +=
                                    "<button class='btn btn-primary link-click active' page='" +
                                    j + "'>" + j + "</button>&nbsp;";
                            } else {
                                link +=
                                    "<button class='btn btn-primary link-click' page='" +
                                    j + "'>" + j + "</button>&nbsp;";
                            }

                        }
                        $("#pages").html(link);
                        var html = "";
                        var htmls = "";

                        for (var i = 0; i < dataArr.length; i++) {
                            html += " <div  class='card mb-3'> <div class='row card-body'> <div  class='  col-4'> <img src=http://holiday/category/" +dataArr[i].image_name + " class='myimg' height='180'width='320'  /   ></div></div><button  type='button'class='centered4'>Summary</button>	 <div  class='card-header'><a  href='#'><b style='font-size:16px; color:black;'>" + dataArr[i].TripTitle + "</b></a> </div><div class='card-body bg-light'><h6><button type='button' id=" + dataArr[i].slug +" class='detailcountry' style='color:black' ><b>" + dataArr[i].slug +       "</b></button><b> / </b><span ><a class='detailstate' style='color:black' href='#'><b>" + dataArr[i].slug1 +
                                    "</b></a></span><b> / </b><span><a class='detailcity' style='color:black'href='#'><b>" + dataArr[i].slug2 +
                                    "</b></a></span></b> </h6></div></div> " +
                                "<hr />";  
                        }
                        $("#trip_iternary_opertor").html(html);
                    }    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        }
    });
});
$(document).on('click', '.detailcountry', function() {
            id = $(this).attr('id');
            console.log('Countary working details button');
            console.log(id);
            $.ajax({
              
                type: "get",
                data: {},
                url: "{{url('trips/')}}/" + id,

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(html) {
                    console.log('get quote by firm id');
					
               },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        });

        $(document).on('click', '.detailstate', function() {
            id = $(this).attr('id');
            console.log('State working details button');
            console.log(id);
            $.ajax({
                type: "get",
                data: {},
                url: "#" + id,

                headers: {
                    "Authorization": "Bearer " + localStorage.getItem('a_u_a_b_t')
                },
                success: function(html) {
                    console.log('get quote by firm id');
					
               },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        });

        $(document).on('click', '.detailcity', function() {
            id = $(this).attr('id');
            console.log('City working details button');
            console.log(id);
            $.ajax({
                type: "get",
                data: {},
                url: "#" + id,

                headers: {
                    "Authorization": "Bearer " + localStorage.getItem('a_u_a_b_t')
                },
                success: function(html) {
                    console.log('get quote by firm id');
					
               },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        });


</script>
<script>
// Hide the extra content initially, using JS so that if JS is disabled, no problemo:
$('.read-more-content').addClass('hide_content')
$('.read-more-show, .read-more-hide').removeClass('hide_content')
// Set up the toggle effect:
$('.read-more-show').on('click', function(e) {
    $(this).next('.read-more-content').removeClass('hide_content');
    $(this).addClass('hide_content');
    e.preventDefault();
});
// Changes contributed by @diego-rzg
$('.read-more-hide').on('click', function(e) {
    var p = $(this).parent('.read-more-content');
    p.addClass('hide_content');
    p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
    e.preventDefault();
});
</script>

<link rel = "stylesheet"
href = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" >
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</script>
@endsection
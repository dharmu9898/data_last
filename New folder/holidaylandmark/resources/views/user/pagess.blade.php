@if(sizeof($gallery) >0)

<link href="{{ asset('css/page.css') }}" rel="stylesheet">

<tr>
<td style="border-radius:2px;">
<div style="margin-right: 8px;" class="row">
    
@foreach ($gallery as $indexKey=>$gall)  
<div class="col-md-4">            

<?php
foreach (json_decode($gall->Image)as $picture) { ?>

     <img class="w-100 py-3" style="height:240px;" src="{{ asset('public/image/'. $picture) }}"
     style="border-radius: 5px; transition: .3s;cursor: pointer;"/>
    
      @break <?php 



} ?> 

 <h1 class="centered"><a href="{{ route('showcategory',[ 'name' => str_slug($gall->Category) ]) }}" >
   <b style="font-size:16px;">{{$gall->Category}}
    </b></a> </h1>
    
    
    <button type="button"  id10={{ $indexKey }} id9={{ $indexKey }} id8={{ $indexKey }} id7={{ $indexKey }} id6={{ $indexKey }} id5={{ $indexKey }} id4={{ $indexKey }} id3={{ $indexKey }}  id2={{ $indexKey }} id1={{ $indexKey }}  id={{ $indexKey }} class="centered4 "  data-id="{{$gall->TripTitle}}" data-id1="{{$gall->country_name}}" data-id2="{{$gall->state_name}}" data-id3="{{$gall->city_name}}" data-id4="{{ $gall->Destination }}" data-id5=" {{ $gall->NoOfDays }}" data-id6="{{ $gall->datetime }}" data-id7="{{ $gall->time }}" data-id8= "{!!$gall->Keyword!!}" data-id9="{{ $gall->Description  }}" data-id10="{!!$gall->Iternary!!}"  data-toggle="modal" data-target="#myModal">
   Detail
  </button>

  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div  class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Trip Detail</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <div class="card">
    <div class="card-body">
    <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong style="color:#d34205;">Trip Title:</strong>
    <strong id='candidate_name'></strong>
            </div>
          <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong style="color:#d34205;">Country Name:</strong>
                <strong id='country_name' ></strong>
            </div>
             <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong style="color:#d34205;">State Name:</strong>
               <strong id='state_name' ></strong>
            </div>
             <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong style="color:#d34205;">City Name:</strong>
                <strong id='city_name' ></strong>
            </div>

             <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong style="color:#d34205;">Destination:</strong>
               <strong id='destination' ></strong>
            </div>
        
             <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong style="color:#d34205;">No OF Days:</strong>
                <strong id='noofdays' ></strong>
            </div>
            <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong style="color:#d34205;">Date:</strong>
                <strong id='date'></strong>
            </div>
                   <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong style="color:#d34205;">Time:</strong>
               <strong id='time'></strong>
            </div>
             <div style="padding-left:10px;font-size:16px;" class="form-group">
               <strong style="color:#d34205;">Trip Highlight:</strong>
               <strong id='highlight' ></strong>
            </div>
               <div style="padding-left:10px;font-size:16px;" class="form-group">
                <strong style="color:#d34205;" >Description:</strong>
                <strong id='description' ></strong>
            </div>
             <div style="padding-left:10px;font-size:16px;" class="form-group">
                 <strong style="color:#d34205;" >Iternary Details:</strong>
                <strong id='iternary' ></strong>
            </div>
    </div>
  </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
      <div class="text-block1">
   <h6><a href="{{ route('showcountry',[ 'names' => str_slug($gall->slug2) ]) }}" ><b >{{str_limit($gall->country_name, 15)}}</b></a>/<span><a href="{{ route('showstate',['state' => ($gall->country_state)]) }}" ><b>{{str_limit($gall->state_name, 15)}}</a></span>/<span><a href="{{ route('showcity',[ 'city' => ($gall->country_state_city) ]) }}" >{{str_limit($gall->city_name, 15)}}</a></span>
    </b> </h6>
          
            
  </div>      
</div>


<script type="text/javascript">
                $('.centered4').click(function () {
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
@endforeach






     </div>
               <br>
               </td>
            </tr> 
            
         
            
        @else
        <tr>
        
            <th></th>
            <th></th>
            <th></th>
            <th style="font-size: 22px; color:red;">Data not found</th>
            <th></th>
            <th></th>
        </tr>
       
        @endif

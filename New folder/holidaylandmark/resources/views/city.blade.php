@if(sizeof($gallery) >0)

@foreach ($gallery as $gall) 
<style>
.td {
border: 5px solid black !important;
}   
.center {
display: block;
margin-left: auto;
margin-right: auto;
width: 50%;
}


.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.col-9
{


}
.table-bordered td, .table-bordered th {
    border: 2px solid #dee2e6;
   
    border-color: gray;
}
@import url('https://fonts.googleapis.com/css2?family=Peddana&family=Roboto:wght@300&display=swap');
p{
    font-family: 'Lato',sans-serif
    word-spacing:4px;
    font-size:18px;
    margin-left:20px;
}

</style>
<tr  >
<td style="border-radius:2px;">
<div style="margin-right: 8px;" class="row">
    
     
<div class="col-md-4">            

<?php
foreach (json_decode($gall->Image)as $picture) { ?>

     <img class="center" src="{{ asset('public/image/'. $picture) }}"
      style="height:240px; padding:1px; width:300px;border-radius: 5px; transition: .3s;cursor: pointer;"/>
    
        @break <?php 



} ?>

<h1 style="text-decoration:none;" class="centered"><a style="text-decoration:none;" href="{{ route('show',[ 'tour' => ($gall->c_s_c_cat) ]) }}" >
   <b style="font-size:24px;color:white;">View
    </b></a> </h1>
</div>
<div class="col-md-8">            

<h2 class="ml-2" style="text-transform: capitalize;padding:5px; font-weight: normal;"><a href=" {{ route('show',[ 'tour' => ($gall->c_s_c_cat) ]) }}"  style="color:#d34205; font-size:20px;" >
   <b>
    {{$gall->TripTitle}}</b></a> &nbsp;  &nbsp; &nbsp;<span  style="color:#d34205; font-size:18px;">  {{$gall->NoOfDays}} </span> &nbsp; 
    </h2>
     <h4  class="ml-2" style="text-transform: capitalize;"><i>
     </i><span  style="margin-right:0px; font-weight: normal;font-size:18px" > <b>Country:</b>&nbsp;</span> <span style="color:gray;font-size:18px">  {{$gall->country_name}} </span> &nbsp; &nbsp; &nbsp; &nbsp;<span style="margin-right:0px;font-size:18px;" ><b> State:&nbsp;</b></span> <span style="color:gray;font-size:18px">  {{$gall->state_name}} </span> &nbsp; &nbsp; &nbsp; &nbsp;<span style="margin-right:0px;font-size:18px;" ><b> City:&nbsp;</b></span><span style="color:gray;font-size:18px">   {{$gall->city_name}}</span>
     </h4> 
     <h4 class="ml-2" style="text-transform: capitalize;"><span style="margin-right:0px;font-size:18px;" ><b> Date:&nbsp;</b></span> <span style="color:gray;font-size:18px">   {{$gall->datetime}}</span> <span style="margin-right:0px;font-size:18px;" >&nbsp;&nbsp;&nbsp;&nbsp;<b> Time:</b>&nbsp;</span>  <span style="color:gray;font-size:18px;">  {{$gall->time}}  </span> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; <span style="color:gray;font-size:18px;">  {{$gall->Destination}} </span></h4> 
    
     <p class="ml-2" style="text-transform: capitalize;color:black;"><i>
     </i><span style="margin-right:0px" > <b>Trip Highlight:</b>&nbsp;</span> <span style="color:gray;">     {{Str::words($gall->Description, 40)}} </span>
</p> 
 
</div>




     </div>
               <br>
               </td>
            </tr> 
            
            @endforeach
            
        @else
        <tr>
            
            <th style="font-size: 22px; color:red;">Coming Soon</th>
           
        </tr>
        @endif

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
a:link {
  color: red;
}

/* visited link */
a:visited {
  color: green;
}

/* mouse over link */
a:hover {
  color: hotpink;
}

/* selected link */
a:active {
    background-color: hotpink;
}
.col-9
{


}
@import url('https://fonts.googleapis.com/css2?family=Peddana&family=Roboto:wght@300&display=swap');
p{
    font-family: 'Peddana', serif;
    word-spacing: 6px; 
}

</style>
<tr  style=" overflow-x: auto;" >
<td>
<div style="border:5px;" class="row">
<div style="background-color:white;" class="card">
     
     <div style="background-color:blue;border:2px;" class="card-body">    
     <div class="d-flex flex-row">
<div class="col-md-4">            

<?php
foreach (json_decode($gall->Image)as $picture) { ?>

     <img class="center" src="{{ asset('public/image/'. $picture) }}"
      style="height:270px; padding:1px; width:490px;border-radius: 5px; transition: .3s;cursor: pointer;"/>
    
        @break <?php 



} ?> 
</div>
<div class="col-md-8">            

<h2 style="text-transform: capitalize;padding:5px; font-weight: normal;"><a href=" {{ route('show',$gall->slug) }}"  style="color:#d34205" target="_blank">
   <b>
    {{$gall->TripTitle}}</b></a> &nbsp;  &nbsp; &nbsp;<span style="color:#d34205; font-size:20px;">  {{$gall->NoOfDays}} </span> &nbsp; <button style="background-color:#d34205;float:right;border-radius: 3px;" type="button" 
    class="btn btn-secondary"><b><a  style="color:white;font-size:20px;float:right;background-color:#d34205;" href=" {{ route('show',$gall->slug) }}" target="_blank"> View Details</a></button>
    </h2><br>
     <h4 style="text-transform: capitalize;"><i>
     </i><span style="margin-right:0px; font-weight: normal;" > <b>Country:</b>&nbsp;</span> <span style="color:gray;">  {{$gall->country_name}} </span> &nbsp; &nbsp; &nbsp; &nbsp;<span style="margin-right:0px" ><b> State:&nbsp;</b></span> <span style="color:gray;">  {{$gall->state_name}} </span> &nbsp; &nbsp; &nbsp; &nbsp;<span style="margin-right:0px" ><b> City:&nbsp;</b></span><span style="color:gray;">   {{$gall->city_name}}</span>
     </h4> <br>
     <h4 style="text-transform: capitalize;"><span style="margin-right:0px" ><b> Date:&nbsp;</b></span> <span style="color:gray;">   {{$gall->datetime}}</span> <span style="margin-right:0px" >&nbsp;&nbsp;&nbsp;&nbsp;<b> Time:</b>&nbsp;</span>  <span style="color:gray;">  {{$gall->time}}  </span> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; <span style="color:gray;">  {{$gall->Destination}} </span></h4> 
    
     <br><p style="text-transform: capitalize;color:black;"><i>
     </i><span style="margin-right:0px" > <b>Trip Planner:</b>&nbsp;</span> <span style="color:gray;">   {{$gall->Description}} </span>
</p> 
     
</div>


</div>
</div>

     </div>
     </div>
               <br>
               </td>
            </tr> 
            
            @endforeach
            
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

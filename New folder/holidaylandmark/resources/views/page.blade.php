@if(sizeof($countries) >0)


<style>
.td {
border: 5px solid black !important;
}   
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
a:link {
  color: white;
}

/* visited link */
a:visited {
  color: white;
}

/* mouse over link */
a:hover {
  color: blue;
  text-decoration:none;
}

/* selected link */
a:active {
    color: white;
}
.col-9
{


}
@import url('https://fonts.googleapis.com/css2?family=Peddana&family=Roboto:wght@300&display=swap');
p{
    font-family: 'Peddana', serif;
    word-spacing: 4px; 
}

</style>
<tr  >
<td>
<div  class="row">
  
    
     @foreach ($countries as $country) 
<div class="col-md-4"> 
            <img class="w-100 py-3" src="public/category/{{$country->Image}}">
            <h1 class="centered"><a href="{{ route('showcountry',$country->slug) }}" target="_blank">
   <b style="font-size: 24px;">
    {{$country->country_name}}</b></a>
           </h1> 
</div>
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



 
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
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color:white;
}
</style>
<tr  style=" overflow-x: auto;" >
<td>
<div style="border:5px;" class="row">
<div style="background-color:white;" class="card">
     
     <div style="background-color:blue;border:2px;" class="card-body">    
     <div class="d-flex flex-row">
     @foreach ($gallery as $gall)
<div class="col-md-4"> 


            <img class="w-100" src="public/category/{{$gall->Image}}">
            <h1 class="centered">{{$gall->category}}</h1> 
           
             


</div>

@endforeach

</div>
</div>

     </div>
     </div><div style="border:5px;" class="row">
<div style="background-color:white;" class="card">
     
     <div style="background-color:blue;border:2px;" class="card-body">    
     <div class="d-flex flex-row">
     @foreach ($countries as $country)
<div class="col-md-4"> 


            <img class="w-100" src="public/category/{{$gall->Image}}">
            <h1 class="centered">{{$country->country_name}}</h1> 
           
             


</div>

@endforeach

</div>
</div>

     </div>
     </div>
               <br>
               </td>
            </tr> 
            
           
            
       

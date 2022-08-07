<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial;
  margin: 0;
}

* {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
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

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
</style>
<body>
@foreach ($gallery as $gall)
<h2 style="text-align:center">{{ $gall->TripTitle }}</h2>
@endforeach 

<div class="container">
  <div class="mySlides">
    <div class="numbertext">1 / 10</div>
    @foreach ($gallery as $gall) 
    <?php
foreach (json_decode($gall->Image)as $picture) { ?>

     <img  src="{{ asset('public/image/'. $picture) }}"
     style="width:100%;height:500px;"/>
      @break;   
 <?php 



} ?> 
@endforeach   
  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 10</div>
    @foreach ($gallery  as $key => $gall)
    <?php
foreach (json_decode($gall->Image) as $key => $picture) { ?>
  @if($key > 0)
     <img  src="{{ asset('public/image/'. $picture) }}"
     style="width:100%;height:500px;"/>
      @break;
      @endif   
 <?php 



} ?> 


@endforeach
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 10</div>
    @foreach ($gallery  as $key => $gall)
    <?php
foreach (json_decode($gall->Image) as $key => $picture) { ?>
@if($key > 1)
     <img  src="{{ asset('public/image/'. $picture) }}"
     style="width:100%;height:500px;"/>
      @break;
      @endif   
 <?php 



} ?> 
@endforeach   
  </div>
    
  <div class="mySlides">
  @foreach ($gallery  as $key => $gall)
    <div class="numbertext">4 / 10</div>
    <?php
foreach (json_decode($gall->Image) as $key => $picture) { ?>
@if($key > 2)
     <img  src="{{ asset('public/image/'. $picture) }}"
     style="width:100%;height:500px;"/>
      @break;
      @endif   
 <?php 



} ?>  
@endforeach  
  </div>

  <div class="mySlides">
    <div class="numbertext">5 / 10</div>
    @foreach ($gallery  as $key => $gall)
    <?php
foreach (json_decode($gall->Image) as $key => $picture) { ?>
@if($key > 3)
     <img  src="{{ asset('public/image/'. $picture) }}"
     style="width:100%;height:500px;"/>
      @break;
      @endif   
 <?php 



} ?>  
@endforeach  
  </div>
    
  <div class="mySlides">
    <div class="numbertext">6 / 10</div>
    @foreach ($gallery  as $key => $gall)
    <?php
foreach (json_decode($gall->Image) as $key => $picture) { ?>
@if($key > 4)
     <img  src="{{ asset('public/image/'. $picture) }}"
     style="width:100%;height:500px;"/>
      @break;
      @endif   
 <?php 



} ?>  
@endforeach  
  </div>
  <div class="mySlides">
    <div class="numbertext">7 / 10</div>
    @foreach ($gallery  as $key => $gall)
    <?php
foreach (json_decode($gall->Image) as $key => $picture) { ?>
@if($key > 5)
     <img  src="{{ asset('public/image/'. $picture) }}"
     style="width:100%;height:500px;"/>
      @break;
      @endif   
 <?php 



} ?>  
@endforeach  
  </div> <div class="mySlides">
    <div class="numbertext">8 /10 </div>
    @foreach ($gallery  as $key => $gall)
    <?php
foreach (json_decode($gall->Image) as $key => $picture) { ?>
@if($key > 6)
     <img  src="{{ asset('public/image/'. $picture) }}"
     style="width:100%;height:500px;"/>
      @break;
      @endif   
 <?php 



} ?>  
@endforeach  
  </div> <div class="mySlides">
    <div class="numbertext">9 / 10</div>
    @foreach ($gallery  as $key => $gall)
    <?php
foreach (json_decode($gall->Image) as $key => $picture) { ?>
@if($key > 7)
     <img  src="{{ asset('public/image/'. $picture) }}"
     style="width:100%;height:500px;"/>
      @break;
      @endif   
 <?php 



} ?>  
@endforeach  
  </div>
  <div class="mySlides">
    <div class="numbertext">10 / 10</div>
    @foreach ($gallery  as $key => $gall)
    <?php
foreach (json_decode($gall->Image) as $key => $picture) { ?>
@if($key > 8)
     <img  src="{{ asset('public/image/'. $picture) }}"
     style="width:100%;height:500px;"/>
      @break;
      @endif   
 <?php 



} ?>  
@endforeach  
  </div>
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  <div class="caption-container">
    <p id="caption"></p>
  </div>

  <div class="row">
    <div class="column">
    @foreach ($gallery  as $key => $gall)
       <?php
foreach (json_decode($gall->Image) as $key => $picture) { ?>

     <img  class="demo cursor" onclick="currentSlide(1)" src="{{ asset('public/image/'. $picture) }}"
     style="width:100%;height:150px;"/>
      @break;
       
 <?php 



} ?>   
@endforeach
   </div>
    <div class="column">
    @foreach ($gallery  as $key => $gall)

     <?php
foreach (json_decode($gall->Image) as $key => $picture) { ?>
@if($key > 0)
     <img  class="demo cursor" onclick="currentSlide(2)" src="{{ asset('public/image/'. $picture) }}"
     style="width:100%;height:150px;"/>
      @break;
      @endif   
 <?php 

} ?>    
   @endforeach
    </div>
    <div class="column">
    @foreach ($gallery  as $key => $gall)
    <?php
foreach (json_decode($gall->Image) as $key => $picture) { ?>
@if($key > 1)
     <img  class="demo cursor" onclick="currentSlide(3)" src="{{ asset('public/image/'. $picture) }}"
     style="width:100%;height:150px;"/>
      @break;
      @endif   
 <?php 

} ?>   

@endforeach
   </div>
    <div class="column">
    @foreach ($gallery  as $key => $gall)
    <?php
foreach (json_decode($gall->Image) as $key => $picture) { ?>
@if($key > 2)
     <img  class="demo cursor" onclick="currentSlide(4)" src="{{ asset('public/image/'. $picture) }}"
     style="width:100%;height:150px;"/>
      @break;
      @endif   
 <?php 

} ?>  
@endforeach     </div>
    <div class="column">
    @foreach ($gallery  as $key => $gall)
    <?php
foreach (json_decode($gall->Image) as $key => $picture) { ?>
@if($key > 3)
     <img  class="demo cursor" onclick="currentSlide(5)" src="{{ asset('public/image/'. $picture) }}"
     style="width:100%;height:150px;"/>
      @break;
      @endif   
 <?php 

} ?> 
@endforeach

       </div>    
    <div class="column">
    @foreach ($gallery  as $key => $gall)
    <?php
foreach (json_decode($gall->Image) as $key => $picture) { ?>
@if($key > 4)
     <img  class="demo cursor" onclick="currentSlide(6)" src="{{ asset('public/image/'. $picture) }}"
     style="width:100%;height:150px;"/>
      @break;
      @endif   
 <?php 

} ?>    
@endforeach
    </div>

    <div class="column">
    @foreach ($gallery  as $key => $gall)
    <?php
foreach (json_decode($gall->Image) as $key => $picture) { ?>
@if($key > 5)
     <img  class="demo cursor" onclick="currentSlide(7)" src="{{ asset('public/image/'. $picture) }}"
     style="width:100%;height:150px;"/>
      @break;
      @endif   
 <?php 

} ?>    
@endforeach
    </div>

    <div class="column">
    @foreach ($gallery  as $key => $gall)
    <?php
foreach (json_decode($gall->Image) as $key => $picture) { ?>
@if($key > 6)
     <img  class="demo cursor" onclick="currentSlide(8)" src="{{ asset('public/image/'. $picture) }}"
     style="width:100%;height:150px;"/>
      @break;
      @endif   
 <?php 

} ?>    
@endforeach
    </div>

    <div class="column">
    @foreach ($gallery  as $key => $gall)
    <?php
foreach (json_decode($gall->Image) as $key => $picture) { ?>
@if($key > 7)
     <img  class="demo cursor" onclick="currentSlide(9)" src="{{ asset('public/image/'. $picture) }}"
     style="width:100%;height:150px;"/>
      @break;
      @endif   
 <?php 

} ?>    
@endforeach
    </div>

    <div class="column">
    @foreach ($gallery  as $key => $gall)
    <?php
foreach (json_decode($gall->Image) as $key => $picture) { ?>
@if($key > 8)
     <img  class="demo cursor" onclick="currentSlide(10)" src="{{ asset('public/image/'. $picture) }}"
     style="width:100%;height:150px;"/>
      @break;
      @endif   
 <?php 

} ?>    
@endforeach
    </div>

  </div>
</div>

<script>
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
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
    
</body>
</html>

<?php
  // header('Location:  view-page.php');
  include('connection.php');
  if(isset($_POST['submit']))
{
    $sql = "INSERT INTO words (my_word)
    VALUES ('".$_POST["word"]."')";

    $result = mysqli_query($conn,$sql);
    header("location: view-page.php ");
}

?>
<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="$1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Words & Characters Count</title>

</head>
<body>
 
<div class="container">
<div class="jumbotron">
  <h1 style="text-align: center;">Words & Character Counter </h1><br>
<div class="card-header" >
<form action="index.php" method="post"> 

<h4><span id="charCount">0</span>  Characters</h4>
<h4><span id="wordCount">0</span>  Words</h4>
</div>
<div class="card-body">

  
<textarea id="textBox"name="word"placeholder="Write or Paste your content to count"spellcheck="true" style="width:1000px;height:400px;"></textarea>
<br>
<div style="text-align:center;">
<button type="submit" class="btn btn-outline-success btn-lg" name="submit" onClick="">View Page</button>
</div>
</div>
</div>
</div>
</form>
</div>
</body>

<script type="text/javascript">
var textBox = document.getElementById("textBox");
var charCount = document.getElementById("charCount");
textBox.addEventListener("keyup",function(){
  var Characters = textBox.value.split('');
  charCount.innerHTML = Characters.length; 

});
</script>

 <script type="text/javascript">
var textBox = document.getElementById("textBox");
var wordCount = document.getElementById("wordCount");
$('#textBox').on('keyup',function(){
  var count = $('#textBox').val().trim().split(' ');
  $('#wordCount').text(count.length);
});
</script>
<!--  <script>
  const countwords =() => {
    let noc = document.getElementById('textbox').value.length;
    let now = document.getElementById('textbox').value;

    now = now.match(/\w+/g);
    now = now.length;
    console.log(now);

    document.getElementById('showdata').innerHTML = "The total Characters = " + noc;

    document.getElementById('showwordscount').innerHTML = "Words = " + now;
  }
</script> -->

<!--<script>
$(document).ready(function(){
        $("button").click(function(){
            var textbox = $.trim($("#textbox").val());
            alert(textbox.length);
            // if(textbox != ""){
            //     // Show alert dialog if value is not blank
            //     alert(comment);
            // }
        });
        
    });
</script>
<script>
    $(document).ready(function(){
        $("button").click(function(){
            var words = $.trim($("textarea").val()).split(" ");
            alert(words.length);
        });
    });
</script>-->
</html>

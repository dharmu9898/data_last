<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="crossorigin="anonymous"></script> 
    <title>View Page</title>
  </head>
  <body>
<div class="container">
<div class="jumbotron">
  <h1 style="text-align: center;">Words & Character Counter </h1>
<div class="card-header" >
          <?php
          include('connection.php');
          $sql=  "SELECT * FROM words ORDER BY ID DESC LIMIT 1 ";
          $result = mysqli_query($conn,$sql) or die("Query failed");
          
          // $row = mysqli_fetch_assoc($result);
          // echo"<pre>";
          // print_r($row);
          // echo "</pre>";

          // echo $row ['my_word'];

          while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <div class="card">
          <h4><span id="charCount">0</span>  Characters</h4>
          <h4><span id="wordCount">0</span>  Words</h4>
          <textarea id="textBox"name="word"spellcheck="true" style="width:1000px;height:300px;"><?php echo $row['my_word'];?></textarea>
             <?php
          }
          ?>
         <a href="index.php"><center><button class="btn btn-outline-success">Home Page</button></center></a> 
          
      </div>
      </div>
        <script type="text/javascript">
        var textBox = document.getElementById("textBox");
        var charCount = document.getElementById("charCount");  
        var Characters = textBox.value.split('');         
        charCount.innerHTML = Characters.length; 
    </script>

      <script type="text/javascript">
        
        var textBox = document.getElementById("textBox");
        var wordCount = document.getElementById("wordCount");         
        var count = textBox.value.trim().split(' '); 
          $('#wordCount').text(count.length);
      </script> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
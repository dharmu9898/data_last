<?php
// Create Connection
$conn=mysqli_connect("localhost","root","","word_count");

if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}

?>   
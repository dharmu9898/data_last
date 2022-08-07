<?php
	$conn = mysqli_connect('localhost','aanya','Asdf#1234','employee');

	$q = "select * from salary limit 4";

	$result = mysqli_query($conn,$q);

	while ($row = mysqli_fetch_array($result))
		{
			echo $row['eno']." ";
			echo $row['dept']." ";
			echo $row['salary']." ";
			echo "<br />";
		}
?>

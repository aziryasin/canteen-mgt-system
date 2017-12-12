<?php
	global $con;
	$con=mysqli_connect("localhost","azir","azir@bcs","kamu");
		if(!$con)
		{
			die('could not connect '.mysqli_error($con)."<br>");
		}		
?>

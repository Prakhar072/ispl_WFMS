<?php 
	$db_connect = mysqli_connect('localhost','root','root','wfms');
	
	if (!$db_connect) {
		echo "Error in DB connection.";
	}

 ?>
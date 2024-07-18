<?php 
	$db_connect = mysqli_connect('localhost','root','','integrated_wfms');
	
	if (!$db_connect) {
		echo "Error in DB connection.";
	}

 ?>
<?php session_start();

	if ($_SESSION['user_id']) {
		unset($_SESSION['user_id']);
		session_destroy();
		header('location:signin.php');
	} else {
		header('location:signin.php');
	}
	
 ?>
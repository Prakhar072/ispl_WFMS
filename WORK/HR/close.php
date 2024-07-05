<?php require_once('dbconnect.php');
//print_r($_SESSION);

// 

if (isset($_POST['save_details'])) {

		$assignee  	 = $_POST['employee_id'];
		$last_name       = $_POST['last_name'];
		$gender  		 = $_POST['gender'];
		$phone           = $_POST['phone'];
		$dob  			 = $_POST['dob'];
		$doj  			 = $_POST['doj'];
		$email  		 = $_POST['email'];
        $employee_code   = $_POST['employee_code'];
		$department  	 = $_POST['department'];
        $location  		 = $_POST['location'];
		$position  		 = $_POST['position'];
        $base_salary  	 = $_POST['base_salary'];
		$bonus  		 = $_POST['bonus'];
		$benefits  		 = $_POST['benefits'];
		$stocks  		 = $_POST['stocks'];
		$ctc  			 = $base_salary + $bonus + $benefits + $stocks;
		$manager  		 = $_POST['manager'];
		$password  		 = md5($_POST['password']);
		$created_by      = $_SESSION['user_id'];
		$created_on      = date('Y-m-d');

}
?>
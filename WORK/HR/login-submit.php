<?php require_once('dbconnect.php');
if (isset($_POST['form_submit'])) {

		$email    = $_POST['email'];
		$password = $_POST['password'];

		# echo "entered usenrame is : ".$user_email.' and password is : '.$password';	
	

		$statment = 'select employee_id, password, HR from employee_data where email = "'.$email.'"';

		$query = mysqli_query($db_connect,$statment);

		 if ($query->num_rows>0) {
		 	
		 	$employee = mysqli_fetch_object($query);
		 	$encypted_password = $employee->password;
		 	$user_id = $employee->employee_id;
		 	$password = md5($password);

		 	if ($password == $encypted_password && $employee->HR) {
		 		$_SESSION['user_id'] = $user_id;
		 		$_SESSION['email'] = $email;
		 		header('location:hrdash.php');
		 	
		 	} else if ($password == $encypted_password && !$employee->HR) {
				$_SESSION['user_id'] = $user_id;
				$_SESSION['email'] = $email;
				header('location:../employee_v2/employee_dash.html');
			
			} else {
		 		echo "Invalid login credentials, please try again.";
		 	}

		 } else {
		 	echo "Error No user found related to email : ".$email;
		 }

	} ?>
<?php require_once('dbconnect.php');
//print_r($_SESSION);

// 

if (isset($_POST['update_details'])) {

		$first_name  	 = $_POST['first_name'];
		$last_name       = $_POST['last_name'];
		$phone           = $_POST['phone'];
		$dob  			 = $_POST['dob'];
		$doj  			 = $_POST['doj'];
		$email  		 = $_POST['email'];
        $employee_code   = $_POST['employee_code'];
		$department  	 = $_POST['department'];
        $location  		 = $_POST['location'];
		$position  		 = $_POST['position'];
        $ctc  			 = $_POST['ctc'];
		$manager  		 = $_POST['manager'];
		$password_given  = md5($_POST['password']);
		$updated_by      = $_SESSION['user_id'];
		$updated_on      = date('Y-m-d');

        $statment1 = 'select password from employee_data where email = "'.$email.'"';

		$query = mysqli_query($db_connect,$statment1);

		 if ($query->num_rows>0) {
		 	
		 	$employee = mysqli_fetch_object($query);
		 	$encypted_password = $employee->password;

		 	if ($password_given == $encypted_password) {
		 		
		 	

		$statement2 = 'UPDATE employee_data SET first_name="'.$first_name.'", last_name="'.$last_name.'", 
        fk_department_id="'.$department.'", manager_id="'.$manager.'", hire_date="'.$doj.'", ctc="'.$ctc.'", 
        employee_code="'.$employee_code.'", location_id="'.$location.'", dob="'.$dob.'", email="'.$email.'", phone="'.$phone.'", 
        position_id="'.$position.'", updated_on="'.$updated_on.'", updated_by="'.$updated_by.'" WHERE employee_id='.$_GET['id'];
            

		$run_query = mysqli_query($db_connect,$statement2);

		if ($run_query) {
			echo "Data updated successfully.";
		} else {
			echo "Data could not be saved, please try again.";
		}
    } else{
        echo "Incorrect password";
    }

}
}

 ?>
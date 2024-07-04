<?php require_once('dbconnect.php');
//print_r($_SESSION);

// 

if (isset($_POST['save_details'])) {

		$first_name  	 = $_POST['first_name'];
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

		$statement3 = 'INSERT INTO `employee_data`(`first_name`, `last_name`,`gender`, `password`, `fk_department_id`, `manager_id`, `hire_date`, `ctc`, `employee_code`, `location_id`, `dob`, `email`, `phone`, `position_id`, `created_on`, `created_by`)  
        values("'.$first_name.'","'.$last_name.'", "'.$gender.'","'.$password.'","'.$department.'","'.$manager.'","'.$doj.'","'.$ctc.'","'.$employee_code.'","'.$location.'","'.$dob.'","'.$email.'","'.$phone.'","'.$position.'","'.$created_on.'","'.$created_by.'")';

		//print_r($statement);
// die();
		$run_query = mysqli_query($db_connect,$statement3);

		if ($run_query) {
			echo "Data saved successfully.";

			$creator = $_SESSION['user_id'];

		$statement4 = 'SELECT employee_id FROM employee_data WHERE employee_code="'.$employee_code.'"';
		$run_query2 = mysqli_query($db_connect,$statement4);
	
		
		$employee = mysqli_fetch_object($run_query2);
		$employee_id = $employee->employee_id;

		$statement6 = 'INSERT INTO `total_compensation`(`fk_employee_id`, `base_salary`, `bonus`, `benefits`, `stocks`, `total`) 
		values("'.$employee_id.'","'.$base_salary.'","'.$bonus.'","'.$benefits.'","'.$stocks.'","'.$ctc.'")';

		$run_query6 = mysqli_query($db_connect,$statement6);

		
		$statement5 = 'INSERT INTO `notifications`(`user`,`type`,`date_time`, `affected`, `summary`)
		values("'.$creator.'","Added Employee data","'.$created_on.'","'.$employee_id.'","Added an Employee")';

		$run_query3 = mysqli_query($db_connect,$statement5);
		} else {
			echo "Data could not be saved, please try again.";
		}

		

}

 ?>
<?php require_once('dbconnect.php');
//print_r($_SESSION);

// 

if (isset($_POST['update_ctc'])) {

		$base_salary  	 = $_POST['base_salary'];
		$bonus           = $_POST['bonus'];
		$benefits        = $_POST['benefits'];
		$stocks		     = $_POST['stocks'];
		$total  		 = $base_salary + $bonus + $benefits + $stocks;
		$password_given  = md5($_POST['password']);
		$updated_by      = $_SESSION['user_id'];
		$updated_on      = date('Y-m-d');

        $statment1 = 'select password from employee_data where employee_id = "'.$_GET['id'].'"';

		$query = mysqli_query($db_connect,$statment1);

		 if ($query->num_rows>0) {
		 	
		 	$employee = mysqli_fetch_object($query);
		 	$encypted_password = $employee->password;

		 	if ($password_given == $encypted_password) {
		 		
		 	

		$statement2 = 'UPDATE total_compensation SET base_salary="'.$base_salary.'", bonus="'.$bonus.'", 
        benefits="'.$benefits.'", stocks="'.$stocks.'", total="'.$total.'", updated_on="'.$updated_on.'", updated_by="'.$updated_by.'" WHERE fk_employee_id='.$_GET['id'];
            

		$run_query = mysqli_query($db_connect,$statement2);

		if ($run_query) {
			echo "Data updated successfully.";

			$created_by      = $_SESSION['user_id'];
			$created_on      = date('Y-m-d');
			$creator = $_SESSION['user_id'];

		$statement4 = 'SELECT employee_id FROM employee_data WHERE employee_code="'.$_GET['id'].'"';
		$run_query2 = mysqli_query($db_connect,$statement4);
		$employee = mysqli_fetch_object($run_query2);
		$employee_id = $employee->employee_id;
		
		$statement5 = 'INSERT INTO `notifications`(`user`,`type`,`date_time`, `affected`, `summary`)
		values("'.$creator.'","Updated CTC information","'.$created_on.'","'.$_GET['id'].'","Updated Employee Info")';
		
				$run_query3 = mysqli_query($db_connect,$statement5);

				echo "
                        <script>
                        setTimeout(function(){
                            window.location = 'ind_info.php?id=$user->fk_employee_id';
                            }, 1000); 
                        </script>
                        ";

		} else {
			echo "Data could not be saved, please try again.";
			echo "
                        <script>
                        setTimeout(function(){
                            window.location = 'ctc.php?id=$user->fk_employee_id';
                            }, 1000); 
                        </script>
                        ";
		}
    } else{
        echo "Incorrect password";
		echo "
                        <script>
                        setTimeout(function(){
                            window.location = 'ctc.php?id=$user->fk_employee_id';
                            }, 1000); 
                        </script>
                        ";
    }

}
}

 ?>
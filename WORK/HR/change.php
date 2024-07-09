<?php require_once('dbconnect.php');
//print_r($_SESSION);

// 

if (isset($_POST['change_pass'])) {

		$new_pass        = md5($_POST['new_pass']);
        $password_given  = md5($_POST['old_pass']);
        $updated_by      = $_SESSION['user_id'];
        $updated_on      = date('Y-m-d');

        $statment1 = 'select password from employee_data where employee_id = "'.$_SESSION['user_id'].'"';
		$query = mysqli_query($db_connect,$statment1);

		 if ($query->num_rows>0) {
		 	
		 	$employee = mysqli_fetch_object($query);
		 	$encypted_password = $employee->password;

		 	if ($password_given == $encypted_password) {
                $statement2 = 'UPDATE employee_data SET password="'.$new_pass.'", updated_on="'.$updated_on.'", updated_by="'.$updated_by.'" WHERE employee_id='.$_SESSION['user_id'];
        
		        $run_query = mysqli_query($db_connect,$statement2);

                if ($run_query) {
                    echo "Password updated successfully.";
        
                    $created_by      = $_SESSION['user_id'];
                    $created_on      = date('Y-m-d');
                    $creator = $_SESSION['user_id'];
        
                $statement5 = 'INSERT INTO `notifications`(`user`,`type`,`date_time`, `affected`, `summary`)
                values("'.$creator.'","Updated Employee data","'.$created_on.'","'.$creator.'","changed Employee password")';
                
                        $run_query3 = mysqli_query($db_connect,$statement5);
                }
            } else {
                echo "Incorrect Password";
            }
        } else{
            echo "User Not Found";
        }
}
?>
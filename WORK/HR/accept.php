<?php require_once('dbconnect.php');

if (isset($_POST['accept'])) {
  $emp_id = $_POST['row_id'];
 
    $statement2 = 'UPDATE employee_data SET status="verified_resigned" WHERE employee_id='.$emp_id;
    $run_query = mysqli_query($db_connect,$statement2);
    if ($run_query) {
			echo "Deleted Successfully";

      $created_by      = $_SESSION['user_id'];
      $created_on      = date('Y-m-d');
      $creator = $_SESSION['user_id'];
      $statement5 = 'INSERT INTO `notifications`(`user`,`type`,`date_time`, `affected`, `summary`)
      values("'.$creator.'","Deleted Employee data","'.$created_on.'","'.$emp_id.'","Accepted Resignation")';
  
      $run_query3 = mysqli_query($db_connect,$statement5);
		} else {
			echo "Data could not be deleted, please try again.";
    }

   
  
}
?>
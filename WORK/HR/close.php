<?php require_once('dbconnect.php');
//print_r($_SESSION);

// 

if (isset($_POST['close_request'])) {
		$created_by  	 = $_SESSION['user_id'];
		$date_time       = date('Y-m-d');
		$selected     	 = $_POST['dog_names'];
		$count_sel       = count($selected);
		$reqd_left  	 = $user->no_reqd - $count_sel;
		$status          = "to be changed";
		$string_product = implode(',', $selected);

		if ($reqd_left==0){
			$statement1 = 'UPDATE position_request SET no_reqd="'.$reqd_left.'", status="Closed" WHERE request_id='.$user->request_id;
			$run_query = mysqli_query($db_connect,$statement1);
			$statement10 = 'UPDATE project SET members_id="'.$string_product.'" WHERE project_id='.$user->project_id;
			$run_query10 = mysqli_query($db_connect,$statement10);
			echo "request closed";

			$created_by      = $_SESSION['user_id'];
			$created_on      = date('Y-m-d');
			$creator = $_SESSION['user_id'];

			$statement5 = 'INSERT INTO `notifications`(`user`,`type`,`date_time`, `affected`, `summary`)
			values("'.$creator.'","Filled Position Request","'.$created_on.'","'.$user->employee_id.'","Closed Request Completely")';
			$run_query3 = mysqli_query($db_connect,$statement5);
		}
		else if ($reqd_left<0){
			echo "Error: Too many added, Allowed $user->no_reqd; Actual $count_sel";
		}
		else{
			$statement7 = 'UPDATE position_request SET no_reqd="'.$reqd_left.'" WHERE request_id='.$user->request_id;
			$run_query = mysqli_query($db_connect,$statement7);
			echo "Flled, request still open";

			$created_by      = $_SESSION['user_id'];
			$created_on      = date('Y-m-d');
			$creator = $_SESSION['user_id'];

			$statement9 = 'INSERT INTO `notifications`(`user`,`type`,`date_time`, `affected`, `summary`)
			values("'.$creator.'","Filled Position Request","'.$created_on.'","'.$user->employee_id.'","Closed Request Partially")';
			$run_query3 = mysqli_query($db_connect,$statement9);
		}

}
?>
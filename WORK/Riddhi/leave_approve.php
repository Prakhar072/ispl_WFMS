<?php session_start(); 
 include 'dbconnect.php';
  ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title></title>
    <script src="https://kit.fontawesome.com/e8732148d9.js" crossorigin="anonymous"></script>
</head>
<body>
  <center>
<div style="width: 1440px; height: 1024px; position: relative; background: white">
  <div style="width: 1377px; height: 853px; left: 31px; top: 134px; position: absolute; background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.25) solid"></div>
  <div style=""></div>
  <div class="headbar"></div>
  <a href="ind_info.php">
    <button class="profile_icon" style="border-color: transparent;background-color: transparent;top: 5px;color: white;">
    <i class='fas fa-user-alt' style='font-size:35px'></i>
  </button>
  </a>
  <a href="my_tasks.php">
    <button class="head_task" style="border-color: transparent;background-color: transparent;">Tasks</button>
  </a>
  <a href="project_list.php">
  <button class="head_project" style="border-color: transparent;background-color: transparent;">Projects</button>
  </a>
  <a href="employee_dash.php">
  <button class="house_icon" style="border-color: transparent;background-color: transparent;">
    <i class="fas fa-house-user" style="font-size: 30px;color:white;"></i>
  </button>
  </a>
  
  <div class="leave_application">Leave Request</div>
  <form action="leave_approve.php" method="get">
  <input type="text" name="search" style="width: 636px; height: 44px; left: 67px; top: 145px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 48px; border: 1px rgba(0, 0, 0, 0.50) solid;font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Search by Name, Department or ID </form>
  
  <div class="request_head" style="left: 76px;">S No.</div>
  <div class="request_head" style="left: 169px;">Employee Code</div>
  <div class="request_head" style="left: 385px;">First Name</div>
  <div class="request_head" style="left: 543px;">Leave Type</div>
  <div class="request_head" style="left: 701px;">Duration</div>
  <div class="request_head" style="left: 836px;">Request Date</div>
  <div class="request_head" style="left: 1038px;">Reason</div>
  <div class="request_head" style="left: 1222px;">Status</div>
  



  <?php
  if (isset($_GET['id'])) { 
    $employee_id=$_GET['id'];
    $name=mysqli_query(db_connect,'SELECT `first_name` from `employee_data` where `employee_id`=$employee_id ');
  $date=mysqli_query(db_connect,'SELECT CURDATE()');
    $time=mysqli_query(db_connect,'SELECT CURTIME()');
  $day=mysqli_query(db_connect,'SELECT DAYNAME()');
  echo '<div class="name">$name</div>
  <div class="date">$day, $date</div>
  <div class="time">$time</div>';
  $i=0;
  $box=258;
    while ($i<=6) {
      $sub_id=mysqli_query(db_connect,'SELECT `employee_id` from `employee_data` where `manager_id`=$employee_id');
      if (manager_id==employee_id) {
        $leave_id=mysqli_query(db_connect,'SELECT `leave_id` from `employee_data` where `employee_id`=$sub_id');
        $start=mysqli_query(db_connect,'SELECT `start_date` from `employee_data` where `employee_id`=$sub_id');
        $end=mysqli_query(db_connect,'SELECT `end_date` from `employee_data` where `employee_id`=$sub_id');
        $leave_type=mysqli_query(db_connect,'SELECT `leave_type` from `employee_data` where `employee_id`=$sub_id');
        $reason=mysqli_query(db_connect,'SELECT `reason` from `employee_data` where `employee_id`=$sub_id');
        $request_date=mysqli_query(db_connect,'SELECT `request_date` from `employee_data` where `employee_id`=$sub_id');
        $status=mysqli_query(db_connect,'SELECT `status` from `employee_data` where `employee_id`=$sub_id');
        $box=$box+(100*($i));       
        $top=296+(100*($i));
        $i=$i+1;
        $taken=$leave_type+'_taken';
        $leave_taken=mysqli_query(db_connect,'SELECT $taken from `leave` where `employee_id`=$sub_id');
        echo '<div class="leave_box" style="top:$box px;"></div>
        <div class="serialno" style="top:$top px;">$i</div>
        <div class="employee_code" style="top:$top px;">$employee_id</div>
        <div class="request_name" style="top:$top px;">$name</div>
        <div class="request_type" style="top:$top px;">$leave_type</div>
        <div class="duration" style="top:$top;">$start - $end</div>
        <div class="request_date" style="top:$top px;">$request_date</div>
        <button class="info_icon" style="top:$top px;" >
        <i class="fas fa-info-circle" style="font-size:36px"></i></button>        
        <button class="approve" style="top:$top px;">Approve</button>
        <button class="decline" style="top:$top px;">Decline</button>
        ';

        if (isset($_POST['Approve'])) {
          $stmt1=mysqli_query(db_connect,'UPDATE `status`="approved" in `leave_request` where `employee_id`=$sub_id');
          $stmt2=mysqli_query(db_connect,'UPDATE `status`="approved" in `leave` where `employee_id`=$sub_id');
          $stmt3=mysqli_query(db_connect,'UPDATE `$taken`=$leave_taken+1 `leave` where `employee_id`=$sub_id');

        }
        elseif (isset($_POST['Decline'])) {
          $stmt1=mysqli_query(db_connect,'UPDATE `status`="denied" in `leave_request` where `employee_id`=$sub_id');
          $stmt2=mysqli_query(db_connect,'UPDATE `status`="denied" in `leave` where `employee_id`=$sub_id');
        }
      }
      
    }
    echo '<a href="leave_approve.php"><button class="backbutton" style="left: 71px;">Load Page 2</button></a>';
    if (isset($_POST['Load Page 2'])) {
      $i=7;
    while ($i<=14) {
      $sub_id=mysqli_query(db_connect,'SELECT `employee_id` from `employee_data` where `manager_id`=$employee_id');
      if (manager_id==employee_id) {
        $leave_id=mysqli_query(db_connect,'SELECT `leave_id` from `employee_data` where `employee_id`=$sub_id');
        $start=mysqli_query(db_connect,'SELECT `start_date` from `employee_data` where `employee_id`=$sub_id');
        $end=mysqli_query(db_connect,'SELECT `end_date` from `employee_data` where `employee_id`=$sub_id');
        $leave_type=mysqli_query(db_connect,'SELECT `leave_type` from `employee_data` where `employee_id`=$sub_id');
        $reason=mysqli_query(db_connect,'SELECT `reason` from `employee_data` where `employee_id`=$sub_id');
        $request_date=mysqli_query(db_connect,'SELECT `request_date` from `employee_data` where `employee_id`=$sub_id');
        $status=mysqli_query(db_connect,'SELECT `status` from `employee_data` where `employee_id`=$sub_id');
        $i=$i+1;
        $top=296+(100*($i));
        echo '<div class="serialno" style="top:$top px;">$i</div>
        <div class="employee_code" style="top:$top px;">$employee_id</div>
        <div class="request_name" style="top:$top px;">$name</div>
        <div class="request_type" style="top:$top px;">$leave_type</div>
        <div class="duration" style="top:$top;">$start - $end</div>
        <div class="request_date" style="top:$top px;">$request_date</div>
        
        <button class="approve" style="$top px;">Approve</button>
        <button class="decline" style="$top px;">Decline</button>
        ';
        if (isset($_POST['Approve'])) {
          $stmt1=mysqli_query(db_connect,'UPDATE `status`="approved" in `leave_request` where `employee_id`=$sub_id');
          $stmt2=mysqli_query(db_connect,'UPDATE `status`="approved" in `leave` where `employee_id`=$sub_id');
        }
        elseif (isset($_POST['Decline'])) {
          $stmt1=mysqli_query(db_connect,'UPDATE `status`="denied" in `leave_request` where `employee_id`=$sub_id');
          $stmt2=mysqli_query(db_connect,'UPDATE `status`="denied" in `leave` where `employee_id`=$sub_id');
        }
      }
      
    }
      
    }
  }
?>
<div class="info_icon" onclick="myFunction()" style="top:500 px;">
        <i class="fas fa-info-circle" style="font-size:36px;left: 1058px;"></i>
        <span class="popuptext" id="myPopup">sick</span>
  
</div>

<script>
// When the user clicks on div, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>
   
  <a href="leave_portal.php">
    <button class="backbutton">Back</button>
  </a> 
 
  
</div>
</center>
</body>
</html>
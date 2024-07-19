<?php session_start(); 
 include 'dbconnect.php';
  ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/header.css">
    <title></title>
    <script src="https://kit.fontawesome.com/e8732148d9.js" crossorigin="anonymous"></script>
</head>
<body>
  <center>
    
<div style="width: 1440px; height: 1024px; position: relative; background: white">
  <div style="width: 1377px; height: 853px; left: 31px; top: 134px; position: absolute; background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.25) solid"></div>
  <div class="headbar"></div>
  <a href="ind_info.php">
    <button class="profile_icon" style="border-color: transparent;background-color: transparent;">
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
  
   
  <div class="status_head" style="left: 63px;">S No.</div>
  <div class="status_head" style="left: 214px;">Start Date</div>
  <div class="status_head" style="left: 435px;">End Date</div>
  <div class="status_head" style="left: 665px;">Type</div>
  <div class="status_head" style="left: 873px;">Reason</div>
  <div class="status_head" style="left: 1153px;">Status</div> 
  <div class="leave_application">Leave Application</div>
  <a href="leave_portal.php">
    <button class="backbutton">Back</button>
  </a>
  <div class="leave_box" style="top: 207px;"></div>
  <div class="leave_box" style="top: 305px;"></div>
  <?php
  $name=mysqli_query(db_connect,'SELECT `first_name` from `employee_data` where `employee_id`=$employee_id ');
    $date=mysqli_query(db_connect,'SELECT CURDATE()');
    $time=mysqli_query(db_connect,'SELECT CURTIME()');
    $day=mysqli_query(db_connect,'SELECT DAYNAME()');
    echo '<div class="name">$name</div>
    <div class="date">$day, $date</div>
    <div class="time">$time</div>';
  if (isset($_GET['id'])) {
    
    $employee_id=$_GET['id'];
    $serailno=1;
    while (TRUE) {
    $status=mysqli_query($db_connect,'select `status` from `leave` where `employee_id`=$employee_id');
    if ($status!="Null") {
      echo '<div class="serialno" style="top: 238px;">$serialno</div>';
      echo '<div class="start_date" style="top: 237px;">$startdate</div>';
      echo '<div class="end_date" style="top: 239px;">$enddate</div>';
      echo '<div class="leave_type" style="top: 237px;">$type</div>';
      echo '<div class="reason" style="top: 243px;">$reason</div>';
      echo '<div class="leave_status" style="top: 239px; ">$status</div>';
      $serailno=$serialno+1;
   }
 }
   } ?> 

</div>
</center>
</body>
</html>
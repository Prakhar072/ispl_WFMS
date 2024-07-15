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
  <div class="leave_application">Confirm Attendance</div>
  <div class="status_head" style="left: 76px;">S No.</div>
 <div class="status_head" style="left: 182px;">Employee Code</div>
 <div class="status_head" style="left: 405px;d">First Name</div>
 <div class="status_head" style="left: 621px;">Last Name</div>
 <div class="status_head" style="left: 818px;">Date </div>
 <div class="status_head" style="left: 953px;">Time</div>
 <div class="status_head" style="left: 1086px;">Confirm Attendance</div>
 <a href="attendance_portal.php">
    <button class="backbutton">Back</button>
  </a>
  <?php 
  if (isset($_GET['id'])){
    $name=mysqli_query(db_connect,'SELECT `first_name` from `employee_data` where `employee_id`=$employee_id ');
    $date=mysqli_query(db_connect,'SELECT CURDATE()');
    $time=mysqli_query(db_connect,'SELECT CURTIME()');
    $day=mysqli_query(db_connect,'SELECT DAYNAME()');
    echo '<div class="name">$name</div>
    <div class="date">$day, $date</div>
    <div class="time">$time</div>';
    

    if (isset($_POST['Confirm Attendance'])) {
      $serialno=1;
      $top=258;
      while (TRUE) {
        $sub_id=mysqli_query(db_connect,'SELECT `employee_id` from `employee_data` where `manager_id`=$employee_id');
      if (manager_id==employee_id) {
        $first=mysqli_query(db_connect,'SELECT `first_name` from `employee_data` where `employee_id`=$sub_id');
        $last=mysqli_query(db_connect,'SELECT `last_name` from `employee_data` where `employee_id`=$sub_id');
        $checkintime=mysqli_query(db_connect,'SELECT `checkin_time` from `attendance` where `employee_id`=$sub_id AND `month`=$date(5,6)');

       echo '<div class="leave_box" style="top: $top px;"></div>
       <div class="serialno" style="top:$top+12 px;">$serialno</div>
       <div class="employee_code" style="top:$top+12 px;">$sub_id</div>
       <div class="request_name" style="top:$top+12 px;">$first</div>
       <div class="last_name" style="top:$top+12px;">$last</div>
       <div class="date_att" style="top:$top+12 px; ">$date</div> 
       <div class="punch_time" style="top:$top+12 px; ">$checkintime</div>
        <button name="verify" class="confirm_att" style="top:$top+12px; border-color: transparent;background-color: transparent;">
        <i class="far fa-check-circle" style="font-size:35px"></i>
        </button>';
        $top=$top+100;
        $serailno=$serialno+1;
        if (isset($_POST['verify'])) {
          $stmt=mysqli_query(db_connect,'UPDATE `status`="verified" in `attendance` where `employee_id`=$sub_id AND `month`=$date(5,6)');
        }
     } 
   }
   }
 }
    ?>

  
 
  
</div>
</center>
</body>
</html>
<?php include 'dbconnect.php';
  session_start();?>
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
  <div class="leave_application">Leave Application</div>
  <a href="leave_apply.php">
    <button class="intro_button" style="top: 321px;">Apply for Leave</button>
  </a>
  <a href="leave_status.php">
    <button class="intro_button" style="top: 492px;">Check Leave Status</button>
  </a>
   <a href="leave_approve.php">
     <button class="intro_button" style="top: 623px;">Approve Leave</button>
  </a>
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
}
  ?>
  
  <div style="width: 199px; height: 0px; left: 493px; top: 441px; position: absolute; border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="width: 199px; height: 0px; left: 739px; top: 441px; position: absolute; border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="left: 703px; top: 425px; position: absolute; color: rgba(0, 0, 0, 0.50); font-size: 24px; font-family: Inter; font-weight: 100; word-wrap: break-word">Or</div>
  
  </div>
</div>
</center>



</body>
</html>
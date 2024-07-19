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

  <div style="width: 631px; height: 455px; left: 753px; top: 522px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <a href="project_list.php">
    <button style="width: 644px; height: 380px; left: 48px; top: 597px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></button>
  </a>
  <a href="my_tasks.php">
    <button style="width: 644px; height: 380px; left: 48px; top: 169px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></button>
  </a>
  <div style="left: 980px; top: 558px; position: absolute; color: black; font-size: 32px; font-family: Inter; font-weight: 400; word-wrap: break-word">Other Portals</div>
  <a href="attendance_portal.php">
    <button style="width: 586px; height: 73px; left: 776px; top: 615px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid;color: black; font-size: 24px; font-family: Inter; font-weight: 400;text-align:center; word-wrap: break-word">Mark Attendance</button>
  </a>
  <a href="apply_newpos.php">
    <button style="width: 586px; height: 73px; left: 776px; top: 699px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid;color: black; font-size: 24px; font-family: Inter; font-weight: 400;text-align:center; word-wrap: break-word">Apply for New Position</button>
  </a>
  <a href="leave_portal.php">
    <button style="width: 586px; height: 73px; left: 776px; top: 784px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid;color: black; font-size: 24px; font-family: Inter; font-weight: 400;text-align:center; word-wrap: break-word">Leave Portal</button>
  </a>
  <a href="task_verify.php">
    <button style="width: 586px; height: 73px; left: 776px; top: 869px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid;color: black; font-size: 24px; font-family: Inter; font-weight: 400;text-align:center; word-wrap: break-word">Verify Tasks</button>
  </a>
  
  <div style="width: 612px; height: 73px; left: 61px; top: 688px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="width: 612px; height: 73px; left: 61px; top: 784px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="width: 612px; height: 73px; left: 61px; top: 880px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="left: 1240px; top: 87px; position: absolute; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word">Dashboard</div>
  
 
 
  <div style="left: 87px; top: 710px; position: absolute; color: black; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">HRMS Project </div>
  <div style="left: 549px; top: 710px; position: absolute; text-align: right; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Manager</div>
  <div style="left: 87px; top: 806px; position: absolute; color: black; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Regional Campaign </div>
  <div style="left: 87px; top: 902px; position: absolute; color: black; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Annual Audit </div>
  
  <div style="left: 112px; top: 233px; position: absolute; color: black; font-size: 32px; font-family: Inter; font-weight: 400; word-wrap: break-word">Tasks Outstanding</div>
  <div style="left: 112px; top: 310px; position: absolute; color: black; font-size: 32px; font-family: Inter; font-weight: 400; word-wrap: break-word">Tasks Completed<br/>This Month</div>
  <div style="left: 112px; top: 416px; position: absolute; color: black; font-size: 32px; font-family: Inter; font-weight: 400; word-wrap: break-word">Tasks Completed<br/>This Week</div>
  <div style="left: 80px; top: 627px; position: absolute; color: black; font-size: 32px; font-family: Inter; font-weight: 400; word-wrap: break-word">My Projects</div>
  <div style="left: 514px; top: 315px; position: absolute; color: black; font-size: 64px; font-family: Inter; font-weight: 600; word-wrap: break-word">34</div>
  <div style="left: 552px; top: 416px; position: absolute; color: black; font-size: 64px; font-family: Inter; font-weight: 600; word-wrap: break-word">9</div>
  <div style="left: 556px; top: 217px; position: absolute; color: black; font-size: 64px; font-family: Inter; font-weight: 600; word-wrap: break-word">7</div>
  <div style="width: 284px; height: 0px; left: 452px; top: 217px; position: absolute; transform: rotate(90deg); transform-origin: 0 0; border: 2px black solid"></div>
  
  
</div>
</center>
</body>
</html>
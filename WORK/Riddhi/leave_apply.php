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
    
  <div class="leave_application">Leave Application</div>
  <form action="leave_apply.php" method="POST">
    <select class="inputbox" style="top: 210px;left: 525px; font-size: 32px; text-align: center;" name="leavetype">
    <option value="Leaves">Select from drop-down box</option>
    <option value="CL">CL</option>
    <option value="EL">EL</option>
    <option value="PTO">PTO</option>
    <option value="SL">SL</option>
   </select>
  </form>
  <a href="leave_portal.php">
    <button class="backbutton">Cancel</button>
  </a>
  <div class="text" style="top: 241px;">Leave Type :</div>
  <div class="text" style="top: 511px;">Start Date :</div>
  <div class="text" style="top: 638px;">End Date :</div>
  <div class="text" style="top: 375px;">Reason:</div>
  </div>
  
  <form action="leave_status.php" method="POST" >
    <input type="text" name="reason" class="inputbox" style="top: 348px;left: 564px; text-align: center;">
  </form>

  <form action="leave_status.php" method="POST" >
    <input class="datebox" style="top: 486px;text-align:center;font-size: 30px;" type="date" name="startdate">
  </form>
  <form action="leave_status.php" method="POST">
    <input class="datebox" style="top: 620px;text-align:center;font-size: 30px;" type="date" name="enddate">
  </form>
  <?php
  if (isset($_GET['id'])){
    $name=mysqli_query(db_connect,'SELECT `first_name` from `employee_data` where `employee_id`=$employee_id ');
    $datetime=mysqli_query(db_connect,'SELECT NOW()');
    $date=$datetime(0,10);
    $time=$time(11,);
    $day=mysqli_query(db_connect,'SELECT DAYNAME()');
    echo '<div class="name">$name</div>
    <div class="date">$day, $date</div>
    <div class="time">$time</div>';
    if(isset($_POST['Submit'])) { 
      $employee_id=$_GET['id'];   
      $leavetype=$_POST['leavetype']; 
      $reason=$_POST['reason'];
      $start=$_POST['startdate']; 
      $enddate=$_POST['enddate'];
      $duration=$enddate-$start;
      $total="total_"+$leavetype;
      $taken=$leavetype+"_taken";
      if (duration<=($total-$taken)) {
        $leave_apply=mysqli_query(db_connect,'UPDATE $status="pending" in `leave` where employee_id=$employee_id');
        $statement=mysqli_query(db_connect,'INSERT into `leave_request`(`employee_id`,`start_date`,`end_date`,`leave_type`,`reason`,`request_date`,`status`) VALUES ($employee_id,$start,$enddate,$leavetype,$reason,$date,$status ');
        echo '<a href="leave_status.php"><button style="width: 502px; height: 69px; left: 456px; top: 780px; position: absolute; background:#1D8AA1;border-color: transparent; border-radius: 44px;color: white; font-size: 40px; font-family: Inter; font-weight: 400;word-wrap: break-word">Submit</button></a>';
      }
      else{
        echo "Not enough leaves available in this category";
      }
    }
  }
  ?>
  
  
  
  
  
  
</div>
</center>
</body>
</html>
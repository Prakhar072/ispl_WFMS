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
   <a href="ind_info.php"><button style="left: 1324px; top: 942px; position: absolute; color: #1D8AA1; font-size: 24px; font-family: Inter;background-color: transparent; font-weight: 400;border-color: transparent; word-wrap: break-word">Back</button></a>
  
  <?php 
  if (isset($_GET['id'])){
    $employee_id=$_GET['id'];
    $name=mysqli_query(db_connect,'SELECT `first_name` from `employee_data` where `employee_id`=$employee_id ');
    $date=mysqli_query(db_connect,'SELECT CURDATE()');
    $time=mysqli_query(db_connect,'SELECT CURTIME()');
    $day=mysqli_query(db_connect,'SELECT DAYNAME()');
    echo '<div class="name">$name</div>
    <div class="date">$day, $head_date</div>
    <div class="time">$time</div>';}?>

  <div style="left: 1159px; top: 77px; position: absolute; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word">CTC Breakdown</div>
  <div style="width: 505px; height: 90px; left: 559px; top: 479px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="width: 505px; height: 90px; left: 559px; top: 339px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="width: 509px; height: 90px; left: 559px; top: 195px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="width: 509px; height: 90px; left: 555px; top: 759px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="width: 505px; height: 90px; left: 559px; top: 619px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="width: 140px; left: 305px; top: 853px; position: absolute; color: white; font-size: 40px; font-family: Inter; font-weight: 400; word-wrap: break-word">Submit</div>
 
  <div style="left: 387px; top: 224px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Base Salary:</div>
  <div style="left: 611px; top: 225px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">70k</div>
  <div style="left: 611px; top: 367px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">500k</div>
  <div style="left: 611px; top: 509px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">750k</div>
  <div style="left: 611px; top: 651px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">750k</div>
  <div style="left: 606px; top: 790px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">2.07M</div>
  <div style="left: 457px; top: 788px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Total:</div>
  <div style="left: 449px; top: 368px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Bonus:</div>
  <div style="left: 427px; top: 512px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Benefits:</div>
  <div style="left: 443px; top: 656px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Stocks:</div>
  <div style="left: 1188px; top: 166px; position: absolute; color: #1D8AA1; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Generate Payslip</div>
  
  </div>
</div>
</center>
</body>
</html>
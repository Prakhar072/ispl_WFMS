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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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
  <div class='leave_application'>Attendance</div>
  <div style="width: 502px; height: 69px; left: 62px; top: 887px; position: absolute; background: #1D8AA1; border-radius: 44px"></div>
  
  <div style="width: 592px; height: 437px; left: 62px; top: 169px; position: absolute; background: transparent; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.25) solid"></div>
  <div style="width: 450px; height: 82px; left: 85px; top: 210px; position: absolute; color: black; font-size: 50px; font-family: Inter; font-weight: 600; word-wrap: break-word">Monthly&nbsp;Attendance</div>
  <canvas id="myChart" style="width:100%;max-width:600px;left: 20px; top: 270px;position: absolute;"></canvas>

<?php 
  if (isset($_GET['id'])){
    $employee_id=$_GET['id'];
    $name=mysqli_query(db_connect,'SELECT `first_name` from `employee_data` where `employee_id`=$employee_id ');
    $date=mysqli_query(db_connect,'SELECT CURDATE()');
    $time=mysqli_query(db_connect,'SELECT CURTIME()');
    $day=mysqli_query(db_connect,'SELECT DAYNAME()');
    echo '<div class="name">$name</div>
    <div class="date">$day, $head_date</div>
    <div class="time">$time</div>'; 
    $latelog=mysqli_query(db_connect,'SELECT `late_login` from `attendance` where `employee_id`=$employee_id');
      $earlylog=mysqli_query(db_connect,'SELECT `early_login` from `attendance` where `employee_id`=$employee_id');
      $PTO=mysqli_query(db_connect,'SELECT `PTO_taken` from `leave` where `employee_id`=$employee_id');
      $sick=mysqli_query(db_connect,'SELECT `SL_taken` from `leave` where `employee_id`=$employee_id');
      $casual=mysqli_query(db_connect,'SELECT `CL_taken` from `leave` where `employee_id`=$employee_id');
      $EL=mysqli_query(db_connect,'SELECT `EL_taken` from `leave` where `employee_id`=$employee_id');
      echo '<div style="left: 776px; top: 286px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 48px; font-family: Inter; font-weight: 600; word-wrap: break-word">$latelog</div>';
      echo '<div style="left: 948px; top: 289px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 48px; font-family: Inter; font-weight: 600; word-wrap: break-word">$earlylog</div>';
      echo '<div style="left: 760px; top: 504px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 48px; font-family: Inter; font-weight: 600; word-wrap: break-word">$PTO</div>';
      echo '<div style="left: 970px; top: 504px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 48px; font-family: Inter; font-weight: 600; word-wrap: break-word">$casual</div>';
      echo '<div style="left: 760px; top: 748px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 48px; font-family: Inter; font-weight: 600; word-wrap: break-word">$sick</div>';
      echo '<div style="left: 970px; top: 748px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 48px; font-family: Inter; font-weight: 600; word-wrap: break-word">$EL</div>';
      $present=mysqli_query(db_connect,'SELECT `present` from `attendance` where `employee_id`=$employee_id and `month`=$date(5,6)');
      $absent=mysqli_query(db_connect,'SELECT `absent` from `attendance` where `employee_id`=$employee_id');
      echo '<script>
        const xValues = ["Present","Absent"];
        const yValues = [$present,$absent];
        const barColors = [
          "#b91d47",
          "#00aba9",
        ];

        new Chart("myChart", {
          type: "doughnut",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: barColors,
              data: yValues
            }]
          },
          options: {
            title: {
              display: true,
            }
          }
        });
        </script>';    
      echo '<button style="width: 260px; height: 263px; left: 1114px; top: 169px; position: absolute; background: #1D8AA1; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.25) solid;text-align: center; color: white; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word">Punch<br/>Attendance</button>';      
      if (isset($_POST['Punch</br>Attendance'])) {
        $checkin=mysqli_query(db_connect,'SELECT CURTIME()');
        if ($date(8,10)=='01') {
          $query=mysqli_query(db_connect,'INSERT into `attendance`(`employee_id`,`month`,`present`,`absent`,`date`,`checkin_time`,`late_login`,`early_login`,`status`) VALUES($employee_id,$date(5,6),0,0,$date,$checkin,0,0,"unverified")');
          }
        else {
          $stmt1=mysqli_query(db_connect,'UPDATE `present`=$present+1 in `attendance` where `employee_id`=$employee_id AND `month`=$date(5,7)');
          $stmt2=mysqli_query(db_connect,'UPDATE `date`=$date where `employee_id`=$employee_id AND `month`=$date(5,7)');
        } 
        if ($checkin>'09:00:00') {
          $stmt3=mysqli_query(db_connect,'UPDATE `late_login`=$latelog+1 where `employee_id`=$employee_id');
        }
        elseif ($checkin<'09:00:00') {
          $stmt3=mysqli_query(db_connect,'UPDATE `early_login`=$earlylog+1 where `employee_id`=$employee_id');
        }
      }
      else{
        $stmt4=mysqli_query(db_connect,'UPDATE `absent`=$absent+1 where `employee_id`=$employee_id and `month`=$date(5,7)');
      }
  
  }?>

<a href="attendance_verify.php">
    <button style="width: 395px; left: 129px; top: 898px; position: absolute; color: white; font-size: 40px;background-color:#1D8AA1; font-family: Inter; font-weight: 400;text-align: center;border-color: transparent; word-wrap: break-word">Confirm Attendance</button>
  </a>';
  
  
  <div style="width: 381px; height: 219px; left: 698px; top: 625px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="left: 721px; top: 648px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 600; word-wrap: break-word">Leaves Taken</div>
  <div style="left: 767px; top: 705px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Sick</div>
  <div style="left: 949px; top: 705px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">EL</div>
  <div style="width: 139px; height: 0px; left: 889px; top: 693px; position: absolute; transform: rotate(90deg); transform-origin: 0 0; border: 1px black solid"></div>
  
  <div style="width: 381px; height: 219px; left: 698px; top: 387px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="left: 721px; top: 404px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 600; word-wrap: break-word">Leaves Taken</div>
  <div style="left: 767px; top: 461px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">PTO</div>
  <div style="left: 949px; top: 461px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Casual</div>
  
  <div style="width: 381px; height: 201px; left: 698px; top: 169px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="left: 767px; top: 243px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Late</div>
  <div style="left: 953px; top: 244px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Early</div>
  
  
  
  
  <div style="left: 721px; top: 186px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 600; word-wrap: break-word">Late Vs. Early Logins</div>
  <div style="width: 139px; height: 0px; left: 889px; top: 449px; position: absolute; transform: rotate(90deg); transform-origin: 0 0; border: 1px black solid"></div>
  <div style="width: 110px; height: 0px; left: 889px; top: 231px; position: absolute; transform: rotate(90deg); transform-origin: 0 0; border: 1px black solid"></div>
  
 
</div>
</center>
</body>
</html>
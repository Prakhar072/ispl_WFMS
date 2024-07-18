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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <style >
      .month {
  padding: 70px 25px;
  width: 100%;
  background: #1abc9c;
  text-align: center;
}

.month ul {
  margin: 0;
  padding: 0;
}

.month ul li {
  color: white;
  font-size: 20px;
  text-transform: uppercase;
  letter-spacing: 3px;
}

.month .prev {
  float: left;
  padding-top: 10px;
}

.month .next {
  float: right;
  padding-top: 10px;
}

.weekdays {
  margin: 0;
  padding: 10px 0;
  background-color: #ddd;
}

.weekdays li {
  display: inline-block;
  width: 13.6%;
  color: #666;
  text-align: center;
}

.days {
  padding: 10px 0;
  background: #eee;
  margin: 0;
}

.days li {
  list-style-type: none;
  display: inline-block;
  width: 13.6%;
  text-align: center;
  margin-bottom: 5px;
  font-size:12px;
  color: #777;
}

.days li .active {
  padding: 5px;
  background: #1abc9c;
  color: white !important
}

/* Add media queries for smaller screens */
@media screen and (max-width:720px) {
  .weekdays li, .days li {width: 13.1%;}
}

@media screen and (max-width: 420px) {
  .weekdays li, .days li {width: 12.5%;}
  .days li .active {padding: 2px;}
}

@media screen and (max-width: 290px) {
  .weekdays li, .days li {width: 12.2%;}
}
    </style>
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
  <canvas id="myChart" style="width:100%;max-width:600px;left: 20px; top: 700px;position: absolute;"></canvas>
  <div style="width: 394px; height: 280px; left: 67px; top: 673px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <button style="left: 1210px; top: 750px; position: absolute; color: #F53B00;background-color: transparent;border-color: transparent; font-size: 30px; font-family: Inter; font-weight: 400; word-wrap: break-word">Resign</button>
  <div style="width: 511px; height: 502px; left: 489px; top: 194px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <?php 
  if (isset($_GET['id'])){
    $employee_id=$_GET['id'];
    $firstname=mysqli_query(db_connect,'SELECT `first_name` from `employee_data` where `employee_id`=$employee_id ');
    $lastname=mysqli_query(db_connect,'SELECT `last_name` from `employee_data` where `employee_id`=$employee_id ');
    $name=$firstname+" "+$lastname;
    $mail=mysqli_query(db_connect,'SELECT `email` from `employee_data` where `employee_id`=$employee_id ');
    $phone=mysqli_query(db_connect,'SELECT `phone` from `employee_data` where `employee_id`=$employee_id ');
    $deptid=mysqli_query(db_connect,'SELECT `fk_department_id` from `employee_data` where `employee_id`=$employee_id ');
    $dept=mysqli_query(db_connect,'SELECT `dep_name` from `department` where `department_id`=$deptid ');
    $position_id=mysqli_query(db_connect,'SELECT `position_id` from `employee_data` where `employee_id`=$employee_id ');
    $role=mysqli_query(db_connect,'SELECT `pos_name` from `position` where `position_id`=$position_id ');
    $locationid=mysqli_query(db_connect,'SELECT `loc_name` from `location` where `location_id`=$locationid ');
    $location=mysqli_query(db_connect,'SELECT `email` from `employee_data` where `employee_id`=$employee_id ');
    $joining=mysqli_query(db_connect,'SELECT `hire_date` from `employee_data` where `employee_id`=$employee_id ');
    $salary=mysqli_query(db_connect,'SELECT `ctc` from `employee_data` where `employee_id`=$employee_id ');
    $date=mysqli_query(db_connect,'SELECT CURDATE()');
    $today=date(8,10);
    $year=$date(0,4);
    $month=$date(5,7);
    $time=mysqli_query(db_connect,'SELECT CURTIME()');
    $day=mysqli_query(db_connect,'SELECT DAYNAME()');
    echo '<div class="name">$name</div>
    <div class="date">$day, $head_date</div>
    <div class="time">$time</div>'; 
    echo '<div style="left: 71px; top: 146px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Employee Code: $employee_id</div>';
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
        echo '<div class="month">      
  <ul>
    <li class="prev">&#10094;</li>
    <li class="next">&#10095;</li>
    <li>
      $month<br>
      <span style="font-size:18px">$year</span>
    </li>
  </ul>
</div>

<ul class="weekdays">
  <li>Mo</li>
  <li>Tu</li>
  <li>We</li>
  <li>Th</li>
  <li>Fr</li>
  <li>Sa</li>
  <li>Su</li>
</ul>

<ul class="days">  
  <li>1</li>
  <li>2</li>
  <li>3</li>
  <li>4</li>
  <li>5</li>
  <li>6</li>
  <li>7</li>
  <li>8</li>
  <li>9</li>
  <li><span class="active">$today</span></li>
  <li>11</li>
  <li>12</li>
  <li>13</li>
  <li>14</li>
  <li>15</li>
  <li>16</li>
  <li>17</li>
  <li>18</li>
  <li>19</li>
  <li>20</li>
  <li>21</li>
  <li>22</li>
  <li>23</li>
  <li>24</li>
  <li>25</li>
  <li>26</li>
  <li>27</li>
  <li>28</li>
  <li>29</li>
  <li>30</li>
  <li>31</li>
</ul>';
        echo '<div style="width: 113px; left: 773px; top: 256px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">$name</div>
      <div style="width: 193px; left: 773px; top: 311px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">$mail</div>
      <div style="width: 154px; left: 773px; top: 369px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">$phone</div>
      <div style="width: 113px; left: 773px; top: 427px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">$dept</div>
      <div style="width: 113px; left: 773px; top: 485px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">$role</div>
      <div style="width: 166px; left: 773px; top: 543px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">$location</div>
      <div style="width: 180px; left: 773px; top: 601px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">$joining</div>
      <div style="width: 113px; left: 773px; top: 659px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">$salary</div>';
        if (isset($_POST['Resign'])) {
            echo "Request sent to HR";
          }  
      }
    ?>
      <div class="leave_application ">Personal Information</div>
      <div style="width: 375px; height: 367px; left: 67px; top: 194px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
      
      <div style="width: 381px; height: 219px; left: 1015px; top: 499px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
      <a href="ctc.php">
        <button style="width: 381px; height: 181px; left: 488px; top: 717px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></button>
      </a>
      
      <div style="left: 1080px; top: 573px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">PTO</div>
      <div style="left: 540px; top: 770px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Base</div>
      <div style="left: 1274px; top: 573px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Casual</div>
      <div style="left: 700px; top: 770px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Other</div>
      <div style="left: 1046px; top: 516px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 600; word-wrap: break-word">Leaves Taken</div>
      <div style="left: 1085px; top: 616px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 48px; font-family: Inter; font-weight: 600; word-wrap: break-word">45</div>
      
      <div style="left: 1295px; top: 616px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 48px; font-family: Inter; font-weight: 600; word-wrap: break-word">2</div>
      <div style="left: 700px; top: 800px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 48px; font-family: Inter; font-weight: 600; word-wrap: break-word">2M</div>
      <div style="left: 500px; top: 728px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 600; word-wrap: break-word">CTC Components</div>
      <div style="left: 540px; top: 800px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 48px; font-family: Inter; font-weight: 600; word-wrap: break-word">70k</div>
      <div style="left: 529px; top: 211px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 600; word-wrap: break-word">Employee Details</div>
      <div style="left: 82px; top: 690px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 600; word-wrap: break-word">Attendance</div>
      
      <img style="width: 397px; height: 468px; left: 67px; top: 194px; position: absolute" src="https://via.placeholder.com/397x468" />
      <div style="width: 139px; height: 0px; left: 1214px; top: 561px; position: absolute; transform: rotate(90deg); transform-origin: 0 0; border: 1px black solid"></div>
      <div style="width: 110px; height: 0px; left: 650px; top: 770px; position: absolute; transform: rotate(90deg); transform-origin: 0 0; border: 1px black solid"></div>
      
      
      
      
      <div style="width: 71px; left: 535px; top: 253px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Name</div>
      
      <div style="left: 535px; top: 311px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Email</div>
      <div style="left: 535px; top: 601px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Joining Date</div>
      <div style="left: 535px; top: 660px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Salary</div>
      <div style="left: 535px; top: 543px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Location</div>
      <div style="left: 535px; top: 369px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Phone Number</div>
      <div style="left: 535px; top: 427px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Department</div>
      <div style="left: 535px; top: 485px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Role</div>
    </div>
</center>
</body>
</html>
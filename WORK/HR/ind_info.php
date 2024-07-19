<?php session_start();

require_once('dbconnect.php');

if (isset($_SESSION['user_id'])) {
require_once('../common/header.php') ?>

<?php 
  $query1 = "SELECT gender, count(*) AS total FROM employee_data WHERE status ='Active' GROUP BY gender";
  // FETCHING DATA FROM DATABASE 
  $result1 = $db_connect->query($query1); 
        // OUTPUT DATA OF EACH ROW 
        $gen1 = $result1->fetch_assoc(); 
        $gen2 = $result1->fetch_assoc();
        $gen3 = $result1->fetch_assoc();
        $male = $gen1['total'];
        $female = $gen2['total'];
        $other = $gen3['total'];
  ?>

<?php if (isset($_GET['id'])) {
  $statement = "SELECT * from employee_data where employee_id=".$_GET['id'];
    $run_query = mysqli_query($db_connect,$statement);

    if ($run_query) {
      $user = mysqli_fetch_object($run_query);
    }
  }

  $statement2 = 'SELECT * from total_compensation where fk_employee_id="'.$_GET['id'].'"';
  $run_query2 = mysqli_query($db_connect,$statement2);

  if ($run_query2) {
    $user2 = mysqli_fetch_object($run_query2);
  } else{
    $user2;
  }

  $statement3 = "SELECT employee_data.*, department.dep_name, position.pos_name, location.loc_name FROM employee_data, department, position, location WHERE employee_data.fk_department_id=department.department_id && employee_data.position_id = position.position_id &&employee_data.location_id = location.location_id && employee_id=".$_GET['id'];
            $query3 = mysqli_query($db_connect,$statement3);
            $result = mysqli_fetch_array($query3);

            $statement4 = "SELECT employee_data.*, department.dep_name, position.pos_name, location.loc_name FROM employee_data, department, position, location WHERE employee_data.fk_department_id=department.department_id && employee_data.position_id = position.position_id &&employee_data.location_id = location.location_id && employee_id=".$result['manager_id'];
            $query4 = mysqli_query($db_connect,$statement4);
            if ($query4){
            $result4 = mysqli_fetch_array($query4);
            } else {
              $result4 = [];
            }
            $statement5 = 'SELECT * from attendance where employee_id="'.$_GET['id'].'"';
            $run_query5 = mysqli_query($db_connect,$statement5);
          
            if ($run_query5) {
              $user5 = mysqli_fetch_object($run_query5);
            } else{
              $user5;
            }
  ?>



  <div style="left: 1085px; top: 107px; position: absolute; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word">Personal Information</div>
  <div style="width: 375px; height: 367px; left: 67px; top: 194px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="left: 1035px; top: 683px; position: absolute; color: #1D8AA1; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word"><a href="update_data.php?id=<?php echo $user->employee_id ?>">Update Information</a></div>
  <div style="left: 1035px; top: 713px; position: absolute; color: #1D8AA1; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word"><a href="ctc.php?id=<?php echo $user->employee_id ?>">Update CTC</a></div>
  <div style="left: 1035px; top: 943px; position: absolute; color: red; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word"><a style="color:red;" href="change_password.php?id=<?php echo $user->employee_id ?>">Change Password</a></div>
  <div style="left: 529px; top: 211px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 600; word-wrap: break-word">Employee Details</div>

  <!--leave box-->
  <div class="leave-box">
  <div class="topi" style="display:grid; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 600; word-wrap: break-word">Early Vs. Late</div>
  <div style="color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Early</div>
  <div style="color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Late</div>
  <div style="color: rgba(0, 0, 0, 0.75); font-size: 48px; font-family: Inter; font-weight: 600; word-wrap: break-word"><?php if($user5 == null){echo "Not Found";}else{echo $user5->early_login;}?></div>
  <div style="color: rgba(0, 0, 0, 0.75); font-size: 48px; font-family: Inter; font-weight: 600; word-wrap: break-word"><?php if($user5 == null){echo "Not Found";}else{echo $user5->late_login;}?></div>
  </div>

  <!--ctc box-->
  <div  class="leave-box" style="left: 1035px; top: 441px; position: absolute;">
  <div class="topi" style="color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 600; word-wrap: break-word">CTC Components</div>
  <div style="color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Base</div>
  <div style="color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Other</div>
  <div style="color: rgba(0, 0, 0, 0.75); font-size: 48px; font-family: Inter; font-weight: 600; word-wrap: break-word"><?php if($user2 == null){echo "Not Found";}else{echo $user2->base_salary;}?></div>
  <div style="color: rgba(0, 0, 0, 0.75); font-size: 48px; font-family: Inter; font-weight: 600; word-wrap: break-word"><?php if($user2 == null){echo "Not Found";}else{echo $user2->total - $user2->base_salary;}?></div>
  </div>

  <!--attendance box-->
 
  <div style="align-items: center; justify-content: center; display:grid; width: 394px; height: 294px; left: 67px; top: 683px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid">
  <!--<div style="color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 600; word-wrap: break-word; justify-self:left; padding-left:15px; padding-top:15px;">Attendance</div>-->
  <canvas id="myChart2"></canvas>
  </div>


  <!--detail box-->
  <div style="display:grid; grid-template-columns: 1fr 1fr; width: 511px; height: 783px; left: 489px; top: 194px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid">
  <div class="info-text-left">Name</div>
  <div class="info-text-right"><?php echo $user->first_name,' ', $user->last_name ?></div>
  <div class="info-text-left">Employee Code</div>
  <div class="info-text-right"><?php echo $user->employee_code ?></div>
  <div class="info-text-left">Email</div>
  <div class="info-text-right"><?php echo $user->email ?></div>
  <div class="info-text-left">DOB</div>
  <div class="info-text-right"><?php echo $user->dob ?></div>
  <div class="info-text-left">Joining Date</div>
  <div class="info-text-right"><?php echo $user->hire_date ?></div>
  <div class="info-text-left">CTC</div>
  <div class="info-text-right"><?php echo $user->ctc ?></div>
  <div class="info-text-left">PTO Left</div>
  <div class="info-text-right"><?php echo $user->first_name ?></div>
  <div class="info-text-left">Rep. Manager</div>
  <div class="info-text-right"><?php if($result4 == []){echo "Not Found";}else{echo $result4[1]. " " .$result4[2];}?></div>
  <div class="info-text-left">Rep. Manager Code</div>
  <div class="info-text-right"><?php if($result4 == []){echo "Not Found";}else{echo $user->manager_id;}?></div>
  <div class="info-text-left">Location</div>
  <div class="info-text-right"><?php echo $result['loc_name'] ?></div>
  <div class="info-text-left">Phone Number</div>
  <div class="info-text-right"><?php echo $user->phone ?></div>
  <div class="info-text-left">Department</div>
  <div class="info-text-right"><?php echo $result['dep_name'] ?></div>
  <div class="info-text-left">Role</div>
  <div class="info-text-right"><?php echo $result['pos_name'] ?></div> 
  </div>

  <!--image box-->
  <img style="width: 397px; height: 468px; left: 67px; top: 194px; position: absolute" src="https://via.placeholder.com/397x468" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
  const ktx = document.getElementById('myChart2');
  new Chart(ktx, {
    type: 'doughnut',
    data: {
      labels: ['Present', 'Absent'],
      datasets: [{
        data: [<?php if($user5 == null){echo "1";}else{echo $user5->present;}?>,<?php if($user5 == null){echo "1";}else{echo $user5->absent;}?>],
        borderWidth: 3
      }]
    },
    options: {
      cutout: '35%'
    },
    overrides:{
        plugins:{
          legend:{
            position: 'left',
          }
        }
      }
  });
</script>

<?php
  require_once('../common/footer.php');

  } else {
    header('location:signin.php');
      
    }
      
?>
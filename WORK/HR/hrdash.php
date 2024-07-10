<?php session_start();
require_once('dbconnect.php');

if (isset($_SESSION['user_id'])) {
require_once('../common/header.php') ?>



  <div style=" display:grid; grid-template-rows:40fr 300fr; width: 410px; height: 775px; left: 1014px; top: 145px; position: absolute; background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.25) solid">
  <div style="text-align: left; padding-left: 25px; padding-top: 24px; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word">Department Salary</div>
  <div>
  <canvas id="salarychart"></canvas>
  </div>
  </div>

  
  
  <!--gender pie chart-->
  <?php 
  $query1 = "SELECT gender, count(*) AS total FROM employee_data GROUP BY gender";
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

 <!--Headcount-->
<?php 
  $query2 = "SELECT COUNT(*) FROM employee_data";
  // FETCHING DATA FROM DATABASE 
  $result2 = $db_connect->query($query2); 
  $headcount = mysqli_fetch_row($result2)[0];
  ?>

<!--terminations-->
<?php 
  $query7 = "SELECT COUNT(*) FROM employee_data WHERE status = 'verified_resigned'";
  // FETCHING DATA FROM DATABASE 
  $result7 = $db_connect->query($query7); 
  $terminations = mysqli_fetch_row($result7)[0];
  ?>

  <!--salary chart-->
  <?php
    $query3 = "SELECT fk_department_id, AVG(ctc) as avg FROM employee_data GROUP BY fk_department_id";
    $result3 = $db_connect->query($query3);
    $dep_count = $result3->num_rows;
    $avg_ctc_depwise= array();
    for($i=0;$i<$dep_count;$i++){
      $l1= $result3->fetch_assoc()['avg'];
      $avg_ctc_depwise[] = $l1;
    }
    $avg_ctc_total = array_sum($avg_ctc_depwise);
  ?>

<!--new hires-->
<?php
  $current = date('Y-m-01');
  $query4 = "SELECT * FROM `employee_data` WHERE hire_date>= '$current'";
  $result4 = $db_connect->query($query4);
  $new_hires = $result4->num_rows;
?>

<!--average tenure-->
<?php
  $query5 = "SELECT TIMESTAMPDIFF(YEAR, hire_date,CURRENT_DATE) AS WorkExperience FROM employee_data";
  $result5 = $db_connect->query($query5); 
  $differences = array();
  for($i=0;$i<$result5->num_rows;$i++){
    $differences[] = $result5->fetch_assoc()['WorkExperience'];
  }
  $sum_tenure = array_sum($differences);
  $avg_tenure = round($sum_tenure/$headcount,2);
?>

<!--average age-->
<?php
  $query6 = "SELECT TIMESTAMPDIFF(YEAR, dob,CURRENT_DATE) AS WorkExperience FROM employee_data";
  $result6 = $db_connect->query($query6); 
  $differences = array();
  for($i=0;$i<$result6->num_rows;$i++){
    $differences[] = $result6->fetch_assoc()['WorkExperience'];
  }
  $sum_age = array_sum($differences);
  $avg_age = round($sum_age/$headcount,2);
?>

<!--open positions-->
<?php
    $query8 = "SELECT department_id, COUNT(department_id) as count FROM position_request GROUP BY department_id";
    $result8 = $db_connect->query($query8);
    $dep_count_pos = $result8->num_rows;
    $pos_depwise= array();
    for($i=0;$i<$dep_count_pos;$i++){
      $l2= $result8->fetch_assoc()['count'];
      $pos_depwise[] = $l2;
    }
  ?> 

  <div style="width: 559px; height: 412px; left: 433px; top: 582px; position: absolute; background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.25) solid">
 <canvas id="myChart"></canvas>
  </div>
  
  <div style="display:grid; grid-template-rows:1fr 7fr; width: 559px; height: 412px; left: 433px; top: 145px; position: absolute; background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.25) solid">
  <div style="text-align:left; padding-left:20px; padding-top:15px; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word">Open Positions by Department</div>
  <div><canvas id="poschart"></canvas></div>
  </div>

 
  <div style="width: 197px; left: 1243px; top: 91px; position: absolute; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word">Dashboard</div>


  
  




 
  <div style="width: 363px; height: 853px; left: 36px; top: 145px; position: absolute; background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.25) solid">

  </div>
  <a href="teams.php"><div style="left: 74px; top: 946px; position: absolute; color: #1D8AA1; font-size: 20px; font-family: Inter; font-weight: 400; word-wrap: break-word">View Open Positions</div></a>
  <div style="left: 74px; top: 177px; position: absolute; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word">Monthly Metrics</div>
  <div style="width: 286px; height: 90px; left: 74px; top: 237px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="width: 286px; height: 90px; left: 74px; top: 353px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="width: 286px; height: 90px; left: 74px; top: 469px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="width: 286px; height: 90px; left: 74px; top: 585px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="width: 286px; height: 90px; left: 74px; top: 701px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="width: 286px; height: 90px; left: 74px; top: 817px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="left: 102px; top: 268px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Head Count</div>
  <div style="left: 102px; top: 384px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">New Hires</div>
  <div style="left: 97px; top: 500px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Terminations</div>
  <div style="left: 97px; top: 616px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Average Tenure</div>
  <div style="left: 94px; top: 732px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Average Age</div>
  <div style="left: 94px; top: 848px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Average CTC</div>
  <div style="left: 315px; top: 268px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?php echo $headcount ?></div>
  <div style="left: 317px; top: 384px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?php echo $new_hires ?></div>
  <div style="left: 315px; top: 500px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?php echo $terminations ?></div>
  <div style="left: 287px; top: 616px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?php echo $avg_tenure. " Y" ?></div>
  <div style="left: 287px; top: 738px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?php echo $avg_age. " Y" ?></div>
  <div style="left: 287px; top: 848px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?php echo $avg_ctc_total ?></div>








  <a href="logout.php"><div style="left: 1368px; top: 970px; position: absolute; color: red; font-size: 20px; font-family: Inter; font-weight: 400; word-wrap: break-word">logout</div></a>
<a href="notifications.php"><div style="left: 1268px; top: 947px; position: absolute; color: #1D8AA1; font-size: 20px; font-family: Inter; font-weight: 400; word-wrap: break-word">Open Notifications</div></a>
</>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
  const ctx = document.getElementById('myChart');
  const gtx = document.getElementById('salarychart');
  const rtx = document.getElementById('poschart');

  new Chart(rtx, {
    type: 'bar',
    data: {
        labels: [<?php 
                $i = 1;
                echo "$i";
                $i++;
                for(;$i<=$dep_count_pos;$i++){
                  echo ", $i"; 
                };
            ?>],
      datasets: [{
        data: [<?php 
              $i = 1;
              echo "$pos_depwise[0]";
              for($i=1;$i<$dep_count_pos;$i++){
                echo ", $pos_depwise[$i]"; 
              };
          ?>],
        borderWidth: 3
      }]
    },
    options: {
      scales: {
        y: {
                grid: {
                    display: false
                }
            }
        },
      maintainAspectRatio: false,
      plugins:{
        legend: {
        display: false
      }
      }
    }
  });

  new Chart(gtx, {
    type: 'bar',
    data: {
        labels: [<?php 
                $i = 1;
                echo "$i";
                $i++;
                for(;$i<=$dep_count;$i++){
                  echo ", $i"; 
                };
            ?>],
      datasets: [{
        data: [<?php 
              $i = 1;
              echo "$avg_ctc_depwise[0]";
              for($i=1;$i<$dep_count;$i++){
                echo ", $avg_ctc_depwise[$i]"; 
              };
          ?>],
        borderWidth: 3
      }]
    },
    options: {
      scales: {
        x: {
                grid: {
                    display: false,
                }
            }
        },
      maintainAspectRatio: false,
      indexAxis: 'y',
      plugins:{
        legend: {
        display: false
      }
      }
    }
  });

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Male', 'Female', 'Other'],
      datasets: [{
        data: [<?php echo $male ?>,<?php echo $female ?>,<?php echo $other ?> ],
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
<?php require_once('../common/footer.php');

} else {
  header('location:signin.php');
  
  }
  
   ?>
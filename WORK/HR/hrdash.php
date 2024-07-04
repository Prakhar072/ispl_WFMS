<?php session_start();
require_once('dbconnect.php');

if (isset($_SESSION['user_id'])) {
require_once('../common/header.php') ?>



  <div style=" display:grid; grid-template-rows:40fr 300fr; width: 410px; height: 775px; left: 1014px; top: 145px; position: absolute; background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.25) solid">
  <div style="text-align: left; padding-left: 15px; padding-top: 24px; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word">Department Salary</div>
  <div class="chartbox">
  <canvas id="salary"></canvas>
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
 <!--monthly data-->
<?php 
  $query2 = "SELECT COUNT(*) FROM employee_data";
  $count = 0;
  // FETCHING DATA FROM DATABASE 
  $result2 = $db_connect->query($query2); 
  $headcount = mysqli_fetch_row($result2)[0];

  ?>

  <!--salary-->
  <?php
    $query3 = "SELECT fk_department_id, AVG(ctc) as avg FROM employee_data GROUP BY fk_department_id";
    $result3 = $db_connect->query($query3);
    $dep_count = $result3->num_rows;
    $avg_ctc_depwise= array();
    for($i=0;$i<$dep_count;$i++){
      $l1= $result3->fetch_assoc()['avg'];
      $avg_ctc_depwise[] = $l1;
    }
  ?>


 

  <div style="width: 559px; height: 412px; left: 433px; top: 582px; position: absolute; background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.25) solid">
  <canvas id="myChart"></canvas>
  </div>
  
  <div style="width: 559px; height: 412px; left: 433px; top: 145px; position: absolute; background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.25) solid"></div>

 
  <div style="width: 197px; left: 1243px; top: 91px; position: absolute; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word">Dashboard</div>


  
  




 
  <div style="width: 363px; height: 853px; left: 36px; top: 145px; position: absolute; background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.25) solid">

  </div>
  <a href="int_appl.php"><div style="left: 74px; top: 946px; position: absolute; color: #1D8AA1; font-size: 20px; font-family: Inter; font-weight: 400; word-wrap: break-word">View Open Positions</div></a>
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
  <div style="left: 294px; top: 268px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?php echo $headcount ?></div>
  <div style="left: 310px; top: 384px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">12</div>
  <div style="left: 315px; top: 500px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">2</div>
  <div style="left: 299px; top: 616px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">6Y</div>
  <div style="left: 294px; top: 738px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">28</div>
  <div style="left: 281px; top: 848px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">50k</div>



  <div style="left: 455px; top: 177px; position: absolute; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word">Open Positions by Department</div>
  <div style="width: 54px; height: 152px; left: 503px; top: 280px; position: absolute; background: rgba(0, 7.86, 78.63, 0.75)"></div>
  <div style="width: 54px; height: 113px; left: 596px; top: 320px; position: absolute; background: rgba(0, 201.75, 214.62, 0.75)"></div>
  <div style="width: 54px; height: 53px; left: 689px; top: 380px; position: absolute; opacity: 0.75; background: #004AB9"></div>
  <div style="width: 54px; height: 179px; left: 782px; top: 253px; position: absolute; opacity: 0.75; background: #0094E7"></div>
  <div style="width: 54px; height: 86px; left: 875px; top: 346px; position: absolute; opacity: 0.75; background: #E40000"></div>



  <a href="logout.php"><div style="left: 1368px; top: 970px; position: absolute; color: red; font-size: 20px; font-family: Inter; font-weight: 400; word-wrap: break-word">logout</div></a>
<a href="notifications.php"><div style="left: 1268px; top: 947px; position: absolute; color: #1D8AA1; font-size: 20px; font-family: Inter; font-weight: 400; word-wrap: break-word">Open Notifications</div></a>
</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
  const ctx = document.getElementById('myChart');
  const gtx = document.getElementById('salary');

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
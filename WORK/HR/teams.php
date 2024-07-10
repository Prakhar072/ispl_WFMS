<?php session_start();
require_once('dbconnect.php');

if (isset($_SESSION['user_id'])) {
require_once('../common/header.php') ?>
<?php
    $query1 = "SELECT DISTINCT position_request.*, employee_data.first_name, employee_data.last_name, employee_data.employee_code, department.dep_name, position.pos_name, project.name FROM employee_data, department, position, location, position_request, project WHERE position_request.employee_id = employee_data.employee_id && position_request.position_id = position.position_id && position_request.department_id = department.department_id && position_request.project_id = project.project_id && position_request.status != 'Closed'";
    // FETCHING DATA FROM DATABASE 
    $result1 = $db_connect->query($query1);
    $count = $result1->num_rows;
    ?>

<?php
    $query8 = "SELECT department_id, COUNT(department_id) as count FROM position_request WHERE status ='Active' GROUP BY department_id ";
    $result8 = $db_connect->query($query8);
    $dep_count_pos = $result8->num_rows;
    $pos_depwise= array();
    for($i=0;$i<$dep_count_pos;$i++){
      $l2= $result8->fetch_assoc()['count'];
      $pos_depwise[] = $l2;
    }
  ?> 
  
  <div style="left:78px; top:100px; position:absolute; height:800px">
  
    <div class="card-container">
    <div>
    <div style="float:left; width:500px; padding-left:4px; padding-bottom:14px; text-align:start; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word">Open Position Requests</div>
    <div style="float:right; width:30px; padding-left:4px; text-align:end; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word"><?php echo $count ?></div>
    <input class="searchbar" style=" width:450px; height:30px; float:left; padding-left: 18px;" type="text" placeholder="Search by Name, ID or Department">
    </div>
    <?php
    $query1 = "SELECT DISTINCT position_request.*, employee_data.first_name, employee_data.last_name, employee_data.employee_code, department.dep_name, position.pos_name, project.name FROM employee_data, department, position, location, position_request, project WHERE position_request.employee_id = employee_data.employee_id && position_request.position_id = position.position_id && position_request.department_id = department.department_id && position_request.project_id = project.project_id && position_request.status != 'Closed'";
    // FETCHING DATA FROM DATABASE 
    $result1 = $db_connect->query($query1);
    $count = $result1->num_rows;
    for($i=0;$i<$count;$i++){
      $li = mysqli_fetch_row($result1);
      echo "
      <div class='card'>
      <a href='fill_request.php?project_id=$li[3]'>
        <p style='margin-top:15px; margin-bottom:0px; text-align:left; padding-left:15px; color: rgba(0, 0, 0, 0.75); font-size: 28px; font-family: Inter; font-weight: 400; word-wrap: break-word'>".$li[13]."</p>
        <p style='margin-top:8px; margin-bottom:0px; text-align:left; padding-left:15px; color: rgba(0, 0, 0, 0.75); font-size: 22px; font-family: Inter; font-weight: 400; word-wrap: break-word'>".$li[9]." ".$li[10].", ".$li[12]."</p>
        <p style='margin-top:8px; margin-bottom:20px; text-align:left; padding-left:15px; color: rgba(0, 0, 0, 0.75); font-size: 22px; font-family: Inter; font-weight: 400; word-wrap: break-word'>".$li[5]."</p>
        </a>
        </div>
    
    ";} 
      ?>
          
    </div>
    </div>

    <!--<div style="width:600px; height:400px; left:815px; top:100px; padding-top:25px; position:absolute; height:400px background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.25) solid">
      bar graph here
      <img src="../common/ima/basic-bar-graph.png" alt="Girl in a jacket" width="550" height="375">
  </div>-->

  <div style="display:grid; grid-template-rows:1fr 9fr; width:600px; height:400px; left:815px; top:100px; position:absolute; height:400px background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.25) solid">
  <div style="text-align:left; padding-left:20px; padding-top:15px; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word">Open Positions by Department</div>
  <div><canvas id="poschart2"></canvas></div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const rtx = document.getElementById('poschart2');

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
        display: false,
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

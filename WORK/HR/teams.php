<?php session_start();
require_once('dbconnect.php');

if (isset($_SESSION['user_id'])) {
require_once('../common/header.php') ?>
<?php
    $query1 = "SELECT * FROM position_request WHERE status ='Active'";
    // FETCHING DATA FROM DATABASE 
    $result1 = $db_connect->query($query1);
    $count = $result1->num_rows;
    ?>


  
  <div style="left:78px; top:100px; position:absolute; height:800px">
  
    <div class="card-container">
    <div>
    <div style="float:left; width:500px; padding-left:4px; padding-bottom:14px; text-align:start; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word">Open Position Requests</div>
    <div style="float:right; width:30px; padding-left:4px; text-align:end; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word"><?php echo $count ?></div>
    <input class="searchbar" style=" width:450px; height:30px; float:left; padding-left: 18px;" type="text" placeholder="Search by Name, ID or Department">
    </div>
    <?php
    $query1 = "SELECT * FROM position_request WHERE status ='Active'";
    // FETCHING DATA FROM DATABASE 
    $result1 = $db_connect->query($query1);
    $count = $result1->num_rows;
    for($i=0;$i<$count;$i++){
      $li = mysqli_fetch_row($result1);
      echo "
      <a href='fill_request.php?id=$li[3]'>
      <div class='card'>
        <p style='margin-top:15px; margin-bottom:0px; text-align:left; padding-left:15px; color: rgba(0, 0, 0, 0.75); font-size: 28px; font-family: Inter; font-weight: 400; word-wrap: break-word'>".$li[4]."</p>
        <p style='margin-top:8px; margin-bottom:0px; text-align:left; padding-left:15px; color: rgba(0, 0, 0, 0.75); font-size: 22px; font-family: Inter; font-weight: 400; word-wrap: break-word'>".$li[1]."</p>
        <p style='margin-top:8px; margin-bottom:20px; text-align:left; padding-left:15px; color: rgba(0, 0, 0, 0.75); font-size: 22px; font-family: Inter; font-weight: 400; word-wrap: break-word'>".$li[5]."</p>
    </div>
    </a>
    ";} 
      ?>
          
    </div>
    </div>

    <div style="width:600px; height:400px; left:815px; top:100px; padding-top:25px; position:absolute; height:400px background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.25) solid">
      <!--bar graph here-->
      <img src="../common/ima/basic-bar-graph.png" alt="Girl in a jacket" width="550" height="375">
  </div>

  <?php require_once('../common/footer.php');

} else {
  header('location:signin.php');
  
  }
  
   ?>

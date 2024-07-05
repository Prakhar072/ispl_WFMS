<?php session_start();
require_once('dbconnect.php');

if (isset($_SESSION['user_id'])) {
require_once('../common/header.php') ?>
  <div style="width: 1377px; height: 853px; left: 31px; top: 134px; position: absolute; background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.25) solid"></div>
  <div style="left: 1229px; top: 77px; position: absolute; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word">Fill Request</div>
  
  <?php if (isset($_GET['project_id'])) {
  $statement = "SELECT * from position_request WHERE project_id=".$_GET['project_id'];
    $run_query = mysqli_query($db_connect,$statement);
    $user = mysqli_fetch_object($run_query);
  }
  ?>
  <?php require_once('close.php'); ?>
  <form action="" method="post">
  <?php
  $statement2 = 'SELECT * FROM employee_data WHERE status != "verified_resigned"';
  $query2 = mysqli_query($db_connect,$statement2);
  $count = $query2->num_rows;
  ?>
    <select style='padding-left: 5px; width: 505px; height: 90px; left: 71px; top: 556px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.8) solid; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word;' name='dog-names' id='dog-names'>
  <?php while ($result = mysqli_fetch_array($query2)){
    echo "
    <option style= 'color: rgba(0, 0, 0, 0.50);' value='' disabled selected hidden>Select Available Employee</option>
    <option name='employee_id' value=".$result['employee_id'].">".$result['first_name']. " ".$result['last_name'].":- " .$result['employee_code']."</option>";
  }
    ?>
</select>
<input  type="button" value="Close Fill Request" style="left: 1075px; top: 904px; position: absolute; color: white; font-size: 32px; font-family: Inter; font-weight: 400; word-wrap: break-word; width: 502px; height: 69px; left: 71px; top: 862px; position: absolute; background: #1D8AA1; border-radius: 44px">
<div style="width: 61px; height: 61px; padding: 7.62px; left: 612px; top: 570px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
    <img src="../common/ima/Squared_plus.svg.png" style="position: relative; left:-15px; top:-5px; width: 60px; height: 60px;">
</div>
</form>

  <!--<input type="dropbtn" style="width: 505px; height: 90px; left: 71px; top: 556px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid">
  <div style="left: 105px; top: 587px; position: absolute; color: rgba(0, 0, 0, 0.50); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Select from drop down</div>-->
  
  <div style="width: 243px; height: 69px; left: 1130px; top: 158px; position: absolute; background: #61FF00; border-radius: 44px"></div>
  <a href="teams.php"><div style="left: 1305px; top: 942px; position: absolute; color: #1D8AA1; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Cancel</div></a>
  <div style="left: 76px; top: 178px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Request  </div>
  <div style="left: 327px; top: 178px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?php echo $user->position_id?></div>
  <div style="left: 327px; top: 231px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?php echo $user->no_reqd ?></div>
  <div style="left: 327px; top: 284px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Finance</div>
  <div style="left: 327px; top: 337px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?php echo $user->created_on ?></div>
  <div style="left: 1195px; top: 178px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 1000; word-wrap: break-word">In Progress</div>
  <div style="left: 76px; top: 231px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Required No:</div>
  <div style="left: 77px; top: 284px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Department:</div>
  <div style="left: 76px; top: 337px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Date:   </div>
  <div style="left: 76px; top: 390px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Note:</div>
  <div style="left: 71px; top: 512px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Assign Position</div>
  <div style="width: 758px; left: 329px; top: 390px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word; text-align:left"><?php echo $user->description ?></div>
  
<?php require_once('../common/footer.php');

} else {
  header('location:signin.php');
  
  }
  
   ?>
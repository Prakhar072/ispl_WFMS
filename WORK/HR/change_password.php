<?php session_start(); 
require_once('dbconnect.php');
require_once('../common/header.php');
$statement = "SELECT * from employee_data where employee_id=".$_GET['id'];
$run_query = mysqli_query($db_connect,$statement);

if ($run_query) {
  $user = mysqli_fetch_object($run_query);
}
?>
  <div style="width: 596px; height: 601px; left: 422px; top: 212px; position: absolute; background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 1px; border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="width: 458px; height: 87px; left: 485px; top: 260px; position: absolute; color: black; font-size: 64px; font-family: Inter; font-weight: 400; word-wrap: break-word">Change Password</div>

  
    <!--forget password link-->
  <div style="width: 502px; height: 76px; left: 462px; top: 392px; position: absolute; background: white; border: 2px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="width: 502px; height: 76px; left: 462px; top: 513px; position: absolute; background: white; border: 2px rgba(0, 0, 0, 0.50) solid"></div>
  <!--<div style="width: 502px; height: 69px; left: 462px; top: 697px; position: absolute; background: #1D8AA1; border-radius: 44px"></div>-->
  
  <!--Login Button-->
  <?php require_once('change.php'); ?>
<form action="" method="post">
  <input style="width: 109px; left: 665px; top: 707px; position: absolute; color: white; font-size: 40px; font-family: Inter; font-weight: 400; word-wrap: break-word; width: 502px; height: 69px; left: 462px; top: 697px; position: absolute; background: #1D8AA1; border-radius: 28px" type="submit" name="change_pass" value="Submit">
  <!--<div style="width: 109px; left: 665px; top: 707px; position: absolute; color: white; font-size: 40px; font-family: Inter; font-weight: 400; word-wrap: break-word">Login </div>-->

  <!--email field-->
  <input Style= "font-size:35px; padding-left: 7px; width: 502px; height: 76px; left: 462px; top: 392px; position: absolute; background: white; border: 2px rgba(0, 0, 0, 0.50) solid " type="password" name="old_pass" value= "" placeholder="Enter Old Password" required>
  <!--password field-->  
  <input Style= "font-size:35px; padding-left: 7px; width: 502px; height: 76px; left: 462px; top: 513px; position: absolute; background: white; border: 2px rgba(0, 0, 0, 0.50) solid " type="password" name="new_pass" value= "" placeholder="Enter New Password" required>
  <a href="ind_info.php?id=<?php echo $user->employee_id ?>"><div style="left: 952px; top: 829px; position: absolute; color: #1D8AA1; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Cancel</div></a>
</form>
 <!--<div style="left: 478px; top: 527px; position: absolute; opacity: 0.50; color: black; font-size: 40px; font-family: Inter; font-weight: 400; word-wrap: break-word">Password</div>-->
 <!--<div style="left: 478px; top: 406px; position: absolute; opacity: 0.50; color: black; font-size: 40px; font-family: Inter; font-weight: 400; word-wrap: break-word">Email</div>--> 
</div>
<?php require_once('../common/footer.php') ?>
<?php session_start();
require_once('dbconnect.php');

if (isset($_SESSION['user_id'])) {
require_once('../common/header.php') ?>

<?php if (isset($_GET['id'])) {

$statement = "SELECT * from employee_data where employee_id=".$_GET['id'];
  $run_query = mysqli_query($db_connect,$statement);

  if ($run_query) {
    $user = mysqli_fetch_object($run_query);
  }

$button = '<input type="submit" class="btn" name="update_details" value="Update">';
}
?>

<div style="left: 1054px; top: 77px; position: absolute; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word">Update/New Employee</div>
  <div style="width: 1377px; height: 1053px; left: 31px; top: 134px; position: absolute; background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.25) solid">
  <?php require_once('ctc_update.php'); ?>
<form action="" method="post">
  <input type="text" value="<?php echo $user->first_name ?>" name="first_name" placeholder="First Name" style="padding:5px; width: 240px; font-size: 24px; height: 90px; left: 418px; top: 40px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>  
  <input type="text" value="<?php echo $user->last_name ?>" name="last_name" placeholder="Last Name" style="padding:5px; font-size: 24px; width: 240px; height: 90px; left: 683px; top: 40px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="text" value="<?php echo $user->employee_code ?>"name="employee_code" placeholder="Employee Code" style="padding:5px; font-size:24px; width: 358px; height: 90px; left: 983px; top: 40px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="email"value="<?php echo $user->email ?>" name="email" placeholder="Email" style="padding:5px; font-size: 24px; width: 505px; height: 90px; left: 418px; top: 180px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="text" value="<?php echo $user->fk_department_id ?>"name="department" placeholder="Department" style="padding:5px; font-size:24px; width: 355px; height: 90px; left: 986px; top: 180px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="text" value="<?php echo $user->location_id ?>"name="location" placeholder="Location" style="padding:5px; font-size:24px; width: 505px; height: 90px; left: 418px; top: 320px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="text" value="<?php echo $user->position_id ?>"name="position" placeholder="Position" style="padding:5px; font-size:24px; width: 355px; height: 90px; left: 986px; top: 320px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="text" value="<?php echo $user->phone ?>"name="phone" placeholder="Phone Number" style="padding:5px; font-size:24px; width: 505px; height: 90px; left: 418px; top: 460px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="text" value="<?php echo $user->ctc ?>"name="ctc" placeholder="CTC" style="padding:5px; font-size:24px; width: 355px; height: 90px; left: 986px; top: 460px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="text" value="<?php echo $user->dob ?>"name="dob" placeholder="Date of Birth" onblur="(this.type='text')" onfocus="(this.type='date')" style="padding:5px; font-size:24px; width: 509px; height: 90px; left: 418px; top: 600px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="text" value="<?php echo $user->hire_date ?>"name="doj" placeholder="Date of Joining" onblur="(this.type='text')" onfocus="(this.type='date')" style="padding:5px; font-size:24px; width: 355px; height: 90px; left: 986px; top: 600px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="file" name="photo" placeholder="Upload Photo" accept="image/*" id="imgInp" style="padding:5px; width: 290px; font-size: 23px; height: 33px; left: 46px; top: 430px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid">
  <input type="password" name="password" placeholder="Password" style="padding:5px; font-size:24px; width: 355px; height: 90px; left: 986px; top: 736px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="text" value="<?php echo $user->first_name ?>"name="manager" placeholder="Manager" style="padding:5px; font-size:24px; width: 505px; height: 90px; left: 418px; top: 736px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="submit" name="update_details" value="Update" style="color:white; font-size:36px; width: 450px; height: 69px; left: 30px; top: 965px; position: absolute; background: #1D8AA1; border-radius: 44px">
</form>

  <div style="width: 304px; height: 367px; left: 46px; top: 43px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"><img id="blah" src="#" width="304px;" height="367px;" /></div>
  <div style="left: 1285px; top: 1003px; position: absolute; color: #1D8AA1; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word"><a href="ind_info.php?id=<?php echo $user->employee_id ?>">Cancel</div></a>
  
  <!--sample data entry
  (2, Bill, Gates, bill123, 2, 1, 2024-06-05, 200, 2022B3AA0321P, 2, 2024-06-01, bill@gmail.com, 8888888888, 2, active, Created by, created on)-->


  <!--<script src="../includes/js/filepreview.js"></script>-->
<?php require_once('../common/footer.php');

} else {
  header('location:signin.php');
  
  }
  
   ?>
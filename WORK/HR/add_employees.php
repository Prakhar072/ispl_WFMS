<?php session_start();

if (isset($_SESSION['user_id'])) {
require_once('../common/header.php') ?>

<?php 
function getName($n) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $randomString = '';

  for ($i = 0; $i < $n; $i++) {
      $index = rand(0, strlen($characters) - 1);
      $randomString .= $characters[$index];
  }

  return $randomString;
}
?>


<div style="left: 1054px; top: 77px; position: absolute; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word">Update/New Employee</div>
  <div style="width: 1377px; height: 1253px; left: 31px; top: 134px; position: absolute; background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.25) solid">
  <?php require_once('save.php'); ?>
<form action="" method="post">
  <input type="text" name="first_name" placeholder="First Name" style="padding:5px; width: 240px; font-size: 24px; height: 90px; left: 418px; top: 40px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>  
  <input type="text" name="last_name" placeholder="Last Name" style="padding:5px; font-size: 24px; width: 240px; height: 90px; left: 683px; top: 40px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  
  <input type="radio" name="gender" id="male" value="male" style="width:30px; height:30px; padding:5px; font-size:24px; left: 418px; top: 175px; position: absolute; background: white;" required><label for="male" style="left: 465px; top: 179px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word;">Male</label>
  <input type="radio" name="gender" id="male" value="female" style="width:30px; height:30px; padding:5px; font-size:24px; left: 418px; top: 215px; position: absolute; background: white; " required><label for="female" style="left: 465px; top: 219px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word;">Female</label>
  <input type="radio" name="gender" id="male" value="other" style="width:30px; height:30px; padding:5px; font-size:24px; left: 418px; top: 255px; position: absolute; background: white; " required><label for="other" style="left: 465px; top: 261px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word;">Other</label>

  <input type="radio" name="deligation" id="HR" value="HR" style="width:30px; height:30px; padding:5px; font-size:24px; left: 698px; top: 175px; position: absolute; background: white;" required><label for="HR" style="left: 745px; top: 179px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word;">HR</label>
  <input type="radio" name="deligation" id="Employee" value="Employee" style="width:30px; height:30px; padding:5px; font-size:24px; left: 698px; top: 215px; position: absolute; background: white; " required><label for="Employee" style="left: 745px; top: 219px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word;">Employee</label>

  <input type="text" name="employee_code" placeholder="Employee Code" style="padding:5px; font-size:24px; width: 358px; height: 90px; left: 983px; top: 40px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="email" name="email" placeholder="Email" style="padding:5px; font-size: 24px; width: 505px; height: 90px; left: 418px; top: 320px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="text" name="department" placeholder="Department" style="padding:5px; font-size:24px; width: 355px; height: 90px; left: 986px; top: 180px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="text" name="location" placeholder="Location" style="padding:5px; font-size:24px; width: 505px; height: 90px; left: 418px; top: 460px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="text" name="position" placeholder="Position" style="padding:5px; font-size:24px; width: 355px; height: 90px; left: 986px; top: 320px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="text" name="phone" placeholder="Phone Number" style="padding:5px; font-size:24px; width: 505px; height: 90px; left: 418px; top: 600px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="text" name="base_salary" placeholder="Base Salary" style="padding:5px; font-size:24px; width: 355px; height: 90px; left: 986px; top: 460px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="text" name="bonus" placeholder="Bonus" style="padding:5px; font-size:24px; width: 355px; height: 90px; left: 986px; top: 600px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="text" name="benefits" placeholder="Benefits" style="padding:5px; font-size:24px; width: 355px; height: 90px; left: 986px; top: 736px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="text" name="stocks" placeholder="Stock Component" style="padding:5px; font-size:24px; width: 355px; height: 90px; left: 986px; top: 876px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  
  <input type="text" name="dob" placeholder="Date of Birth" onblur="(this.type='text')" onfocus="(this.type='date')" style="padding:5px; font-size:24px; width: 509px; height: 90px; left: 418px; top: 736px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="text" name="doj" placeholder="Date of Joining" onblur="(this.type='text')" onfocus="(this.type='date')" style="padding:5px; font-size:24px; width: 505px; height: 90px; left: 418px; top: 1016px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="file" name="file" placeholder="Upload Photo" accept="image/*" id="imgInp" style="padding:5px; width: 290px; font-size: 23px; height: 33px; left: 46px; top: 430px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid">
  <input value="<?php echo getName(8); ?>" type="password" name="password" placeholder="Password" style="padding:5px; font-size:24px; width: 355px; height: 90px; left: 986px; top: 1016px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="text" name="manager" placeholder="Manager" style="padding:5px; font-size:24px; width: 505px; height: 90px; left: 418px; top: 876px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="submit" name="save_details" value="Submit" style="color:white; font-size:36px; width: 450px; height: 69px; left: 30px; top: 1165px; position: absolute; background: #1D8AA1; border-radius: 44px">
</form>

  <div style="width: 304px; height: 367px; left: 46px; top: 43px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"><img id="blah" src="#" width="304px;" height="367px;" /></div>
  <div style="left: 1285px; top: 1203px; position: absolute; color: #1D8AA1; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word"><a styles="text-decoration:none;" href="emp_database.php">Cancel</div></a>
  
  <!--sample data entry
  (2, Bill, Gates, bill123, 2, 1, 2024-06-05, 200, 2022B3AA0321P, 2, 2024-06-01, bill@gmail.com, 8888888888, 2, active, Created by, created on)-->


<script src="../includes/js/filepreview.js"></script>
<?php require_once('../common/footer.php');

} else {
  header('location:signin.php');
  
  }
  
   ?>
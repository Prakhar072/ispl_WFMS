<?php session_start();
require_once('dbconnect.php');

if (isset($_SESSION['user_id'])) {
require_once('../common/header.php') ?>

<?php if (isset($_GET['id'])) {

$statement = 'SELECT * from total_compensation where fk_employee_id="'.$_GET['id'].'"';
  $run_query = mysqli_query($db_connect,$statement);

  if ($run_query) {
    $user = mysqli_fetch_object($run_query);
  }

$button = '<input type="submit" class="btn" name="update_details" value="Update">';
}
?>

<div style="left: 1324px; top: 77px; position: absolute; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word">CTC</div>
  <div style="width: 1377px; height: 1053px; left: 31px; top: 134px; position: absolute; background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.25) solid">
  <?php require_once('ctc_update.php'); ?>
<form action="" method="post">
  <input type="text" value="<?php echo $user->base_salary ?>" name="base_salary" placeholder="Base Salary" style="padding:5px; width: 505px; font-size: 24px; height: 90px; left: 540px; top: 40px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>  
  <input type="text"value="<?php echo $user->bonus?>" name="bonus" placeholder="Bonus" style="padding:5px; font-size: 24px; width: 505px; height: 90px; left: 540px; top: 180px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="text" value="<?php echo $user->benefits ?>"name="benefits" placeholder="Benefits" style="padding:5px; font-size:24px; width: 505px; height: 90px; left: 540px; top: 320px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="text" value="<?php echo $user->stocks ?>"name="stocks" placeholder="stocks" style="padding:5px; font-size:24px; width: 505px; height: 90px; left: 540px; top: 460px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="text" value="<?php echo $user->total?>"name="total" placeholder="Total Compensation" style="padding:5px; font-size:24px; width: 509px; height: 90px; left: 540px; top: 600px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid; color:rgba(0,0,0,0.5)" readonly>
  <input type="password" name="password" placeholder="Password" style="padding:5px; font-size:24px; width: 355px; height: 90px; left: 540px; top: 736px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid" required>
  <input type="submit" name="update_ctc" value="Update CTC" style="color:white; font-size:36px; width: 450px; height: 69px; left: 30px; top: 965px; position: absolute; background: #1D8AA1; border-radius: 44px">
</form>

<div style=" display: grid; width: 100px; justify-content: right; left: 410px; top: 70px; position: absolute; margin-top:8px; margin-bottom:0px; text-align:left; padding-left:15px; color: rgba(0, 0, 0, 0.75); font-size: 22px; font-family: Inter; font-weight: 400; word-wrap: break-word">Base</div>
<div style=" display: grid; width: 100px; justify-content: right; left: 410px; top: 210px; position: absolute; margin-top:8px; margin-bottom:0px; text-align:left; padding-left:15px; color: rgba(0, 0, 0, 0.75); font-size: 22px; font-family: Inter; font-weight: 400; word-wrap: break-word">bonus</div>
<div style=" display: grid; width: 100px; justify-content: right; left: 410px; top: 350px; position: absolute; margin-top:8px; margin-bottom:0px; text-align:left; padding-left:15px; color: rgba(0, 0, 0, 0.75); font-size: 22px; font-family: Inter; font-weight: 400; word-wrap: break-word">Benefits</div>
<div style=" display: grid; width: 100px; justify-content: right; left: 410px; top: 490px; position: absolute; margin-top:8px; margin-bottom:0px; text-align:left; padding-left:15px; color: rgba(0, 0, 0, 0.75); font-size: 22px; font-family: Inter; font-weight: 400; word-wrap: break-word">Stocks</div>
<div style=" display: grid; width: 100px; justify-content: right; left: 410px; top: 630px; position: absolute; margin-top:8px; margin-bottom:0px; text-align:left; padding-left:15px; color: rgba(0, 0, 0, 0.75); font-size: 22px; font-family: Inter; font-weight: 400; word-wrap: break-word">Total</div>
  <div style="left: 1285px; top: 1003px; position: absolute; color: #1D8AA1; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word"><a href="ind_info.php?id=<?php echo $_GET['id'] ?>">Cancel</a></div>
  
  <!--sample data entry
  (2, Bill, Gates, bill123, 2, 1, 2024-06-05, 200, 2022B3AA0321P, 2, 2024-06-01, bill@gmail.com, 8888888888, 2, active, Created by, created on)-->


  <!--<script src="../includes/js/filepreview.js"></script>-->
<?php require_once('../common/footer.php');

} else {
  header('location:signin.php');
  
  }
  
   ?>
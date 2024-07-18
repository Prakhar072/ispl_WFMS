<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="../includes/css/teams.css">
</head>
<body>
    <center>
<div style="width: 1440px; height: 1024px; left:250px; top: 0px; position: absolute; background: white">
<!--top navbar starts-->
<div style="width: 1440px; height: 59px; left: 0px; top: 0px; position: absolute; background: #1D8AA1; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)">  
    

 
  


  
<div style="left: 553px; top: 16px; position: absolute; color: white; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">WorkForce Management System</div></a>

  </div>
<!--top navbar ends-->
  <div style="width: 596px; height: 601px; left: 422px; top: 212px; position: absolute; background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 1px; border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="width: 458px; height: 87px; left: 485px; top: 260px; position: absolute; color: black; font-size: 64px; font-family: Inter; font-weight: 400; word-wrap: break-word">Forget Password</div>

  
    <!--forget password link-->
  <div style="width: 502px; height: 76px; left: 462px; top: 392px; position: absolute; background: white; border: 2px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="width: 502px; height: 76px; left: 462px; top: 513px; position: absolute; background: white; border: 2px rgba(0, 0, 0, 0.50) solid"></div>
  <!--<div style="width: 502px; height: 69px; left: 462px; top: 697px; position: absolute; background: #1D8AA1; border-radius: 44px"></div>-->
  
  <!--Login Button-->
  <?php require_once('forget.php'); ?>
<form id="form" action="" method="post">
<input style="width: 109px; left: 665px; top: 707px; position: absolute; color: white; font-size: 40px; font-family: Inter; font-weight: 400; word-wrap: break-word; width: 502px; height: 69px; left: 462px; top: 697px; position: absolute; background: #1D8AA1; border-radius: 28px" type="submit" name="forget_pass" value="Submit" id="forgo"> 
  <!--<div onclick="submit()" id="forget_password" style="width: 109px; text-align:center; color: white; font-size: 40px; font-family: Inter; font-weight: 400; word-wrap: break-word; width: 502px; height: 69px; left: 462px; top: 697px; position: absolute; background: #1D8AA1; border-radius: 28px"><div style="top:20px;">Forget Password</div></div>-->
  <!--<div style="width: 109px; left: 665px; top: 707px; position: absolute; color: white; font-size: 40px; font-family: Inter; font-weight: 400; word-wrap: break-word">Login </div>-->

  <!--email field-->
  <input Style= "font-size:35px; padding-left: 7px; width: 502px; height: 76px; left: 462px; top: 392px; position: absolute; background: white; border: 2px rgba(0, 0, 0, 0.50) solid " type="email" name="email" value= "" placeholder="Enter Email" required>
  <!--password field-->  
  <input Style= "font-size:35px; padding-left: 7px; width: 502px; height: 76px; left: 462px; top: 513px; position: absolute; background: white; border: 2px rgba(0, 0, 0, 0.50) solid " type="text" name="employee_code" value= "" placeholder="Enter Employee Code" required>
  <a href="signin.php"><div style="left: 952px; top: 829px; position: absolute; color: #1D8AA1; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Cancel</div></a>
</form>
 <!--<div style="left: 478px; top: 527px; position: absolute; opacity: 0.50; color: black; font-size: 40px; font-family: Inter; font-weight: 400; word-wrap: break-word">Password</div>-->
 <!--<div style="left: 478px; top: 406px; position: absolute; opacity: 0.50; color: black; font-size: 40px; font-family: Inter; font-weight: 400; word-wrap: break-word">Email</div>--> 
</div>





<?php require_once('../common/footer.php') ?>
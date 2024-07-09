<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style>
      ::placeholder {
  color: rgb(0, 0, 0);
  opacity: 0.5; /* Firefox */
  font-size: 35px;
}
    </style>
</head>
<body>
<?php require_once('login-submit.php'); ?>
  <center>
  <form action="" method="post">
 <div style="width: 1440px; height: 1024px; position: relative; background: white">
  <div style="width: 596px; height: 601px; left: 422px; top: 212px; position: absolute; background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 1px; border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="width: 258px; height: 87px; left: 585px; top: 260px; position: absolute; color: black; font-size: 64px; font-family: Inter; font-weight: 400; word-wrap: break-word">Sign In</div>
  <div style="width: 614px; height: 87px; left: 422px; top: 136px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 40px; font-family: Inter; font-weight: 400; word-wrap: break-word">Workforce management System</div>
  
    <!--forget password link-->
  <a href="forget_password.php"><div style="left: 462px; top: 609px; position: absolute; color: #1D8AA1; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Forgot Password?</div></a>
  <div style="width: 502px; height: 76px; left: 462px; top: 392px; position: absolute; background: white; border: 2px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="width: 502px; height: 76px; left: 462px; top: 513px; position: absolute; background: white; border: 2px rgba(0, 0, 0, 0.50) solid"></div>
  <!--<div style="width: 502px; height: 69px; left: 462px; top: 697px; position: absolute; background: #1D8AA1; border-radius: 44px"></div>-->
  
  <!--Login Button-->
  <input style="width: 109px; left: 665px; top: 707px; position: absolute; color: white; font-size: 40px; font-family: Inter; font-weight: 400; word-wrap: break-word; width: 502px; height: 69px; left: 462px; top: 697px; position: absolute; background: #1D8AA1; border-radius: 28px" type="submit" name="form_submit" value="Login">
  <!--<div style="width: 109px; left: 665px; top: 707px; position: absolute; color: white; font-size: 40px; font-family: Inter; font-weight: 400; word-wrap: break-word">Login </div>-->

  <!--email field-->
  <input Style= "font-size:35px; padding-left: 7px; width: 502px; height: 76px; left: 462px; top: 392px; position: absolute; background: white; border: 2px rgba(0, 0, 0, 0.50) solid " type="email" name="email" value= "" placeholder="Email" required>
  <!--password field-->  
  <input Style= "font-size:35px; padding-left: 7px; width: 502px; height: 76px; left: 462px; top: 513px; position: absolute; background: white; border: 2px rgba(0, 0, 0, 0.50) solid " type="password" name="password" value= "" placeholder="Password" required>
</form>
 <!--<div style="left: 478px; top: 527px; position: absolute; opacity: 0.50; color: black; font-size: 40px; font-family: Inter; font-weight: 400; word-wrap: break-word">Password</div>-->
 <!--<div style="left: 478px; top: 406px; position: absolute; opacity: 0.50; color: black; font-size: 40px; font-family: Inter; font-weight: 400; word-wrap: break-word">Email</div>--> 
</div>
<?php require_once('../common/footer.php') ?>
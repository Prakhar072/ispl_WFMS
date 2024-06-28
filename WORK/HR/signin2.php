<?php session_start();
  require_once('config.php'); ?>

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

    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/includes/css/login.css">
</head>
<body>
<?php require_once('login-submit.php'); ?>
  <center>
  <form action="" method="post">   
  <div style="color: rgba(0, 0, 0, 0.75); font-size: 40px;">Workforce management System</div>
  
  <div class="form-container">
  <div style="color: black; font-size: 50px;">Sign In</div>
   
  <!--Login Button-->
   
  <!--email field-->
  <input class="input-data" type="email" name="email" value= "" placeholder="Email" required>
 <br> 
  <!--password field-->  
  <input class="input-data" type="password" name="password" value= "" placeholder="Password" required>
  <br>
      <!--forget password link-->
  <div id="forget-password"><a href="#">Forgot Password?</a></div>
<br>
  <input id="login-btn" type="submit" name="form_submit" value="Login">
</div>
</form>
<?php require_once('../common/footer.php') ?>
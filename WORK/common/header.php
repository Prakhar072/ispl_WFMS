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
    
    <span style="left: 1190px; top: 15px; position: absolute; color: white; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word" id="datetime"></span>
 
  
  <div style="width: 77px; height: 77px; left: 9px; top: 11px; position: absolute; background: white; border-radius: 9999px; border: 1px black solid"></div>
  <div style="width: 47px; height: 47px; padding-top: 3.67px; padding-bottom: 5.08px; padding-left: 3.64px; padding-right: 3.71px; left: 20px; top: 22px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
    <a style="color: black;"  href="ind_info.php?id=<?php echo $_SESSION['user_id'] ?>"><i class='fas fa-user-alt' style='font-size:35px'></i></a>
  </div>
  <div style="width: 178px; height: 28px; left: 93px; top: 16px; position: absolute; color: white; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">HR Admin</div>
  
  <a href="emp_database.php"><div style="left: 653px; top: 16px; position: absolute; color: white; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Database</div></a>
    <a href="teams.php"><div style="left: 779px; top: 16px; position: absolute; color: white; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Teams</div></a>
  
    <div style="width: 49px; height: 49px; padding-left: 8.17px; padding-right: 8.17px; padding-top: 6.12px; padding-bottom: 6.12px; left: 586px; top: -1px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
    <a href="hrdash.php"><i class="fas fa-house-user" style="font-size: 30px;color:white;"></i></a>
  </div>
  </div>
<!--top navbar ends-->

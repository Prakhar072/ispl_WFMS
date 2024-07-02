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
  }
  ?>



  <div style="left: 1085px; top: 107px; position: absolute; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word">Personal Information</div>
  <div style="width: 375px; height: 367px; left: 67px; top: 194px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid"></div>
  <div style="left: 1035px; top: 683px; position: absolute; color: #1D8AA1; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word"><a href="update_data.php?id=<?php echo $user->employee_id ?>">Update Information</a></div>
  <div style="left: 1035px; top: 713px; position: absolute; color: #1D8AA1; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word"><a href="ctc.php?id=<?php echo $user->employee_id ?>">Update CTC</a></div>
  <div style="left: 529px; top: 211px; position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 600; word-wrap: break-word">Employee Details</div>

  <!--leave box-->
  <div class="leave-box">
  <div class="topi" style="display:grid; color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 600; word-wrap: break-word">Leaves Taken</div>
  <div style="color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">PTO</div>
  <div style="color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Casual</div>
  <div style="color: rgba(0, 0, 0, 0.75); font-size: 48px; font-family: Inter; font-weight: 600; word-wrap: break-word">45</div>
  <div style="color: rgba(0, 0, 0, 0.75); font-size: 48px; font-family: Inter; font-weight: 600; word-wrap: break-word">2</div>
  </div>

  <!--ctc box-->
  <div  class="leave-box" style="left: 1035px; top: 441px; position: absolute;">
  <div class="topi" style="color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 600; word-wrap: break-word">CTC Components</div>
  <div style="color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Base</div>
  <div style="color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Other</div>
  <div style="color: rgba(0, 0, 0, 0.75); font-size: 48px; font-family: Inter; font-weight: 600; word-wrap: break-word">70k</div>
  <div style="color: rgba(0, 0, 0, 0.75); font-size: 48px; font-family: Inter; font-weight: 600; word-wrap: break-word">2M</div>
  </div>

  <!--attendance box-->
  <div style="display:grid; width: 394px; height: 294px; left: 67px; top: 683px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid">
  <div style="color: rgba(0, 0, 0, 0.75); font-size: 24px; font-family: Inter; font-weight: 600; word-wrap: break-word; justify-self:left; padding-left:15px; padding-top:15px;">Attendance</div>
  </div>


  <!--detail box-->
  <div style="display:grid; grid-template-columns: 1fr 1fr; width: 511px; height: 783px; left: 489px; top: 194px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.50) solid">
  <div class="info-text-left">Name</div>
  <div class="info-text-right"><?php echo $user->first_name,' ', $user->last_name ?></div>
  <div class="info-text-left">Employee Code</div>
  <div class="info-text-right"><?php echo $user->employee_code ?></div>
  <div class="info-text-left">Email</div>
  <div class="info-text-right"><?php echo $user->email ?></div>
  <div class="info-text-left">Age</div>
  <div class="info-text-right"><?php echo $user->dob ?></div>
  <div class="info-text-left">Joining Date</div>
  <div class="info-text-right"><?php echo $user->hire_date ?></div>
  <div class="info-text-left">Salary</div>
  <div class="info-text-right"><?php echo $user->ctc ?></div>
  <div class="info-text-left">PTO Left</div>
  <div class="info-text-right"><?php echo $user->first_name ?></div>
  <div class="info-text-left">Rep. Manager</div>
  <div class="info-text-right"><?php echo $user->manager_id ?></div>
  <div class="info-text-left">Rep. Manager Code</div>
  <div class="info-text-right"><?php echo $user->manager_id ?></div>
  <div class="info-text-left">Location</div>
  <div class="info-text-right"><?php echo $user->location_id ?></div>
  <div class="info-text-left">Phone Number</div>
  <div class="info-text-right"><?php echo $user->phone ?></div>
  <div class="info-text-left">Department</div>
  <div class="info-text-right"><?php echo $user->fk_department_id ?></div>
  <div class="info-text-left">Role</div>
  <div class="info-text-right"><?php echo $user->position_id ?></div> 
  </div>

  <!--image box-->
  <img style="width: 397px; height: 468px; left: 67px; top: 194px; position: absolute" src="https://via.placeholder.com/397x468" />
  

<?php
  require_once('../common/footer.php');

  } else {
    header('location:signin.php');
      
    }
      
?>
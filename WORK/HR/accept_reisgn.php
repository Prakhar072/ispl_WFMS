<?php session_start();

require_once('dbconnect.php');

if (isset($_SESSION['user_id'])) {
require_once('../common/header.php') ?>

<div style="left: 1150px; top: 77px; position: absolute; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word">Accept Resignations</div>
  <div style="width: 1429px; height: 905px; left: 5px; top: 134px; position: absolute; background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.25) solid">

  
 <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
</head>


<div class="card-container-long" style="width: 1377px;
    height: 853px;
    /*overflow-y: auto;*/
    left:50px;
    top: 500px;
    background: white; 
    box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); 
    border: 1px rgba(0, 0, 0, 0.25) solid;
    display: grid;
    grid-template-columns: 4fr;
    grid-template-rows: 80px 600px;
    row-gap: 20px;
    padding: 25px;">
    <div>
      <div style="position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 36px; font-family: Inter; font-weight: 500; word-wrap: break-word">Resigned Employees</div>
      <br>
</div>
<div>
  <table id="myTable" class="display" style="float:center; margin-top:50px">
        <thead>
            <tr>
                <th>S. No.</th>
                <th>Employee Code</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Department</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Location</th>
                <th>Position</th>
                <th>Confirmation</th>
            </tr>
        </thead>
        <tbody>
            <?php require_once('accept.php');

            $statement = 'SELECT * FROM employee_data WHERE status = "unverified_resigned"';
            $query = mysqli_query($db_connect,$statement);

            $count = 1;
             
            while ($result = mysqli_fetch_array($query)){
              $emp_code=$result['employee_code'];
                echo "<tr>
                <td> $count</td>
                <td>".$result['employee_code']."</td>
                <td>".$result['first_name']."</td>
                <td>".$result['last_name']."</td>
                <td>".$result['fk_department_id']."</td>
                <td>".$result['email']."</td>
                <td>".$result['phone']."</td>
                <td>".$result['location_id']."</td>
                <td>".$result['position_id']."</td>
                <form action='' method='post'><input type='hidden' name='row_id' value='".$result['employee_id']."'>
                <td><input type = 'submit' Name='accept' value='Accept'></td>
                </form>
                </tr>";
                $count++;
            }
            ?>
        </tbody>
    </table>
</div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );</script>

  
  </div>
</div> 
<?php
require_once('../common/footer.php');

} else {
  header('location:signin.php');
  
  }
  
   ?>
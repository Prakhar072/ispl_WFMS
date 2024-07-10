<?php session_start();

require_once('dbconnect.php');

if (isset($_SESSION['user_id'])) {
require_once('../common/header.php') ?>

<div style="left: 1150px; top: 77px; position: absolute; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word">Employee Database</div>
  <div style="width: 1429px; height: 905px; left: 5px; top: 134px; position: absolute; background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.25) solid">
  <div style="left: 1379px; top: 21px; position: absolute; color: #1D8AA1; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">
    <a href="add_employees.php"><img src="../common/ima/greenplus.png" style="position: relative; left:-15px; top:-5px; width: 40px; height: 40px;"></a>
    <a href="accept_reisgn.php"><img src="../common/ima/greenminus.png" style="position: relative; left:-67px; top:-50px; width: 40px; height: 40px;"></a></div>
 <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
</head>
<body>

<div class="card-container-long" style="width: 1377px;
    height: 853px;
    /*overflow-y: auto;*/
    left:50px;
    top: 500px;
    background: white; 
    box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); 
    border: 1px rgba(0, 0, 0, 0.25) solid;
    display: grid;
    grid-template-columns: 1fr;
    grid-template-rows: 80px 600px;
    row-gap: 20px;
    padding: 25px;">
    <div>
      <div style="position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 36px; font-family: Inter; font-weight: 500; word-wrap: break-word">Database</div>
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
            </tr>
        </thead>
        <tbody>
            <?php
            $statement = 'SELECT employee_data.*, department.dep_name, position.pos_name, location.loc_name FROM employee_data, department, position, location WHERE employee_data.status != "verified_resigned" && employee_data.fk_department_id=department.department_id && employee_data.position_id = position.position_id &&employee_data.location_id = location.location_id';
            $query = mysqli_query($db_connect,$statement);

            $count = 1;
            while ($result = mysqli_fetch_array($query)){
                echo "<tr>
                <td> $count</td>
                <td><a href='ind_info.php?id=".$result[0]."'>".$result['employee_code']."</a></td>
                <td>".$result['first_name']."</td>
                <td>".$result['last_name']."</td>
                <td>".$result['dep_name']."</td>
                <td>".$result['email']."</td>
                <td>".$result['phone']."</td>
                <td>".$result['loc_name']."</td>
                <td>".$result['pos_name']."</td>
                </tr></a>";
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
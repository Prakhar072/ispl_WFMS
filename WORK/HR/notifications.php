<?php session_start();
require_once('dbconnect.php');

if (isset($_SESSION['user_id'])) {
require_once('../common/header.php') ?>
<div style="left: 1250px; top: 77px; position: absolute; color: black; font-size: 32px; font-family: Inter; font-weight: 600; word-wrap: break-word">Notifications</div>
  <div style="width: 1377px; height: 853px; left: 5px; top: 134px; position: absolute; background: white; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); border: 1px rgba(0, 0, 0, 0.25) solid">

  
 <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
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
      <div style="position: absolute; color: rgba(0, 0, 0, 0.75); font-size: 36px; font-family: Inter; font-weight: 500; word-wrap: break-word">System</div>
      <br>
</div>
<div>
  <table id="myTable" class="display" style="float:center; margin-top:50px">
        <thead>
            <tr>
                <th>S. No.</th>
                <th>User</th>
                <th>Date & Time</th>
                <th>Affected User</th>
                <th>type</th>
                <th>Summary</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $statement = 'SELECT * FROM notifications';
            $query = mysqli_query($db_connect,$statement);

            $count = 1;
            while ($result = mysqli_fetch_array($query)){
                echo "<tr>
                <td> $count</td>
                <td>".$result['user']."</td>
                <td>".$result['date_time']."</td>
                <td>".$result['affected']."</td>
                <td>".$result['type']."</td>
                <td>".$result['summary']."</td>
                </tr>";
                $count++;
            }
            ?>
        </tbody>
    </table>
</div>
<a href="https://www.youtube.com/"><div style="left: 59px; top: 851px; position: absolute; color: #1D8AA1; font-size: 24px; font-family: Inter; font-weight: 400; word-wrap: break-word">Load Page 2</div></a>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );</script>
  

  
  </div>
</div>
<?php require_once('../common/footer.php');

} else {
  header('location:signin.php');
  
  }
  
   ?>
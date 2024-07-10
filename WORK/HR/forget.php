<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="../includes/js/email_API.js"></script>

<?php require_once('dbconnect.php');
//print_r($_SESSION);

if (isset($_POST['forget_pass'])) {
        $email  		 = $_POST['email'];
        $employee_code   = $_POST['employee_code'];
        $updated_on      = date('Y-m-d');

        $statment1 = 'select * from employee_data where employee_code = "'.$employee_code.'"';
		$query = mysqli_query($db_connect,$statment1);

            $reciever = $username = $new_pass = null;
		 if ($query->num_rows>0) {
		 	$employee = mysqli_fetch_object($query);
		 	if ($email == $employee->email && $employee_code==$employee->employee_code) {
                $reciever = "f20220426@pilani.bits-pilani.ac.in";
                $username = $employee->first_name;

                function getName($n) {
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $randomString = '';
                
                    for ($i = 0; $i < $n; $i++) {
                        $index = rand(0, strlen($characters) - 1);
                        $randomString .= $characters[$index];
                    }
                
                    return $randomString;
                }

                $new_pass = getName(8);
                $new_pass_md5 = md5($new_pass);
                $statement2 = 'UPDATE employee_data SET password="'.$new_pass_md5.'" WHERE employee_code="'.$employee_code.'"';
                    

                $run_query = mysqli_query($db_connect,$statement2);

                if ($run_query) {
                    $created_on      = date('Y-m-d');

                $statement4 = 'SELECT employee_id FROM employee_data WHERE employee_code="'.$employee_code.'"';
                $run_query2 = mysqli_query($db_connect,$statement4);
                $employee = mysqli_fetch_object($run_query2);
                $employee_id = $employee->employee_id;
                
                $statement5 = 'INSERT INTO `notifications`(`user`,`type`,`date_time`, `affected`, `summary`)
                values("'.$employee_id.'","Updated Employee data","'.$created_on.'","'.$employee_id.'","System Generated Password")';
		
				$run_query3 = mysqli_query($db_connect,$statement5);
                }
                //trigger API
                ?> 
                <input type = "button" id="forgoz" value = "Send Email">

                <script> 
                    $(document).ready(function()
                        {
                            $("#forgoz").click(function() { 
                                let reciever = <?php echo "' $reciever '" ?>;
                                let username = <?php echo "' $username '" ?>;
                                let new_pass = <?php echo "' $new_pass '" ?>;
                                console.log("Hello");
                                send_mail(reciever,username,new_pass); });
                        });
                    
                </script>


<?php 
            } else {
                echo "Incorrect Credentials";
            }
        } else{
            echo "User Not Found";
        }
    }
?>
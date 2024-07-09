<?php require_once('dbconnect.php');
//print_r($_SESSION);

// 

if (isset($_POST['forget_pass'])) {

        $email  		 = $_POST['email'];
        $employee_code  = $_POST['employee_code'];
        $updated_on     = date('Y-m-d');

        $statment1 = 'select * from employee_data where employee_code = "'.$employee_code.'"';
		$query = mysqli_query($db_connect,$statment1);

            $reciever = $username = $new_pass = null;
		 if ($query->num_rows>0) {
		 	$employee = mysqli_fetch_object($query);
		 	if ($email == $employee->email && $employee_code==$employee->employee_code) {
                $reciever = "f20220426@pilani.bits-pilani.ac.in";
                $username = $employee->first_name;
                $new_pass = getName(8);
                //trigger API            
            } else {
                echo "Incorrect Credentials";
            }
        } else{
            echo "User Not Found";
        }
}
?>

<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
<script src="../includes/js/email_API.js"></script>
<script>

$(document).ready(function(){
    $('#forget_password').click(function(){
        
        let reciever = 'f20220426@pilani.bits-pilani.ac.in';
        let username = 'prakhar';
        let new_pass = '1234';

        send_mail(reciever,username,new_pass); 
    });
})

</script>
<?php
function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}
?>

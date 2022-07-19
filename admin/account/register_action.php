<?php
include('admin.class.php');
$admin=new admin();


global $con;
if (isset($_POST['register'])) {
	$email = $_POST['email'];
	$email = stripslashes($email);
	$email = addslashes($email);
	$pass = $_POST['password'];
	$password = stripslashes($pass);
	$password = addslashes($password);
	$password = md5($password);

    $confirm_pass = $_POST['confirm_password'];
    

	$insert_admin = array(

	'username' => mysqli_real_escape_string($admin->get_conn(), $email),
	'password' => mysqli_real_escape_string($admin->get_conn(), $password),
	
	);
	
	if(!$email == '' && !$password == '' && !$confirm_pass == ''){


		$sel_admin = "SELECT * FROM `admin` WHERE `email` = '$email' ";

        $run_admin = mysqli_query($admin->get_conn(), $sel_admin);


        $check_admin = mysqli_num_rows($run_admin);

        if($check_admin>0) {

          echo "<script>alert('Email Already Exist!')</script>";
          header('Location: register.php');
          exit();
        }

			if($pass == $confirm_pass){
				//QUERIES

				if ($admin->register("admin", $insert_admin)) {
					$success_message = 'Admin Registered';
					header('Location: login.php?message='. $success_message);
				}
			}
			else {
				echo '<p class="required">Password Mismatch!</p>';
			}
	}else {
		echo '<p class="required">All Fields are Required!</p>';
	}
}

?>
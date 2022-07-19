<?php
include('user.class.php');
$account=new user();


global $con;
if (isset($_POST['register'])) {
	$firstname = $_POST['m_firstname'];
	$lastname = $_POST['m_lastname'];
	$email = $_POST['m_email'];
	$address = $_POST['m_address'];
	$mobile = $_POST['m_mobile'];
	$pass = $_POST['m_pass'];
	if(isset($_POST['ref'])){
		$ref=$_POST['ref'];
		$sel_referrer=mysqli_query($account->get_conn(),"SELECT * FROM `referrer` WHERE `ref_code`='$ref' " );
		while($row = mysqli_fetch_array($sel_referrer)) {
			$referral_email = $row['ref_email'];
		}
	}else{
		$referral_email = "";
	}
	
	$refbonus=0;
	$code=uniqid();
	$confirm_pass = $_POST['pass_again'];
	$dob = $_POST['m_date'];
	$gender = $_POST['m_gender'];
	$favorite_food = $_POST['secret_question'];
	

	$uploadedFile = $_FILES['file']['tmp_name'];
	$sourceProperties = getimagesize($uploadedFile);
	$newFileName = time();
	$dirPath = "images/";
	$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
	$newFileRename = $newFileName. "_thump.". $ext;
	$imageType = $sourceProperties[2];

    $state = $_POST['m_state'];
	$ip = $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLINT_IP']);
	

	$firstname = stripslashes($firstname);
	$firstname = addslashes($firstname);
	$firstname = ucwords(strtolower($firstname));
	$lastname = stripslashes($lastname);
	$lastname = addslashes($lastname);
	$lastname = ucwords(strtolower($lastname));
	$email = stripslashes($email);
	$email = addslashes($email);
	$address = stripslashes($address);
	$address = addslashes($address);
	$address = ucwords(strtolower($address));
	$mobile = stripslashes($mobile);
	$mobile = addslashes($mobile);
	$gender = stripslashes($gender);
	$gender = addslashes($gender);
	$sid=uniqid();
    $date=date("Y-m-d");
	
	
	$dob = stripslashes($dob);
	$dob = addslashes($dob);
	$state = stripslashes($state);
	$state = addslashes($state);

	$password = stripslashes($pass);
	$password = addslashes($password);
	$password = md5($password);

	$insert_user = array(

	'first_name' => mysqli_real_escape_string($account->get_conn(), $firstname),
	'last_name' => mysqli_real_escape_string($account->get_conn(), $lastname),
	'address' => mysqli_real_escape_string($account->get_conn(), $address),
	'email' => mysqli_real_escape_string($account->get_conn(), $email),
	'mobile' => mysqli_real_escape_string($account->get_conn(), $mobile),
	'password' => mysqli_real_escape_string($account->get_conn(), $password),
	'dob' => mysqli_real_escape_string($account->get_conn(), $dob),
    'gender' => mysqli_real_escape_string($account->get_conn(), $gender),
    'm_image' => mysqli_real_escape_string($account->get_conn(), $newFileRename),
    'state' => mysqli_real_escape_string($account->get_conn(), $state),
    'secret_question' => mysqli_real_escape_string($account->get_conn(), $favorite_food),
	'm_ip' => mysqli_real_escape_string($account->get_conn(), $ip)
	
	);

	$insert_airtime = array(

		'firstname' => mysqli_real_escape_string($account->get_conn(), $firstname),
		'lastname' => mysqli_real_escape_string($account->get_conn(), $lastname),
		'email' => mysqli_real_escape_string($account->get_conn(), $email),
		'subid' => mysqli_real_escape_string($account->get_conn(), $sid),
		'mobile' => mysqli_real_escape_string($account->get_conn(), $mobile),
		'regdate' => mysqli_real_escape_string($account->get_conn(), $date),
		
		);

		$insert_ref = array(

			'ref_email' => mysqli_real_escape_string($account->get_conn(), $email),
			'ref_code' => mysqli_real_escape_string($account->get_conn(), $code),
			'ref_bonus' => mysqli_real_escape_string($account->get_conn(), $refbonus),
			'referred_by' => mysqli_real_escape_string($account->get_conn(), $referral_email),
			);
	
	if(!$firstname == '' && !$firstname == '' && !$dob == '' && !$email == '' && !$password == '' && !$confirm_pass == '' && !$mobile == '' && !$address == '' && !$favorite_food == ''){


		$sel_user = "select * from user where email = '$email' ";
        $run_user = mysqli_query($account->get_conn(), $sel_user);
        $check_user = mysqli_num_rows($run_user);

        if($check_user>0) {

			if(isset($_POST['ref'])){
				echo "<script>alert('Email Already Exist!')</script>";
				echo "<script>window.open('register.php?$ref','_self')</script>";
				exit();
			}else{
			echo "<script>alert('Email Already Exist!')</script>";
			echo "<script>window.open('register.php','_self')</script>";
			exit();
			}
          
		}
		
		$sel_mobile = "SELECT * FROM user WHERE mobile = '$mobile' ";

        $run_mobile = mysqli_query($account->get_conn(), $sel_mobile);


        $check_mobile = mysqli_num_rows($run_mobile);

        if($check_mobile>0) {
		
			if(isset($_POST['ref'])){
				//registration with referral redirect
				echo "<script>alert('Phone Number Already Exist!')</script>";
				echo "<script>window.open('register.php?$ref','_self')</script>";
				exit();
			}else{
				echo "<script>alert('Phone Number Already Exist!')</script>";
				echo "<script>window.open('register.php','_self')</script>";
				exit();
			}
        }

		if($pass == $confirm_pass){
			//QUERIES
			
			if(is_array($_FILES)){

				switch ($imageType){
		
					case IMAGETYPE_PNG:
						$imageSrc = imagecreatefrompng($uploadedFile);
						$tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
						imagepng($tmp,$dirPath. $newFileRename);
						break;
		
					case IMAGETYPE_JPEG:
						$imageSrc = imagecreatefromjpeg($uploadedFile);
						$tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
						imagepng($tmp,$dirPath. $newFileRename);
						break;
		
					case IMAGETYPE_GIF:
						$imageSrc = imagecreatefromjif($uploadedFile);
						$tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
						imagepng($tmp,$dirPath. $newFileRename);
						break;
		
					default:
						if(isset($_POST['ref'])){
							//registration with referral redirect
							echo "<script>alert('Invalid Image Type!')</script>";
							echo "<script>window.open('register.php?$ref','_self')</script>";
							exit();
						}else{
							echo "<script>alert('Invalid Image Type!')</script>";
							echo "<script>window.open('register.php','_self')</script>";
							exit;
							break;
						}
				}
				if ($account->register("user", $insert_user)) {
					if($account->register("freeairtime", $insert_airtime)){
					
						//insert mobile into user mobile file
						$value= $mobile.',';
						$file_name1= '../admin/users_mobiles.txt';
						file_put_contents($file_name1, $value, FILE_APPEND | LOCK_EX);

						$file_name2= '../admin/freeairtime_mobiles.txt';
						  file_put_contents($file_name2, $value, FILE_APPEND | LOCK_EX);
							//insert referral
							if($account->register("referrer", $insert_ref)){
								if(isset($_POST['ref'])){
								$sel_user2=mysqli_query($account->get_conn(),"SELECT * FROM `referrer` WHERE `ref_code`='$ref' " );
								$ref_bonus = 0;
								$total_ref = 0;
								while($row = mysqli_fetch_array($sel_user2)) {
								$ref_bonus = $row['ref_bonus'];
								$total_ref = $row['total_referrers'];
								$ref_email = $row['ref_email'];
								}
								$ref_bonus = $ref_bonus + 10;
								$total_ref = $total_ref + 1;
								$new_total_ref = $total_ref - 5; 
								//select referral airtime quiz blocked status
								$sel_blocked_user=mysqli_query($account->get_conn(),"SELECT * FROM `freeairtime` WHERE `email`='$ref_email' " )or die('Error9945');
								while($row = mysqli_fetch_array($sel_blocked_user)) {
								$blocked = $row['blocked'];
								
									
									if($total_ref>=5){
										//check if referral is blocked
										if($blocked==1){
											//unblock referral
											$unblock_user=mysqli_query($account->get_conn(),"UPDATE `freeairtime` SET `win_count`='0', `blocked`='0' WHERE `email`='$ref_email'")or die('Error995');
											$update_total_ref=mysqli_query($account->get_conn(),"UPDATE `referrer` SET `ref_bonus`='$ref_bonus', `total_referrers`='$new_total_ref' WHERE `ref_code`='$ref'")or die('Error9956');
										}
										else{
											$update_referrer=mysqli_query($account->get_conn(),"UPDATE `referrer` SET `ref_bonus`='$ref_bonus', `total_referrers`='$total_ref' WHERE `ref_code`='$ref'")or die('Error992');
										}
									}
									else{
										$update_referrer=mysqli_query($account->get_conn(),"UPDATE `referrer` SET `ref_bonus`='$ref_bonus', `total_referrers`='$total_ref' WHERE `ref_code`='$ref'")or die('Error992');
									}
								}
							}
						}  
						$success_message = 'Account Registered';
						header('Location: login.php?message='. $success_message);
					}
				}
				
			}else{
				if(isset($_POST['ref'])){
				echo "<script>alert('Image File Not Supported!')</script>";
				echo "<script>window.open('register.php?$ref','_self')</script>";
				}else{
				echo "<script>alert('Image File Not Supported!')</script>";
				echo "<script>window.open('register.php','_self')</script>";
				}
            
			}
		}
		else {
			if(isset($_POST['ref'])){
			echo '<p class="required">Password mismatch!</p>';
			echo "<script>window.open('register.php?$ref','_self')</script>";
			}else{
			echo '<p class="required">Password mismatch!</p>';
			echo "<script>window.open('register.php','_self')</script>";
			}
		}
	}else {
		echo '<p class="required">All Fields are Required!</p>';
	}
}


function imageResize($imageSrc,$imageWidth, $imageHeight){
    $newImageWidth = 200;
    $newImageHeight = 200;

    $newImageLayer=imagecreatetruecolor($newImageWidth,$newImageHeight);
    imagecopyresampled($newImageLayer,$imageSrc,0,0,0,0,$newImageWidth,$newImageHeight,$imageWidth,$imageHeight);

    return $newImageLayer;
}

?>
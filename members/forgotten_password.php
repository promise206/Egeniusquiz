<!DOCTYPE HTML>
<?php
session_start();
//import db file
ob_start();
include('include/redirect.php');
include('user.class.php');
$user=new user();
?>
<html lang="en">
<head>
<title>Password Reset-Egeniusquiz</title>
<!--title bar icon Starts-->
<?php include('include/titleicon.php'); ?>
  <!--title bar icon Ends-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	
	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded:400,600,700" rel="stylesheet">
	
	<!-- Stylesheets -->
	
	<link href="plugin-frameworks/bootstrap.css" rel="stylesheet">
	
	<link href="fonts/ionicons.css" rel="stylesheet">
		
	<link href="common/styles.css" rel="stylesheet">
	
	<script data-ad-client="ca-pub-9385130234759860" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
<body>
	<!--Banner starts-->
<?php include('include/header.php'); ?>
  <!--/ Banner ends-->
	
	
	<section class="ptb-0">
		<div class="mb-30 brdr-ash-1 opacty-5"></div>
		<div class="container">
			<a class="mt-10" href="../index.php"><i class="mr-5 ion-ios-home"></i>Home<i class="mlr-10 ion-chevron-right"></i></a>
			<a class="color-ash mt-10" href="login.php">Recover Password</a>
		</div><!-- container -->
	</section>
	
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-8">
				<?php if (isset($_GET['message'])): ?>
				<p style="color: blue;"><?php echo $_GET['message'] ?></p> 
				<?php endif; ?><br><br>
					<h3><b><h2>Recover Your Password</h2></b></h3>
					<p class="mb-30 mr-100 mr-sm-0"></p>
					<form class="form-block form-bold form-mb-20 form-h-35 form-brdr-b-grey pr-50 pr-sm-0" role="form"  action="forgotten_password.php" method="post" enctype="multipart/form-data">
						<div class="row">
							
            <div class="col-sm-6">							
								<p class="color-ash">Email*</p>
								<div class="pos-relative">
									<input class="pr-20" id="m_email" name="m_email" placeholder="Enter your email-id" type="email" required>
									<i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
							</div><!-- col-sm-6 -->
							
							<div class="col-sm-6">	
								<p class="color-ash">Enter Your Favourite Food*</p>
								<div class="pos-relative">
									<input class="pr-20" id="secret_answer" name="secret_answer" placeholder="Enter Your Secrete Answer" type="text" required>
									<i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
            </div><!-- col-sm-6 -->

            <div class="col-sm-6">							
								<p class="color-ash">Enter a New Password*</p>
								<div class="pos-relative">
									<input class="pr-20" id="m_pass" name="m_pass" placeholder="Enter a New Password" type="Password" required>
									<i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
							</div><!-- col-sm-6 -->
							
							<div class="col-sm-6">	
								<p class="color-ash">Enter The Password Again*</p>
								<div class="pos-relative">
									<input class="pr-20" id="m_again" name="m_again" placeholder="Repeat Password" type="Password" required>
									<i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
            </div><!-- col-sm-6 -->
							
							<div class="col-sm-12">
								<div class="pos-relative pr-80">
								<button type="submit" name="submit" class="btn btn-success">Recover Password</button>
                  <a class="btn btn-info" href="register.php" role="button">Register Account</a>
								</div><!-- pos-relative -->
							</div><!-- col-sm-6 -->
							
						</div><!-- row -->
          </form>
				</div><!-- col-md-6 -->
				
				<div class="col-sm-12 col-md-4">
					<h3 class="mb-20 mt-sm-50"><b>INFORMATION</b></h3>
					
					<ul class="font-11 list-relative list-li-pl-30 list-block list-li-mb-15">
						<li><i class="abs-tl ion-android-mail"></i>egeniusquiz@egeniusquiz.com</li>
						<li><i class="abs-tl ion-android-call"></i>(+234)-8037-8699-35</li>
					</ul>
					<ul class="font-11  list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-5">
						<li><a class="pl-0" href="#"><i class="ion-social-linkedin"></i></a></li>
						<li><a href="https://facebook.com/egeniusquiz"><i class="ion-social-facebook"></i></a></li>
						<li><a href="https://twitter.com/egeniusquiz"><i class="ion-social-twitter"></i></a></li>
						<li><a href="#"><i class="ion-social-google"></i></a></li>
						<li><a href="https://wa.me/2348037869935"><i class="ion-social-whatsapp"></i></a></li>
					</ul>
				
				</div><!-- col-md-6 -->
			</div><!-- row -->
		</div><!-- container -->
	</section>
	
<!--Footer starts-->
<?php include('include/footer.php'); ?>
  <!--/ Footer ends-->
	
	<!-- SCIPTS -->
	
	<script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
	
	<script src="plugin-frameworks/tether.min.js"></script>
	
	<script src="plugin-frameworks/bootstrap.js"></script>
	
	<script src="common/scripts.js"></script>
	
</body>
</html>
<?php

if(isset($_POST['submit'])){

  include('database/db.php');

 
    $secret_answer = $_POST['secret_answer'];
    $m_email = $_POST['m_email'];
    $user = $_POST['m_email'];
    $m_pass = $_POST['m_pass'];
    $m_again = $_POST['m_again'];


  $password = stripslashes($m_pass);
	$password = addslashes($password);
	$password = md5($password);

    $sel_m = "SELECT * FROM user WHERE email = '$m_email' AND secret_question = '$secret_answer'";

echo "<br><br><br><br><br><br>";

    $run_m = mysqli_query($con, $sel_m);


    $check_member = mysqli_num_rows($run_m);
    if($check_member==0) {

      echo "<script>alert('Email or Secret Answer is incorrect, Try again!')</script>";
      exit();
    }

      $sel_pass = "SELECT * FROM user WHERE  email = '$m_email'";
      $run_pass = mysqli_query($con, $sel_pass);
      $check_pass = mysqli_num_rows($run_pass);

      if ($m_pass != $m_again) {
        echo "<script>alert('Password Do Not Match!')</script>";
        exit();
      }
      
      else {

      $update_pass = "UPDATE user SET password = '$password' where email = '$m_email'";

      $run_update = mysqli_query($con, $update_pass);

      if ($update_pass) {
        echo "<script>alert('Password Changed Successfully!')</script>";
        echo"<script>window.open('../index.php','_self')</script>";
      exit();
      }

  }
}
?>
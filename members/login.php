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
<title>Login page-Egeniusquiz</title>
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
	
	
</head>
<body>
	<!--Banner starts-->
<?php include('include/header.php'); ?>
  <!--/ Banner ends-->
	
	
	<section class="ptb-0">
		<div class="mb-30 brdr-ash-1 opacty-5"></div>
		<div class="container">
			<a class="mt-10" href="../index.php"><i class="mr-5 ion-ios-home"></i>Home<i class="mlr-10 ion-chevron-right"></i></a>
			<a class="color-ash mt-10" href="login.php">Login</a>
		</div><!-- container -->
	</section>
	
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-8">
				<?php if (isset($_GET['message'])): ?>
				<p style="color: blue;"><?php echo $_GET['message'] ?></p> 
				<?php endif; ?>
					<h3><b><h2>Enter Your Details to Login</h2></b></h3>
					<p class="mb-30 mr-100 mr-sm-0">While inputting your Details in the form, Make sure all the details are correct..</p>
					<form class="form-block form-bold form-mb-20 form-h-35 form-brdr-b-grey pr-50 pr-sm-0" role="form"  action="" method="post" enctype="multipart/form-data">
						<div class="row">
							
							<div class="col-sm-6">							
								<p class="color-ash">Email*</p>
								<div class="pos-relative">
									<input class="pr-20" id="m_email" name="m_email" placeholder="Enter your email-id" type="email" required>
									<i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
              </div><!-- col-sm-6 -->
              </div>
							<div class="row">
							<div class="col-sm-6">	
								<p class="color-ash">Password*</p>
								<div class="pos-relative">
									<input class="pr-20" id="m_password" name="m_password" placeholder="Password" type="Password" required>
									<i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
							</div><!-- col-sm-6 -->
							
							<div class="col-sm-12">
								<div class="pos-relative pr-80">
								<button type="submit" name="login" class="btn btn-success">Click to Login</button>
								<a class="btn btn-danger" href="register.php" role="button">Register</a><br>
									<br><a class="btn btn-info" href="forgotten_password.php" role="">Forgotten Password</a>
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

    if(isset($_POST['login']))
    {
        $email = $_POST['m_email'];
        $pass = $_POST['m_password'];
        

        
        $pass = stripslashes($pass); 
        $pass = addslashes($pass);
        $pass = md5($pass); 

        if($user->login($email,$pass))
        {
            //Start Session
            $_SESSION['email']=$email;
            $_SESSION['key']='sunny7785068889';
            $redirect_link=$_REQUEST['page_url'];
			$msg = "You Logged in Successfully";
			if($redirect_link==''){
			header('Location:../index.php'.$redirect_link);
			}else{
			header('Location:'.$redirect_link);
			}
        }
        else{
		  echo "<script>alert('Incorrect Details, Pls Try Again!')</script>";
		  	if($redirect_link==""){
			echo "<script>window.open('login.php?'.$redirect_link','_self')</script>";
			}else{
				echo "<script>window.open('login.php?'.$redirect_link','_self')</script>";
			}
		  
        }
    }
    else{
    }
?>
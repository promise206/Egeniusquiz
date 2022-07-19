<!DOCTYPE html>
<?php

define('SITE_KEY','6Ldu98oUAAAAAHEoMvJjaEOIkIUm1Xgz9EPFKnED');
define('SECRET_KEY','6Ldu98oUAAAAAEG0COlx_XZwX8oIgxNI9YYQHa0j');

session_start();
//import db file
ob_start();
include('include/redirect.php');
include('members/user.class.php');
$user=new user();
?>
<html lang="en">

<!DOCTYPE HTML>
<html lang="en">
<head>
<script data-ad-client="ca-pub-9385130234759860" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

	<title>Contact Us - Egeniusquiz</title>
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
<script src="https://www.google.com/recaptcha/api.js" async defer></script>	

</head>
<body>
	<!--Banner starts-->
<?php include('include/header.php'); ?>
  <!--/ Banner ends-->
	
	
	<section class="ptb-0">
		<div class="mb-30 brdr-ash-1 opacty-5"></div>
		<div class="container">
			<a class="mt-10" href="index.php"><i class="mr-5 ion-ios-home"></i>Home<i class="mlr-10 ion-chevron-right"></i></a>
			<a class="color-ash mt-10" href="06_contact-us.html">Contact us</a>
		</div><!-- container -->
	</section>
	
	
	<section>
		<div class="container">
			<div class="row">
<?php if(@$_GET['q'])echo '<span style="font-size:18px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;'.@$_GET['q'].'</span>';
else
{echo'
				<div class="col-sm-12 col-md-8">
					<h3><b>SEND US A MESSAGE</b></h3>
					<p class="mb-30 mr-100 mr-sm-0">We’d love to hear from you – please get in touch for comments, requests, 
						advertising partnerships or job inquiries.</p>
					<form class="form-block form-bold form-mb-20 form-h-35 form-brdr-b-grey pr-50 pr-sm-0" role="form"  method="post" action="contact_action.php?q=contact.php">
					
					
      <br/>
						<div class="row">
						
							<div class="col-sm-6">
								<p class="color-ash">Full Name*</p>
								<div class="pos-relative">
									<input class="pr-20" value="" id="name" name="name" placeholder="Enter your name" type="text" required>
									<i class="abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
							</div><!-- col-sm-6 -->
							
							<div class="col-sm-6">							
								<p class="color-ash">Email*</p>
								<div class="pos-relative">
									<input class="pr-20" id="email" name="email" placeholder="Enter your email-id" type="email" required>
									<i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
							</div><!-- col-sm-6 -->
							
							<div class="col-sm-6">	
								<p class="color-ash">Subject*</p>
								<div class="pos-relative">
									<input class="pr-20" id="name" name="subject" placeholder="Enter subject" type="text" required>
									<i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
							</div><!-- col-sm-6 -->

							<div class="col-sm-12">
								<div class="pos-relative pr-80">
									<p class="color-ash">Message*</p>
									<h4><b>Tell us about your question</b></h4>
									<textarea name="feedback"></textarea>
								</div><!-- pos-relative -->
							</div><!-- col-sm-6 -->
							
							
							
							<div class="col-sm-12">
								<div class="pos-relative pr-80">
								<div class="g-recaptcha" data-sitekey="6Ldu98oUAAAAAHEoMvJjaEOIkIUm1Xgz9EPFKnED"></div>
								
								<button type="submit" name="submit" class="btn btn-success">Submit</button>
								</div><!-- pos-relative -->
							</div><!-- col-sm-6 -->
							
						</div><!-- row -->
          </form>';}?>
          
          
				</div><!-- col-md-6 -->
				
				<div class="col-sm-12 col-md-4">
					<h3 class="mb-20 mt-sm-50"><b>INFORMATION</b></h3>
					
					<ul class="font-11 list-relative list-li-pl-30 list-block list-li-mb-15">
						<li><i class="abs-tl ion-android-mail"></i>egeniusquiz@egeniusquiz.com</li>
						<li><i class="abs-tl ion-android-call"></i>(+234)-8037-8699-35</li>
					</ul>
					<ul class="font-11  list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-5">
						<li><a class="pl-0" href="#"><i class="ion-social-linkedin"></i></a></li>
						<li><a href="#"><i class="ion-social-facebook"></i></a></li>
						<li><a href="#"><i class="ion-social-twitter"></i></a></li>
						<li><a href="#"><i class="ion-social-google"></i></a></li>
						<li><a href="#"><i class="ion-social-pinterest"></i></a></li>
					</ul>
				
				</div><!-- col-md-6 -->
			</div><!-- row -->
		</div><!-- container -->
	</section>
	
 <!-- Footer starts-->
 <?php include('include/footer.php'); ?>
<!-- Footer Ends-->
	
	<!-- SCIPTS -->
	
	<script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
	
	<script src="plugin-frameworks/tether.min.js"></script>
	
	<script src="plugin-frameworks/bootstrap.js"></script>
	
	<script src="common/scripts.js"></script>
	
</body>
</html>
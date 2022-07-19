<!DOCTYPE HTML>
<?php
session_start();
//import db file
ob_start();
include('user.class.php');
$user=new user();
?>
<html lang="en">
<head>
<title>Registration page-Egeniusquiz</title>
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
			<a class="color-ash mt-10" href="register.php">Register</a>
		</div><!-- container -->
	</section>
	
	
	<section>
		<div class="container">
			<div class="row">
<?php if(@$_GET['q'])echo '<span style="font-size:18px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;'.@$_GET['q'].'</span>';
else
{
	echo'
				<div class="col-sm-12 col-md-8">
					<h3><b><h2>REGISTER ACCOUNT</h2></b></h3>
					<p class="mb-30 mr-100 mr-sm-0">Make sure the phone number you will enter belongs to you, once you win any quiz, the phone number will be recharched directly.</p>
					<form class="form-block form-bold form-mb-20 form-h-35 form-brdr-b-grey pr-50 pr-sm-0" role="form"  action="register_action.php" method="post" enctype="multipart/form-data">
						<div class="row">
						
							<div class="col-sm-6">
								<p class="color-ash">First Name*</p>
								<div class="pos-relative">
								';
								if(isset($_GET['ref'])){
									$referrer =@$_GET['ref'];
									echo '<input class="pr-20" value="'.$referrer.'" id="ref" name="ref" type="hidden">';
								}

								echo '
									<input class="pr-20" value="" id="m_firstname" name="m_firstname" placeholder="Enter your First Name" type="text" required>
									<i class="abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
              				</div><!-- col-sm-6 -->
              
              				<div class="col-sm-6">
								<p class="color-ash">Last Name*</p>
								<div class="pos-relative">
									<input class="pr-20" value="" id="m_lastname" name="m_lastname" placeholder="Enter your Last Name" type="text" required>
									<i class="abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
							</div><!-- col-sm-6 -->
							
							<div class="col-sm-6">							
								<p class="color-ash">Email*</p>
								<div class="pos-relative">
									<input class="pr-20" id="m_email" name="m_email" placeholder="Enter your email-id" type="email" required>
									<i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
							</div><!-- col-sm-6 -->
							
							<div class="col-sm-6">	
								<p class="color-ash">Address*</p>
								<div class="pos-relative">
									<input class="pr-20" id="m_address" name="m_address" placeholder="Enter Your Address" type="text" required>
									<i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
              				</div><!-- col-sm-6 -->
              
              
							
							<div class="col-sm-6">							
								<p class="color-ash">Password*</p>
								<div class="pos-relative">
									<input class="pr-20" id="m_pass" name="m_pass" placeholder="Enter your Password" type="Password" required>
									<i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
							</div><!-- col-sm-6 -->
							
							<div class="col-sm-6">	
								<p class="color-ash">Password Again*</p>
								<div class="pos-relative">
									<input class="pr-20" id="pass_again" name="pass_again" placeholder="Enter Password Again" type="Password" required>
									<i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
							</div><!-- col-sm-6 -->
							
							<div class="col-sm-6">							
								<p class="color-ash">Phone Number*</p>
								<div class="pos-relative">
									<input class="pr-20" id="m_mobile" name="m_mobile" placeholder="Enter your Phone Number" type="text" maxlength="11" required>
									<i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
							</div><!-- col-sm-6 -->
							
							<div class="col-sm-6">	
								<p class="color-ash">Date of Birth*</p>
								<div class="pos-relative">
									<input class="pr-20" id="m_date" name="m_date" placeholder="" type="date" required>
									<i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
              </div><!-- col-sm-6 -->
              						
								<p class="color-ash">Gender*</p>
								<div class="pos-relative">
                <input type="radio" name="m_gender" checked value="Male">Male
                <input type="radio" name="m_gender" value="Female">Female
                
								</div><!-- pos-relative -->
							
							<div class="col-sm-6">	
								<p class="color-ash">Secret Question (what is the name your favourite food?):*</p>
								<div class="pos-relative">
									<input class="pr-20" id="secret_question" name="secret_question" placeholder="" type="text" required>
									<i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
              </div><!-- col-sm-6 -->
              
              <div class="col-sm-6">	
								<p class="color-ash">Image*</p>
								<div class="pos-relative">
									<input class="pr-20" id="m_image" name="file" placeholder="" type="file" required>
									<i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
              </div><!-- col-sm-6 -->
              
              <div class="col-sm-6">	
								<p class="color-ash">State*</p>
								<div class="pos-relative">
								<select name="m_state" id="m_state" class="form-control">
                       <option>State</option>
                         <option>Abia</option>
                         <option>Adamawa</option>
                         <option>Akwa Ibom</option>
                         <option>Anambra</option>
                         <option>Bauchi</option>
                         <option>Bayelsa</option>
                         <option>Benue</option>
                         <option>Borno</option>
                         <option>Cross River</option>
                         <option>Delta</option>
                         <option>Ebonyi</option>
                         <option>Edo</option>
                         <option>Ekiti</option>
                         <option>Enugu</option>
                         <option>Gombe</option>
                         <option>Imo</option>
                         <option>Jigawa</option>
                         <option>Kaduna</option>
                         <option>Kano</option>
                         <option>Kastina</option>
                         <option>Kebbi</option>
                         <option>Kogi</option>
                         <option>Kwara</option>
                         <option>Lagos</option>
                         <option>Nasarawa</option>
                         <option>Niger</option>
                         <option>Ogun</option>
                         <option>Ondo</option>
                         <option>Osun</option>
                         <option>Oyo</option>
                         <option>Plateau</option>
                         <option>Rivers</option>
                         <option>Sokoto</option>
                         <option>Taraba</option>
                         <option>Yobe</option>
                         <option>Zamfara</option>
                         <option>FCT Abuja</option>
                     </select>
									<i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
							</div><!-- col-sm-6 -->
							
							<div class="col-sm-12">
								<div class="pos-relative pr-80">
								<button type="submit" name="register" class="btn btn-success">Submit</button>
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
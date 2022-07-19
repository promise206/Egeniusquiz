<!DOCTYPE html>
<?php
session_start();
//import db file
ob_start();
include('include/redirect.php');
include('../members/user.class.php');
$user=new user();
if(!isset($_SESSION['email'])){
  header("location:../members/login.php?page_url=$redirect_link_var&message=Login to View the Quiz! ");
  
}
else{
?>
<html lang="en">

<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Airtimequiz Reg - Egeniusquiz</title>
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
			<a class="color-ash mt-10" href="06_contact-us.html">Airtime Quiz</a>
		</div><!-- container -->
	</section>
	
	
 <!-- contact-->
 <section>
 <div class="bg1">
<div class="row">
<div class="col-md-3    "></div>
<div class="col-md-6 panel" style="background-image:url(image/bg4.jpg); min-height:430px;">
<h2 align="center" style="font-family:'typo'; color:#000066">REGISTER FOR SATURDAY AIRTIME QUIZ</h2>
<div style="font-size:14px">
<?php if(@$_GET['q'])echo '<span style="font-size:18px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;'.@$_GET['q'].'</span>';
else
{echo' 
<p style="color:green;"><b>Only those that Registered can partake in the Quiz on Saturday!</b></p><br />
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
</div><div class="col-md-1"></div></div>
<p style="color:black;"><b> Airtime Quiz Registration starts from Monday to friday every week, and the quiz holds every Saturday.</b></p>
<p style="color:red;"><b>Kindly fill in the form below and click on Register.<h4 style="color:green;"> Registration is free!!<h4/></b></p>
<form role="form"  method="post" action="airtimequiz.php">
  <label for="firstname" class="control-label">First Name:</label>
  <div class="row padding-top-10">
      <div class="col-md-6">
        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Your First Name" required>
      </div>
  </div>
  <label for="lastname" class="control-label">Last Name:</label>
  <div class="row padding-top-10">
      <div class="col-md-6">
        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Your Last Name" required>
      </div>
  </div><br>
<div class="form-group" align="center">
<input type="submit" name="submit" value="Register" class="btn btn-primary" />
</div>
</form>';}?>
</div><!--col-md-6 end-->
<div class="col-md-3"></div></div>
</div></div>
</div><!--container end-->
</section>

  <!--/ Contact-->
				
	
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
<?php
include_once 'database/db.php';
if(isset($_POST['submit']))
{
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_SESSION['email'];
  $id=uniqid();
  $date=date("Y-m-d");
  $active=0;
  $blocked=0;
  $win_count=0;
  $user = mysqli_query($con,"SELECT * FROM `user` where email='$email'") or die('Error');
  while($row = mysqli_fetch_array($user)) {
  $mobile = $row['mobile'];
  }

  $sel_user = "select * from freeairtime where email = '$email' ";
  $run_user = mysqli_query($con, $sel_user);
  $check_user = mysqli_num_rows($run_user);

  if($check_user>0) {
    $redirect_link=$_REQUEST['page_url'];
    echo "<script>alert('You have Registered Aready!')</script>";
    echo "<script>window.open('.$redirect_link.','_self')</script>";
    exit();
  }

  $q=mysqli_query($con,"INSERT INTO freeairtime VALUES  ('$firstname' , '$lastname', '$email' , '$id', '$mobile', '$date', '$active', '$win_count','$blocked')")or die ("Error5");
  if($q)
  {
    //insert mobile into file
        $value= $mobile.',';
        $file_name= '../admin/freeairtime_mobiles.txt';
        file_put_contents($file_name, $value, FILE_APPEND | LOCK_EX);
        $redirect_link=$_REQUEST['page_url'];
        echo "<script>alert('Your Registration was Successful!')</script>";
        echo "<script>window.open('.$redirect_link.','_self')</script>";
  }
}
} ?>
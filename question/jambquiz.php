<!DOCTYPE html>
<?php
session_start();
//import db file
ob_start();
include('include/redirect.php');
include('../members/user.class.php');
$user=new user();
if(!isset($_SESSION['email'])){
  echo "<script>window.open('../members/login.php?page_url=$redirect_link_var&message=Login to View the Quiz!', '_self')</script>";
}
else{
?>
<html lang="en">

<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Jambquiz Reg - Egeniusquiz</title>
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
			<a class="color-ash mt-10" href="jambquiz.php">Jamb Quiz</a>
		</div><!-- container -->
	</section>
	
	
 <!-- contact-->
 <section>
 <div class="bg1">
<div class="row">
<div class="col-md-3    "></div>
<div class="col-md-6 panel" style="background-image:url(image/bg4.jpg); min-height:430px;">
<h2 align="center" style="font-family:'typo'; color:#000066"><br><br>REGISTER FOR JAMB MONTHLY PREPARATORY QUIZ</h2>
<div style="font-size:14px">
<?php if(@$_GET['q'])echo '<span style="font-size:18px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;'.@$_GET['q'].'</span>';
else
{echo' 
<p style="color:green;"><b>Only Subscripted members can partake in the quiz!</b></p><br />
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
</div><div class="col-md-1"></div></div>
<p style="color:black;"><b>  JAMB Preparatory quiz registration starts on 5th November 2019 - 27 March 2020 and the quiz holds on 28th March2020.
Registration fee is #200. After registration, the proffessional code will be sent to your email and phone number.<br>
Price List:<br>1st Position: #5000 Bank transfer<br>2nd Position: #3000 Bank Transfer<br>3rd Position: #1000 and #400 Airtime
<br><br>kindly email us at egeniusquiz@egeniusquiz.com for payment details</b></p>
<form role="form"  method="post" action="jambquiz.php">
  
  <div class="row padding-top-10">
      <div class="col-md-6">
      <label for="firstname" class="control-label">First Name:</label>
        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Your First Name" required>
      </div>
      
  <div class="row padding-top-10">
      <div class="col-md-12">
      <label for="lastname" class="control-label">Last Name:</label>
        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Your Last Name" required>
      </div>
  </div>
  </div>
  <div class="row padding-top-10">
<div class=" col-md-6">
  <label for="sub1" class="control-label">Subject 1</label>
  <select name="sub1" id="sub1" class="form-control">
    <option>Select</option>';
    include('database/db.php');
    $sel_sub = mysqli_query($con,"SELECT * FROM `subjects`") or die('Error');
    while($row = mysqli_fetch_array($sel_sub)) {
      $subject_title = $row['subject_title'];
      echo '<option>'.$subject_title.'</option>';
    }
      echo ' 
  </select>
  </div>
  <div class="col-md-6">
    <label for="sub2" class="control-label">Subject 2</label>
    <select name="sub2" id="sub2" class="form-control">
      <option>Select</option>';
      include('database/db.php');
      $sel_sub = mysqli_query($con,"SELECT * FROM `subjects`") or die('Error');
      while($row = mysqli_fetch_array($sel_sub)) {
        $subject_title = $row['subject_title'];
        echo '<option>'.$subject_title.'</option>';
      }
        echo ' 
    </select>
  </div>
<div class=" col-md-6">
  <label for="sub3" class="control-label">Subject 3</label>
  <select name="sub3" id="sub3" class="form-control">
    <option>Select</option>';
    include('database/db.php');
    $sel_sub = mysqli_query($con,"SELECT * FROM `subjects`") or die('Error');
    while($row = mysqli_fetch_array($sel_sub)) {
      $subject_title = $row['subject_title'];
      echo '<option>'.$subject_title.'</option>';
    }
      echo ' 
  </select>
</div>
  <div class="col-md-6">
    <label for="sub4" class="control-label">Subject 4</label>
    <select name="sub4" id="sub4" class="form-control">
      <option>Select</option>';
      include('database/db.php');
      $sel_sub = mysqli_query($con,"SELECT * FROM `subjects`") or die('Error');
      while($row = mysqli_fetch_array($sel_sub)) {
        $subject_title = $row['subject_title'];
        echo '<option>'.$subject_title.'</option>';
      }
        echo ' 
    </select>
</div>
      <div class="col-md-6">
      <label for="lid" class="control-label">Legend Code:</label>
        <input type="text" class="form-control" id="lid" name="lid" placeholder="Enter Code Sent to Your Email" required>
      </div>
  </div>
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
  $sub1 = $_POST['sub1'];
  $sub2 = $_POST['sub2'];
  $sub3 = $_POST['sub3'];
  $sub4 = $_POST['sub4'];
  $email = $_SESSION['email'];
  $lid=$_POST['lid'];
  $date=date("Y-m-d");
  $time=date("h:i:sa");
  $reg_status=1;
  $active=0;

  $sel_user = "select * from legendquiz where email = '$email' ";
  $run_user = mysqli_query($con, $sel_user);
  $check_user = mysqli_num_rows($run_user);

  if($check_user>0) {

    echo "<script>alert('You have subscribed Already!')</script>";
    echo "<script>window.open('index.php','_self')</script>";
    exit();
  }
  $sel_status = "SELECT * FROM `legendquiz` WHERE lid = '$lid' AND reg_status='$reg_status' ";
  $run_status = mysqli_query($con, $sel_status);
  $check_status = mysqli_num_rows($run_status);
  if($check_status>0){
    echo "<script>alert('The Proffessional Code Has Been Used!')</script>";
    echo "<script>window.open('jambquiz.php','_self')</script>";
    exit();
  }
  $sel_pid = "SELECT * FROM `legendquiz` WHERE `lid` = '$lid' ";
  $run_pid = mysqli_query($con, $sel_pid);
  $check_pid = mysqli_num_rows($run_pid);
  if($check_pid>0){
    $q=mysqli_query($con,"UPDATE `legendquiz` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`time`='$time',`date`='$date',`sub1`='$sub1',`sub2`='$sub2',`sub3`='$sub3',`sub4`='$sub4',`reg_status`='$reg_status',`active`='$active' WHERE `lid`='$lid'")or die('Error147');
  if($q)
  {
    echo "<script>alert('Your Subscription was Successful!')</script>";
  }
  else{
    echo "<script>alert('Something went wrong!')</script>";
    }
  }else{
  echo "<script>alert('Incorrect Proffessional Code!')</script>";
  }
}
} ?>
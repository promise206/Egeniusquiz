<!DOCTYPE HTML>
<?php
session_start();
include_once("database/db.php");
//import db file
ob_start();
include('user.class.php');
include('../blog.class.php');
$user=new user();
$blog = new blog();

if(!isset($_SESSION['email'])){
  echo "<script>window.open('../members/login.php?message=Login to View the Quiz!', '_self')</script>";
}
else{
?>
<html lang="en">
<head>
<title>Profile-Egeniusquiz</title>
<!--title bar icon Starts-->
<?php include('include/titleicon.php'); ?>
  <!--title bar icon Ends-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	
	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded:400,600,700" rel="stylesheet">
	
  <!-- Stylesheets -->
  <link href="vendorr/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/style1.css">
  <link href="css/main.css" rel="stylesheet" media="all">
	
	<link href="plugin-frameworks/bootstrap.css" rel="stylesheet">
	
	<link href="fonts/ionicons.css" rel="stylesheet">
		
  <link href="common/styles.css" rel="stylesheet">
  <script src="https://cdn.tiny.cloud/1/nllne6jglw3laf49ugvd8mf9hajx71onlhz3pzp2464fv8jl/tinymce/5/tinymce.min.js"></script>
 
  <script>
  tinymce.init({selector:'textarea'});
  </script>
	
	
</head>
<body>
	<!--Banner starts-->
<?php include('include/header.php'); ?>
  <!--/ Banner ends-->
	
	
	<section class="ptb-0">
		<div class="mb-30 brdr-ash-1 opacty-5"></div>
		<div class="container">
			<a class="mt-10" href="../index.php"><i class="mr-5 ion-ios-home"></i>Home<i class="mlr-10 ion-chevron-right"></i></a>
			<a class="color-ash mt-10" href="member_profile.php">Profile</a>
		</div><!-- container -->
	</section>
	
	
<!--Modal box-->
 
<div class="panel-heading">
      <div class="panel-body">
        <div class="box">
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 "><div class="grey-box">
            <div class="alert alert-danger" role="alert"><p style="text-align:center">My Account</p></div>

            <?php
              if (isset($_SESSION['email'])) {
                
                $user = $_SESSION['email'];
                $get_img = "SELECT * FROM `user` WHERE `email`='$user'";
                $run_img = mysqli_query($con,$get_img);
                $row_img = mysqli_fetch_array($run_img);
                $m_image = $row_img['m_image'];
                $m_firstName = $row_img['first_name'];
                $m_lastName = $row_img['last_name'];
                echo "<p style='text-align:center;'><img src='images/$m_image' width='250' height='200'/>";

                $sel_user=mysqli_query($con,"SELECT * FROM `referrer` WHERE `ref_email`='$user' " );
                $check_user = mysqli_num_rows($sel_user);
                if($check_user==0) {
                    $code=uniqid();
                    $refbonus=0;
                    $total_referrer=0;
                    $qa=mysqli_query($con,"INSERT INTO referrer VALUES  ('','$user','$code','$refbonus','','$total_referrer')") or die('Error61');
                }
                $sel_user2=mysqli_query($con,"SELECT * FROM `referrer` WHERE `ref_email`='$user' " );
                while($row = mysqli_fetch_array($sel_user2)) {
                  $ref_code = $row['ref_code'];
                  $ref_bonus = $row['ref_bonus'];
                  $referrer = $row['referred_by'];
                  $total_reffered = $row['total_referrers'];
                
                }

              }

              $select_waec_reg="SELECT * FROM `profquiz` WHERE `email`='$user'";
              $run_waec_reg = mysqli_query($con, $select_waec_reg);
              $check_waec_reg = mysqli_num_rows($run_waec_reg);
            ?>
            <ul id="grey-box"><br>
            <?php 
            if($check_waec_reg>0) {
              //echo '<li><a href ="member_profile.php?edit_waec='.$user.'"><b>Edit Registered Waec Quiz</b></a></li>';
              //echo '<li><a href ="member_profile.php?view_waecreg='.$user.'"><b></b></a></li>';
            }
              ?>
              <ul class="list-block list-li-ptb-15 list-btm-border-white bg-info text-center">
              <li><b><a href="member_profile.php?edit_account=<?php echo $user; ?>">Edit Account</a></b></li>
              <li><b><a href="member_profile.php?change_pass=<?php echo $user; ?>">Change Password</a></b></li>
              <li><b><a href="member_profile.php?blog=ent&sports">Post Entertainment And Sports</a></b></li>
              <li><b><a href="member_profile.php?view_blog=view_ent">View Entertainment And Sports</a></b></li>
              <li><b><a href="member_profile.php?ref=<?php echo $ref_code; ?>">Referrer Link</a></b></li>
							<li><b><a href="#delete_account">Delete Account</a></b></li>
							
              <?php
              if(!isset($_SESSION['email'])){
                  
                }
                else {
                  echo "<li><b><a href='member_logout.php'>Logout</a></b></li>";
              }
              ?>
            </ul>
            </div>
          </div>
        </div>

        
        <?php
        if (isset($_GET['edit_waec'])) {
         include("editwaec_reg.php");
        }
        if (isset($_GET['edit_account'])) {
          include("edit_account.php");
        }
        if(isset($_GET['change_pass'])){
          include("change_pass.php");
        }
        if (isset($_GET['logout'])) {
          include("member_logout.php");
        }
        if (isset($_GET['delete_account'])) {
          include("delete_account.php");
        }
        if (isset($_GET['blog'])) {
          echo ($blog->entertainment());
         }
         if (isset($_GET['ref'])) {
          
          
            include('include/redirect.php');

            $sel_user=mysqli_query($con,"SELECT * FROM `referrer` WHERE `ref_email`='$user' " );

            $check_user = mysqli_num_rows($sel_user);
            if($check_user>0) {
              $protocols=$_SERVER['SERVER_PROTOCOL'];

              if(strpos($protocols, "HTTPS"))
              {
                $protocols="https://egeniusquiz.com/members/register.php?ref=$ref_code";
              }
              else
              {
                $protocols="https://egeniusquiz.com/members/register.php?ref=$ref_code";
              }
                echo '
                <p><b>Referrer Link:</b>&nbsp;&nbsp;<a href="'.$protocols.'">'.$protocols.'</a></p>
                <p><b>Referrer Airtime Bonus:</b>&nbsp;&nbsp;<b style="color: blue;">&#8358;'.$ref_bonus.'</b></p>
                ';
            }

        }

         if (isset($_GET['view_blog'])) {
          include("../post_detail.php");
        }
        if(@$_GET['ent_post']== 'delete') {
          $ent_id=@$_GET['ent_id'];
          
          if($blog->delete_ent($ent_id)){
            echo"<script>window.open('member_profile.php?view_blog=view_ent','_self')</script>";
          }
        }
        ?>
      </div>
    </div>
  </div>
</div>

<!--body-->

  <!--/ Modal box-->
	
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
<?php }?>
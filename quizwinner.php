<!DOCTYPE html>
<?php
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
  <title>Quizwinners - Egeniusquiz</title>
   <!--title bar icon Starts-->
   <?php include('include/titleicon.php'); ?>
  <!--title bar icon Ends-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	
	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded:400,600,700" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
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
			<a class="mt-10" href="index.php"><i class="mr-5 ion-ios-home"></i>Home<i class="mlr-10 ion-chevron-right"></i></a>
			<a class="color-ash mt-10" href="06_contact-us.html">Quiz Winners</a>
		</div><!-- container -->
	</section>
	
	
<!--Quiz winners-->
<section >
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
        </div>

        <?php
        include('database/db.class.php');
        $limit= 3;
        $q=mysqli_query($con,"SELECT * FROM `rank` ORDER BY `score` DESC LIMIT $limit" )or die('Error197');

        $i=1;
        while($row=mysqli_fetch_array($q) )
        {
          $e=$row['email'];
          $s=$row['score'];
          
          $q12=mysqli_query($con,"SELECT * FROM `user` WHERE `email`='$e' " )or die('Error231');
          $q13=mysqli_query($con,"SELECT * FROM `quiz`")or die('Error251');
       
          while($row=mysqli_fetch_array($q12) )
          {
            $firstname = $row['first_name'];
            $lastname = $row['last_name'];
            $dob = $row['dob'];
            $gender = $row['gender'];
            $email = $row['email'];
            $state = $row['state'];
            $mobile = $row['mobile'];
            $image = $row['m_image'];
            
          }
          $total=0;
          while($row=mysqli_fetch_array($q13))
          {
            $total+=$row['total'];
          }
          $percentage = ($s/$total)*100;
          $round = round($percentage, 2);
          echo ' <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="pm-staff-profile-container">
            <div class="pm-staff-profile-image-wrapper text-center">
            ';
            if($image==""){
              echo '<p style="text-align:center;"><img src="members/images/avatar.png" alt="" width="200" height="200"/>';
            }else{
              echo '<p style="text-align:center;"><img src="members/images/'.$image.'" alt="" height="250" width="200"/>';
            }
              echo'
              </div>
            <div class="pm-staff-profile-details text-center">
              <p class="pm-staff-profile-name">'.$firstname.'  '.$lastname.'</p>
              <p class="pm-staff-profile-title"><p2 style="color:#09054b"><b>From: </b></p1><b>'.$state.'</b></p>
              <p class="pm-staff-profile-bio"><p2 style="color:#056a26"><b>Score: </b></p1><b>'.$round.'%</b></p>
              <p class="pm-staff-profile-bio"><p2 style="color:#056a26"><b>Mobile Number: </b></p1><b>'.$mobile.'</b></p>
            </div>
          </div>
        </div>';
        }

        ?>
       
        
      </div>
    </div>
  </section>
  <!-- Quiz winners ends-->
				
	
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
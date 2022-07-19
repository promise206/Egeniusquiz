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
	<title>Question - Egeniusquiz</title>
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
			<a class="color-ash mt-10" href="06_contact-us.html">Quiz Detail</a>
		</div><!-- container -->
	</section>
	
 <!-- contact-->
 <section>
 <div class="container">
			<div class="row">
      <div class="col-md-12 col-lg-8">
      <h2 align="center" style="font-family:'typo'; color:#000066">EGENIUSQUIZ REGISTRATION DETAILS</h2>
      
      <p >1. Free Airtime Quiz Registration starts from Monday to Friday every week, and the quiz holds every Saturday.</p>
			<p >2. December WAEC Preparatory quiz starts on 5th November, 2019 - 6th March 2020 and the quiz will holds on 7th March 2020.
			Registration fee is #500. After registration, the proffessional code will be sent to your email and phone number.<br>
			Price List:<br>1st Position: #5000 Bank transfer<br>2nd Position: #3000 Bank Transfer<br>3rd Position: #1000 and #400 Airtime
			<br><br>3. JAMB Preparatory quiz registration starts on 5th November 2019 - 27 March 2020 and the quiz holds on 28th March2020.
			Registration fee is #200. After registration, the proffessional code will be sent to your email and phone number.<br>
			Price List:<br>1st Position: #5000 Bank transfer<br>2nd Position: #3000 Bank Transfer<br>3rd Position: #1000 and #400 Airtime</p>
            
					<h3 class="mb-20 mt-sm-50"><b>INFORMATION</b></h3>
					
					<ul class="font-11 list-relative list-li-pl-30 list-block list-li-mb-15">
						<li><i class="abs-tl ion-android-mail"></i>egeniusquiz@egeniusquiz.com</li>
						<li><i class="abs-tl ion-android-mail"></i>egeniusquiz@gmail.com</li>
						<li><i class="abs-tl ion-android-call"></i>(+234)-8037-8699-35</li>
					</ul>
					<ul class="font-11  list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-5">
						<li><a class="pl-0" href="#"><i class="ion-social-linkedin"></i></a></li>
						<li><script>function fbs_click() {u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=20,height=20');return false;}</script><a href="http://www.facebook.com/share.php?u=<url>" onclick="return fbs_click()" target="_blank"><i class="ion-social-facebook"></i></a></li>
						<li><a href="twitter.com/egeniusquiz"><i class="ion-social-twitter"></i></a></li>
						<li><a href="#"><i class="ion-social-google"></i></a></li>
						<li><a href="whatsapp://send?text=" title="Share On Whatsapp" onclick="window.open('whatsapp://send?text=' + encodeURIComponent(document.URL)); return false;"><i class="ion-social-whatsapp"></i></a></li>
					</ul>
      
					<div class="float-left-right text-center mt-40 mt-sm-20">
				
						<ul class="mb-30 list-li-mt-10 list-li-mr-5 list-a-plr-15 list-a-ptb-7 list-a-bg-grey list-a-br-2 list-a-hvr-primary ">
							<li><a href="#">MULTIPURPOSE</a></li>
							<li><a href="#">FASHION</a></li>
							<li class="mr-0"><a href="#">BLOGS</a></li>
						</ul>
						<ul class="mb-30 list-a-bg-grey list-a-hw-radial-35 list-a-hvr-primary list-li-ml-5">
							<li class="mr-10 ml-0">Share</li>
							<li><script>function fbs_click() {u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=20,height=20');return false;}</script><a href="http://www.facebook.com/share.php?u=<url>" onclick="return fbs_click()" target="_blank"><i class="ion-social-facebook"></i></a></li>
							<li><a href="twitter.com/egeniusquiz"><i class="ion-social-twitter"></i></a></li>
							<li><a href="#"><i class="ion-social-google"></i></a></li>
							<li><a href="whatsapp://send?text=" title="Share On Whatsapp" onclick="window.open('whatsapp://send?text=' + encodeURIComponent(document.URL)); return false;"><i class="ion-social-whatsapp"></i></a></li>
						</ul>
						
					</div><!-- float-left-right -->
				
					<div class="brdr-ash-1 opacty-5"></div>
					
					<h4 class="p-title mt-50"><b>YOU MAY ALSO LIKE</b></h4>
					<div class="row">
					
						<div class="col-sm-6">
							<img src="images/crypto-news-2-600x450.jpg" alt="">
							<h4 class="pt-20"><a href="#"><b>2017 Market Performance: <br/>Crypto vs.Stock</b></a></h4>
							<ul class="list-li-mr-20 pt-10 mb-30">
								<li class="color-lite-black">by <a href="#" class="color-black"><b>Olivia Capzallo,</b></a>
								Jan 25, 2018</li>
								<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>30,190</li>
								<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>47</li>
							</ul>
						</div><!-- col-sm-6 -->
						
						<div class="col-sm-6">
							<img src="images/crypto-news-1-600x450.jpg" alt="">
							<h4 class="pt-20"><a href="#"><b>2017 Market Performance: Crypto vs.Stock</b></a></h4>
							<ul class="list-li-mr-20 pt-10 mb-30">
								<li class="color-lite-black">by <a href="#" class="color-black"><b>Olivia Capzallo,</b></a>
								Jan 25, 2018</li>
								<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>30,190</li>
								<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>47</li>
							</ul>
						</div><!-- col-sm-6 -->
					</div><!-- row -->
				</div><!-- col-md-9 -->
				
				<div class="d-none d-md-block d-lg-none col-md-3"></div>
				<div class="col-md-6 col-lg-4">
					<div class="pl-20 pl-md-0">
          <ul class="list-block list-li-ptb-15 list-btm-border-white bg-primary text-center">
							<li><b><a href="../quizwinner.php">LAST WEEKQUIZ WINNERS</a></b></li>
							<li><b><a href="airtimequiz_start.php">Start Airtime QUIZ</a></b></li>
							<li><b><a href="waecquiz.php">WAEC PREPARATORY QUIZ</a></b></li>
							<li><b><a href="jambquiz.php">JAMB PREPARATORY QUIZ</a></b></li>
						</ul>
						
						<div class="mtb-50">
              <h4 class="p-title"><b>BLOG POSTS</b></h4>
              
              <?php
                include('database/db.php');
                $limit=10;

                if (isset($_GET['p'])) {
                  $p = $_GET['p'];
                } else {
                  $p = 1;
                }
                $q=mysqli_query($con,"SELECT * FROM `blog`" )or die('Error223');
                $get_total = mysqli_num_rows($q);
                $total2 = ceil($get_total/$limit);

                if (!isset($p) || $p <= 0) {
                  $offset = 0;
                } else{
                $offset = ceil($p - 1) * $limit;
                }
              
                $sel_blog = mysqli_query($con,"SELECT * FROM `blog` ORDER BY `blog_date` DESC LIMIT $offset, $limit") or die('ErrorD');
                $i=1;  
                while($row=mysqli_fetch_array($sel_blog) )
                  {
                    $blog_id=$row['blog_id'];
                    $blog_title=$row['blog_title'];
                    $blog_date=$row['blog_date'];
                    $date = date('d M,Y', strtotime($blog_date));
                    $blog_image=$row['blog_image'];
                    $blog_body=$row['blog_body'];
                    $blog_body = substr("$blog_body",0,300);

                    if ($p != 1) {
                      $num = (($p - 1) * $limit) + $i;
                    } else {
                      $num = $i;
                    }
                    echo '
                    <a class="oflow-hidden pos-relative mb-20 dplay-block" href="view_post.php?q=blog&blogid='.$blog_id.'">
								<div class="wh-100x abs-tlr"><img src="../blog_images/'.$blog_image.'" alt=""></div>
								<div class="ml-120 min-h-100x">
									<h5><b>'.$blog_title.'</b></h5>
									<h6 class="color-lite-black pt-10">by <span class="color-black"><b>Admin,</b></span>'.$date.'</h6>
								</div>
							</a><!-- oflow-hidden -->';
                    $i++;

                  /* if($get_total){
                      echo '<div id="pages">';
                      for ($i=1; $i<=$total2 ; $i++) {
                        echo ($i == $p) ? '<a class="active">'.$i.'</a>' : '<a href="index.php?p='.$i.'">'.$i.'</a>';
                      }
                  }*/
                  }
                  
                ?>
						</div><!-- mtb-50 -->
						<div class="mtb-50 pos-relative">
							<img src="images/banner-1-600x450.jpg" alt="">
							<div class="abs-tblr bg-layer-7 text-center color-white">
								<div class="dplay-tbl">
									<div class="dplay-tbl-cell">
										<h4><b>Available for mobile & desktop</b></h4>
										<a class="mt-15 color-primary link-brdr-btm-primary" href="#"><b>Download for free</b></a>
									</div><!-- dplay-tbl-cell -->
								</div><!-- dplay-tbl -->
							</div><!-- abs-tblr -->
						</div><!-- mtb-50 -->
						
						<div class="mtb-50 mb-md-0">
							<h4 class="p-title"><b>NEWSLETTER</b></h4>
							<p class="mb-20">Subscribe to our newsletter to get notification about new updates,
								information, discount, etc..</p>
							<form class="nwsltr-primary-1">
								<input type="text" placeholder="Your email"/>
								<button type="submit"><i class="ion-ios-paperplane"></i></button>
							</form>
						</div><!-- mtb-50 -->
					</div><!--  pl-20 -->
				</div><!-- col-md-3 -->
			</div><!-- row -->
		</div><!-- container -->
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
		$user = mysqli_query($con,"SELECT * FROM `user` where email='$email'") or die('Error');
		while($row = mysqli_fetch_array($user)) {
			$mobile = $row['mobile'];
		}

		$sel_user = "select * from freeairtime where email = '$email' ";
		$run_user = mysqli_query($con, $sel_user);
		$check_user = mysqli_num_rows($run_user);

		if($check_user>0) {

			echo "<script>alert('You have Registered Aready!')</script>";
			echo "<script>window.open('index.php','_self')</script>";
			exit();
		}

		$q=mysqli_query($con,"INSERT INTO freeairtime VALUES  ('$firstname' , '$lastname', '$email' , '$id', '$mobile', '$date')")or die ("Error5");
		if($q)
		{
			//insert mobile into file
			$value= $mobile.',';
			$file_name= '../admin/freeairtime_mobiles.txt';
			file_put_contents($file_name, $value, FILE_APPEND | LOCK_EX);
					
			echo "<script>alert('Your Registration was Successful!')</script>";
			echo "<script>window.open('index.php','_self')</script>";
		}
	}
} ?>
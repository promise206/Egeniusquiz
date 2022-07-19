<!DOCTYPE html>
<?php
session_start();
date_default_timezone_set("Africa/Lagos");
//import db file
ob_start();
include('include/redirect.php');
include('members/user.class.php');
$user=new user();
include('blog.class.php');
$blog=new blog();
if(@$_GET['ent_id']){
$q=@$_GET['q'];
$id =@$_GET['ent_id'];
}
elseif(@$_GET['postid']){
$q=@$_GET['q'];
$id =@$_GET['postid'];
}
elseif(@$_GET['blogid']){
	$q=@$_GET['q'];
	$id =@$_GET['blogid'];
}
else{
	$q=@$_GET['q'];
	$id =@$_GET['technews_id'];
}
?>
<html lang="en">

<!DOCTYPE HTML>
<html lang="en">
<head>
	<title><?php $blog->get_title($q, $id); ?></title>
	 <!--title bar icon Starts-->
	 
	
	 
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
  
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">

  <script data-ad-client="ca-pub-9385130234759860" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
 <script src="js/comments.js"></script>
 <script src="public/3b-comments.js"></script>
  <link href="public/3c-comments.css" rel="stylesheet">
 <script src="js/jquery.min.js" type="text/javascript"></script>

 
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
	
</head>
<body>

<!--Banner starts-->
<?php include('include/header.php'); ?>
  <!--/ Banner ends-->

	<section class="ptb-0">
		<div class="mb-30 brdr-ash-1 opacty-5"></div>
		<div class="container">
			<a class="mt-10" href="index.php"><i class="mr-5 ion-ios-home"></i>Home<i class="mlr-10 ion-chevron-right"></i></a>
			<a class="mt-10 color-ash" href="#">View Post</a>
		</div><!-- container -->
	</section>
	
	
	<section>
		<div class="container">
			<div class="row">
      
      <!--Post Body-->
  <?php
  if(@$_GET['q']=='post'){
    include('database/db.class.php');
    if(isset($_GET['postid'])){
		$category = @$_GET['q'];
			$q=@$_GET['q'];
	$post_id=@$_GET['postid'];
	
	$sel_view = mysqli_query($con, "SELECT * FROM `like_view` WHERE post_id='$post_id' AND category='$category'");
	$get_total_view = mysqli_num_rows($sel_view);
	$view=1;
	if($get_total_view==0){
		$q3=mysqli_query($con,"INSERT INTO `like_view` VALUES  ('', '$view','$post_id','$category')") or die('Errorr4');
	}
	else{
		$sel_viewn = mysqli_query($con, "SELECT * FROM `like_view` WHERE post_id='$post_id' AND category='$category'");
		while($row = mysqli_fetch_array($sel_viewn)) {
			$view = $row['view'];
			
			$view+=1;
		}
		$q=mysqli_query($con,"UPDATE `like_view` SET view='$view' WHERE post_id='$post_id' AND category='$category'")or die('Error993');
	}

    $sel_post = mysqli_query($con,"SELECT * FROM `post` WHERE `post_id`='$post_id'") or die('ErrorD');
        while($row=mysqli_fetch_array($sel_post) )
        {
			$post_id=$row['post_id'];
			$post_title=$row['post_title'];
			$post_date=$row['post_date'];
			$date = date('d M,Y', strtotime($post_date));
			$post_body=$row['post_body'];
		}
			
	}
	$sel_comments = mysqli_query($con, "SELECT * FROM `comments` WHERE post_id='$post_id' AND category='$category'");
    $get_total = mysqli_num_rows($sel_comments);
   
 echo '
  <div class="col-md-12 col-lg-8">
					<img src="" alt="">
					<h3 class="mt-30"><b>'.$post_title.'</b></h3>
					<ul class="list-li-mr-20 mtb-15">
						<li>by <a href="#"><b>Admin </b></a>'.' '.$date.'</li>
						<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>'.$view.'</li>
						<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>'.$get_total.'</li>
					</ul>
					
					<p>'.$post_body.'</p>

					<h4 class="p-title mt-20"><b>'.$get_total.' COMMENTS</b></h4>
          <!-- GIVE YOUR PAGE OR PRODUCT A POST ID -->
					<input type="hidden" id="post_id" value="'.$post_id.'"/>
					<input type="hidden" name="category" id="category" value="'.$category.'"/>
';
					if(isset($_SESSION['email'])){
						$email = $_SESSION['email'];
						$sel_user = mysqli_query($con,"SELECT * FROM `user` WHERE `email`='$email'") or die('ErrorD');
						while($row=mysqli_fetch_array($sel_user))
						{
						$first_name=$row['first_name'];
						}
					
				echo '	<input type="hidden" name="first_name" id="first_name" value="'.$first_name.'"/>';
					}
					echo '
          <!-- CREATE A CONTAINER TO LOAD COMMENTS -->
          <div id="comments"></div>
          <h4 class="p-title mt-20"><b>LEAVE A COMMENT</b></h4>
          <!-- CREATE A CONTAINER TO LOAD REPLY DOCKET -->
          <div id="reply-main"></div>
  
  ';
  }
  ?>
  <!--/ Post Body-->

  <!--Blog Body-->
  <?php
  if(@$_GET['q']=='blog'){
    include('database/db.class.php');
    if(isset($_GET['blogid'])){
		$post=@$_GET['q'];
	$q=@$_GET['q'];
	$blog_id=@$_GET['blogid'];
	
	$sel_view = mysqli_query($con, "SELECT * FROM `like_view` WHERE post_id='$blog_id' AND category='$post'");
	$get_total_view = mysqli_num_rows($sel_view);
	$view=1;
	if($get_total_view==0){
		$q3=mysqli_query($con,"INSERT INTO `like_view` VALUES  ('', '$view','$blog_id','$post')") or die('Errorr4');
	}
	else{
		$sel_viewn = mysqli_query($con, "SELECT * FROM `like_view` WHERE post_id='$blog_id' AND category='$post'");
		while($row = mysqli_fetch_array($sel_viewn)) {
			$view = $row['view'];
			
			$view+=1;
		}
		$q=mysqli_query($con,"UPDATE `like_view` SET view='$view' WHERE post_id='$blog_id' AND category='$post'")or die('Error993');
	}

    $sel_blog = mysqli_query($con,"SELECT * FROM `blog` WHERE `blog_id`='$blog_id'") or die('ErrorD');
        while($row=mysqli_fetch_array($sel_blog) )
        {
          $blog_id=$row['blog_id'];
          $blog_title=$row['blog_title'];
          $blog_date=$row['blog_date'];
          $date = date('d M,Y', strtotime($blog_date));
          $blog_image=$row['blog_image'];
          $blog_body=$row['blog_body'];
		}
				
				
	}
	$sel_comments = mysqli_query($con, "SELECT * FROM `comments` WHERE post_id='$blog_id' AND category='$post'");
    $get_total = mysqli_num_rows($sel_comments);
   
 echo '
    <div class="col-md-12 col-lg-8">
    <img src="blog_images/'.$blog_image.'" height="300px" >
					<h3 class="mt-30"><b>'.$blog_title.'</b></h3>
					<ul class="list-li-mr-20 mtb-15">
						<li>by <a href="#"><b>Admin </b></a>'.$date.'</li>
						<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>'.$view.'</li>
						<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>'.$get_total.'</li>
					</ul>
					
					<p>'.$blog_body.'</p>

          <h4 class="p-title mt-20"><b>'.$get_total.' COMMENTS</b></h4>
          <!-- GIVE YOUR PAGE OR PRODUCT A POST ID -->
					<input type="hidden" id="post_id" value="'.$blog_id.'"/>
					<input type="hidden" name="category" id="category" value="'.$post.'"/>
';
					if(isset($_SESSION['email'])){
						$email = $_SESSION['email'];
						$sel_user = mysqli_query($con,"SELECT * FROM `user` WHERE `email`='$email'") or die('ErrorD');
						while($row=mysqli_fetch_array($sel_user))
						{
						$first_name=$row['first_name'];
						}
					
				echo '	<input type="hidden" name="first_name" id="first_name" value="'.$first_name.'"/>';
					}
					echo '
          <!-- CREATE A CONTAINER TO LOAD COMMENTS -->
          <div id="comments"></div>
          <h4 class="p-title mt-20"><b>LEAVE A COMMENT</b></h4>
          <!-- CREATE A CONTAINER TO LOAD REPLY DOCKET -->
          <div id="reply-main"></div>';
  }
  ?>
  

  <!--/ Blog Body-->


    <!--Ent & Sports Body-->
	<?php
  if(@$_GET['q']=='ent'){
    include('database/db.class.php');
    if(isset($_GET['ent_id'])){
		
		$ent =@$_GET['q'];
		$q=@$_GET['q'];
	$ent_id=@$_GET['ent_id'];
	$sel_view = mysqli_query($con, "SELECT * FROM `like_view` WHERE post_id='$ent_id' AND category='$ent'");
	$get_total_view = mysqli_num_rows($sel_view);
	$view=1;
	if($get_total_view==0){
		$q3=mysqli_query($con,"INSERT INTO `like_view` VALUES  ('', '$view','$ent_id','$ent')") or die('Errorr4');
	}
	else{
		$sel_viewn = mysqli_query($con, "SELECT * FROM `like_view` WHERE post_id='$ent_id' AND category='$ent'");
		while($row = mysqli_fetch_array($sel_viewn)) {
			$view = $row['view'];
			
			$view+=1;
		}
		$q=mysqli_query($con,"UPDATE `like_view` SET view='$view' WHERE post_id='$ent_id' AND category='$ent'")or die('Error993');
	}
    $sel_ent = mysqli_query($con,"SELECT * FROM `ent_sports` WHERE `ent_id`='$ent_id'") or die('ErrorD');
        while($row=mysqli_fetch_array($sel_ent) )
        {
			$ent_title=$row['ent_title'];
			$ent_date=$row['ent_date'];
			$date = date('d M,Y', strtotime($ent_date));
			$ent_image=$row['ent_image'];
			$ent_body=$row['ent_body'];
			$ent_poster=$row['poster_name'];
		}
				
	}
	$sel_comments = mysqli_query($con, "SELECT * FROM `comments` WHERE post_id='$ent_id' AND category='$ent'");
    $get_total = mysqli_num_rows($sel_comments);
   
 echo '
    <div class="col-md-12 col-lg-8">
    <img src="blog_images/'.$ent_image.'" height="300px" >
					<h3 class="mt-30"><b>'.$ent_title.'</b></h3>
					<ul class="list-li-mr-20 mtb-15">
						<li>by <a href="#"><b> '.$ent_poster.', </b></a>'.$date.'</li>
						<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>'.$view.'</li>
						<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>'.$get_total.'</li>
					</ul>
					
					<p>'.$ent_body.'</p>

					<h4 class="p-title mt-20"><b>'.$get_total.' COMMENTS</b></h4>
          <!-- GIVE YOUR PAGE OR PRODUCT A POST ID -->
					<input type="hidden" id="post_id" value="'.$ent_id.'"/>
					<input type="hidden" name="category" id="category" value="'.$ent.'"/>';

					if(isset($_SESSION['email'])){
						$email = $_SESSION['email'];
						$sel_user = mysqli_query($con,"SELECT * FROM `user` WHERE `email`='$email'") or die('ErrorD');
						while($row=mysqli_fetch_array($sel_user))
						{
						$first_name=$row['first_name'];
						}
					
				echo '	<input type="hidden" name="first_name" id="first_name" value="'.$first_name.'"/>';
					}
					echo '
          <!-- CREATE A CONTAINER TO LOAD COMMENTS -->
          <div id="comments"></div>
          <h4 class="p-title mt-20"><b>LEAVE A COMMENT</b></h4>
          <!-- CREATE A CONTAINER TO LOAD REPLY DOCKET -->
          <div id="reply-main"></div>
          ';
  }
  ?>
  

  <!--/ Ent & Sports Body-->


   <!--Tech news Body-->
	<?php
  if(@$_GET['q']=='technews'){
    include('database/db.class.php');
    if(isset($_GET['technews_id'])){
		
		$technews =@$_GET['q'];
		$q=@$_GET['q'];
	$technews_id=@$_GET['technews_id'];
	$sel_view = mysqli_query($con, "SELECT * FROM `like_view` WHERE post_id='$technews_id' AND category='$technews'");
	$get_total_view = mysqli_num_rows($sel_view);
	$view=1;
	if($get_total_view==0){
		$q3=mysqli_query($con,"INSERT INTO `like_view` VALUES  ('', '$view','$technews_id','$technews')") or die('Errorr4');
	}
	else{
		$sel_viewn = mysqli_query($con, "SELECT * FROM `like_view` WHERE post_id='$technews_id' AND category='$technews'");
		while($row = mysqli_fetch_array($sel_viewn)) {
			$view = $row['view'];
			
			$view+=1;
		}
		$q=mysqli_query($con,"UPDATE `like_view` SET view='$view' WHERE post_id='$technews_id' AND category='$technews'")or die('Error993');
	}
    $sel_technews = mysqli_query($con,"SELECT * FROM `tech_news` WHERE `technews_id`='$technews_id'") or die('ErrorD');
        while($row=mysqli_fetch_array($sel_technews) )
        {
			$technews_title=$row['technews_title'];
			$technews_date=$row['technews_date'];
			$date = date('d M,Y', strtotime($technews_date));
			$technews_image=$row['technews_image'];
			$technews_body=$row['technews_body'];
			$technews_poster=$row['poster_name'];
		}
				
	}
	$sel_comments = mysqli_query($con, "SELECT * FROM `comments` WHERE post_id='$technews_id' AND category='$technews'");
    $get_total = mysqli_num_rows($sel_comments);
   
 echo '
	<div class="col-md-12 col-lg-8">
	';
	if($technews_image!=""){
		echo '<img src="blog_images/'.$technews_image.'" height="300px" >';
	}
	echo '
					<h3 class="mt-30"><b>'.$technews_title.'</b></h3>
					<ul class="list-li-mr-20 mtb-15">
						<li>by <a href="#"><b> '.$technews_poster.', </b></a>'.$date.'</li>
						<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>'.$view.'</li>
						<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>'.$get_total.'</li>
					</ul>
					
					<p>'.$technews_body.'</p>

					<h4 class="p-title mt-20"><b>'.$get_total.' COMMENTS</b></h4>
          <!-- GIVE YOUR PAGE OR PRODUCT A POST ID -->
					<input type="hidden" id="post_id" value="'.$technews_id.'"/>
					<input type="hidden" name="category" id="category" value="'.$technews.'"/>';

					if(isset($_SESSION['email'])){
						$email = $_SESSION['email'];
						$sel_user = mysqli_query($con,"SELECT * FROM `user` WHERE `email`='$email'") or die('ErrorD');
						while($row=mysqli_fetch_array($sel_user))
						{
						$first_name=$row['first_name'];
						}
					
				echo '	<input type="hidden" name="first_name" id="first_name" value="'.$first_name.'"/>';
					}
					echo '
          <!-- CREATE A CONTAINER TO LOAD COMMENTS -->
          <div id="comments"></div>
          <h4 class="p-title mt-20"><b>LEAVE A COMMENT</b></h4>
          <!-- CREATE A CONTAINER TO LOAD REPLY DOCKET -->
          <div id="reply-main"></div>
          ';
  }
  ?>
  <!--/ Tech News Body-->

					<div class="float-left-right text-center mt-40 mt-sm-20">
				
						<ul class="mb-30 list-li-mt-10 list-li-mr-5 list-a-plr-15 list-a-ptb-7 list-a-bg-grey list-a-br-2 list-a-hvr-primary ">
							<li><a href="#">MULTIPURPOSE</a></li>
							<li><a href="#">FASHION</a></li>
							<li class="mr-0"><a href="#">BLOGS</a></li>
						</ul>
						<ul class="mb-30 list-a-bg-grey list-a-hw-radial-35 list-a-hvr-primary list-li-ml-5">
							<li class="mr-10 ml-0">Share</li>
							<li><script>function fbs_click() {u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=20,height=20');return false;}</script><a href="http://www.facebook.com/share.php?u=<url>" onclick="return fbs_click()" target="_blank"><i class="ion-social-facebook"></i></a></li>
							<li><a href="#"><i class="ion-social-twitter"></i></a></li>
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
							<li><b><a href="quizwinner.php">LAST WEEK QUIZ WINNERS</a></b></li>
							<li><b><a href="question/airtimequiz_start.php">START AIRTIME (QUIZ)</a></b></li>
							<li><b><a href="question/waecquiz.php">WAEC PREPARATORY QUIZ</a></b></li>
							<li><b><a href="question/jambquiz.php">JAMB PREPARATORY QUIZ</a></b></li>
						</ul>
						
						<div class="mtb-50">
              <h4 class="p-title"><b>BLOG POSTS</b></h4>
              
              <?php
                include('database/db.class.php');
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
								<div class="wh-100x abs-tlr"><img src="blog_images/'.$blog_image.'" alt=""></div>
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

  <!--/ Blog Body-->

  
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
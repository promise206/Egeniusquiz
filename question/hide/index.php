<!DOCTYPE html>
<?php
session_start();
//import db file
ob_start();
include('include/redirect.php');
include('members/user.class.php');
$user=new user();
include('blog.class.php');
$blog = new blog();
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Egeniusquiz</title>
   <!--title bar icon Starts-->
  <?php include('include/titleicon.php'); ?>
  <!--title bar icon Ends-->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/light-box.css">
<link rel="stylesheet" href="css/owl-carousel.css">
<link rel="stylesheet" href="css/templatemo-style.css">

<link href="plugin-frameworks/bootstrap.css" rel="stylesheet">
	
	<link href="fonts/ionicons.css" rel="stylesheet">
	
		
	<link href="common/styles.css" rel="stylesheet">
	
<script data-ad-client="ca-pub-9385130234759860" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>

<body>
<!--Banner starts-->
<?php include('include/header.php'); ?>
  <!--/ Banner ends-->
  <!--Banner starts-->
    <?php include('include/slider.php'); ?>
  <!--/ Banner ends-->
            

  <section>
		<div class="container">
			<div class="row">
			
				<div class="col-md-12 col-lg-8">
					<h4 class="p-title"><b>RECENT NEWS</b></h4>
					<div class="row">
					
						<div class="col-sm-6">
              <ul class="list-block list-li-ptb-15 list-btm-border-white bg-primary text-center">
							<li><b><a href="quizwinner.php">LAST WEEK QUIZ WINNERS</a></b></li>
							<li><b><a href="question/airtimequiz_start.php">START AIRTIME (QUIZ)</a></b></li>
							<li><b><a href="question/waecquiz.php">WAEC PREPARATORY QUIZ</a></b></li>
							<li><b><a href="question/jambquiz.php">JAMB PREPARATORY QUIZ</a></b></li>
						</ul>

						<?php
							include('database/db.class.php');
							$limit=1;
							$sel_post = mysqli_query($con,"SELECT * FROM `blog` ORDER BY `blog_date` DESC LIMIT $limit") or die('ErrorD');
								while($row=mysqli_fetch_array($sel_post) )
								{
								$blog_id=$row['blog_id'];
								$blog_title=$row['blog_title'];
								$blog_date=$row['blog_date'];
								$blog_body=$row['blog_body'];
								$blog_body = substr("$blog_body",0,150);
								$blog_image=$row['blog_image'];
								$date = date('d M,Y', strtotime($blog_date));
								echo '
								<img src="blog_images/'.$blog_image.'" alt="">
							<h4 class="pt-20"><a href="view_post.php?q=blog&blogid='.$blog_id.'">'.$blog_title.'</b></a></h4>
							<ul class="list-li-mr-20 pt-10 pb-20">
								<li class="color-lite-black">by <a href="#" class="color-black"><b>Admin,</b></a>
								'.$date.'</li>
								<li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i><b>30,190</b></li>
								<li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i><b>47</b></li>
							</ul>
							<p></p>';
								}
							?>

							
						</div><!-- col-sm-6 -->
						
						<div class="col-sm-6">

              <?php
              include('database/db.class.php');
              $limit=6;
              $sel_post = mysqli_query($con,"SELECT * FROM `post` ORDER BY `post_date` DESC LIMIT $limit") or die('ErrorD');
                while($row=mysqli_fetch_array($sel_post) )
                {
                  $post_id=$row['post_id'];
                  $post_title=$row['post_title'];
                  $post_date=$row['post_date'];
                  $date = date('d M,Y', strtotime($post_date));
                  echo '
                  <a class="oflow-hidden pos-relative mb-20 dplay-block" href="view_post.php?q=post&postid='.$post_id.'&'.$post_title.'">
								<div class="wh-100x abs-tlr"><img src="images/quiz.jpeg" alt=""></div>
								<div class="ml-120 min-h-100x">
									<h5><b>'.$post_title.'</b></h5>
									<h6 class="color-lite-black pt-10">by <span class="color-black"><b>Admin,</b></span>'.$date.'</h6>
								</div>
							</a><!-- oflow-hidden -->';
                }
              ?>

						</div><!-- col-sm-6 -->
						
					</div><!-- row -->
					
					<h4 class="p-title mt-30"><b>Entertainment & Sports</b></h4>
					<div class="row">
					
						<?php $blog->view_ent();?>
						
					</div><!-- row -->
			
					
					<a class="dplay-block btn-brdr-primary mt-20 mb-md-50" href="#"><b>VIEW MORE UPCOMING EVENTS</b></a>
				</div><!-- col-md-9 -->
				
				<div class="d-none d-md-block d-lg-none col-md-3"></div>
				<div class="col-md-6 col-lg-4">
					<div class="pl-20 pl-md-0">
						
						
						<div class="mtb-50">
              <h4 class="p-title"><b>BLOG POSTS</b></h4>
              
              <?php
                include('database/db.class.php');
                $limit=5;

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
						
		<!--				
                    <div class="section-heading">
                    </div>
                     
                    <div class="popular-news-widget mb-30">
                        <h3>4 Most Popular News</h3>

                       
                        <div class="single-popular-post">
                            <a href="#">
                                <h6><span>1.</span> Amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales.</h6>
                            </a>
                            <p>April 14, 2018</p>
                        </div>

                   
                        <div class="single-popular-post">
                            <a href="#">
                                <h6><span>2.</span> Consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer.</h6>
                            </a>
                            <p>April 14, 2018</p>
                        </div>

                    
                        <div class="single-popular-post">
                            <a href="#">
                                <h6><span>3.</span> Adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo.</h6>
                            </a>
                            <p>April 14, 2018</p>
                        </div>

                  
                        <div class="single-popular-post">
                            <a href="#">
                                <h6><span>4.</span> Eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
                            </a>
                            <p>April 14, 2018</p>
                        </div>
                    </div>
-->


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
      </section>
 <!-- Footer starts-->
 <?php include('include/footer.php'); ?>
  <!-- Footer Ends-->

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>
  <script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
	
	<script src="plugin-frameworks/tether.min.js"></script>
	
	<script src="plugin-frameworks/bootstrap.js"></script>
	
	<script src="common/scripts.js"></script>

</body>

</html>
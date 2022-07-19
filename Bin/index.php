<!DOCTYPE html>
<?php
session_start();
//import db file
ob_start();
include('members/user.class.php');
$user=new user();
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Egeniusquiz</title>
   <!--title bar icon Starts-->
  <?php include('include/titleicon.php'); ?>
  <!--title bar icon Ends-->
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  
  <link rel="stylesheet" type="text/css" href="css/style1.css">

   <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

 
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

</head>

<body>
  <!--Navigation starts-->
  <?php include('include/navigation.php'); ?>
  <!--/ Navigation bar Ends-->
  <!--Modal box-->
  <div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog modal-sm">
    </div>
  </div>
  <!--/ Modal box-->
  <!--Banner starts-->
    <?php include('include/banner.php'); ?>
  <!--/ Banner ends-->

   <!--Pricing-->
   <section id="pricing" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>Our Pricing</h2>
          <p>Being among top three ranked score,<br> You will stand a chance to be among the winners of our price giveout.</p>
          <hr class="bottom-line">
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="price-table">
            <!-- Plan  -->
            <div class="pricing-head">
              <h4>(Free Airtime Quiz)</h4>
              <span ></span><b>Win #100 Airtime <b/><span class="amount"></span>
            </div>

            <!-- Plean Detail -->
            <div class="price-in mart-15">
              <a href="question/airtimequiz.php" class="btn btn-bg green btn-block">Register</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="price-table">
            <!-- Plan  -->
            <div class="pricing-head">
              <h4>Waec Preparatory Quiz</h4>
              <span ></span><b>Win #5000 Bank Transfer <b/><span class="amount"></span>
            </div>

            <!-- Plean Detail -->
            <div class="price-in mart-15">
              <a href="question/waecquiz.php" class="btn btn-bg yellow btn-block">Register</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="price-table">
            <!-- Plan  -->
            <div class="pricing-head">
              <h4>Jamb Preparatory Quiz</h4>
              <span ></span><b>Win #5000 Bank Transfer<b/><span class="amount"></span>
            </div>

            <!-- Plean Detail -->
            <div class="price-in mart-15">
              <a href="question/jambquiz.php" class="btn btn-bg red btn-block">Register</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Pricing-->

  <!--work-shop-->
  <section id="work-shop" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>Upcoming Quiz</h2>
          <p></p>
          <hr class="bottom-line">
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="service-box text-center">
            <div class="icon-box">
            <i class="fa fa-html5 color-green"></i>
            </div>
            <div class="icon-text">
              <p class="ser-text">Every Saturday is free Airtime Giveout quiz</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="service-box text-center">
            <div class="icon-box">
              <i class="fa fa-css3 color-green"></i>
            </div>
            <div class="icon-text">
              <p class="ser-text">23rd December 2019 is WAEC preparatory Quiz</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="service-box text-center">
            <div class="icon-box">
              <i class="fa fa-joomla color-green"></i>
            </div>
            <div class="icon-text">
              <p class="ser-text">25th January 2020 is JAMB preparatory Quiz</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ work-shop-->
  <!--Testimonial-->
  <section id="testimonial" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2 class="white">See What Our Suscribers Are Saying?</h2>
          <p class="white">To take a competition is never easy, But most of our subscribers are happy Registering for the quiz competition<br>Below are some of there comments:</p>
          <hr class="bottom-line bg-white">
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="text-comment">
            <p class="text-par">I subscribed for WAEC quiz, It was really a success. I really like the goal of the platform.</p>
            <p class="text-name">Okonkwo Ebuka Precious - Imo</p>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="text-comment">
            <p class="text-par">"I derive joy taking weekly quiz from this platform because it increases my ability to think very fast at a stipulateed time frame."</p>
            <p class="text-name">Banji Samuel - Ekiti</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Testimonial-->

  <section id="testimonial" class="section-padding">
  <div class="header-section text-left">
    <h2 class="white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Recent Post</h2>
    <ul>
    <?php
      include('database/db.class.php');
      $limit=10;
      $sel_post = mysqli_query($con,"SELECT * FROM `post` ORDER BY `post_date` DESC LIMIT $limit") or die('ErrorD');
        while($row=mysqli_fetch_array($sel_post) )
        {
          $post_id=$row['post_id'];
          $post_title=$row['post_title'];
          $post_date=$row['post_date'];
          echo '
          <li>
          <a href="view_post.php?postid='.$post_id.'&'.$post_title.'"><b>'.$post_title.'</b></a><br>&nbsp;
            <span class="post-date">'.$post_date.'</span>
          </li>';
        }
      ?>
    </ul>
  </div>
  </section>

  <!--Quotes-->
  <section id="courses" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>Motivational Quotes</h2>
          <p>Many quotes contains insight and wisdom condensed into a few words.
             If you read the quote a few times, and focus on the words,
             often, you will discover wisdom and insight that will help you in your life.</p>
          <hr class="bottom-line">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/course01.jpg" class="img-responsive">
            <figcaption>
              <h3>Walt Disney-</h3>
              <p>"The Way To Get Started Is To Quit Talkin And Begin Doing."</p>
            </figcaption>
            <a href="#"></a>
          </figure>
        </div>
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/course02.jpg" class="img-responsive">
            <figcaption>
              <h3>Steve Jobs-</h3>
              <p>"If You Are working On Something That You Really Care About, You Don't Have To Be Pushed. The Vision Pulls You."</p>
            </figcaption>
            <a href="#"></a>
          </figure>
        </div>
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/course03.jpg" class="img-responsive">
            <figcaption>
              <h3>Franklin D. Roosevelt-</h3>
              <p>"The Only Limit To Our Realization Of Tomorrow Will Be Our Doubts Of Today."</p>
            </figcaption>
            <a href="#"></a>
          </figure>
        </div>
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/course04.jpg" class="img-responsive">
            <figcaption>
              <h3>Robert H.Schuller</h3>
              <p>Todays Accomplishments were Yesterdays Impossibilities.</p>
            </figcaption>
            <a href="#"></a>
          </figure>
        </div>
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/course05.jpg" class="img-responsive">
            <figcaption>
              <h3>Brian Tracy</h3>
              <p>There Are No Limits To What You Can Accomplish, Except The Limits You Place On Your Own Thinking.</p>
            </figcaption>
            <a href="#"></a>
          </figure>
        </div>
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/course06.jpg" class="img-responsive">
            <figcaption>
              <h3>Joel Osteen</h3>
              <p>Everywhere you go, make positive deposits rather than negative withdrawals. You can be a people builder</p>
            </figcaption>
            <a href="#"></a>
          </figure>
        </div>
      </div>
    </div>
  </section>
  <!--/ Courses-->
 <!-- Footer starts-->
 <?php include('include/footer.php'); ?>
  <!-- Footer Ends-->

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
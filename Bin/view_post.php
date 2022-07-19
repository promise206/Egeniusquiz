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
  <title>View post-Egeniusquiz</title>
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
  <!-- =======================================================
    Theme Name: Mentor
    Theme URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
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
    
  <!--Post Body-->
  <?php
    include('database/db.class.php');
    if(isset($_GET['postid'])){
    $post_id=@$_GET['postid'];
    $sel_post = mysqli_query($con,"SELECT * FROM `post` WHERE `post_id`='$post_id'") or die('ErrorD');
        while($row=mysqli_fetch_array($sel_post) )
        {
        $post_id=$row['post_id'];
        $post_title=$row['post_title'];
        $post_date=$row['post_date'];
        $post_body=$row['post_body'];
        }
    }
    ?>
  <section id="organisations" class="section-padding">
    <div class="container">
      <div class="row">
        
        <div class="col-md-8"><br><br><br><br>
          <div class="detail-info">
            <hgroup>
              <h2 class="det-txt" style="text-align:center;color:#69430d;"> <?php echo $post_title; ?></h2>
              <?php echo $post_body; ?>
            </hgroup>
            
        </div>
      </div>
      
    </div>
    <hgroup>
        <p class="det-txt" style="text-align:left;color:red;"> <b>(<?php echo $post_date; ?>)</b></p>
    </hgroup>
  </section>
  <!--/ Post Body-->
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

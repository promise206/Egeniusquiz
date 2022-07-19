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
include('database/db.php');

$subscriber = $_SESSION['email'];
$sel_user = "SELECT * FROM `legendquiz` WHERE `email` = '$subscriber' ";
$run_user = mysqli_query($con, $sel_user);
$check_user = mysqli_num_rows($run_user);
if($check_user<=0){
  echo "<script>alert('Sorry you didn't register for the quiz!')</script>";
  echo "<script>window.open('jambquiz.php?page_url=$redirect_link_var','_self')</script>";
}
$sel_active = "SELECT * FROM `legendquiz` WHERE `email` = '$subscriber' AND active='1' ";
$run_active = mysqli_query($con, $sel_active);
$check_active = mysqli_num_rows($run_active);
if($check_active<=0){
  echo "<script>alert('There is no quiz at this time!')</script>";
  echo "<script>window.open('index.php','_self')</script>";
}
else{
?>
<html lang="en">

<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Jambquiz - Egeniusquiz</title>
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
	
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

   <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

 
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
</head>
<body>
	<!--Banner starts-->
<?php include('include/header.php'); ?>
  <!--/ Banner ends-->
	
	
	<section class="ptb-0">
		<div class="mb-30 brdr-ash-1 opacty-5"></div>
		<div class="container">
			<a class="mt-10" href="../index.php"><i class="mr-5 ion-ios-home"></i>Home<i class="mlr-10 ion-chevron-right"></i></a>
			<a class="color-ash mt-10" href="airtimequiz_start.php">Quiz Detail</a>
		</div><!-- container -->
	</section>
	
	
 <!--Modal box-->
 <section id="contact" class="section-padding">
    <div class="container">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <br/><br/>
    <div class="box">
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 "><div class="grey-box">
        
          <ul id="grey-box">
              <ul class="list-block list-li-ptb-15 list-btm-border-white bg-info text-center">
              <li><b><p><a href="jambquiz_start.php">&nbsp;<b>Back to Question</b></a></p></b></li>
							<li><b><p <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="jambquiz_start.php?q=2">History</a></b></li>
							<li><b><p <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="jambquiz_start.php?q=3">Ranking</a></b></li>
							
							
            </ul>
            </div>
		    </div>
      </div>
      <!-- Instructions-->
    
      <h3><b style="color: red;">Read the Instructions!!</b></h3>
      <p class="mb-30 mr-100 mr-sm-0">1. Read the questions carefully before choosing your answer.<br>
      2. To view the start button, slide to the right of your screen to view the full table details.<br>
      3. there is no provision for making amendment to previous answered quiestion. <br>
      4. You will see the quiz count-down timer right below the options.<br>
      5. Each section has time allocated to answer all the questions, once the timeer counts down to 0, the session will automatically close.</p>
    
<!-- Instrucstion Ends-->
      
    </div>
        <!-- SEARCH BOX -->
        <!--<form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter tag ">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;Search</button>
      </form> -->
      
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">

<span id="response" class="timer"></span>
<script type="text/javascript">

</script>

<!--home start-->
<?php if(@$_GET['q']==0) {
    include('database/db.php');
    $email=$_SESSION['email'];

$result = mysqli_query($con,"SELECT * FROM `jambquiz` ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td><b>Action</b></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
    $time = $row['jambtime'];
	$eid = $row['eid'];
$q12=mysqli_query($con,"SELECT score FROM jambhistory WHERE eid='$eid' AND email='$email'  " )or die('Error98');
$rowcount=mysqli_num_rows($q12);	
if($rowcount == 0){
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="jambtimer_action.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="pull btn sub1" style="margin:0px;background:#2b5f05"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></td></tr>';
}
else
{
echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="#" class="pull btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Answered</b></span></a></b></td></tr>';
}
}
$c=0;
echo '</table></div></div>';

}?>


<!--home closed-->

<!--quiz start-->
<?php
include('database/db.php');

$email = $_SESSION['email'];
if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$q=mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid ' AND sn='$sn' " );
echo '<div class="panel" style="margin:5%">';
while($row=mysqli_fetch_array($q) )
{
$qns=$row['qns'];
$qid=$row['qid'];
echo '<b>Question &nbsp;'.$sn.'&nbsp;::<br />'.$qns.'</b><br /><br />';
}
$q=mysqli_query($con,"SELECT * FROM options WHERE qid='$qid' " );
echo '<form action="update.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST"  class="form-horizontal">
<br />';

while($row=mysqli_fetch_array($q) )
{
$option=$row['option'];
$optionid=$row['optionid'];
echo'<input type="radio" name="ans" value="'.$optionid.'">'.$option.'<br /><br />';
}
echo'<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button></form></div>';
//header("location:dash.php?q=4&step=2&eid=$id&n=$total");
}
//result display
if(@$_GET['q']== 'result' && @$_GET['eid']) 
{
$eid=@$_GET['eid'];
$q=mysqli_query($con,"SELECT * FROM jambhistory WHERE eid='$eid' AND email='$email' " )or die('Error157');
echo  '<div class="panel">
<center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$w=$row['wrong'];
$r=$row['sahi'];
$qa=$row['level'];
echo '<tr style="color:#66CCFF"><td>Total Questions</td><td>'.$qa.'</td></tr>
      <tr style="color:#99cc32"><td>right Answer&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>'.$r.'</td></tr> 
	  <tr style="color:red"><td>Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>'.$w.'</td></tr>
	  <tr style="color:#66CCFF"><td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
}
$q=mysqli_query($con,"SELECT * FROM jambrank WHERE  email='$email' " )or die('Error157');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
echo '<tr style="color:#990000"><td>Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
}
echo '</table></div>';

}
?>
<!--quiz end-->
<?php
//history start
if(@$_GET['q']== 2) 
{
  $email = $_SESSION['email'];
$q=mysqli_query($con,"SELECT * FROM jambhistory WHERE email='$email' ORDER BY date DESC " )or die('Error197');
echo  '<div class="panel">
<table class="table table-striped title1" >
<tr><td><b>S.N.</b></td><td><b>Quiz</b></td><td><b>Question Solved</b></td><td><b>Right</b></td><td><b>Wrong<b></td><td><b>Score</b></td>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$eid=$row['eid'];
$s=$row['score'];
$w=$row['wrong'];
$r=$row['sahi'];
$qa=$row['level'];
$q23=mysqli_query($con,"SELECT title FROM jambquiz WHERE  eid='$eid' " )or die('Error208');
while($row=mysqli_fetch_array($q23) )
{
$title=$row['title'];
}
$c++;
echo '<tr><td>'.$c.'</td><td>'.$title.'</td><td>'.$qa.'</td><td>'.$r.'</td><td>'.$w.'</td><td>'.$s.'</td></tr>';
}
echo'</table></div>';
}

//ranking start
if(@$_GET['q']== 3) 
{
  $limit = 10;

  if (isset($_GET['p'])) {
    $p = $_GET['p'];
  } else {
    $p = 1;
  }
$q=mysqli_query($con,"SELECT * FROM jambrank  ORDER BY score DESC " )or die('Error223');
$get_total = mysqli_num_rows($q);

$total = ceil($get_total/$limit);

if (!isset($p) || $p <= 0) {
  $offset = 0;
} else{
$offset = ceil($p - 1) * $limit;
}

$que=mysqli_query($con,"SELECT * FROM jambrank  ORDER BY score DESC  LIMIT $offset,$limit" )or die('Error223');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>State</b></td><td><b>Score</b></td><td></td></tr>';
$c=0;
$i=1;
while($row=mysqli_fetch_array($que) )
{
  $e=$row['email'];
  $s=$row['score'];
  $q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error231');

  while($row=mysqli_fetch_array($q12) )
  {
    $firstname = $row['first_name'];
    $lastname = $row['last_name'];
    $dob = $row['dob'];
    $gender = $row['gender'];
      $email = $row['email'];
    $state = $row['state'];


    if ($p != 1) {
      $num = (($p - 1) * $limit) + $i;
    } else {
      $num = $i;
    }
  }
  $c++;
  echo '<tr style="color:black"><td>'.$num.'</td><td>'.$firstname.' '.$lastname.'</td><td>'.$gender.'</td><td>'.$state.'</td><td>'.$s.'</td><td>';
  $i++;
}
echo '</table></div></div>';

  if($get_total > $limit){
    echo '<div id="pages">';
    for ($i=1; $i<=$total ; $i++) {
      echo ($i == $p) ? '<a class="active">'.$i.'</a>' : '<a href="airtimequiz_start.php?q=3&p='.$i.'">'.$i.'</a>';
    }
    echo '</div>';
  }
}
?>
      </div>
  </section>
  <!--/ Modal box-->
				
	
 <!-- Footer starts-->
 <?php include('include/footer.php'); ?>
<!-- Footer Ends-->
	
	<!-- SCIPTS -->
	
	<script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
	
	<script src="plugin-frameworks/tether.min.js"></script>
	
	<script src="plugin-frameworks/bootstrap.js"></script>
	
  <script src="common/scripts.js"></script>
  
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>
	
</body>
</html>
<?php

} ?>
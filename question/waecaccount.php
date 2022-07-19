<!DOCTYPE html>
<?php
session_start();
//import db file
ob_start();
include('include/redirect.php');
include('../members/user.class.php');
$user=new user();

if(!isset($_SESSION['email'])){
  echo "<script>window.open('../members/login.php?page_url=$redirect_link_var&message=Login to View this Page!', '_self')</script>";
}

if(isset($_SESSION["waecstart"])){
?>
<html lang="en">

<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Question Page - Egeniusquiz</title>
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
  <body onLoad="setCountDown();">
	<!--Banner starts-->
  <?php include('include/header.php'); ?>
  <!--/ Banner ends-->
	<section class="ptb-0">
		<div class="mb-30 brdr-ash-1 opacty-5"></div>
		<div class="container">
			<a class="mt-10" href="../index.php"><i class="mr-5 ion-ios-home"></i>Home<i class="mlr-10 ion-chevron-right"></i></a>
			<a class="color-ash mt-10" href="#">Question Page</a>
		</div><!-- container -->
	</section>
    

<div class="container"><!--container start-->
<div class="row">
<div class="col-md-6">

<!--home start-->
<?php if(@$_GET['q']==1) {
    include('database/db.php');

    $email=$_SESSION['email'];

$result = mysqli_query($con,"SELECT * FROM `waequiz` ORDER BY RAND()") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
  $time = $row['time'];
	$eid = $row['eid'];
$q12=mysqli_query($con,"SELECT score FROM waechistory WHERE eid='$eid' AND email='$email' " )or die('Error98');
$rowcount=mysqli_num_rows($q12);	
if($rowcount == 0){
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="waecaccount.php?q=waecquiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#2b5f05"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></td></tr>';
}
else
{
echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="#" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Answered</b></span></a></b></td></tr>';
}
}
$c=0;
echo '</table></div></div>';

}?>


<!--home closed-->

<br><br>
<!--quiz start-->
<?php
include('database/db.php');

$email = $_SESSION['email'];
if(@$_GET['q']== 'waecquiz' && @$_GET['step']== 2) {
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];

//Time Starts
if (isset($_SESSION['waectime'])) {
  $dateFormat = "d F Y -- g:i a";
    // session variable_exists, use that
    $targetDate = $_SESSION['waectime'];
} else {
    // No session variable, red from mysql
    $result=mysqli_query($con,"SELECT * FROM `waecquiz` WHERE `eid`='$eid' LIMIT 1");
    $time=mysqli_fetch_array($result);
    $dateFormat = "d F Y -- g:i a";
    $targetDate = time() + ($time['waectime']*60);
    $_SESSION['waectime'] = $targetDate;
}

$actualDate = time();
$secondsDiff = $targetDate - $actualDate;
$remainingDay     = floor($secondsDiff/60/60/24);
$remainingHour    = floor(($secondsDiff-($remainingDay*60*60*24))/60/60);
$remainingMinutes = floor(($secondsDiff-($remainingDay*60*60*24)-         ($remainingHour*60*60))/60);
$remainingSeconds = floor(($secondsDiff-($remainingDay*60*60*24)-    ($remainingHour*60*60))-($remainingMinutes*60));
$actualDateDisplay = date($dateFormat,$actualDate);
$targetDateDisplay = date($dateFormat,$targetDate);
//Time Ends
$q=mysqli_query($con,"SELECT * FROM `questions` WHERE `eid`='$eid ' AND `sn`='$sn'" );
echo '<div class="panel" style="margin:5%">';
while($row=mysqli_fetch_array($q) )
{
$qns=$row['qns'];
$qid=$row['qid'];
echo '<b>Question &nbsp;'.$sn.'&nbsp;::<br />'.$qns.'</b><br /><br />';
}
$q=mysqli_query($con,"SELECT * FROM `options` WHERE `qid`='$qid' " );
echo '<form action="update.php?q=waecquiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST"  class="form-horizontal">
<br />';
$i=1;
while($row=mysqli_fetch_array($q) )
{
$option=$row['option'];
$optionid=$row['optionid'];
switch($i)
{
case '1':
$opt='A';
break;
case '2':
$opt='B';
break;
case '3':
$opt='C';
break;
case '4':
$opt='D';
break;
default:
$opt='';
}
echo'['.$opt.']&nbsp;<input type="radio" name="ans" value="'.$optionid.'">&nbsp&nbsp;'.$option.'<br /><br />';
$i++;
}
echo'<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button></form></div>';
//header("location:dash.php?q=4&step=2&eid=$id&n=$total");
}
//result display
if(@$_GET['q']== 'result' && @$_GET['eid']) 
{
$eid=@$_GET['eid'];
$q=mysqli_query($con,"SELECT * FROM waechistory WHERE eid='$eid' AND email='$email' " )or die('Error157');
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
$q=mysqli_query($con,"SELECT * FROM waecrank WHERE  email='$email' " )or die('Error157');
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
$q=mysqli_query($con,"SELECT * FROM waechistory WHERE email='$email' ORDER BY date DESC " )or die('Error197');
echo  '<div class="panel">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>S.N.</b></td><td><b>Quiz</b></td><td><b>Question Solved</b></td><td><b>Right</b></td><td><b>Wrong<b></td><td><b>Score</b></td>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$eid=$row['eid'];
$s=$row['score'];
$w=$row['wrong'];
$r=$row['sahi'];
$qa=$row['level'];
$q23=mysqli_query($con,"SELECT title FROM waecquiz WHERE  eid='$eid' " )or die('Error208');
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
$q=mysqli_query($con,"SELECT * FROM waecrank  ORDER BY score DESC " )or die('Error223');
echo  '<div class="panel title"><div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>Rank</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>College</b></td><td><b>Score</b></td></tr>';
$c=0;
while($row=mysqli_fetch_array($q) )
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

}
$c++;
echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$firstname.' '.$lastname.'</td><td>'.$gender.'</td><td>'.$state.'</td><td>'.$s.'</td><td>';
}
echo '</table></div></div>';}
?>


<script type="text/javascript">
      var days = <?php echo $remainingDay; ?>  
      var hours = <?php echo $remainingHour; ?>  
      var minutes = <?php echo $remainingMinutes; ?>  
      var seconds = <?php echo $remainingSeconds; ?> 
      function setCountDown ()
      {
          seconds--;
          if (seconds < 0){
             minutes--;
             seconds = 59
          }
          if (minutes < 0){
              hours--;
              minutes = 59
          }
          if (hours < 0){
              hours = 23
          }
          document.getElementById("remain").innerHTML = "  "+minutes+" min    "+seconds+" sec";
          SD=window.setTimeout( "setCountDown()", 1000 );
          if (minutes == '00' && seconds == '00') { 
              seconds = "00"; window.clearTimeout(SD);

              window.location = "update.php?q=waecquiz&step=7&eid=<?php echo $eid; ?>&n=<?php echo $sn; ?>&t=<?php echo $total; ?>&qid=<?php echo $qid; ?>&ans=''"
              
          } 

       }
    </script>
          <div id="remain" style="color: red; font-size: 20px; line-height: 1.1em; margin: 0 2.5%;padding: 20px;">
                <?php echo "<span>$remainingMinutes minutes</span> </span>$remainingSeconds seconds</span>";?>
          </div>
          
        </div>
      </div>
    </div>
</div>
</div>
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
<?php }
else{
  echo "<script>alert('You dont have access to this page!')</script>"; 
  echo "<script>window.open('waecquiz_start.php','_self')</script>";
}
?>

<!DOCTYPE html>
<?php
session_start();

if(!isset($_SESSION['username'])){
  echo "<script>window.open('account/login.php?message=Login to View this Page!', '_self')</script>";
}
else{

?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Genius Quiz Admin - Dashboard</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script src="//tinymce.cachefly.net/4.1/tinymce.min.js">
  
  </script>
  <script>
  tinymce.init({selector:'textarea'});
  </script>


</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="dash.php">E-Geniusquiz Admin</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#"><?php $email = $_SESSION['username']; echo $email;?></a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="account/admin_logout.php" >Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li <?php if(@$_GET['q']==3) ?> class="nav-item active">
        <a class="nav-link" href="dash.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Account</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="account/login.php">Login</a>
          <a class="dropdown-item" href="account/register.php">Register</a>
          <a class="dropdown-item" href="account/forgot-password.php">Forgot Password</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Quiz</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="dash.php?q=17">Add Subject</a>
          <a class="dropdown-item" href="dash.php?q=4">Add Quiz</a>
          <a class="dropdown-item" href="dash.php?q=10">Add WaecID</a>
          <a class="dropdown-item" href="dash.php?q=18">Add JambID</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="dash.php?q=24">View Subject</a>
          <a class="dropdown-item" href="dash.php?q=5">View Quiz</a>
          <a class="dropdown-item" href="dash.php?q=11">View Reg Waecquiz</a>
          <a class="dropdown-item" href="dash.php?q=19">View Reg Jambquiz</a>
          <a class="dropdown-item" href="dash.php?q=13">View Reg Airtimequiz</a>
          <a class="dropdown-item" href="dash.php?q=12">View Non-Used WaecID</a>
          <a class="dropdown-item" href="dash.php?q=20">View Non-Used JambID</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Blog</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <h6 class="dropdown-header">Actions</h6>
          <a class="dropdown-item" href="dash.php?q=14">Add Post</a>
          <a class="dropdown-item" href="dash.php?q=15">View Post</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="dash.php?q=21">Add Blog News</a>
          <a class="dropdown-item" href="dash.php?q=22">View Blog News</a>
        </div>
      </li>

      <li <?php if(@$_GET['q']==3) ?> class="nav-item">
        <a class="nav-link" href="dash.php?q=3">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>FeedBack</span></a>
      </li>
      <li <?php if(@$_GET['q']==2) ?> class="nav-item">
        <a class="nav-link" href="dash.php?q=2">
          <i class="fas fa-fw fa-table"></i>
          <span>Ranking</span></a>
      </li>
      <li <?php if(@$_GET['q']==1) ?> class="nav-item">
        <a class="nav-link" href="dash.php?q=1">
          <i class="fas fa-fw fa-table"></i>
          <span>Users</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>
        <?php
          include('database/db.php');
          $get_total_users = "SELECT * FROM `user` ";
          $run_total = mysqli_query($con, $get_total_users);
          $get_total = mysqli_num_rows($run_total);
        ?>
        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5"><?php echo $get_total; ?> Members!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="dash.php?q=1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <?php
            include('database/db.php');
            $reg_status=1;
            $get_reg_jamb = "SELECT * FROM `legendquiz` WHERE `reg_status`='$reg_status' ";
            $run_reg_jamb = mysqli_query($con, $get_reg_jamb);
            $get_reg_jamb = mysqli_num_rows($run_reg_jamb);
          ?>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5"><?php echo $get_reg_jamb; ?>Total Registration for Jamb!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="dash.php?q=5">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <?php
            include('database/db.php');
            $reg_status=1;
            $get_reg_prof = "SELECT * FROM `profquiz` WHERE `reg_status`='$reg_status' ";
            $run_reg_prof = mysqli_query($con, $get_reg_prof);
            $get_reg_prof = mysqli_num_rows($run_reg_prof);
          ?>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5"><?php echo $get_reg_prof; ?> Total Registration for Waec!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="dash.php?q=11">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <?php
            include('database/db.php');
            $get_airtimequiz = "SELECT * FROM `freeairtime` ";
            $run_total_airtimequiz = mysqli_query($con, $get_airtimequiz);
            $get_total_airtimequiz = mysqli_num_rows($run_total_airtimequiz);
          ?>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5"><?php echo $get_total_airtimequiz; ?> Total Registration for Free Airtimequiz!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="dash.php?q=13">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">

<!--home start-->

<?php if(@$_GET['q']==0) {
include('database/db.php');
$email = $_SESSION['username'];
$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
    $time = $row['time'];
  $eid = $row['eid'];
  
$q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
$rowcount=mysqli_num_rows($q12);	
if($rowcount == 0){

	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="timer_action.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></td></tr>';
}
else
{
echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></td></tr>';
}
}

$c=0;
echo '</table></div></div></div>';

}

//ranking start
if(@$_GET['q']== 2) 
{
  $limit = 10;

  if (isset($_GET['p'])) {
    $p = $_GET['p'];
  } else {
    $p = 1;
  }
$q=mysqli_query($con,"SELECT * FROM rank  ORDER BY score DESC " )or die('Error223');
$get_total = mysqli_num_rows($q);

$total = ceil($get_total/$limit);

if (!isset($p) || $p <= 0) {
  $offset = 0;
} else{
$offset = ceil($p - 1) * $limit;
}

$que=mysqli_query($con,"SELECT * FROM rank  ORDER BY score DESC  LIMIT $offset,$limit" )or die('Error223');
echo  '<div class="panel title"><div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>Rank</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>State</b></td><td><b>Score</b></td></tr>';
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
  echo '<tr><td style="color:#99cc32"><b>'.$num.'</b></td><td>'.$firstname.' '.$lastname.'</td><td>'.$gender.'</td><td>'.$state.'</td><td>'.$s.'</td>
  <td><a title="Delete User" href="update.php?del_rank='.$email.'"><b>Delete</b></a></td>';
  $i++;
}
echo '</table></div></div>';

if(isset($_GET['resetrank'])){
   include("reset.php");
}else{
  echo '<a class="btn btn-danger" href="dash.php?q=2&resetrank=rank" role="button">Delete All</a>';
}
  if($get_total > $limit){
    echo '<div id="pages">';
    for ($i=1; $i<=$total ; $i++) {
      echo ($i == $p) ? '<a class="active">'.$i.'</a>' : '<a href="dash.php?q=2&p='.$i.'">'.$i.'</a>';
    }
    echo '</div>';
  }
}

?>


<!--home closed-->
<!--users start-->
<?php if(@$_GET['q']==1) {
  include('database/db.php');

  $limit = 10;

  if (isset($_GET['p'])) {
    $p = $_GET['p'];
  } else {
    $p = 1;
  }

$q=mysqli_query($con,"SELECT * FROM user " )or die('Error223');
$get_total = mysqli_num_rows($q);
$total = ceil($get_total/$limit);

if (!isset($p) || $p <= 0) {
  $offset = 0;
} else{
$offset = ceil($p - 1) * $limit;
}


$result = mysqli_query($con,"SELECT * FROM user  LIMIT $offset,$limit") or die('Error');

echo  '<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Users Table</div><div class="card-body"><div class="table-responsive"><thead><table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
<tr><th><b>S.N.</b></th><th><b>Name</b></th><th><b>Gender</b></th><th><b>State</b></th><th><b>Email</b></th><th><b>Mobile</b></th><th></th></tr></thead>
<tfoot><tr><th>S.N</th><th>Name</th><th>Gender</th><th>State</th><th>Email</th><th>Mobile</th></tr></tfoot>';
$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
  $firstname = $row['first_name'];
  $lastname = $row['last_name'];
	$mobile = $row['mobile'];
	$gender = $row['gender'];
    $email = $row['email'];
	$state = $row['state'];

  if ($p != 1) {
    $num = (($p - 1) * $limit) + $i;
  } else {
    $num = $i;
  }
  

	echo '<tbody><tr><td>'.$num.'</td><td>'.$firstname.' '.$lastname.'</td><td>'.$gender.'</td><td>'.$state.'</td><td>'.$email.'</td><td>'.$mobile.'</td>
  <td><a title="Delete User" href="update.php?demail='.$email.'"><b>Delete</b></a></td></tr></tbody>';
  $i++;
}
$c=0;
if(isset($_GET['usermobile'])){
  include("reset.php");
}else
{
  echo '&nbsp&nbsp;<a class="btn btn-primary" href="users_mobiles.txt" role="button">Download All mobile</a>';
}
echo '</table></div></div>';

if($get_total > $limit){
  echo '<div id="pages">';
  for ($i=1; $i<=$total ; $i++) {
    echo ($i == $p) ? '<a class="active">'.$i.'</a>' : '<a href="dash.php?q=1&p='.$i.'">'.$i.'</a>';
  }
  echo '</div>';
}

}

 
?>
<!--user end-->

<!--feedback start-->
<?php if(@$_GET['q']==3) {
  include('database/db.php');
  $email = $_SESSION['username'];
  $limit = 10;

  if (isset($_GET['p'])) {
    $p = $_GET['p'];
  } else {
    $p = 1;
  }

  $q=mysqli_query($con,"SELECT * FROM `feedback` ORDER BY `feedback`.`date` DESC " )or die('Error223');
  $get_total = mysqli_num_rows($q);
  $total = ceil($get_total/$limit);

  if (!isset($p) || $p <= 0) {
    $offset = 0;
  } else{
  $offset = ceil($p - 1) * $limit;
  }
$result = mysqli_query($con,"SELECT * FROM `feedback` ORDER BY `feedback`.`date` DESC  LIMIT $offset,$limit") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Subject</b></td><td><b>Email</b></td><td><b>Date</b></td><td><b>Time</b></td><td><b>By</b></td><td></td><td></td></tr>';

$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$subject = $row['subject'];
	$name = $row['name'];
	$email = $row['email'];
  $id = $row['id'];
  
  if ($p != 1) {
    $num = (($p - 1) * $limit) + $i;
  } else {
    $num = $i;
  }
	 echo '<tr><td>'.$num.'</td>';
	echo '<td><a title="Click to open feedback" href="dash.php?q=3&fid='.$id.'">'.$subject.'</a></td><td>'.$email.'</td><td>'.$date.'</td><td>'.$time.'</td><td>'.$name.'</td>
	<td><a title="Open Feedback" href="dash.php?q=3&fid='.$id.'"><b>Open</b></a></td>';
  echo '<td><a title="Delete Feedback" href="update.php?fdid='.$id.'"><b>Delete</b></a></td>

  </tr>';
  $i++;
}

echo '</table></div></div>';

if($get_total > $limit){
  echo '<div id="pages">';
  for ($i=1; $i<=$total ; $i++) {
    echo ($i == $p) ? '<a class="active">'.$i.'</a>' : '<a href="dash.php?q=3&p='.$i.'">'.$i.'</a>';
  }
  echo '</div>';
}
}
?>
<!--feedback closed-->

<!--feedback reading portion start-->
<?php if(@$_GET['fid']) {
echo '<br />';
$id=@$_GET['fid'];
$result = mysqli_query($con,"SELECT * FROM feedback WHERE id='$id' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$subject = $row['subject'];
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$feedback = $row['feedback'];
	
echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>'.$subject.'</b></h1>';
 echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>DATE:</b>&nbsp;'.$date.'</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;'.$time.'</span><span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;'.$name.'</span><br />'.$feedback.'</div></div>';}
}?>
<!--Feedback reading portion closed-->

<!--add quiz start-->
<?php
if(@$_GET['q']==4 && !(@$_GET['step']) ) {
$sel_sub = mysqli_query($con,"SELECT * FROM `subjects`") or die('Error');

echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
<label for="name" class="control-label">Select Subject</label>
<select name="name" id="name" class="form-control">
 <option>Subject</option>';
 while($row = mysqli_fetch_array($sel_sub)) {
  $subject_title = $row['subject_title'];
  echo '<option>'.$subject_title.'</option>';
 }
  echo ' 
</select>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
  <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>  
  <div class="col-md-12">
  <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>  
  <div class="col-md-12">
  <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="tag"></label>  
  <div class="col-md-12">
  <input id="tag" name="tag" placeholder="Enter #tag which is used for searching" class="form-control input-md" type="text">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="desc"></label>  
  <div class="col-md-12">
  <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="Write description here..."></textarea>  
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?>
<!--add quiz end-->

<!--add quiz step2 start-->
<?php
if(@$_GET['q']==4 && (@$_GET['step'])==2 ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
<fieldset>
';
 
 for($i=1;$i<=@$_GET['n'];$i++)
 {
echo '<b>Question number&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'1"></label>  
  <div class="col-md-12">
  <input id="'.$i.'1" name="'.$i.'1" placeholder="Enter option a" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'2"></label>  
  <div class="col-md-12">
  <input id="'.$i.'2" name="'.$i.'2" placeholder="Enter option b" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'3"></label>  
  <div class="col-md-12">
  <input id="'.$i.'3" name="'.$i.'3" placeholder="Enter option c" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'4"></label>  
  <div class="col-md-12">
  <input id="'.$i.'4" name="'.$i.'4" placeholder="Enter option d" class="form-control input-md" type="text">
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question '.$i.'</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />'; 
 }
    
echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?><!--add quiz step 2 end-->

<!--View quiz starts-->
<?php if(@$_GET['q']==5) {
include('database/db.php');
$email = $_SESSION['username'];
$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
    $time = $row['time'];
	$eid = $row['eid'];
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
  <td><b><a href="update.php?q=rmquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><b>Remove</b></a></b>
  <a href="dash.php?q=8&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:green"><b>Edit Detail</b></a></b>
  <a href="dash.php?q=9&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:yellow"><b>Edit Question</b></a></b></td></tr>';
}
$c=0;
echo '</table></div></div>';

}
?>


<!--Edit quiz Details starts-->
<?php
if(@$_GET['q']==8) {
  include('database/db.php');
  $eid=@$_GET['eid'];
  $result = mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid'") or die('Error');
  while($row=mysqli_fetch_array($result) )
  {
    $title=$row['title'];
    $sahi=$row['sahi'];
    $wrong=$row['wrong'];
    $time=$row['time'];
    $tag=$row['tag'];
    $desc=$row['intro'];
  }

  echo ' 
  <div class="row">
  <span class="title1" style="margin-left:40%;font-size:30px;"><b>Edit Quiz Details</b></span><br /><br />
  <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=editquiz&eid='.$eid.'"  method="POST">
  <fieldset>


  <!-- Text input-->
<div class="form-group">
<label for="name" class="control-label">Select Subject</label>
<select name="name" id="name" class="form-control">
 <option>'.$title.'</option>';
 $sel_sub = mysqli_query($con,"SELECT * FROM `subjects`") or die('Error');
 while($row = mysqli_fetch_array($sel_sub)) {
  $subject_title = $row['subject_title'];
  echo '<option>'.$subject_title.'</option>';
 }
  echo ' 
</select>
</div>


  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-12 control-label" for="right">Marks on Right Answer</label>  
    <div class="col-md-12">
    <input id="right" name="right" placeholder="" value="'.$sahi.'" class="form-control input-md" min="0" type="number">
      
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-12 control-label" for="wrong">Deduct marks on wrong answer without sign</label>  
    <div class="col-md-12">
    <input id="wrong" name="wrong" placeholder="" value="'.$wrong.'" class="form-control input-md" min="0" type="number">
      
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-12 control-label" for="time">Time Limit for Quiz in minute</label>  
    <div class="col-md-12">
    <input id="time" name="time" placeholder="" value="'.$time.'" class="form-control input-md" min="1" type="number">
      
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-12 control-label" for="tag">#Tag which is used for searching</label>  
    <div class="col-md-12">
    <input id="tag" name="tag" placeholder="" value="'.$tag.'" class="form-control input-md" type="text">
      
    </div>
  </div>


  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-12 control-label" for="desc">Description</label>  
    <div class="col-md-12">
    <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="">'.$desc.'</textarea>  
    </div>
  </div>


  <div class="form-group">
    <label class="col-md-12 control-label" for=""></label>
    <div class="col-md-12"> 
      <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
    </div>
  </div>

  </fieldset>
  </form></div>';

}
?>
<!--Edit quiz Detail end-->


<!--Edit quiz step2 start-->
<?php
if(@$_GET['q']==9) {
  include('database/db.php');
  $eid=@$_GET['eid'];
  $result = mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid'") or die('ErrorC');
  while($row=mysqli_fetch_array($result) )
  {
    $total=$row['total'];
  }
  echo ' 
  <div class="row">
  <span class="title1" style="margin-left:40%;font-size:30px;"><b>Edit Question Details</b></span><br /><br />
  <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=editqns&n='.$total.'&eid='.$eid.'&ch=4 "  method="POST">
  <fieldset>
  ';
 

  $result = mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid'") or die('ErrorD');
  $i=1;
  while($row=mysqli_fetch_array($result) )
  {
    $qns=$row['qns'];
    $sn=$row['sn'];
    $qid=$row['qid'];
    echo '<b>Question number&nbsp;'.$sn.'&nbsp;:</><br /><!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="qns'.$sn.' "></label>  
      <div class="col-md-12">
      <textarea rows="3" cols="5" name="qns'.$sn.'" class="form-control" placeholder="Write question number '.$sn.' here...">'.$qns.'</textarea>  
      </div>
    </div>';
    $sel_op = mysqli_query($con,"SELECT * FROM options WHERE qid='$qid'") or die('ErrorD');
    $m=1;
    while($row=mysqli_fetch_array($sel_op) )
    {
      $option=$row['option'];
      $opt_id=$row['optionid'];

      $sel_ans = mysqli_query($con,"SELECT * FROM answer WHERE qid='$qid'") or die('ErrorD');
     
      while($row=mysqli_fetch_array($sel_ans) )
      {
        $ansid=$row['ansid'];

        for($z=1;$z<=$i;$z++){
        switch($m)
        {
        case '1':
        $option_value='a';
        break;
        case '2':
        $option_value='b';
        break;
        case '3':
        $option_value='c';
        break;
        case '4':
        $option_value='d';
        
        break;
        default:
        $option_value='';
        }
  
        if($opt_id==$ansid){
          $real_option=$option_value;
        }
  
        echo '
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-12 control-label" for="'.$sn.''.$m.'">Option '.$option_value.'</label>  
          <div class="col-md-12">
          <input id="'.$sn.''.$m.'" name="'.$sn.''.$m.'" placeholder="" value="'.$option.'" class="form-control input-md" type="text">
            
          </div>
        </div>
       
        <br />';
        }
      }
      $m++;
    }
    echo '
    <b>Correct answer</b>:<br />
    <select id="ans'.$sn.'" name="ans'.$sn.'" placeholder="Choose correct answer " class="form-control input-md" >
      <option value="'.$real_option.'">option '.$real_option.' </option>
      <option value="a">option a</option>
      <option value="b">option b</option>
      <option value="c">option c</option>
      <option value="d">option d</option> </select><br /><br />'; 
  }
  echo '<div class="form-group">
    <label class="col-md-12 control-label" for=""></label>
    <div class="col-md-12"> 
      <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
    </div>
  </div>

  </fieldset>
  </form></div>';
}
?>
<!--Edit quiz step 2 end-->

<!-- Add ProffID starts-->
<?php
if(@$_GET['q']==10) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:30%;font-size:20px;text-align:left;"><b>INSERT WAEC UNIQUE ID</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=uniqueid"  method="POST">
<fieldset>

<div class="form-group">
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:85%" class="btn btn-primary value="Insert" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';
}
?>
<!-- Add ProfID ends-->

<!--View Registered Profquiz start-->
<?php if(@$_GET['q']==11) {
  include('database/db.php');
  $reg_status = 1;

  $limit2 = 10;

  if (isset($_GET['p'])) {
    $p = $_GET['p'];
  } else {
    $p = 1;
  }

$q=mysqli_query($con,"SELECT * FROM `profquiz` WHERE `reg_status`='$reg_status'" )or die('Error223');
$get_total = mysqli_num_rows($q);
$total2 = ceil($get_total/$limit2);

if (!isset($p) || $p <= 0) {
  $offset = 0;
} else{
$offset = ceil($p - 1) * $limit2;
}

$result = mysqli_query($con,"SELECT * FROM `profquiz` WHERE `reg_status`='$reg_status' LIMIT $offset,$limit2") or die('Error');
echo  '<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Registered Waecquiz Table</div><div class="card-body"><div class="table-responsive"><thead><table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<tr><th><b>S.N.</b></th><th><b>Name</b></th><th><b>Email</b></th><th><b>Unique ID</b></th><th><b>Reg Time</b></th><th><b>Reg Date</b></th><th></th></tr></thead>
<tfoot><tr><th>S.N</th><th>Name</th><th>Email</th><th><b>Unique ID</b></th><th>Reg Time</th><th>Reg Date</th></tr></tfoot>';
$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
  $firstname = $row['firstname'];
  $lastname = $row['lastname'];
  $reg_date = $row['date'];
  $reg_time = $row['time'];
  $w_email = $row['email'];
  $prof_id = $row['pid'];
  

  if ($p != 1) {
    $num = (($p - 1) * $limit2) + $i;
  } else {
    $num = $i;
  }

	echo '<tbody><tr><td>'.$num.'</td><td>'.$firstname.' '.$lastname.'</td><td>'.$w_email.'</td><td>'.$prof_id.'</td><td>'.$reg_time.'</td><td>'.$reg_date.'</td>
  <td><a title="Delete User" href="update.php?w_email='.$w_email.'"><b>Delete</b></a></td></tr></tbody>';
  $i++;
}
$c=0;
if(isset($_GET['resetprofquiz'])){
  include("reset.php");
}else{
 echo '<a class="btn btn-danger" href="dash.php?q=11&resetprofquiz=rank" role="button">Delete All</a>';
}
echo '</table></div></div>';


if($get_total > $limit2){
  echo '<div id="pages">';
  for ($i=1; $i<=$total2 ; $i++) {
    echo ($i == $p) ? '<a class="active">'.$i.'</a>' : '<a href="dash.php?q=11&p='.$i.'">'.$i.'</a>';
  }
  echo '</div>';
  
}

}?>
<!--View Registered Profquiz Ends-->

<!--View Non-Used ProfID start-->
<?php if(@$_GET['q']==12) {
  include('database/db.php');
  $reg_status = 0;

  $limit2 = 10;

  if (isset($_GET['p'])) {
    $p = $_GET['p'];
  } else {
    $p = 1;
  }

$q=mysqli_query($con,"SELECT * FROM `profquiz` WHERE `reg_status`='$reg_status'" )or die('Error223');
$get_total = mysqli_num_rows($q);
$total2 = ceil($get_total/$limit2);

if (!isset($p) || $p <= 0) {
  $offset = 0;
} else{
$offset = ceil($p - 1) * $limit2;
}

$result = mysqli_query($con,"SELECT * FROM `profquiz` WHERE `reg_status`= '$reg_status'  LIMIT $offset,$limit2") or die('Error');



echo  '<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Non-Used ProfID</div><div class="card-body"><div class="table-responsive"><thead><table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<tr><th><b>S.N.</b></th><th><b>Unique ID</b></th></tr></thead>
<tfoot><tr><th>S.N</th><th>Unique ID</th></tr></tfoot>';
$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
  $prof_id = $row['pid'];
  
  if ($p != 1) {
    $num = (($p - 1) * $limit2) + $i;
  } else {
    $num = $i;
  }

	echo '<tbody><tr><td>'.$num.'</td><td>'.$prof_id.'</td>
  <td><a title="Delete ProfID" href="update.php?pid='.$prof_id.'"><b>Delete</b></a></td></tr></tbody>';
  $i++;
}
$c=0;
echo '</table></div></div>';

if($get_total > $limit2){
  echo '<div id="pages">';
  for ($i=1; $i<=$total2 ; $i++) {
    echo ($i == $p) ? '<a class="active">'.$i.'</a>' : '<a href="dash.php?q=12&p='.$i.'">'.$i.'</a>';
  }
  echo '</div>';
  
}
}?>
<!--View Non-Used ProfID Ends-->

<!--View Registered Airtimequiz start-->
<?php if(@$_GET['q']==13) {
  include('database/db.php');

  $limit2 = 10;

  if (isset($_GET['p'])) {
    $p = $_GET['p'];
  } else {
    $p = 1;
  }

$q=mysqli_query($con,"SELECT * FROM `freeairtime` " )or die('Error223');
$get_total = mysqli_num_rows($q);
$total2 = ceil($get_total/$limit2);

if (!isset($p) || $p <= 0) {
  $offset = 0;
} else{
$offset = ceil($p - 1) * $limit2;
}

$result = mysqli_query($con,"SELECT * FROM `freeairtime`  LIMIT $offset,$limit2") or die('Error');
echo  '<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Registered Airtimequiz Table</div><div class="card-body"><div class="table-responsive"><thead><table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<tr><th><b>S.N.</b></th><th><b>Name</b></th><th><b>Email</b></th><th><b>Unique ID</b></th><th><b>Phone Number</b></th><th><b>Reg Date</b></th><th></th></tr></thead>
<tfoot><tr><th>S.N</th><th>Name</th><th>Email</th><th><b>Unique ID</b></th><th>Phone Number</th><th>Reg Date</th></tr></tfoot>';
$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
  $firstname = $row['firstname'];
  $lastname = $row['lastname'];
  $reg_date = $row['regdate'];
  $mobile = $row['mobile'];
  $a_email = $row['email'];
  $sub_id = $row['subid'];
  
 
  if ($p != 1) {
    $num = (($p - 1) * $limit2) + $i;
  } else {
    $num = $i;
  }

	echo '<tbody><tr><td>'.$num.'</td><td>'.$firstname.' '.$lastname.'</td><td>'.$a_email.'</td><td>'.$sub_id.'</td><td>'.$mobile.'</td><td>'.$reg_date.'</td>
  <td><a title="Delete User" href="update.php?a_email='.$a_email.'"><b>Delete</b></a></td></tr></tbody>';
  $i++;
}
$c=0;
if(isset($_GET['resetairtimequiz'])){
  include("reset.php");
}else{
 echo '<a class="btn btn-danger" href="dash.php?q=13&resetairtimequiz=rank" role="button">Delete All</a>';
}
if(isset($_GET['selmobiles'])){
  include("reset.php");
}else
{
  echo '&nbsp&nbsp;<a class="btn btn-primary" href="freeairtime_mobiles.txt" role="button">Download All mobile</a>';
}
echo '</table></div></div>';

if($get_total > $limit2){
  echo '<div id="pages">';
  for ($i=1; $i<=$total2 ; $i++) {
    echo ($i == $p) ? '<a class="active">'.$i.'</a>' : '<a href="dash.php?q=13&p='.$i.'">'.$i.'</a>';
  }
  echo '</div>';
  
}

}?>
<!--View Registered Airtimequiz Ends-->

<!--add post start-->
<?php
if(@$_GET['q']==14) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Post Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=post"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="title">Enter Post Title</label>  
  <div class="col-md-12">
  <input id="title" name="title" placeholder="Enter Post Title" class="form-control input-md" type="text" required/>
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="body">Enter Post Body</label>  
  <div class="col-md-12">
  <textarea rows="8" cols="8" name="body" class="form-control" placeholder="Body"></textarea>  
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?>
<!--add post end-->

<!--view post start-->
<?php if(@$_GET['q']==15) {
  include('database/db.php');

  $limit = 10;

  if (isset($_GET['p'])) {
    $p = $_GET['p'];
  } else {
    $p = 1;
  }

$q=mysqli_query($con,"SELECT * FROM `post` " )or die('Error223');
$get_total = mysqli_num_rows($q);
$total = ceil($get_total/$limit);

if (!isset($p) || $p <= 0) {
  $offset = 0;
} else{
$offset = ceil($p - 1) * $limit;
}


$result = mysqli_query($con,"SELECT * FROM `post` ORDER BY `post_date` DESC  LIMIT $offset,$limit") or die('Error');

echo  '<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Post Table</div><div class="card-body"><div class="table-responsive"><thead><table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
<tr><th><b>S.N.</b></th><th><b>Title</b></th><th><b>Date</b></th></tr></thead>
<tfoot><tr><th>S.N</th><th>Title</th><th>Date</th></tr></tfoot>';
$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
  $post_id = $row['post_id'];
  $post_title = $row['post_title'];
  $post_title = substr("$post_title",0,60);
	$post_date = $row['post_date'];

  if ($p != 1) {
    $num = (($p - 1) * $limit) + $i;
  } else {
    $num = $i;
  }

	echo '<tbody><tr><td>'.$num.'</td><td>'.$post_title.' </td><td>'.$post_date.'</td><td>
  <td><a href="update.php?q=rmpost&pid='.$post_id.'" class="pull-right btn sub1" style="margin:0px;background:red"><b>Remove</b></a></b>
  <a href="dash.php?q=16&pid='.$post_id.'" class="pull-right btn sub1" style="margin:0px;background:green"><b>Edit Detail</b></a></b></td></tr></tbody>';
  
  $i++;
}
$c=0;
echo '</table></div></div>';

if($get_total > $limit){
  echo '<div id="pages">';
  for ($i=1; $i<=$total ; $i++) {
    echo ($i == $p) ? '<a class="active">'.$i.'</a>' : '<a href="dash.php?q=15&p='.$i.'">'.$i.'</a>';
  }
  echo '</div>';
}

}
?>
<!--view post end-->

<!--Edit Post Details starts-->
<?php
if(@$_GET['q']==16) {
  include('database/db.php');
  $pid=@$_GET['pid'];
  $result = mysqli_query($con,"SELECT * FROM `post` WHERE `post_id`='$pid'") or die('Error560');
  while($row=mysqli_fetch_array($result) )
  {
    $post_title=$row['post_title'];
    $post_body=$row['post_body'];
    $post_date=$row['post_date'];

  }

  echo ' 
  <div class="row">
  <span class="title1" style="margin-left:40%;font-size:30px;"><b>Edit Post Details</b></span><br /><br />
  <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=editpost&pid='.$pid.'"  method="POST">
  <fieldset>


  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-12 control-label" for="title">Title</label>  
    <div class="col-md-12">
    <input id="title" name="title" placeholder="" value="'.$post_title.'" class="form-control input-md" type="text">
      
    </div>
  </div>


  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-12 control-label" for="body">Description</label>  
    <div class="col-md-12">
    <textarea rows="8" cols="8" name="body" class="form-control" placeholder="">'.$post_body.'</textarea>  
    </div>
  </div>


  <div class="form-group">
    <label class="col-md-12 control-label" for=""></label>
    <div class="col-md-12"> 
      <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
    </div>
  </div>

  </fieldset>
  </form></div>';

}
?>
<!--Edit Post Detail end-->

<!--add Subject start-->
<?php
if(@$_GET['q']==17) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Subject Detail</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addsub"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="subject">Enter Subject Name</label>  
  <div class="col-md-12">
  <input id="subject" name="subject" placeholder="Enter Subject Name" class="form-control input-md" type="text" required/>
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?>
<!--add Subject end-->

<!-- Add JambID starts-->
<?php
if(@$_GET['q']==18) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:30%;font-size:20px;text-align:left;"><b>INSERT JAMB UNIQUE ID</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=legendid"  method="POST">
<fieldset>

<div class="form-group">
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:85%" class="btn btn-primary value="Insert" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';
}
?>
<!-- Add JambID ends-->

<!--View Registered jambquiz start-->
<?php if(@$_GET['q']==19) {
  include('database/db.php');
  $reg_status = 10;

  $limit2 = 1;

  if (isset($_GET['p'])) {
    $p = $_GET['p'];
  } else {
    $p = 1;
  }

$q=mysqli_query($con,"SELECT * FROM `legendquiz` WHERE `reg_status`='$reg_status'" )or die('Error223');
$get_total = mysqli_num_rows($q);
$total2 = ceil($get_total/$limit2);

if (!isset($p) || $p <= 0) {
  $offset = 0;
} else{
$offset = ceil($p - 1) * $limit2;
}

$result = mysqli_query($con,"SELECT * FROM `legendquiz` WHERE `reg_status`='$reg_status' LIMIT $offset,$limit2") or die('Error');
echo  '<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Registered Jambquiz Table</div><div class="card-body"><div class="table-responsive"><thead><table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<tr><th><b>S.N.</b></th><th><b>Name</b></th><th><b>Email</b></th><th><b>Unique ID</b></th><th><b>Reg Time</b></th><th><b>Reg Date</b></th><th></th></tr></thead>
<tfoot><tr><th>S.N</th><th>Name</th><th>Email</th><th><b>Unique ID</b></th><th>Reg Time</th><th>Reg Date</th></tr></tfoot>';
$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
  $firstname = $row['firstname'];
  $lastname = $row['lastname'];
  $reg_date = $row['date'];
  $reg_time = $row['time'];
  $j_email = $row['email'];
  $legend_id = $row['lid'];
  

  if ($p != 1) {
    $num = (($p - 1) * $limit2) + $i;
  } else {
    $num = $i;
  }

	echo '<tbody><tr><td>'.$num.'</td><td>'.$firstname.' '.$lastname.'</td><td>'.$j_email.'</td><td>'.$legend_id.'</td><td>'.$reg_time.'</td><td>'.$reg_date.'</td>
  <td><a title="Delete User" href="update.php?j_email='.$j_email.'"><b>Delete</b></a></td></tr></tbody>';
  $i++;
}
$c=0;
if(isset($_GET['resetjambquiz'])){
  include("reset.php");
}else{
 echo '<a class="btn btn-danger" href="dash.php?q=19&resetjambquiz=rank" role="button">Delete All</a>';
}
echo '</table></div></div>';


if($get_total > $limit2){
  echo '<div id="pages">';
  for ($i=1; $i<=$total2 ; $i++) {
    echo ($i == $p) ? '<a class="active">'.$i.'</a>' : '<a href="dash.php?q=19&p='.$i.'">'.$i.'</a>';
  }
  echo '</div>';
  
}

}?>
<!--View Registered jambquiz Ends-->

<!--View Non-Used jambID start-->
<?php if(@$_GET['q']==20) {
  include('database/db.php');
  $reg_status = 0;

  $limit2 = 10;

  if (isset($_GET['p'])) {
    $p = $_GET['p'];
  } else {
    $p = 1;
  }

$q=mysqli_query($con,"SELECT * FROM `legendquiz` WHERE `reg_status`='$reg_status'" )or die('Error223');
$get_total = mysqli_num_rows($q);
$total2 = ceil($get_total/$limit2);

if (!isset($p) || $p <= 0) {
  $offset = 0;
} else{
$offset = ceil($p - 1) * $limit2;
}

$result = mysqli_query($con,"SELECT * FROM `legendquiz` WHERE `reg_status`= '$reg_status'  LIMIT $offset,$limit2") or die('Error');



echo  '<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Non-Used JambID</div><div class="card-body"><div class="table-responsive"><thead><table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<tr><th><b>S.N.</b></th><th><b>Unique ID</b></th></tr></thead>
<tfoot><tr><th>S.N</th><th>Unique ID</th></tr></tfoot>';
$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
  $legend_id = $row['lid'];
  
  if ($p != 1) {
    $num = (($p - 1) * $limit2) + $i;
  } else {
    $num = $i;
  }

	echo '<tbody><tr><td>'.$num.'</td><td>'.$legend_id.'</td>
  <td><a title="Delete ProfID" href="update.php?pid='.$legend_id.'"><b>Delete</b></a></td></tr></tbody>';
  $i++;
}
$c=0;
echo '</table></div></div>';

if($get_total > $limit2){
  echo '<div id="pages">';
  for ($i=1; $i<=$total2 ; $i++) {
    echo ($i == $p) ? '<a class="active">'.$i.'</a>' : '<a href="dash.php?q=20&p='.$i.'">'.$i.'</a>';
  }
  echo '</div>';
  
}
}?>
<!--View Non-Used jambID Ends-->

<!--add Blog News start-->
<?php
if(@$_GET['q']==21) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter News Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=news" enctype="multipart/form-data" method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="b_title">Enter News Title</label>  
  <div class="col-md-12">
  <input id="b_title" name="b_title" placeholder="Enter News Title" class="form-control input-md" type="text" required/>
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="b_body">Enter News Body</label>  
  <div class="col-md-12">
  <textarea rows="8" cols="8" name="b_body" class="form-control" placeholder="Body" ></textarea>  
  </div>
</div>

<div class="form-group">
<label for="b_image" class=""col-md-12 control-label">Image:</label>
    <input type="file" class="form-control" id="b_image" name="b_image" required>     
    
    </div>   

<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';

}
?>

<!--add blog news ends-->

<!--view blog News start-->
<?php if(@$_GET['q']==22) {
  include('database/db.php');

  $limit = 5;

  if (isset($_GET['p'])) {
    $p = $_GET['p'];
  } else {
    $p = 1;
  }

$q=mysqli_query($con,"SELECT * FROM `blog` " )or die('Error223');
$get_total = mysqli_num_rows($q);
$total = ceil($get_total/$limit);

if (!isset($p) || $p <= 0) {
  $offset = 0;
} else{
$offset = ceil($p - 1) * $limit;
}


$result = mysqli_query($con,"SELECT * FROM `blog` ORDER BY `blog_date` DESC  LIMIT $offset,$limit") or die('Error');

echo  '<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Blog Table</div><div class="card-body"><div class="table-responsive"><thead><table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
<tr><th><b>S.N.</b></th><th><b>Title</b></th><th><b>Date</b></th></tr></thead>
<tfoot><tr><th>S.N</th><th>Title</th><th>Date</th></tr></tfoot>';
$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
  $blog_id = $row['blog_id'];
  $blog_title = $row['blog_title'];
  $blog_title = substr("$blog_title",0,60);
	$blog_date = $row['blog_date'];

  if ($p != 1) {
    $num = (($p - 1) * $limit) + $i;
  } else {
    $num = $i;
  }

	echo '<tbody><tr><td>'.$num.'</td><td>'.$blog_title.' </td><td>'.$blog_date.'</td><td>
  <td><a href="update.php?q=rmnews&bid='.$blog_id.'" class="pull-right btn sub1" style="margin:0px;background:red"><b>Remove</b></a></b>
  <a href="dash.php?q=23&bid='.$blog_id.'" class="pull-right btn sub1" style="margin:0px;background:green"><b>Edit Detail</b></a></b></td></tr></tbody>';
  
  $i++;
}
$c=0;
echo '</table></div></div>';

if($get_total > $limit){
  echo '<div id="pages">';
  for ($i=1; $i<=$total ; $i++) {
    echo ($i == $p) ? '<a class="active">'.$i.'</a>' : '<a href="dash.php?q=22&p='.$i.'">'.$i.'</a>';
  }
  echo '</div>';
}

}
?>
<!--view Blog News end-->

<!--Edit bLOG NEWS Details starts-->
<?php
if(@$_GET['q']==23) {
  include('database/db.php');
  $bid=@$_GET['bid'];
  $result = mysqli_query($con,"SELECT * FROM `blog` WHERE `blog_id`='$bid'") or die('Error560');
  while($row=mysqli_fetch_array($result) )
  {
    $blog_title=$row['blog_title'];
    $blog_body=$row['blog_body'];
    $blog_date=$row['blog_date'];
    $blog_image=$row['blog_image'];

  }

  echo ' 
  <div class="row">
  <span class="title1" style="margin-left:40%;font-size:30px;"><b>Edit News Details</b></span><br /><br />
  <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=editnews&bid='.$bid.'" enctype="multipart/form-data" method="POST">
  <fieldset>


  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-12 control-label" for="b_title">Title</label>  
    <div class="col-md-12">
    <input id="b_title" name="b_title" placeholder="" value="'.$blog_title.'" class="form-control input-md" type="text">
      
    </div>
  </div>


  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-12 control-label" for="b_body">Description</label>  
    <div class="col-md-12">
    <textarea rows="8" cols="8" name="b_body" class="form-control" placeholder="">'.$blog_body.'</textarea>  
    </div>
  </div>

  <div class="form-group">
<label for="b_image" class=""col-md-12 control-label">Image:</label>
    <input type="file" class="form-control" id="b_image" name="b_image" value="'.$blog_image.'" required><img src="../blog_images/'.$blog_image.'" width= "60" height="60">   
    
    </div>  


  <div class="form-group">
    <label class="col-md-12 control-label" for=""></label>
    <div class="col-md-12"> 
      <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
    </div>
  </div>

  </fieldset>
  </form></div>';

}
?>
<!--Edit BLOG NEWS Detail end-->

<!--View Subjects starts-->
<?php if(@$_GET['q']==24) {
include('database/db.php');
$email = $_SESSION['username'];
$result = mysqli_query($con,"SELECT * FROM `subjects`") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$subject_id = $row['subject_id'];
	$subject_title = $row['subject_title'];
	echo '<tr><td>'.$c++.'</td><td>'.$subject_title.'</td>&nbsp;</td>
  <td><b><a href="update.php?q=rmsub&sid='.$subject_id.'" class="pull-right btn sub1" style="margin:0px;background:red"><b>Remove</b></a></b>';
}
echo '</table></div></div>';

}
?>
<!--View Subjects Ends-->
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>

  </div>
</div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>

<?php } ?>
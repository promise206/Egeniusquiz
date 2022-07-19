
<!DOCTYPE html>
<?php
session_start();

if(!isset($_SESSION['username'])){
  echo "<script>window.open('account/login.php?message=Login to View this Page!', '_self')</script>";
}
else{
  include("account/admin.class.php");
  $admin = new admin();
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
  
  
  <script src="https://cdn.tiny.cloud/1/nllne6jglw3laf49ugvd8mf9hajx71onlhz3pzp2464fv8jl/tinymce/5/tinymce.min.js"></script>

  <script>
  tinymce.init({selector:'textarea'});
  </script>


</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

  <a class="navbar-brand mr-1" href="dash.php">Start Bootstrap</a>

  <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
    <i class="fas fa-bars"></i>
  </button>

  
  <ul class="navbar-nav ml-auto ml-md-0">
    <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <span class="badge badge-danger"><?php $admin->new_entSport(); ?><br></span>
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
        <span class="badge badge-danger"><?php $admin->new_feedback(); ?></span>
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
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
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
          <a class="dropdown-item" href="dash.php?q=4">Add Airtime Quiz</a>
          <a class="dropdown-item" href="dash.php?q=29">Add WAEC Quiz</a>
          <a class="dropdown-item" href="dash.php?q=31">Add JAMB Quiz</a>
          <a class="dropdown-item" href="dash.php?q=10">Add WaecID</a>
          <a class="dropdown-item" href="dash.php?q=18">Add JambID</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="dash.php?q=24">View Subject</a>
          <a class="dropdown-item" href="dash.php?q=5">View Airtime Quiz</a>
          <a class="dropdown-item" href="dash.php?q=33">View WAEC Quiz</a>
          <a class="dropdown-item" href="dash.php?q=34">View JAMB Quiz</a>
          <a class="dropdown-item" href="dash.php?q=11">View Reg Waecquiz</a>
          <a class="dropdown-item" href="dash.php?q=19">View Reg Jambquiz</a>
          <a class="dropdown-item" href="dash.php?q=13">View Reg Airtimequiz</a>
          <a class="dropdown-item" href="dash.php?q=12">View Non-Used WaecID</a>
          <a class="dropdown-item" href="dash.php?q=20">View Non-Used JambID</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Blocked Airtime Users:</h6>
          <a class="dropdown-item" href="dash.php?q=47">View Blocked User.</a>
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
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="dash.php?q=41">Add Tech News</a>
          <a class="dropdown-item" href="dash.php?q=42">View Tech News</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="dash.php?q=28">View Ent&Sports News</a>
          <a class="dropdown-item" href="dash.php?q=44">View Comments</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Slider</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <h6 class="dropdown-header">Actions</h6>
          <a class="dropdown-item" href="dash.php?q=25">Add Slider</a>
          <a class="dropdown-item" href="dash.php?q=26">View Slider</a>
        </div>
      </li>

      <li <?php if(@$_GET['q']==3) ?> class="nav-item">
        <a class="nav-link" href="dash.php?q=3">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>FeedBack</span></a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Ranking</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <h6 class="dropdown-header">Actions</h6>
          <a class="dropdown-item" href="dash.php?q=2">View Airtime Quiz Rank</a>
          <a class="dropdown-item" href="dash.php?q=39">View Waec Quiz Rank</a>
          <a class="dropdown-item" href="dash.php?q=40">View Jamb Quiz Rank</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>History</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <h6 class="dropdown-header">Actions</h6>
          <a class="dropdown-item" href="dash.php?q=45">View Airtime Quiz History</a>
          <a class="dropdown-item" href="#">View Waec Quiz History</a>
          <a class="dropdown-item" href="#">View Jamb Quiz Histroy</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="dash.php?q=46">Airtime History Update</a>
        </div>
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
              <a class="card-footer text-white clearfix small z-1" href="dash.php?q=19">
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
  include('database/db.php');
  
  if(isset($_GET['resetrank'])){
    include("reset.php");
 }else{
   echo '<a class="btn btn-danger" href="dash.php?q=2&resetrank=rank" role="button">Delete All</a>';
 }

$que=mysqli_query($con,"SELECT * FROM `rank`  ORDER BY `score` DESC " )or die('Error223');
echo  '


<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Rank Airtime Quiz Table
  <!-- Navbar Search Ends--></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th><b>Rank</b></th>
          <th><b>Name</b></th>
          <th><b>Gender</b></th>
          <th><b>Email</b></th>
          <th><b>Mobile</b></th>
          <th><b>Score</b></th>
          <th><b>Bonus</b></th>
          <th><b>Winner</b></th>
          <th><b>reset bonus</b></th>
          <th><b>delete</b></th>
          </tr>
        </thead>
        <tfoot>
          <tr>
          <th><b>Rank</b></th>
          <th><b>Name</b></th>
          <th><b>Gender</b></th>
          <th><b>Email</b></th>
          <th><b>Mobile</b></th>
          <th><b>Score</b></th>
          <th><b>Bonus</b></th>
          <th><b>Winner</b></th>
          <th><b>reset bonus</b></th>
          <th><b>delete</b></th>
          </tr>
        </tfoot>
    <tbody>
  ';
$c=0;
$i=1;
while($row=mysqli_fetch_array($que) )
{
  $e=$row['email'];
  $s=$row['score'];
  $q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error2300');
  $sel_ref=mysqli_query($con,"SELECT * FROM `referrer` WHERE `ref_email`='$e' " )or die('Error231');
  $ref_bonus = 0;
  while($row=mysqli_fetch_array($sel_ref) )
  {
    $ref_bonus = $row['ref_bonus'];
    
  }
  while($row=mysqli_fetch_array($q12) )
  {
    $firstname = $row['first_name'];
    $lastname = $row['last_name'];
    $dob = $row['dob'];
    $gender = $row['gender'];
      $email = $row['email'];
    $state = $row['state'];
    $mobile = $row['mobile'];


  }
  $c++;
  echo '
          <tr>
            <td>'.$i.'</td>
            <td>'.$firstname.' '.$lastname.'</td>
            <td>'.$gender.'</td>
            <td>'.$email.'</td>
            <td>'.$mobile.'</td>
            <td>'.$s.'</td>
            <td>'.$ref_bonus.'</td>
          
 
  ';
  if($i<=3){
    echo '<td><a title="Archive User" href="reset.php?win_count='.$email.'"><b>Winner</b></a></td>';
  }else{
    echo '<td>Failed</td>';
  }
  echo '
  <td><a title="Reset Bonus" href="reset.php?reset_bonus='.$email.'"><b style="color: orange;">Reset Bonus</b></a></td>
  <td><a title="Delete User" href="update.php?del_rank='.$email.'"><b style="color: red;">Delete</b></a></td></tr>';
  $i++;
}
mysqli_close($con);
echo '</tbody></table></div></div>';


}

?>


<!--home closed-->
<!--users start-->
<?php if(@$_GET['q']==1) {
include('database/db.php');

$result = mysqli_query($con,"SELECT * FROM `user`") or die('Error');
echo  '<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Users Table
  <!-- Navbar Search Ends--></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th><b>S.N.</b></th>
          <th><b>Name</b></th>
          <th><b>Gender</b></th>
          <th><b>State</b></th>
          <th><b>Email</b></th>
          <th><b>Mobile</b></th>
          <th><b>Action</b></th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>S.N</th>
            <th>Name</th>
            <th>Gender</th>
            <th>State</th>
            <th>Email</th>
            <th>Mobile</th>
            <th><b>Action</b></th>
          </tr>
        </tfoot>
    <tbody>';
$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
  $firstname = $row['first_name'];
  $lastname = $row['last_name'];
	$mobile = $row['mobile'];
	$gender = $row['gender'];
    $email = $row['email'];
	$state = $row['state'];

  echo '
          <tr>
            <td>'.$i.'</td>
            <td>'.$firstname.' '.$lastname.'</td>
            <td>'.$gender.'</td>
            <td>'.$state.'</td>
            <td>'.$email.'</td>
            <td>'.$mobile.'</td>
            <td><a title="Delete User" href="update.php?demail='.$email.'"><b>Delete</b></a></td>
          </tr>
        ';
  $i++;
}
mysqli_close($con);
$c=0;
if(isset($_GET['usermobile'])){
  include("reset.php");
}else
{
  echo '&nbsp&nbsp;<a class="btn btn-primary" href="users_mobiles.txt" role="button">Download All mobile</a>';
}
echo '</tbody></table>
    </div>
  </div>

';
}
?>
<!--user end-->

<!--feedback start-->
<?php if(@$_GET['q']==3) {
  include('database/db.php');
  

$result = mysqli_query($con,"SELECT * FROM `feedback` ORDER BY `feedback`.`date` DESC ") or die('Error');
echo  '
<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  FeedBack Table
  <!-- Navbar Search Ends--></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th><b>S.N.</b></th>
          <th><b>Subject</b></th>
          <th><b>Email</b></th>
          <th><b>Date</b></th>
          <th><b>Time</b></th>
          <th><b>By</b></th>
          <th><b>Action</b></th>
          </tr>
        </thead>
      <tfoot>
        <tr>
          <th>S.N</th>
          <th>Subject</th>
          <th>Email</th>
          <th>Date</th>
          <th>Time</th>
          <th>By</th>
          <th>Action</th>
        </tr>
      </tfoot>
    <tbody>
';

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
  

   echo '
   
          <tr>
            <td>'.$i.'</td>
            <td><a title="Click to open feedback" href="dash.php?q=3&fid='.$id.'">'.$subject.'</a></td>
            <td>'.$email.'</td>
            <td>'.$date.'</td>
            <td>'.$time.'</td>
            <td>'.$name.'</td>
            <td><a title="Open Feedback" href="dash.php?q=3&fid='.$id.'"><b>Open</b></a>
            <a title="Delete Feedback" href="update.php?fdid='.$id.'"><b style="color: red;">Delete</b></a></td>
          </tr>
   ';
  $i++;
}
mysqli_close($con);
echo '</tbody>
    </table>
  </div>
</div>

';
}
?>
<!--feedback closed-->

<!--feedback reading portion start-->
<?php if(@$_GET['fid']) {
  include('database/db.php');
echo '<br />';
$id=@$_GET['fid'];
$update= mysqli_query($con, "UPDATE `feedback` SET `open`='1' WHERE `id`='$id'");
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
<span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;'.$time.'</span><span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;'.$name.'</span><br /></div>'.$feedback.'</div></div></div>';}
}?>
<!--Feedback reading portion closed-->

<!--add Airtime quiz start-->
<?php
if(@$_GET['q']==4 && !(@$_GET['step']) ) {
  include('database/db.php');
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
<!--add AIRTIME quiz end-->

<!--add AIRTIME quiz step2 start-->
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
?><!--add AIRTIME quiz step 2 end-->

<!--View AIRTIME quiz starts-->
<?php if(@$_GET['q']==5) {
include('database/db.php');
$email = $_SESSION['username'];
$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><b>AIRTIME QUIZ</b><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td><b>Edit Detail</b></td><td><b>Edit Question</b></td><td><b>Add</b></td><td><b>Remove</b></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
    $time = $row['time'];
	$eid = $row['eid'];
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
  <td><a href="dash.php?q=8&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:green"><b>Edit Detail</b></a></b></td>
  <td><a href="dash.php?q=9&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:yellow"><b>Edit Question</b></a></b></td>
  <td><a href="#" class="pull-right btn sub1" style="margin:0px;background:#194674;color:white;"><b>Add</b></a></b></td>
  <td><b><a href="update.php?q=rmquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><b>Remove</b></a></b></td></tr>';
}
$c=0;
echo '</table></div></div>';

}
?>


<!--Edit airtime quiz Details starts-->
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
<!--Edit airtime quiz Detail end-->


<!--Edit airtime quiz questions start-->
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
<!--Edit airtime quiz questions end-->

<!-- Add waecID starts-->
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
<!-- Add waecID ends-->

<!--View Registered waecquiz start-->
<?php if(@$_GET['q']==11) {
  include('database/db.php');

$result = mysqli_query($con,"SELECT * FROM `profquiz` WHERE `reg_status`='$reg_status'") or die('Error');
echo  '

<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Registered Waecquiz Table
  <!-- Navbar Search Ends--></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th><b>S.N.</b></th>
          <th><b>Name</b></th>
          <th><b>Email</b></th>
          <th><b>Unique ID</b></th>
          <th><b>Reg Time</b></th>
          <th><b>Reg Date</b></th>
          <th><b>Action</b></th>
          </tr>
        </thead>
      <tfoot>
        <tr>
          <th>S.N</th>
          <th>Name</th>
          <th>Email</th>
          <th>Unique ID</th>
          <th>Reg Time</th>
          <th>Reg Date</th>
        </tr>
      </tfoot>
    <tbody>
  ';
$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
  $firstname = $row['firstname'];
  $lastname = $row['lastname'];
  $reg_date = $row['date'];
  $reg_time = $row['time'];
  $w_email = $row['email'];
  $prof_id = $row['pid'];
  

  echo '
  
          <tr>
            <td>'.$i.'</td>
            <td>'.$firstname.' '.$lastname.'</td>
            <td>'.$w_email.'</td>
            <td>'.$prof_id.'</td>
            <td>'.$reg_time.'</td>
            <td>'.$reg_date.'</td>
            <td><a title="Delete User" href="update.php?w_email='.$w_email.'"><b>Delete</b></a></td>
          </tr>
      ';
  $i++;
}
mysqli_close($con);
$c=0;
if(isset($_GET['resetprofquiz'])){
  include("reset.php");
}else{
 echo '<a class="btn btn-danger" href="dash.php?q=11&resetprofquiz=rank" role="button">Delete All</a>';
}
if(isset($_GET['selmobiles'])){
  include("reset.php");
}else
{
  echo '&nbsp&nbsp;<a class="btn btn-primary" href="waecquiz_mobiles.txt" role="button">Download All mobile</a>';
  echo '&nbsp&nbsp;<a class="btn btn-secondary" href="update.php?activate=waec&active=2" role="button">Activate Quiz</a>';
  echo '&nbsp&nbsp;<a class="btn btn-secondary" href="update.php?activate=waec&active=3" role="button">Deactivate Quiz</a>';
}
echo '</tbody>
    </table>
  </div>
</div>

';
}

?>
<!--View Registered waecquiz Ends-->

<!--View Non-Used WAECID start-->
<?php if(@$_GET['q']==12) {
  include('database/db.php');
  

$result = mysqli_query($con,"SELECT * FROM `profquiz` WHERE `reg_status`= '$reg_status' ") or die('Error');

echo  '


<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Non-Used WAECID
  <!-- Navbar Search Ends--></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th><b>S.N.</b></th>
          <th><b>Unique ID</b></th>
          <th><b>Action</b></th>
          </tr>
        </thead>
      <tfoot>
        <tr>
          <th>S.N</th>
          <th>Unique ID</th>
          <th>Action</th>
        </tr>
      </tfoot>
    <tbody>

    ';
$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
  $prof_id = $row['pid'];

  echo '
  
  
          <tr>
            <td>'.$i.'</td>
            <td>'.$prof_id.'</td>
            <td><a title="Delete ProfID" href="update.php?pid='.$prof_id.'"><b>Delete</b></a></td>
          </tr>
  ';
  $i++;
}
mysqli_close($con);
$c=0;
echo '</tbody>
    </table>
  </div>
</div>

';
}

?>
<!--View Non-Used WAECID Ends-->

<!--View Registered Airtimequiz start-->
<?php if(@$_GET['q']==13) {
  include('database/db.php');

$result = mysqli_query($con,"SELECT * FROM `freeairtime` ORDER BY `regdate`") or die('Error');
echo  '<div class="card mb-3">
<div class="card-header">
<i class="fas fa-table"></i>
  Registered Airtimequiz Table
  <!-- Navbar Search Ends--></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th><b>S.N.</b></th>
          <th><b>Name</b></th>
          <th><b>Email</b></th>
          <th><b>Unique ID</b></th>
          <th><b>Phone Number</b></th>
          <th><b>Reg Date</b></th>
          <th><b>Status</b></th>
          <th><b>Delete</b></th>
          </tr>
        </thead>
      <tfoot>
        <tr>
          <th>S.N</th>
          <th>Name</th>
          <th>Email</th>
          <th>Unique ID</th>
          <th>Phone Number</th>
          <th>Reg Date</th>
          <th>Status</th>
          <th>Delete</th>
        </tr>
      </tfoot>
    <tbody>
';
$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
  $firstname = $row['firstname'];
  $lastname = $row['lastname'];
  $reg_date = $row['regdate'];
  $mobile = $row['mobile'];
  $a_email = $row['email'];
  $sub_id = $row['subid'];
  
  echo '
    <tr>
    <td>'.$i.'</td>
    <td>'.$firstname.' '.$lastname.'</td>
    <td>'.$a_email.'</td>
    <td>'.$sub_id.'</td>
    <td>'.$mobile.'</td>
    <td>'.$reg_date.'</td>
    
    ';
    $user_status = mysqli_query($con,"SELECT * FROM `freeairtime` WHERE `email`='$a_email' AND `blocked`='1'") or die('Error');
    $block=0;
    while($row = mysqli_fetch_array($user_status)) {
      $block = $row['blocked'];
    }
    if($block==1){
      echo '<td><a title="Unblock User" href="update.php?user_email='.$a_email.'"><b>Unblock</b></a></td>';
    }else{
      echo '<td><a title="Block User" href="update.php?user_email='.$a_email.'&block=1"><b style="color: red;">Block</b></a></td>';
    }
    echo '
    <td><a title="Delete User" href="update.php?a_email='.$a_email.'"><b>Delete</b></a></td>
    </tr>
  
  ';
  $i++;
}
mysqli_close($con);
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
  echo '&nbsp&nbsp;<a class="btn btn-info" href="reset.php?copy_email=2" role="button">Download All Email</a>';
  echo '&nbsp&nbsp;<a class="btn btn-secondary" href="update.php?activate=airtime&active=2" role="button">Activate Quiz</a>';
  echo '&nbsp&nbsp;<a class="btn btn-secondary" href="update.php?activate=airtime&active=3" role="button">Deactivate Quiz</a>';
}
  echo '</tbody>
      </table>
  </div>
</div>

';
}

?>
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

$result = mysqli_query($con,"SELECT * FROM `post` ORDER BY `post_date` DESC") or die('Error');

echo  '<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Post Table
  <!-- Navbar Search Ends--></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th><b>S.N.</b></th>
          <th><b>Title</b></th>
          <th><b>Date</b></th>
          <th><b>Action</b></th>
          </tr>
        </thead>
      <tfoot>
        <tr>
          <th>S.N</th>
          <th>Title</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
      </tfoot>
    <tbody>
  ';
$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
  $post_id = $row['post_id'];
  $post_title = $row['post_title'];
  $post_title = substr("$post_title",0,60);
	$post_date = $row['post_date'];

  echo '
        <tr>
          <td>'.$i.'</td>
          <td>'.$post_title.'</td>
          <td>'.$post_date.'</td>
          <td><a href="update.php?q=rmpost&pid='.$post_id.'" class="pull-right btn sub1" style="margin:0px;background:red"><b>Remove</b></a></b>
          <a href="dash.php?q=16&pid='.$post_id.'" class="pull-right btn sub1" style="margin:0px;background:green"><b>Edit Detail</b></a></b></td>
        </tr>
      ';
  
  $i++;
}
mysqli_close($con);
$c=0;
echo '</tbody>
    </table>
  </div>
</div>

';
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

$result = mysqli_query($con,"SELECT * FROM `legendquiz` WHERE `reg_status`='$reg_status'") or die('Error');
echo  '<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Registered Jambquiz Table
  <!-- Navbar Search Ends--></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th><b>S.N.</b></th>
          <th><b>Name</b></th>
          <th><b>Email</b></th>
          <th><b>Unique ID</b></th>
          <th><b>Reg Time</b></th>
          <th><b>Reg Date</b></th>
          <th><b>Action</b></th>
          </tr>
        </thead>
      <tfoot>
        <tr>
          <th>S.N</th>
          <th>Name</th>
          <th>Email</th>
          <th>Unique ID</th>
          <th>Reg Time</th>
          <th>Reg Date</th>
          <th>Action</th>
        </tr>
      </tfoot>
    <tbody>
  ';
$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
  $firstname = $row['firstname'];
  $lastname = $row['lastname'];
  $reg_date = $row['date'];
  $reg_time = $row['time'];
  $j_email = $row['email'];
  $legend_id = $row['lid'];
  


  echo '
        <tr>
          <td>'.$i.'</td>
          <td>'.$firstname.' '.$lastname.'</td>
          <td>'.$j_email.'</td>
          <td>'.$legend_id.'</td>
          <td>'.$reg_time.'</td>
          <td>'.$reg_date.'</td>
          <td><a title="Delete User" href="update.php?j_email='.$j_email.'"><b>Delete</b></a></td>
        </tr>
      ';
  $i++;
}
mysqli_close($con);
$c=0;
if(isset($_GET['resetjambquiz'])){
  include("reset.php");
}else{
 echo '<a class="btn btn-danger" href="dash.php?q=19&resetjambquiz=rank" role="button">Delete All</a>';
}
if(isset($_GET['selmobiles'])){
  include("reset.php");
}else
{
  echo '&nbsp&nbsp;<a class="btn btn-primary" href="jambquiz_mobiles.txt" role="button">Download All mobile</a>';
  echo '&nbsp&nbsp;<a class="btn btn-secondary" href="update.php?activate=jamb&active=2" role="button">Activate Quiz</a>';
  echo '&nbsp&nbsp;<a class="btn btn-secondary" href="update.php?activate=jamb&active=3" role="button">Deactivate Quiz</a>';
}
echo '</tbody>
    </table>
  </div>
</div>
';
}

?>
<!--View Registered jambquiz Ends-->

<!--View Non-Used jambID start-->
<?php if(@$_GET['q']==20) {
  include('database/db.php');
$result = mysqli_query($con,"SELECT * FROM `legendquiz` WHERE `reg_status`= '$reg_status'") or die('Error');

echo  '<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Non-Used JambID
  <!-- Navbar Search Ends--></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th><b>S.N.</b></th>
          <th><b>Unique ID</b></th>
          <th><b>Action</b></th>
          </tr>
        </thead>
      <tfoot>
        <tr>
          <th>S.N</th>
          <th>Unique ID</th>
          <th>Action</th>
        </tr>
      </tfoot>
    <tbody>
  ';
$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
  $legend_id = $row['lid'];

  echo '
  <tr>
    <td>'.$i.'</td>
    <td>'.$legend_id.'</td>
    <td><a title="Delete ProfID" href="update.php?pid='.$legend_id.'"><b>Delete</b></a></td>
  </tr>
  ';
  $i++;
}
mysqli_close($con);
$c=0;
echo '</tbody>
    </table>
  </div>
</div>

';
}

?>
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
    <input type="file" class="form-control" id="b_image" name="file" required>     
    
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

$result = mysqli_query($con,"SELECT * FROM `blog` ORDER BY `blog_date` DESC ") or die('Error');

echo  '<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>


  Blog Table
  <!-- Navbar Search Ends--></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th><b>S.N.</b></th>
          <th><b>Title</b></th>
          <th><b>Date</b></th>
          <th><b>Action</b></th>
          </tr>
        </thead>
      <tfoot>
        <tr>
          <th>S.N</th>
          <th>Title</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
      </tfoot>
    <tbody>
  ';
$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
  $blog_id = $row['blog_id'];
  $blog_title = $row['blog_title'];
  $blog_title = substr("$blog_title",0,60);
	$blog_date = $row['blog_date'];


  echo '
  
          <tr>
            <td>'.$i.'</td>
            <td>'.$blog_title.'</td>
            <td>'.$blog_date.'</td>
            <td><a href="update.php?q=rmnews&bid='.$blog_id.'" class="pull-right btn sub1" style="margin:0px;background:red"><b>Remove</b></a></b>
            <a href="dash.php?q=23&bid='.$blog_id.'" class="pull-right btn sub1" style="margin:0px;background:green"><b>Edit Detail</b></a></b></td>
          </tr>
  ';
  
  $i++;
}
mysqli_close($con);
$c=0;
echo '</tbody>
    </table>
  </div>
</div>

';
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
    <input type="file" class="form-control" id="b_image" name="file" value="'.$blog_image.'" required><img src="../blog_images/'.$blog_image.'" width= "60" height="60">   
    
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

echo  '
<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Subjects
  <!-- Navbar Search Ends--></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th><b>S.N.</b></th>
          <th><b>Subject Name</b></th>
          <th><b>Action</b></th>
          </tr>
        </thead>
      <tfoot>
        <tr>
          <th>S.N</th>
          <th>Subject Name</th>
          <th>Action</th>
        </tr>
      </tfoot>
    <tbody>
';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$subject_id = $row['subject_id'];
	$subject_title = $row['subject_title'];
  echo '
  
          <tr>
            <td>'.$c++.'</td>
            <td>'.$subject_title.'</td>
            <td><a title="Delete User" href="update.php?q=rmsub&sid='.$subject_id.'"><b>Remove</b></a></td>
          </tr>
  
    ';
}
echo '</table></div></div>';

}
?>
<!--View Subjects Ends-->

<!--add slider start-->
<?php
if(@$_GET['q']==25) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Slider Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=slider" enctype="multipart/form-data" method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="s_title">Enter Slider Title</label>  
  <div class="col-md-12">
  <input id="s_title" name="s_title" placeholder="Enter Slider Title" class="form-control input-md" type="text" />
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="s_body">Enter Slider Body</label>  
  <div class="col-md-12">
  <textarea rows="8" cols="8" name="s_body" class="form-control" placeholder="Body" ></textarea>  
  </div>
</div>

<div class="form-group">
<label for="s_image" class=""col-md-12 control-label">Slider Image:</label>
    <input type="file" class="form-control" id="s_image" name="file" required>     
    
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

<!--add slider ends-->

<!--view slider start-->
<?php if(@$_GET['q']==26) {
include('database/db.php');
$result = mysqli_query($con,"SELECT * FROM `slider` ORDER BY `slider_date` DESC ") or die('Error');

echo  '
<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Banner Table
  <!-- Navbar Search Ends--></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th><b>S.N.</b></th>
          <th><b>Title</b></th>
          <th><b>Date</b></th>
          <th><b>Action</b></th>
          </tr>
        </thead>
      <tfoot>
        <tr>
          <th>S.N</th>
          <th>Title</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
      </tfoot>
    <tbody>

';
$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
  $slider_id = $row['slider_id'];
  $slider_title = $row['slider_title'];
	$slider_date = $row['slider_date'];

  echo '
  <tr>
    <td>'.$i.'</td>
    <td>'.$slider_title.'</td>
    <td>'.$slider_date.'</td>
    <td><a href="update.php?q=rmslider&sid='.$slider_id.'" class="pull-right btn sub1" style="margin:0px;background:red"><b>Remove</b></a></b>
    <a href="dash.php?q=27&sid='.$slider_id.'" class="pull-right btn sub1" style="margin:0px;background:green"><b>Edit Detail</b></a></b></td>
  </tr>
  
  ';
  
  $i++;
}
mysqli_close($con);
$c=0;
echo '<tbody>
    </table>
  </div>
</div>

';
}
?>
<!--view slider end-->

<!--Edit SLIDER Details starts-->
<?php
if(@$_GET['q']==27) {
  include('database/db.php');
  $sid=@$_GET['sid'];
  $result = mysqli_query($con,"SELECT * FROM `slider` WHERE `slider_id`='$sid'") or die('Error560');
  while($row=mysqli_fetch_array($result) )
  {
    $slider_title=$row['slider_title'];
    $slider_body=$row['slider_body'];
    $slider_date=$row['slider_date'];
    $slider_image=$row['ImageName'];

  }

  echo ' 
  <div class="row">
  <span class="title1" style="margin-left:40%;font-size:30px;"><b>Edit Slider Details</b></span><br /><br />
  <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=editslider&sid='.$sid.'" enctype="multipart/form-data" method="POST">
  <fieldset>


  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-12 control-label" for="s_title">Title</label>  
    <div class="col-md-12">
    <input id="s_title" name="s_title" placeholder="" value="'.$slider_title.'" class="form-control input-md" type="text">
      
    </div>
  </div>


  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-12 control-label" for="s_body">Description</label>  
    <div class="col-md-12">
    <textarea rows="8" cols="8" name="s_body" class="form-control" placeholder="">'.$slider_body.'</textarea>  
    </div>
  </div>

  <div class="form-group">
<label for="s_image" class=""col-md-12 control-label">Image:</label>
    <input type="file" class="form-control" id="s_image" name="file" value="'.$slider_image.'" required><img src="../sliderImage/'.$slider_image.'" width= "60" height="60">   
    
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
<!--Edit SLIDER Detail end-->



<!--view Ent&Sports News start-->
<?php if(@$_GET['q']=='28') {
   include('database/db.php');


$result = mysqli_query($con,"SELECT * FROM `ent_sports` ORDER BY `ent_date` DESC ") or die('Error');

echo  '

<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Entertainment And Sports Table
  <!-- Navbar Search Ends--></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th><b>S.N.</b></th>
          <th><b>Title</b></th>
          <th><b>Date</b></th>
          <th><b>Action</b></th>
          </tr>
        </thead>
      <tfoot>
        <tr>
          <th>S.N</th>
          <th>Title</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
      </tfoot>
    <tbody>
';
$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
  $ent_id = $row['ent_id'];
  $ent_title = $row['ent_title'];
  $ent_title = substr("$ent_title",0,60);
  $ent_title = $ent_title.'...';
    $ent_date = $row['ent_date'];
    $approved = $row['approved'];
  
  echo '
  
  <tr>
    <td>'.$i.'</td>
    <td>'.$ent_title.'</td>
    <td>'.$ent_date.'</td>
  ';
  if($approved==0){
  echo '
  <td><a href="update.php?q=approve&ent_id='.$ent_id.'" class="pull-right btn sub1" style="margin:0px;background:pink"><b>Approve</b></a>
  <a href="dash.php?q=28&ent_id='.$ent_id.'" class="pull-right btn sub1" style="margin:0px;background:green"><b>Read</b></a>
 <a href="update.php?ent_post=delete&ent_id='.$ent_id.'" class="pull-right btn sub1" style="margin:0px;background:red"><b>Delete</b></a></b></td>
  </tr>';
  }
  else{
    echo '
    <td><a href="dash.php?q=28&ent_id='.$ent_id.'" class="pull-right btn sub1" style="margin:0px;background:green"><b>Read</b></a></b>
    <a href="update.php?ent_post=delete&ent_id='.$ent_id.'" class="pull-right btn sub1" style="margin:0px;background:red"><b>Delete</b></a></b></td>
    </tr>';
  }
  $i++;
}
mysqli_close($con);
$c=0;
echo '</tbody>
    </table>
  </div>
</div>

';
}
?>
<!--view Ent & Sports News end-->

<!--Ent & Sports reading portion start-->
<?php if(@$_GET['ent_id']) {
   include('database/db.php');
echo '<br />';
$id=@$_GET['ent_id'];
$result = mysqli_query($con,"SELECT * FROM `ent_sports` WHERE ent_id='$id' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$name = $row['poster_name'];
  $subject = $row['ent_title'];
  $ent_image = $row['ent_image'];
	$date = $row['ent_date'];
	$date= date("d-m-Y",strtotime($date));
  $body = $row['ent_body'];
  $approved = $row['approved'];
	
  echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>'.$subject.'</b></h1>';
  
  if($approved==0){
    echo '<a href="update.php?q=approve&ent_id='.$ent_id.'" class="pull-right btn sub1" style="margin:0px;background:pink"><b>Approve</b></a>';
    }
    else{
    
  }
  if($ent_image==""){
    echo '<p style="text-align:center;"><img src="../blog_images/avatar.png" alt="" width="200" height="200"/>';
  }else{
    echo '<p style="text-align:center;"><img src="../blog_images/'.$ent_image.'" alt="" width="60" height="60"/>';
  } 

  echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>DATE:</b>&nbsp;'.$date.'</span>
  <span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;</span><span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;'.$name.'</span><br /></div class"panel-body">'.$body.'</div></div></div>';}

 
}?>
<!--Ent & Sports reading portion closed-->

<!--add WAEC quiz start-->
<?php
if(@$_GET['q']==29 && !(@$_GET['step']) ) {
  include('database/db.php');
$sel_sub = mysqli_query($con,"SELECT * FROM `subjects`") or die('Error');

echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter WAEC Quiz Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addwaecquiz"  method="POST">
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
<!--add WAEC quiz end-->

<!--add WAEC quiz step2 start-->
<?php
if(@$_GET['q']==30 && (@$_GET['step'])==2 ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter WAEC Question Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addwaecqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
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
?><!--add WAEC quiz step 2 end-->

<!--add JAMB quiz start-->
<?php
if(@$_GET['q']==31 && !(@$_GET['step']) ) {
  include('database/db.php');
$sel_sub = mysqli_query($con,"SELECT * FROM `subjects`") or die('Error');

echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter JAMB Quiz Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addjambquiz"  method="POST">
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
<!--add JAMB quiz end-->

<!--add JAMB quiz step2 start-->
<?php
if(@$_GET['q']==32 && (@$_GET['step'])==2 ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter JAMB Question Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addjambqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
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
?><!--add JAMB quiz step 2 end-->

<!--View WAEC quiz starts-->
<?php if(@$_GET['q']==33) {
include('database/db.php');
$email = $_SESSION['username'];
$result = mysqli_query($con,"SELECT * FROM waecquiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><b>WAEC QUIZ</b><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
    $time = $row['waectime'];
	$eid = $row['eid'];
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
  <td><b><a href="update.php?q=rmwaecquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><b>Remove</b></a></b>
  <a href="dash.php?q=35&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:green"><b>Edit Detail</b></a></b>
  <a href="dash.php?q=37&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:yellow"><b>Edit Question</b></a></b></td></tr>';
}
$c=0;
echo '</table></div></div>';

}
?>

<!--View JAMB quiz starts-->
<?php if(@$_GET['q']==34) {
include('database/db.php');
$email = $_SESSION['username'];
$result = mysqli_query($con,"SELECT * FROM jambquiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><b>JAMB QUIZ</b><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
    $time = $row['jambtime'];
	$eid = $row['eid'];
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
  <td><b><a href="update.php?q=rmjambquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><b>Remove</b></a></b>
  <a href="dash.php?q=36&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:green"><b>Edit Detail</b></a></b>
  <a href="dash.php?q=38&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:yellow"><b>Edit Question</b></a></b></td></tr>';
}
$c=0;
echo '</table></div></div>';

}
?>

<!--Edit waec quiz Details starts-->
<?php
if(@$_GET['q']==35) {
  include('database/db.php');
  $eid=@$_GET['eid'];
  $result = mysqli_query($con,"SELECT * FROM waecquiz WHERE eid='$eid'") or die('Error');
  while($row=mysqli_fetch_array($result) )
  {
    $title=$row['title'];
    $sahi=$row['sahi'];
    $wrong=$row['wrong'];
    $time=$row['waectime'];
    $tag=$row['tag'];
    $desc=$row['intro'];
  }

  echo ' 
  <div class="row">
  <span class="title1" style="margin-left:40%;font-size:30px;"><b>Edit Quiz Details</b></span><br /><br />
  <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=editwaecquiz&eid='.$eid.'"  method="POST">
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
<!--Edit waec quiz Detail end-->

<!--Edit jamb quiz Details starts-->
<?php
if(@$_GET['q']==36) {
  include('database/db.php');
  $eid=@$_GET['eid'];
  $result = mysqli_query($con,"SELECT * FROM jambquiz WHERE eid='$eid'") or die('Error');
  while($row=mysqli_fetch_array($result) )
  {
    $title=$row['title'];
    $sahi=$row['sahi'];
    $wrong=$row['wrong'];
    $time=$row['jambtime'];
    $tag=$row['tag'];
    $desc=$row['intro'];
  }

  echo ' 
  <div class="row">
  <span class="title1" style="margin-left:40%;font-size:30px;"><b>Edit Quiz Details</b></span><br /><br />
  <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=editjambquiz&eid='.$eid.'"  method="POST">
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
<!--Edit jamb quiz Detail end-->

<!--Edit waec quiz questions start-->
<?php
if(@$_GET['q']==37) {
  include('database/db.php');
  $eid=@$_GET['eid'];
  $result = mysqli_query($con,"SELECT * FROM waecquiz WHERE eid='$eid'") or die('ErrorC');
  while($row=mysqli_fetch_array($result) )
  {
    $total=$row['total'];
  }
  echo ' 
  <div class="row">
  <span class="title1" style="margin-left:40%;font-size:30px;"><b>Edit WAEC Questions </b></span><br /><br />
  <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=editwaecqns&n='.$total.'&eid='.$eid.'&ch=4 "  method="POST">
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
<!--Edit waec quiz question end-->

<!--Edit jamb quiz questions start-->
<?php
if(@$_GET['q']==38) {
  include('database/db.php');
  $eid=@$_GET['eid'];
  $result = mysqli_query($con,"SELECT * FROM jambquiz WHERE eid='$eid'") or die('ErrorC');
  while($row=mysqli_fetch_array($result) )
  {
    $total=$row['total'];
  }
  echo ' 
  <div class="row">
  <span class="title1" style="margin-left:40%;font-size:30px;"><b>Edit JAMB Questions </b></span><br /><br />
  <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=editjambqns&n='.$total.'&eid='.$eid.'&ch=4 "  method="POST">
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
<!--Edit waec quiz question end-->

<?php
//waec ranking start
if(@$_GET['q']== 39) 
{
  include('database/db.php');
 
  if(isset($_GET['resetwaecrank'])){
    include("reset.php");
 }else{
   echo '<a class="btn btn-danger" href="dash.php?q=39&resetwaecrank=rank" role="button">Delete All</a>';
 }
 
$que=mysqli_query($con,"SELECT * FROM `waecrank`  ORDER BY `score` DESC " )or die('Error223');
echo  '


<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  WAEC RANKED USERS
  <!-- Navbar Search Ends--></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th><b>Rank.</b></th>
          <th><b>Name</b></th>
          <th><b>Gender</b></th>
          <th><b>State</b></th>
          <th><b>Score</b></th>
          <th><b>Action</b></th>
          </tr>
        </thead>
      <tfoot>
        <tr>
          <th>Rank</th>
          <th>Name</th>
          <th>Gender</th>
          <th>State</th>
          <th>Score</th>
          <th>Action</th>
        </tr>
      </tfoot>
    <tbody>
  ';
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
  }
  $c++;
      echo '
          <tr>
            <td>'.$i.'</td>
            <td>'.$firstname.' '.$lastname.'</td>
            <td>'.$gender.'</td>
            <td>'.$state.'</td>
            <td>'.$s.'</td>
            <td><a title="Delete User" href="update.php?del_waecrank='.$email.'"><b>Delete</b></a></td>
          </tr>
      ';
  $i++;
}
mysqli_close($con);
echo '<tbody>
    </table>
  </div>
</div>';
}

?>

<?php
//Jamb ranking start
if(@$_GET['q']== 40) {
  include('database/db.php');
  
  if(isset($_GET['resetjambrank'])){
    include("reset.php");
 }else{
   echo '<a class="btn btn-danger" href="dash.php?q=40&resetjambrank=rank" role="button">Delete All</a>';
 }
$que=mysqli_query($con,"SELECT * FROM `jambrank`  ORDER BY `score` DESC " )or die('Error223');
echo  '

<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  JAMB RANKED USERS
  <!-- Navbar Search Ends--></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th><b>Rank</b></th>
          <th><b>Name</b></th>
          <th><b>Gender</b></th>
          <th><b>State</b></th>
          <th><b>Score</b></th>
          <th><b>Action</b></th>
          </tr>
        </thead>
      <tfoot>
        <tr>
          <th>Rank</th>
          <th>Name</th>
          <th>Gender</th>
          <th>State</th>
          <th>Score</th>
          <th>Action</th>
        </tr>
      </tfoot>
    <tbody>
  ';
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

  }
  $c++;
  echo '
  
  <tr>
    <td>'.$i.'</td>
    <td>'.$firstname.' '.$lastname.'</td>
    <td>'.$gender.'</td>
    <td>'.$state.'</td>
    <td>'.$score.'</td>
    <td><a title="Delete User" href="update.php?del_jambrank='.$email.'"><b>Delete</b></a></td>
  </tr>
  ';
  $i++;
}
mysqli_close($con);
echo '</tbody>
    </table>
  </div>
</div>';



}
?>

<!--add Tech News start-->
<?php
if(@$_GET['q']==41) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Tech News Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=technews" enctype="multipart/form-data" method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="t_title">Enter Tech News Title</label>  
  <div class="col-md-12">
  <input id="t_title" name="t_title" placeholder="Enter News Title" class="form-control input-md" type="text" required/>
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="t_body">Enter Tech News Body</label>  
  <div class="col-md-12">
  <textarea rows="8" cols="8" name="t_body" class="form-control" placeholder="Body" ></textarea>  
  </div>
</div>

<div class="form-group">
<label for="t_image" class=""col-md-12 control-label">Image:</label>
    <input type="file" class="form-control" id="t_image" name="file" >     
    
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

<!--add Tech news ends-->

<!--view Tech News start-->
<?php if(@$_GET['q']=='42') {
   include('database/db.php');

$result = mysqli_query($con,"SELECT * FROM `tech_news` ORDER BY `technews_date` DESC ") or die('Error');

echo  '


<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Tech News Table
  <!-- Navbar Search Ends--></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th><b>S.N.</b></th>
          <th><b>Title</b></th>
          <th><b>Date</b></th>
          <th><b>Action</b></th>
          </tr>
        </thead>
      <tfoot>
        <tr>
          <th>S.N</th>
          <th>Title</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
      </tfoot>
    <tbody>

';
$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
  $technews_id = $row['technews_id'];
  $technews_title = $row['technews_title'];
  $technews_title = substr("$technews_title",0,60);
  $technews_title = $technews_title.'...';
    $technews_date = $row['technews_date'];
    $approved = $row['approved'];

  
  echo '
          <tr>
            <td>'.$i.'</td>
            <td>'.$technews_title.'</td>
            <td>'.$technews_date.'</td>
          
  
      ';
  if($approved==0){
  echo '
  <td><a href="dash.php?q=28&ent_id='.$technews_id.'" class="pull-right btn sub1" style="margin:0px;background:green"><b>Read</b></a></b>
 <a href="update.php?q=approve&ent_id='.$technews_id.'" class="pull-right btn sub1" style="margin:0px;background:pink"><b>Approve</b></a>
 <a href="update.php?ent_post=delete&ent_id='.$technews_id.'" class="pull-right btn sub1" style="margin:0px;background:red"><b>Delete</b></a></b></td>
  </tr>';
  }
  else{
    echo '
    <td><a href="dash.php?q=43&tid='.$technews_id.'" class="pull-right btn sub1" style="margin:0px;background:green"><b>Edit</b></a></b>
    <a href="update.php?q=rmtech&t_id='.$technews_id.'" class="pull-right btn sub1" style="margin:0px;background:red"><b>Delete</b></a></b></td>
    </tr>';
  }
  $i++;
}
mysqli_close($con);
$c=0;
echo '</tbody>
    </table>
  </div>
</div>

';
}
?>
<!--view Tech News end-->

<!--Edit Tech NEWS Details starts-->
<?php
if(@$_GET['q']==43) {
  include('database/db.php');
  $tid=@$_GET['tid'];
  $result = mysqli_query($con,"SELECT * FROM `tech_news` WHERE `technews_id`='$tid'") or die('Error560');
  while($row=mysqli_fetch_array($result) )
  {
    $technews_title=$row['technews_title'];
    $technews_body=$row['technews_body'];
    $technews_date=$row['technews_date'];
    $technews_image=$row['technews_image'];

  }

  echo ' 
  <div class="row">
  <span class="title1" style="margin-left:40%;font-size:30px;"><b>Edit News Details</b></span><br /><br />
  <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=editTechNews&tid='.$tid.'" enctype="multipart/form-data" method="POST">
  <fieldset>


  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-12 control-label" for="t_title">Title</label>  
    <div class="col-md-12">
    <input id="t_title" name="t_title" placeholder="" value="'.$technews_title.'" class="form-control input-md" type="text">
      
    </div>
  </div>


  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-12 control-label" for="t_body">Description</label>  
    <div class="col-md-12">
    <textarea rows="8" cols="8" name="t_body" class="form-control" placeholder="">'.$technews_body.'</textarea>  
    </div>
  </div>

  <div class="form-group">
<label for="t_image" class=""col-md-12 control-label">Image:</label>
    <input type="file" class="form-control" id="t_image" name="file" value="'.$technews_image.'">'; 
    if($technews_image!=""){ echo '<img src="../blog_images/'.$technews_image.'" width= "60" height="60"> ';}
    echo '  
    
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
<!--Edit Tech NEWS Detail end-->


<!--View Comments Starts-->
<?php if(@$_GET['q']=='44') {
   include('database/db.php');



$result = mysqli_query($con,"SELECT * FROM `comments` ORDER BY `timestamp` DESC ") or die('Error');

echo  '


<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Comment Table
  <!-- Navbar Search Ends--></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th><b>S.N.</b></th>
          <th><b>Message</b></th>
          <th><b>Posted By</b></th>
          <th><b>Category</b></th>
          <th><b>Time</b></th>
          <th><b>Action</b></th>
          </tr>
        </thead>
      <tfoot>
        <tr>
          <th>S.N</th>
          <th>Message</th>
          <th>Posted By</th>
          <th>Category</th>
          <th>Time</th>
          <th>Action</th>
        </tr>
      </tfoot>
    <tbody>
  ';
$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
  $comment_id = $row['comment_id'];
  $message = $row['message'];
  $message = substr("$message",0,60);
  $message = $message.'...';
    $poster = $row['first_name'];
    $timestamp = $row['timestamp'];
    $category = $row['category'];

  
  echo '
  
          <tr>
            <td>'.$i.'</td>
            <td>'.$message.'</td>
            <td>'.$poster.'</td>
            <td>'.$category.'</td>
            <td>'.$timestamp.'</td>
            <td><a href="" class="pull-right btn sub1" style="margin:0px;background:green"><b>Reply</b></a></b>
            <a href="update.php?q=rmcmt&c_id='.$comment_id.'" class="pull-right btn sub1" style="margin:0px;background:red"><b>Delete</b></a></b></td>
          </tr>
  
  ';
  $i++;
}
mysqli_close($con);
$c=0;
echo '</tbody>
    </table>
  </div>
</div>

';
}
?>
<!--View Comments ends-->
<?php 
//Airtime history start

if(@$_GET['q']==45) 
{
  include('database/db.php');
  
  if(isset($_GET['resetrank'])){
    include("reset.php");
 }else{
   echo '<a class="btn btn-danger" href="dash.php?q=2&resetrank=rank" role="button">Delete All</a>';
 }

$que=mysqli_query($con,"SELECT * FROM `rank`  ORDER BY `score` DESC " )or die('Error223');
$quiz=mysqli_query($con, "SELECT * FROM `quiz`")or die('Error224');
$history=mysqli_query($con, "SELECT * FROM `history`")or die('Error224');
echo  '
<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Airtime Quiz HISTORY Table
  <!-- Navbar Search Ends--></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th><b>Rank</b></th>
            <th><b>Name</b></th>
            <th><b>Email</b></th>
            <th><b>Mobile</b></th>';
            while($row = mysqli_fetch_array($quiz)) {
              $title = $row['title'];
              echo'
            <th><b>'.$title.'</b></th>';
            }
            echo '
            <th><b>Total Score</b></th>
          </tr>
        </thead>
      <tfoot>
        <tr>
          <th><b>Rank</b></th>
          <th><b>Name</b></th>
          <th><b>Email</b></th>
          <th><b>Mobile</b></th>';
          $quiz2=mysqli_query($con, "SELECT * FROM `quiz`")or die('Error224');
          while($row = mysqli_fetch_array($quiz2)) {
            $title = $row['title'];
            $exam_id = $row['eid'];
            echo'
          <th><b>'.$title.'</b></th>';
          }
          echo '
          <th><b>Total Score</b></th>
        </tr>
      </tfoot>
    <tbody>
  ';
$c=0;
$i=1;
while($row=mysqli_fetch_array($que) )
{
  $e=$row['email'];
  $s=$row['score'];
  $q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error2300');
  $sel_ref=mysqli_query($con,"SELECT * FROM `referrer` WHERE `ref_email`='$e' " )or die('Error231');
  $ref_bonus = 0;
  while($row=mysqli_fetch_array($sel_ref) )
  {
    $ref_bonus = $row['ref_bonus'];
  }
  while($row=mysqli_fetch_array($q12) )
  {
    $firstname = $row['first_name'];
    $lastname = $row['last_name'];
    $dob = $row['dob'];
    $gender = $row['gender'];
    $email = $row['email'];
    $state = $row['state'];
    $mobile = $row['mobile'];
  }
  $c++;
  echo '
          <tr>
            <td>'.$i.'</td> 
            <td>'.$firstname.' '.$lastname.'</td>
            <td>'.$email.'</td>
            <td>'.$mobile.'</td>';
                $quiz3=mysqli_query($con, "SELECT * FROM `quiz`")or die('Error224');
                $total_score = 0;
                while($row = mysqli_fetch_array($quiz3)) {
                  $title = $row['title'];
                  $exam_id = $row['eid'];
                  $history2=mysqli_query($con, "SELECT * FROM `history` WHERE eid='$exam_id' AND email='$e'")or die('Error224');
                  $score = '';
                  
                  while($row = mysqli_fetch_array($history2)) {
                    $score = $row['score'];
                    $total_score += $row['score'];
                    echo'
                    <td>'.$score.'</td>';
                  }
                  if($score==''){
                    echo'
                      <td></td>';
                  }
                }
          echo '
            <td><b>'.$total_score.'</b></td>
          <tr>
          ';
  $i++;
}
mysqli_close($con);
echo '</tbody>
    </table>
  </div>
</div>';
}

//History Update
if(@$_GET['q']== 46) 
{
  include('database/db.php');
  
  if(isset($_GET['resetrank'])){
    include("reset.php");
 }else{
   echo '<a class="btn btn-danger" href="dash.php?q=2&resetrank=rank" role="button">Delete All</a>';
 }

$que=mysqli_query($con,"SELECT * FROM `history`  ORDER BY `date` DESC " )or die('Error223');
echo  '


<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Airtime History Update Table
  <!-- Navbar Search Ends--></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th><b>S/N</b></th>
          <th><b>Name</b></th>
          <th><b>Email</b></th>
          <th><b>Title</b></th>
          <th><b>Score</b></th>
          <th><b>Level</b></th>
          <th><b>Right</b></th>
          <th><b>Wrong</b></th>
          <th><b>delete</b></th>
          </tr>
        </thead>
        <tfoot>
          <tr>
          <th><b>S/N</b></th>
          <th><b>Name</b></th>
          <th><b>Email</b></th>
          <th><b>Title</b></th>
          <th><b>Score</b></th>
          <th><b>Level</b></th>
          <th><b>Right</b></th>
          <th><b>Wrong</b></th>
          <th><b>delete</b></th>
          </tr>
        </tfoot>
    <tbody>
  ';
$c=0;
$i=1;
while($row=mysqli_fetch_array($que) )
{
  $e=$row['email'];
  $s=$row['score'];
  $score = $row['score'];
    $level = $row['level'];
    $right = $row['sahi'];
    $wrong = $row['wrong'];
    $eid = $row['eid'];
    $q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error2300');
    $sel_quiz=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid' " )or die('Error2301');
    while($row=mysqli_fetch_array($sel_quiz) )
    {
      $subject_title = $row['title'];
    }
  while($row=mysqli_fetch_array($q12) )
  {
    $firstname = $row['first_name'];
    $lastname = $row['last_name'];
    $dob = $row['dob'];
    $gender = $row['gender'];
      $email = $row['email'];
    $state = $row['state'];
    $mobile = $row['mobile'];
  }
  $c++;
  echo '
          <tr>
            <td>'.$i.'</td>
            <td>'.$firstname.' '.$lastname.'</td>
            <td>'.$email.'</td>
            <td>'.$subject_title.'</td>
            <td>'.$score.'</td>
            <td>'.$level.'</td>
            <td>'.$right.'</td>
            <td>'.$wrong.'</td>
          
  <td><a title="Delete User" href="update.php?history_eid='.$eid.'&email='.$email.'&score='.$score.'"><b style="color: red;">Delete</b></a></td></tr>';
  $i++;
}
mysqli_close($con);
echo '</tbody></table></div></div>';
}
?>

<!--View Blocked Airtimequiz Users start-->
<?php if(@$_GET['q']==47) {
  include('database/db.php');

$result = mysqli_query($con,"SELECT * FROM `freeairtime` WHERE `blocked`='1'") or die('Error');
echo  '<div class="card mb-3">
<div class="card-header">
<i class="fas fa-table"></i>
  Blocked Airtimequiz Users
  <!-- Navbar Search Ends--></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th><b>S.N.</b></th>
          <th><b>Name</b></th>
          <th><b>Email</b></th>
          <th><b>Unique ID</b></th>
          <th><b>Phone Number</b></th>
          <th><b>Reg Date</b></th>
          <th><b>Action</b></th>
          </tr>
        </thead>
      <tfoot>
        <tr>
          <th>S.N</th>
          <th>Name</th>
          <th>Email</th>
          <th>Unique ID</th>
          <th>Phone Number</th>
          <th>Reg Date</th>
          <th>Action</th>
        </tr>
      </tfoot>
    <tbody>
';
$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
  $firstname = $row['firstname'];
  $lastname = $row['lastname'];
  $reg_date = $row['regdate'];
  $mobile = $row['mobile'];
  $a_email = $row['email'];
  $sub_id = $row['subid'];
  
  echo '
    <tr>
    <td>'.$i.'</td>
    <td>'.$firstname.' '.$lastname.'</td>
    <td>'.$a_email.'</td>
    <td>'.$sub_id.'</td>
    <td>'.$mobile.'</td>
    <td>'.$reg_date.'</td>
    <td><a title="Unblock User" href="update.php?user_email='.$a_email.'"><b>Unblock</b></a></td>
  </tr>
  ';
  $i++;
}
mysqli_close($con);
$c=0;
  echo '</tbody>
      </table>
  </div>
</div>

';
}

?>
<!--View Blocked Airtimequiz Users Ends-->

</div>
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
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>

<?php } ?>

<!-- Reset airtime quiz Rank Starts-->
<?php
if (isset($_GET['resetrank'])) {
  include('database/db.php');
    echo '<form action="" method="post" enctype="multipart/form-data">
<div class="row">
  <div class="col-md-6 padding-top-10">
    <label for="m_gender" class="control-label" style="color: red;">Do You Really Want To Delete All Data in Airtime Quiz Rank?</label><br>
    <button type="submit" name="yes" class="btn btn-danger">Yes,i do</button>
    <button type="submit" name="no" class="btn btn-success">No,just joking</button>
  </div>
</div>
</form>';
 
  if (isset($_POST['yes'])) {

    $reset_rank = "DELETE FROM `rank`";
    $run_reset = mysqli_query($con,$reset_rank);
    $reset_history = "DELETE FROM `history`";
    $run_history = mysqli_query($con,$reset_history);
    echo "<script>alert('Rank Has Been Reset!')</script>";
    echo"<script>window.open('dash.php?q=2','_self')</script>";
      exit();
  }
  if (isset($_POST['no'])) {
    echo "<script>alert('Do Not Joke Again!')</script>";
        echo"<script>window.open('dash.php?q=2','_self')</script>";
      exit();
  }
  }

// Reset airtime quiz Rank Ends

//Reset Waec quiz Rank Starts

if (isset($_GET['resetwaecrank'])) {
  include('database/db.php');
    echo '<form action="" method="post" enctype="multipart/form-data">
<div class="row">
  <div class="col-md-6 padding-top-10">
    <label for="m_gender" class="control-label" style="color: red;">Do You Really Want To Delete All Data in WAEC Rank?</label><br>
    <button type="submit" name="yes" class="btn btn-danger">Yes,i do</button>
    <button type="submit" name="no" class="btn btn-success">No,just joking</button>
  </div>
</div>
</form>';
 
  if (isset($_POST['yes'])) {

    $reset_rank = "DELETE FROM `waecrank`";
    $run_reset = mysqli_query($con,$reset_rank);
    $reset_history = "DELETE FROM `waechistory`";
    $run_history = mysqli_query($con,$reset_history);
    if($run_history){
    echo "<script>alert('Waec Rank Has Been Reset!')</script>";
    echo"<script>window.open('dash.php?q=39','_self')</script>";
      exit();
    }
  }
  if (isset($_POST['no'])) {
    echo "<script>alert('Do Not Joke Again!')</script>";
        echo"<script>window.open('dash.php?q=39','_self')</script>";
      exit();
  }
  }

//Reset waec quiz rank Rank Ends

//Reset jamb quiz Rank Starts

if (isset($_GET['resetjambrank'])) {
  include('database/db.php');

    echo '<form action="" method="post" enctype="multipart/form-data">
<div class="row">
  <div class="col-md-6 padding-top-10">
    <label for="m_gender" class="control-label" style="color: red;">Do You Really Want To Delete All Data in Jamb Rank?</label><br>
    <button type="submit" name="yes" class="btn btn-danger">Yes,i do</button>
    <button type="submit" name="no" class="btn btn-success">No,just joking</button>
  </div>
</div>
</form>';

  if (isset($_POST['yes'])) {

    $reset_rank = "DELETE FROM `jambrank`";
    $run_reset = mysqli_query($con,$reset_rank);
    $reset_history = "DELETE FROM `jambhistory`";
    $run_history = mysqli_query($con,$reset_history);
    echo "<script>alert('Jamb Rank Has Been Reset!')</script>";
    echo"<script>window.open('dash.php?q=40','_self')</script>";
      exit();
  }
  if (isset($_POST['no'])) {
    echo "<script>alert('Do Not Joke Again!')</script>";
        echo"<script>window.open('dash.php?q=40','_self')</script>";
      exit();
  }
  }

//Reset jamb quiz rank Rank Ends

//Reset WaecQuiz Starts

if (isset($_GET['resetprofquiz'])) {
  include('database/db.php');
    echo '<form action="" method="post" enctype="multipart/form-data">
<div class="row">
  <div class="col-md-6 padding-top-10">
    <label for="m_gender" class="control-label" style="color: red;">Do You Really Want To Delete All Data in ProfQuiz?</label><br>
    <button type="submit" name="yes" class="btn btn-danger">Yes,i do</button>
    <button type="submit" name="no" class="btn btn-success">No,just joking</button>
  </div>
</div>
</form>';
 
  if (isset($_POST['yes'])) {
    include('database/db.php');
    $reset_rank = "DELETE FROM `profquiz`";
    $run_reset = mysqli_query($con,$reset_rank);
    echo "<script>alert('Data Has Been Reset!')</script>";
    echo"<script>window.open('dash.php?q=11','_self')</script>";
      exit();
  }
  if (isset($_POST['no'])) {
    echo "<script>alert('Do Not Joke Again!')</script>";
        echo"<script>window.open('dash.php?q=11','_self')</script>";
      exit();
  }
  }

//Reset WaecQuiz Ends

//Reset JambQuiz Starts

if (isset($_GET['resetjambquiz'])) {
  include('database/db.php');
    echo '<form action="" method="post" enctype="multipart/form-data">
<div class="row">
  <div class="col-md-6 padding-top-10">
    <label for="m_gender" class="control-label" style="color: red;">Do You Really Want To Delete All Data in LegendQuiz?</label><br>
    <button type="submit" name="yes" class="btn btn-danger">Yes,i do</button>
    <button type="submit" name="no" class="btn btn-success">No,just joking</button>
  </div>
</div>
</form>';
 
  if (isset($_POST['yes'])) {

    $reset_rank = "DELETE FROM `legendquiz`";
    $run_reset = mysqli_query($con,$reset_rank);
    echo "<script>alert('Data Has Been Reset!')</script>";
    echo"<script>window.open('dash.php?q=19','_self')</script>";
      exit();
  }
  if (isset($_POST['no'])) {
    echo "<script>alert('Do Not Joke Again!')</script>";
        echo"<script>window.open('dash.php?q=19','_self')</script>";
      exit();
  }
  }

// Reset JambQuiz Ends

//Reset AirtimeQuiz Starts

if (isset($_GET['resetairtimequiz'])) {
  include('database/db.php');
    echo '<form action="" method="post" enctype="multipart/form-data">
<div class="row">
  <div class="col-md-6 padding-top-10">
    <label for="m_gender" class="control-label" style="color: red;">Do You Really Want To Delete All Data in Free Airtime Quiz?</label><br>
    <button type="submit" name="yes" class="btn btn-danger">Yes,i do</button>
    <button type="submit" name="no" class="btn btn-success">No,just joking</button>
  </div>
</div>
</form>';
 
  if (isset($_POST['yes'])) {

    $reset_rank = "DELETE FROM `freeairtime`";
    $run_reset = mysqli_query($con,$reset_rank);
    echo "<script>alert('Data Has Been Reset!')</script>";
    echo"<script>window.open('dash.php?q=13','_self')</script>";
      exit();
  }
  if (isset($_POST['no'])) {
    echo "<script>alert('Do Not Joke Again!')</script>";
        echo"<script>window.open('dash.php?q=13','_self')</script>";
      exit();
  }
  }
//Reset AirtimeQuiz Ends

//Reset Bonus Airtime Starts

if (isset($_GET['reset_bonus'])) {
  include('database/db.php');
$email = @$_GET['reset_bonus'];

    $reset_bonus = "UPDATE `referrer` SET `ref_bonus`='0' WHERE `ref_email`='$email'";
    $run_reset = mysqli_query($con,$reset_bonus);
    echo "<script>alert('Bonus Has Been Reset!')</script>";
    echo"<script>window.open('dash.php?q=2','_self')</script>";
      exit();
  }
  //Reset Bonus Airtime Ends

  //Archive Airtime Users

if (isset($_GET['win_count'])) {
  
  include('database/db.php');
$email = @$_GET['win_count'];

    $sel_user2=mysqli_query($con,"SELECT * FROM `freeairtime` WHERE `email`='$email' " );
    $win_count = 0;
    while($row = mysqli_fetch_array($sel_user2)) {
    $win_count = $row['win_count'];
    }
    //Check user block and referred status
    if($win_count>=2){
      
      $sel_user2=mysqli_query($con,"SELECT * FROM `referrer` WHERE `ref_email`='$email' " );
      $total_ref = 0;
      while($row = mysqli_fetch_array($sel_user2)) {
      $ref_bonus = $row['ref_bonus'];
      $total_ref = $row['total_referrers'];
      }
      if($total_ref>=5){
        
        //unblock airtime user 
        $unblock_user=mysqli_query($con,"UPDATE `freeairtime` SET `win_count`='0', `blocked`='0' WHERE `email`='$email'")or die('Error995');
				$update_total_ref=mysqli_query($con,"UPDATE `referrer` SET `total_referrers`='0' WHERE `ref_email`='$email'")or die('Error9956');
        echo "<script>alert('User Entered Next Level!')</script>";
        echo"<script>window.open('dash.php?q=2','_self')</script>";
        exit();
      }else{  
        //block airtime user
        if($win_count==2){
          $win_count = $win_count + 1;
          $block_user = "UPDATE `freeairtime` SET `win_count`='$win_count', `blocked`='1' WHERE `email`='$email'";
          $run_reset = mysqli_query($con,$block_user);
        }
        echo "<script>alert('User Blocked!')</script>";
        echo"<script>window.open('dash.php?q=2','_self')</script>";
        exit();
      }
    }
    else{
      $win_count = $win_count + 1;
      $update_win = "UPDATE `freeairtime` SET `win_count`='$win_count' WHERE `email`='$email'";
      $run_reset = mysqli_query($con,$update_win);
      echo "<script>alert('Winner Updated!')</script>";
      echo"<script>window.open('dash.php?q=2','_self')</script>";
      exit();
    }
  }

//SELECT REGISTERED FREE AIRTIME EMAIL
  if (isset($_GET['copy_email'])) {
  include('database/db.php');

  $sel_email=mysqli_query($con,"SELECT * FROM `freeairtime`" );
    
    while($row = mysqli_fetch_array($sel_email)) {
    $user_email = $row['email'];

      echo $user_email,",";
    }
  }
?>

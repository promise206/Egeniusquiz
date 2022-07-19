<?php
$sel_sub = mysqli_query($con,"SELECT * FROM `profquiz` WHERE `email`='$user'") or die('Error');
          while($row = mysqli_fetch_array($sel_sub)) {
            $sub1 = $row['sub1'];
            $sub2 = $row['sub2'];
            $sub3 = $row['sub3'];
            $sub4 = $row['sub4'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
          }
          echo '<br><br><br><br><p style="color:red;"><b><br><br></b></p>
          <h1 style="text-align: center; color: #46594c;font-size: 20px; font-weight: bolder;">Update Registered WAEC Quiz</h1>
          <form role="form"  method="post" action="">
            
            <div class="row padding-top-10">
                <div class="col-md-6">
                <label for="firstname" class="control-label">First Name:</label>
                  <input type="text" class="form-control" id="firstname" name="firstname" value="'.$firstname.'" required>
                </div>
                <div class="col-md-6">
                <label for="lastname" class="control-label">Last Name:</label>
                  <input type="text" class="form-control" id="lastname" name="lastname" value="'.$lastname.'" required>
                </div>
            <div class="row padding-top-10">
               
            </div>
            </div>
            
          <div class="row col-md-6">
            <label for="sub1" class="control-label">Subject 1</label>
            <select name="sub1" id="sub1" class="form-control">
              ';
              include('database/db.php');
              
             
                echo '<option>'.$sub1.'</option>';
                $sel_subjects = mysqli_query($con,"SELECT * FROM `subjects`") or die('Error');
                while($row = mysqli_fetch_array($sel_subjects)) {
                  $subject = $row['subject_title'];
                echo '<option>'.$subject.'</option>';
              }
                echo ' 
            </select>
          </div>
          <div class="row padding-top-10">
            <div class="col-md-12">
              <label for="sub2" class="control-label">Subject 2</label>
              <select name="sub2" id="sub2" class="form-control">
                ';
                include('database/db.php');
                  echo '<option>'.$sub2.'</option>';
                  $sel_subjects = mysqli_query($con,"SELECT * FROM `subjects`") or die('Error');
                  while($row = mysqli_fetch_array($sel_subjects)) {
                    $subject = $row['subject_title'];
                  echo '<option>'.$subject.'</option>';
                  }
                  echo ' 
              </select>
            </div>
          </div>
          <div class="row col-md-6">
            <label for="sub3" class="control-label">Subject 3</label>
            <select name="sub3" id="sub3" class="form-control">
              ';
              include('database/db.php');
                echo '<option>'.$sub3.'</option>';
                $sel_subjects = mysqli_query($con,"SELECT * FROM `subjects`") or die('Error');
                while($row = mysqli_fetch_array($sel_subjects)) {
                  $subject = $row['subject_title'];
                echo '<option>'.$subject.'</option>';
                }
                echo ' 
            </select>
          </div>
          <div class="row padding-top-10">
            <div class="col-md-12">
              <label for="sub4" class="control-label">Subject 4</label>
              <select name="sub4" id="sub4" class="form-control">
                ';
                include('database/db.php');
                  echo '<option>'.$sub4.'</option>';
                  $sel_subjects = mysqli_query($con,"SELECT * FROM `subjects`") or die('Error');
                  while($row = mysqli_fetch_array($sel_subjects)) {
                    $subject = $row['subject_title'];
                  echo '<option>'.$subject.'</option>';
                  }
                  echo ' 
              </select>
            </div>
          </div>
            <div class="col-md-2">
          <div class="form-group" align="center">
          <input type="submit" name="submit" value="Update" class="btn btn-primary" />
          </div>
          </div>
          </form>';
          ?>
<?php
    include_once 'database/db.php';
  if(isset($_POST['submit']))
  {
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $sub1 = $_POST['sub1'];
    $sub2 = $_POST['sub2'];
    $sub3 = $_POST['sub3'];
    $sub4 = $_POST['sub4'];
    $email = $_SESSION['email'];
    $date=date("Y-m-d");
    $time=date("h:i:sa");

    $sel_user = "SELECT * FROM `profquiz` where `email` = '$email' ";
    $run_user = mysqli_query($con, $sel_user);
    $check_user = mysqli_num_rows($run_user);
    if($check_user>0){
      $q=mysqli_query($con,"UPDATE `profquiz` SET `firstname`='$firstname',`lastname`='$lastname',`sub1`='$sub1',`sub2`='$sub2',`sub3`='$sub3',`sub4`='$sub4' WHERE `email`='$email'")or die('Error147');
    if($q)
    {
      echo "<script>alert('Your Subscription was Successful!')</script>";
      echo "<script>window.open('member_profile.php','_self')</script>";
    }
    else{
      echo "<script>alert('Something went wrong!')</script>";
      }
    }else{
    echo "<script>alert('Unknown User')</script>";
    }
  }
?>
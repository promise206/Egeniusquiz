
<h1 style="text-align: center; color: #46594c;font-size: 20px;">Change Your Password </h1>
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6 padding-top-10">
                      <label for="m_gender" class="control-label" style="color: red;">Do You Really Want To Delete Your Account?</label><br>
                      <button type='submit' name='yes' class='btn btn-danger'>Yes,i do</button>
                      <button type='submit' name='no' class='btn btn-success'>No,just joking</button>
                    </div>
                  </div>
                </form>

<?php
 if (isset($_SESSION['email'])) {
 
  $user = $_SESSION['email'];
if (isset($_POST['yes'])) {

  $q=mysqli_query($con,"SELECT * FROM user WHERE email='$user' " );
  while($row=mysqli_fetch_array($q) )
  {
    $image=$row['m_image'];
  }
  $path="images/$image";
  if(unlink($path)){
  $r1 = mysqli_query($con,"DELETE FROM rank WHERE email='$user' ") or die('Error');
  $r2 = mysqli_query($con,"DELETE FROM history WHERE email='$user' ") or die('Error');
  $delete_member = "DELETE FROM user WHERE email = '$user'";

  $run_member = mysqli_query($con,$delete_member);

  echo "<script>alert('Your Account Has Been Deleted!')</script>";
  unset($_SESSION['email']);
      echo"<script>window.open('../index.php','_self')</script>";
    exit();
  }
}
if (isset($_POST['no'])) {
      echo"<script>window.open('member_profile.php','_self')</script>";
    exit();
}
}

?>
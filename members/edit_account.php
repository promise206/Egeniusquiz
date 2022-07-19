      
<?php
include("database/db.php");

if (isset($_GET['edit_account'])) {
 $get_id = $_GET['edit_account'];
 $get_query = "select * from user where email = '$get_id'";


  $run_member = mysqli_query($con, $get_query);

  $row_member = mysqli_fetch_array($run_member);

    $member_email = $row_member['email'];
    $member_firstname = $row_member['first_name'];
    $member_lastname= $row_member['last_name'];
    $member_image = $row_member['m_image'];
    $member_date = $row_member['dob'];
    $member_address = $row_member['address'];
    $member_gender = $row_member['gender'];
    $member_state = $row_member['state'];
    }
?>
                <div class="form-box">
                
              <h1 style="text-align: center; color: #46594c;font-size: 20px; font-weight: bolder;">Update Your Account </h1>
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="row">
                      <div class="col-md-6 padding-top-10">
                      <label for="m_firstname" class="control-label">First Name:</label>
                          <input type="text" class="form-control" name="m_firstname" id="m_firstname" placeholder="First Name" required value="<?php echo $member_firstname; ?>" />
                      </div>
                      <div class="col-md-6 padding-top-10">
                      <label for="m_firstname" class="control-label">Last Name:</label>
                          <input type="text" class="form-control" name="m_lastname" id="m_lastname" placeholder="Last Name" required value="<?php echo $member_lastname; ?>">
                      </div>
                  </div>
                  
                  <div class="row padding-top-10">
                     <div class="col-md-6">
                     <label for="m_address" class="control-label">Address:</label>
                        <input type="text" class="form-control" id="m_address" name="m_address" placeholder="Address" value="<?php echo $member_address; ?>" required>
                     </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 padding-top-10">
                      <label for="m_date" class="control-label">Date Of Birth:</label>
                      <input type="date" class="form-control" id="m_date" name="m_date" placeholder="" value="<?php echo $member_date; ?>" required>
                    </div>
                    <div class="col-md-6 padding-top-10">
                      <label for="m_gender" class="control-label">Gender:</label>
                      <?php 
                      $male = "Male";
                      $female= "Female";
                      if ($member_gender==$male) {
                        echo "<input type='radio' name='m_gender' checked value='$member_gender' >Male";
                        echo "<input type='radio' name='m_gender' value = '$female' >Female";
                      }
                      if ($member_gender==$female) {
                        echo "<input type='radio' name='m_gender' checked value='$member_gender' >Female";
                        echo "<input type='radio' name='m_gender' value='$male' >Male";
                      }
                      
                      ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 padding-top-10">
                      <label for="m_image" class="control-label">Image:</label>
                      <input type="file" class="form-control" id="m_image" name="file" value="<?php echo $member_image; ?>" required>
                     
                    </div>
                    <div class="col-md-3 padding-top-10">
                      <label for="m_state" class="control-label">State:</label>
                      <select name="m_state" id="m_state" class="form-control">
                       <option><?php  echo $member_state; ?></option>
                         <option>Anambra</option>
                         <option>Lagos</option>
                         <option>Imo</option>
                         <option>Calabar</option>
                         <option>Port Harcourt</option>
                         <option>Abia</option>
                      </select>
                    </div>
                  </div>
                      <div class="col-md-3 padding-top-10">
                        <button type="submit" name="register" class="btn btn-success">Update</button>
                      </div>
                </form>
       </div>
       </div>
<?php
if(isset($_POST['register'])){
  $user = $_SESSION['email'];
  $firstname = $_POST['m_firstname'];
  $lastname = $_POST['m_lastname'];
  $address = $_POST['m_address'];
  $dob = $_POST['m_date'];
  $gender = $_POST['m_gender'];
  
  $uploadedFile = $_FILES['file']['tmp_name'];
	$sourceProperties = getimagesize($uploadedFile);
	$newFileName = time();
	$dirPath = "images/";
	$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
	$newFileRename = $newFileName. "_thump.". $ext;
	$imageType = $sourceProperties[2];


  $state = $_POST['m_state'];
  $ip = $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLINT_IP']);


  $firstname = stripslashes($firstname);
  $firstname = addslashes($firstname);
  $firstname = ucwords(strtolower($firstname));
  $lastname = stripslashes($lastname);
  $lastname = addslashes($lastname);
  $lastname = ucwords(strtolower($lastname));
  $address = stripslashes($address);
  $address = addslashes($address);
  $address = ucwords(strtolower($address));

  $gender = stripslashes($gender);
  $gender = addslashes($gender);
  $dob = stripslashes($dob);
  $dob = addslashes($dob);
  $state = stripslashes($state);
  $state = addslashes($state);


  if(is_array($_FILES)){

        switch ($imageType){

          case IMAGETYPE_PNG:
            $imageSrc = imagecreatefrompng($uploadedFile);
            $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
            imagepng($tmp,$dirPath. $newFileRename);
            break;

          case IMAGETYPE_JPEG:
            $imageSrc = imagecreatefromjpeg($uploadedFile);
            $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
            imagepng($tmp,$dirPath. $newFileRename);
            break;

          case IMAGETYPE_GIF:
            $imageSrc = imagecreatefromjif($uploadedFile);
            $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
            imagepng($tmp,$dirPath. $newFileRename);
            break;

          default:
            echo "<script>alert('Invalid Image Type!')</script>";
            echo "<script>window.open('register.php','_self')</script>";
            exit;
            break;
        }
      
      
        $q=mysqli_query($con,"SELECT * FROM user WHERE email='$user' " );
        while($row=mysqli_fetch_array($q) )
        {
          $current_image=$row['m_image'];
        }
        $path="images/$current_image";
        unlink($path);

          $update_c = "UPDATE user SET first_name='$firstname',last_name='$lastname', address='$address', gender='$gender', dob='$dob', m_image='$newFileRename', state='$state' WHERE email='$user'";

          $run_c = mysqli_query($con, $update_c);

          if($run_c){

            echo"<script>alert('Account Updated successful!')</script>";
            echo"<script>window.open('member_profile.php','_self')</script>";
          }
          echo"<script>alert('Not Updated!')</script>";
          echo"<script>window.open('member_profile.php','_self')</script>";
        }
        else{
          echo "<script>alert('Image File Not Supported!')</script>";
          echo "<script>window.open('member_profile.php','_self')</script>";
              
        }
      
}


function imageResize($imageSrc,$imageWidth, $imageHeight){
  $newImageWidth = 200;
  $newImageHeight = 200;

  $newImageLayer=imagecreatetruecolor($newImageWidth,$newImageHeight);
  imagecopyresampled($newImageLayer,$imageSrc,0,0,0,0,$newImageWidth,$newImageHeight,$imageWidth,$imageHeight);

  return $newImageLayer;
}
?>
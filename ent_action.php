<?php
session_start();
include('blog.class.php');
$blog=new blog();


global $con;
if (isset($_POST['submit'])) {
    
    $email=$_SESSION['email'];
    $sel_user = "SELECT * FROM `user` WHERE `email` = '$email' ";
    $result = mysqli_query($blog->get_conn(),$sel_user);
    while($row = mysqli_fetch_array($result)) {
        $first_name = $row['first_name'];
    }
	$ent_title = $_POST['ent_title'];
	$ent_body = $_POST['ent_body'];
	
	$uploadedFile = $_FILES['file']['tmp_name'];
	$sourceProperties = getimagesize($uploadedFile);
	$newFileName = time();
	$dirPath = "blog_images/";
	$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
	$newFileRename = $newFileName. "_thump.". $ext;
	$imageType = $sourceProperties[2];
	
    $approved = 0;
	

	$insert_ent = array(

		'poster_name' => mysqli_real_escape_string($blog->get_conn(), $first_name),
		'poster_email' => mysqli_real_escape_string($blog->get_conn(), $email),
		'ent_title' => mysqli_real_escape_string($blog->get_conn(), $ent_title),
		'ent_body' => mysqli_real_escape_string($blog->get_conn(), $ent_body),
		'ent_image' => mysqli_real_escape_string($blog->get_conn(), $newFileRename),
        'approved' => mysqli_real_escape_string($blog->get_conn(), $approved),
		
		);
	
	
		
			//QUERIES

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
			
				if ($blog->insert("ent_sports", $insert_ent)) {

						$success_message = 'Post Submited';
						header('Location: members/member_profile.php?view_blog=view_ent&message='. $success_message);
					
				}
				
			}else{
				echo "<script>alert('Image File Not Supported!')</script>";
				echo "<script>window.open('members/member_profile.php?view_blog=view_ent','_self')</script>";
            
			}
}
	


function imageResize($imageSrc,$imageWidth, $imageHeight){
	$newImageWidth = 900;
	$newImageHeight = 480;
  
	$newImageLayer=imagecreatetruecolor($newImageWidth,$newImageHeight);
	imagecopyresampled($newImageLayer,$imageSrc,0,0,0,0,$newImageWidth,$newImageHeight,$imageWidth,$imageHeight);
  
	return $newImageLayer;
  }

?>

<?php

  if(empty($_POST['g-recaptcha-response'])){
  $ref=@$_GET['q'];
$errMsg = 'Please check the robot checkbox.';
header("location:$ref?q=$errMsg");

} 
 
  elseif(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
  {
        $secret = '6Ldu98oUAAAAAEG0COlx_XZwX8oIgxNI9YYQHa0j';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success)
        {
             include_once 'database/db.class.php';
             $ref=@$_GET['q'];
             $name = $_POST['name'];
             $email = $_POST['email'];
             $subject = $_POST['subject'];
             $id=uniqid();
             $date=date("Y-m-d");
             $time=date("h:i:sa");
$feedback = $_POST['feedback'];
$open = 0;
$feedback = mysqli_escape_string($con,$feedback);
$q=mysqli_query($con,"INSERT INTO `feedback` VALUES('$id' , '$name', '$email' , '$subject', '$feedback' , '$date' , '$time', '$open')")or die ("Error");
header("location:$ref?q=Thank you for your valuable feedback");

             
        
            $succMsg = 'Your contact request have submitted successfully.';
        }
        else
        {
            $ref=@$_GET['q'];
            $errMsg = 'Robot verification failed, please try again.';
            header("location:$ref?q=$errMsg");
        }
        
   }else
        {
            $ref=@$_GET['q'];
            $errMsg = 'Robot verification failed, please try again.';
            header("location:$ref?q=$errMsg");
        }
   
   
?>



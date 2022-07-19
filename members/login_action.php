<?php
session_start();
include('user.class.php');
$user=new user();

    if(isset($_POST['login']))
    {
        $email = $_POST['m_email'];
        $pass = $_POST['m_password'];
        

        
        $pass = stripslashes($pass); 
        $pass = addslashes($pass);
        $pass = md5($pass); 


        if($user->login($email,$pass))
        {
            //Start Session
            $_SESSION['email']=$email;
            $_SESSION['key']='sunny7785068889';
            $url= $_SESSION['url'];
            
            $msg = "You Logged in Successfully";
            header('Location:../'.$url.'?logged_in=' . $msg . '&q=1');
        }
        else{
          echo "<script>alert('Incorrect Details, Pls Try Again!')</script>";
          echo "<script>window.open('login.php','_self')</script>";
        }
    }
    else{
    }
?>
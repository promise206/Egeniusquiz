<?php
include('admin.class.php');
$admin=new admin();

    if(isset($_POST['login']))
    {
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $email = stripslashes($email);
        $email = addslashes($email);
        $pass = stripslashes($pass); 
        $pass = addslashes($pass);
        $pass = md5($pass); 
        if($admin->login($email,$pass))
        {
          session_start();
          $_SESSION["name"] = 'Admin';
          $_SESSION["key"] ='sunny7785068889';
          $_SESSION["username"] = $email;
            
          $msg = "Welcome to Admin Panel";
          header('Location: ../dash.php?message=' . $msg . '&q=0');
        }
        else{
          echo "<script>alert('Incorrect Details, Pls Try Again!')</script>";
          echo "<script>window.open('login.php','_self')</script>";
        }
    }
    else{
    }
?>
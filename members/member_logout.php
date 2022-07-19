<?php
//import db file
ob_start();
include('user.class.php');
$user=new user();

$user->user_logout();


?>
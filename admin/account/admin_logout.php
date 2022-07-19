<?php
//import db file
ob_start();
include('admin.class.php');
$admin=new admin();

$admin->admin_logout();


?>
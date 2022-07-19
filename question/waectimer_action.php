<?php
session_start();
include('database/db.php');
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$duration = "";
$res=mysqli_query($con,"SELECT * FROM waecquiz WHERE eid='$eid'");
while($row=mysqli_fetch_array($res))
{
  $duration=$row["waectime"];
}
$_SESSION["waectime"]=$duration;
$_SESSION["waecstart_time"]=date("Y-m-d H:i:s");
$end_time=$end_time=date('Y-m-d H:i:s', strtotime('+'.$_SESSION["waectime"].'minutes', strtotime($_SESSION["waecstart_time"])));
$_SESSION["waecend_time"]=$end_time;
//timer ends
unset($_SESSION['waectime']);
unset($_SESSION['waecstart_time']);
unset($_SESSION['waecend_time']);

$_SESSION["waecstart"]='waecstarted';

header('Location:waecaccount.php?q=waecquiz&step=2&eid='.$eid.'&n=1&t='.$total.'');
?>

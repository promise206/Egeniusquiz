<?php
session_start();
include('database/db.php');
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$duration = "";
$res=mysqli_query($con,"SELECT * FROM jambquiz WHERE eid='$eid'");
while($row=mysqli_fetch_array($res))
{
  $duration=$row["jambtime"];
}
$_SESSION["jambtime"]=$duration;
$_SESSION["jambstart_time"]=date("Y-m-d H:i:s");
$end_time=$end_time=date('Y-m-d H:i:s', strtotime('+'.$_SESSION["jambtime"].'minutes', strtotime($_SESSION["jambstart_time"])));
$_SESSION["jambend_time"]=$end_time;
//timer ends
unset($_SESSION['jambtime']);
unset($_SESSION['jambstart_time']);
unset($_SESSION['jambend_time']);

$_SESSION["jambstart"]='jambstarted';

header('Location:jambaccount.php?q=jambquiz&step=2&eid='.$eid.'&n=1&t='.$total.'');
?>

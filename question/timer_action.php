<?php
session_start();
include('database/db.php');
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$duration = "";
$res=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid'");
while($row=mysqli_fetch_array($res))
{
  $duration=$row["time"];
}
$_SESSION["time"]=$duration;
$_SESSION["start_time"]=date("Y-m-d H:i:s");
$end_time=$end_time=date('Y-m-d H:i:s', strtotime('+'.$_SESSION["time"].'minutes', strtotime($_SESSION["start_time"])));
$_SESSION["end_time"]=$end_time;
//timer ends
unset($_SESSION['time']);
unset($_SESSION['start_time']);
unset($_SESSION['end_time']);

$_SESSION["start"]='started';

header('Location:account.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'');
?>

<!--<script type="text/javascript">
window.location="account.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'";
</script>-->
<?php
include_once 'database/db.php';
session_start();
$email=$_SESSION['email'];
//delete feedback
if(isset($_SESSION['key'])){
if(@$_GET['fdid'] && $_SESSION['key']=='sunny7785068889') {
$id=@$_GET['fdid'];
$result = mysqli_query($con,"DELETE FROM feedback WHERE id='$id' ") or die('Error1');
header("location:dash.php?q=3");
}
}

//delete user
if(isset($_SESSION['key'])){
if(@$_GET['demail'] && $_SESSION['key']=='sunny7785068889') {
$demail=@$_GET['demail'];
$r1 = mysqli_query($con,"DELETE FROM rank WHERE email='$demail' ") or die('Error2');
$r2 = mysqli_query($con,"DELETE FROM history WHERE email='$demail' ") or die('Error3');
$result = mysqli_query($con,"DELETE FROM user WHERE email='$demail' ") or die('Error4');
header("location:dash.php?q=1");
}
}
//remove quiz
if(isset($_SESSION['key'])){
if(@$_GET['q']== 'rmquiz' && $_SESSION['key']=='sunny7785068889') {
$eid=@$_GET['eid'];
$result = mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' ") or die('Error5');
while($row = mysqli_fetch_array($result)) {
	$qid = $row['qid'];
$r1 = mysqli_query($con,"DELETE FROM options WHERE qid='$qid'") or die('Error6');
$r2 = mysqli_query($con,"DELETE FROM answer WHERE qid='$qid' ") or die('Error7');
}
$r3 = mysqli_query($con,"DELETE FROM questions WHERE eid='$eid' ") or die('Error8');
$r4 = mysqli_query($con,"DELETE FROM quiz WHERE eid='$eid' ") or die('Error9');
$r4 = mysqli_query($con,"DELETE FROM history WHERE eid='$eid' ") or die('Error10');

header("location:dash.php?q=5");
}
}

//add quiz
if(isset($_SESSION['key'])){
if(@$_GET['q']== 'addquiz' && $_SESSION['key']=='sunny7785068889') {
$name = $_POST['name'];
$name= ucwords(strtolower($name));
$name = mysqli_escape_string($con,$name);
$total = $_POST['total'];
$sahi = $_POST['right'];
$wrong = $_POST['wrong'];
$time = $_POST['time'];
$tag = $_POST['tag'];
$tag = mysqli_escape_string($con,$tag);
$desc = $_POST['desc'];
$desc = mysqli_escape_string($con,$desc);
$id=uniqid();
$q3=mysqli_query($con,"INSERT INTO quiz VALUES  ('$id','$name' , '$sahi' , '$wrong','$total','$time' ,'$desc','$tag', NOW())") or die('Error11');

header("location:dash.php?q=4&step=2&eid=$id&n=$total");
}
}

//add question
if(isset($_SESSION['key'])){
if(@$_GET['q']== 'addqns' && $_SESSION['key']=='sunny7785068889') {
$n=@$_GET['n'];
$eid=@$_GET['eid'];
$ch=@$_GET['ch'];

for($i=1;$i<=$n;$i++)
 {
 $qid=uniqid();
 $qns=$_POST['qns'.$i];
 $qns = mysqli_escape_string($con,$qns);
$q3=mysqli_query($con,"INSERT INTO questions VALUES  ('$eid','$qid','$qns' , '$ch' , '$i')")or die('Error12');
  $oaid=uniqid();
  $obid=uniqid();
$ocid=uniqid();
$odid=uniqid();
$a=$_POST[$i.'1'];
$b=$_POST[$i.'2'];
$c=$_POST[$i.'3'];
$d=$_POST[$i.'4'];
$qa=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$a','$oaid')") or die('Error61');
$qb=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$b','$obid')") or die('Error62');
$qc=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$c','$ocid')") or die('Error63');
$qd=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$d','$odid')") or die('Error64');
$e=$_POST['ans'.$i];
switch($e)
{
case 'a':
$ansid=$oaid;
break;
case 'b':
$ansid=$obid;
break;
case 'c':
$ansid=$ocid;
break;
case 'd':
$ansid=$odid;
break;
default:
$ansid=$oaid;
}


$qans=mysqli_query($con,"INSERT INTO answer VALUES  ('$qid','$ansid')");

 }
header("location:dash.php?q=0");
}
}

//airtime quiz start
if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {
  $eid=@$_GET['eid'];
  $sn=@$_GET['n'];
  $total=@$_GET['t'];
  $ans=$_POST['ans'];
  $qid=@$_GET['qid'];

  $sel_user = "SELECT * FROM `history` where `eid`='$eid' AND `email` = '$email' ";

        $run_user = mysqli_query($con, $sel_user);
        $check_user = mysqli_num_rows($run_user);
  if($sn == 1 && $check_user==0)
  {
    $q=mysqli_query($con,"INSERT INTO `history` VALUES('$email','$eid' ,'0','0','0','0',NOW(),'0')")or die('Error13');
  }
  $q=mysqli_query($con,"SELECT * FROM `history` WHERE `eid`='$eid' AND `email`='$email' ")or die('Error115');
    
  while($row=mysqli_fetch_array($q) )
  {
    $que_no=$row['sn'];
  }

  if($sn<=$que_no){
    $que_no++;
    echo "<script>alert('You have answered the question already!')</script>";
    echo "<script>window.open('account.php?q=quiz&step=2&eid=$eid&n=$que_no&t=$total','_self')</script>";
  }else{

    
  $q=mysqli_query($con,"SELECT * FROM `answer` WHERE `qid`='$qid' " )or die('Error14');
  while($row=mysqli_fetch_array($q) )
  {
    $ansid=$row['ansid'];
  }
  
  if($ans == $ansid)
  {
    $q=mysqli_query($con,"SELECT * FROM `quiz` WHERE `eid`='$eid' " )or die('Error15');
    while($row=mysqli_fetch_array($q) )
    {
      $sahi=$row['sahi'];
    }
    $r;
    $q=mysqli_query($con,"SELECT * FROM `history` WHERE `eid`='$eid' AND `email`='$email' ")or die('Error16');
    
    while($row=mysqli_fetch_array($q) )
    {
      $s=$row['score'];
      $r=$row['sahi'];
      $que_no=$row['sn'];
    }
    $r++;
    $s=$s+$sahi;
    
    $q=mysqli_query($con,"UPDATE `history` SET `score`='$s',`level`='$sn',`sahi`='$r', `date`= NOW(), `sn`='$sn'  WHERE  `email` = '$email' AND `eid` = '$eid'")or die('Error124');

    $q1=mysqli_query($con,"SELECT * FROM `rank` WHERE `email`='$email'" )or die('Error161');

    $rowcount=mysqli_num_rows($q1);
    if($rowcount == 0)
    {
      $q2=mysqli_query($con,"INSERT INTO `rank` VALUES('$email','$s',NOW())")or die('Error165');
    }
    else
    {
      $q3=mysqli_query($con,"SELECT * FROM `history` WHERE `email`='$email' ")or die('Error16');
      $sum=0;
      while($row=mysqli_fetch_array($q3) )
      {
        $sum+=$row['score'];
      }
      $q=mysqli_query($con,"UPDATE `rank` SET `score`='$sum' ,`time`=NOW() WHERE `email`= '$email'")or die('Error174');
    }

  } 
  else
  {
    $q=mysqli_query($con,"SELECT * FROM `quiz` WHERE `eid`='$eid' " )or die('Error129');

    while($row=mysqli_fetch_array($q) )
    {
      $wrong=$row['wrong'];
    }

    $q=mysqli_query($con,"SELECT * FROM `history` WHERE `eid`='$eid' AND `email`='$email' " )or die('Error139');
    while($row=mysqli_fetch_array($q) )
    {
      $s=$row['score'];
      $w=$row['wrong'];
    }
    $w++;
    $s=$s-$wrong;
    $q=mysqli_query($con,"UPDATE `history` SET `score`='$s',`level`='$sn',`wrong`='$w', `date`=NOW(), `sn`='$sn' WHERE  `email` = '$email' AND `eid` = '$eid'")or die('Error147');
  
  }
  if($sn != $total)
  {
    $sn++;
    header("location:account.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total")or die('Error152');
  }
  else
  {
    unset($_SESSION["start"]);
    header("location:airtimequiz_start.php?q=result&eid=$eid");
  }
}
}

//restart quiz
if(@$_GET['q']== 'quizre' && @$_GET['step']== 25 ) {
  $eid=@$_GET['eid'];
  $n=@$_GET['n'];
  $t=@$_GET['t'];
  $q=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error156');
  while($row=mysqli_fetch_array($q) )
  {
    $s=$row['score'];
  }
  $q=mysqli_query($con,"DELETE FROM `history` WHERE `eid`='$eid' AND `email`='$email' " )or die('Error184');
  $q=mysqli_query($con,"SELECT * FROM `rank` WHERE `email`='$email'" )or die('Error161');
  while($row=mysqli_fetch_array($q) )
  {
    $sun=$row['score'];
  }
  $sun=0;
  $q=mysqli_query($con,"UPDATE `rank` SET `score`='$sun' ,`time`=NOW() WHERE `email`= '$email'")or die('Error174');
  header("location:account.php?q=quiz&step=2&eid=$eid&n=1&t=$t");
}


//Automatic Submit Airtime quiz
if(@$_GET['q']== 'quiz' && @$_GET['step']== 7) {
  $eid=@$_GET['eid'];
  $sn=@$_GET['n'];
  $total=@$_GET['t'];
  $ans=@$_GET['ans'];
  $qid=@$_GET['qid'];
  $q=mysqli_query($con,"SELECT * FROM `answer` WHERE `qid`='$qid' " )or die('Error17');
  while($row=mysqli_fetch_array($q) )
  {
    $ansid=$row['ansid'];

    
  }
  if($ans == $ansid)
  {
    $q=mysqli_query($con,"SELECT * FROM `quiz` WHERE `eid`='$eid' " )or die('Error18');
    while($row=mysqli_fetch_array($q) )
    {
      $sahi=$row['sahi'];
    }
    if($sn == 1)
    {
      $q=mysqli_query($con,"INSERT INTO `history` VALUES('$email','$eid' ,'0','0','0','0',NOW(),'0')")or die('Error19');
    }
    $q=mysqli_query($con,"SELECT * FROM `history` WHERE `eid`='$eid' AND `email`='$email' ")or die('Error115');

    while($row=mysqli_fetch_array($q) )
    {
      $s=$row['score'];
      $r=$row['sahi'];
    }
    $r++;
    $s=$s+$sahi;
    $q=mysqli_query($con,"UPDATE `history` SET `score`='$s',`level`='$sn',`sahi`='$r', `date`= NOW(),`sn`='$sn'  WHERE  `email` = '$email' AND `eid` = '$eid'")or die('Error124');

  } 
  else
  {
    $q=mysqli_query($con,"SELECT * FROM `quiz` WHERE `eid`='$eid' " )or die('Error129');

    while($row=mysqli_fetch_array($q))
    {
      $wrong=$row['wrong'];
    }
    if($sn == 1)
    {
      $q=mysqli_query($con,"INSERT INTO `history` VALUES('$email','$eid' ,'0','0','0','0',NOW(),'0' )")or die('Error137');
    }
    $q=mysqli_query($con,"SELECT * FROM `history` WHERE `eid`='$eid' AND `email`='$email' " )or die('Error139');
    while($row=mysqli_fetch_array($q) )
    {
      $s=$row['score'];
      $w=$row['wrong'];
    }
    $w++;
    $s=$s-$wrong;
    $q=mysqli_query($con,"UPDATE `history` SET `score`='$s',`level`='$sn',`wrong`='$w', `date`=NOW(),`sn`='$sn' WHERE  `email` = '$email' AND `eid` = '$eid'")or die('Error147');
  }
 if( $_SESSION['key'] == 'sunny7785068889')
  {
    $q1=mysqli_query($con,"SELECT * FROM `rank` WHERE `email`='$email'" )or die('Error161');

    $rowcount=mysqli_num_rows($q1);
    if($rowcount == 0)
    {
      $q2=mysqli_query($con,"INSERT INTO `rank` VALUES('$email','$s',NOW())")or die('Error165');
    }
    else
    {
      $q3=mysqli_query($con,"SELECT * FROM `history` WHERE `email`='$email' ")or die('Error16');
      $sum=0;
      while($row=mysqli_fetch_array($q3) )
      {
        $sum+=$row['score'];
      }
      $q=mysqli_query($con,"UPDATE `rank` SET `score`='$sum' ,`time`=NOW() WHERE `email`= '$email'")or die('Error174');
    }
    unset($_SESSION["start"]);
    header("location:airtimequiz_start.php?q=result&eid=$eid");
  }
  else
  {
  header("location:airtimequiz_start.php?q=result&eid=$eid");
  }
}

//Waec quiz start
if(@$_GET['q']== 'waecquiz' && @$_GET['step']== 2) {
  $eid=@$_GET['eid'];
  $sn=@$_GET['n'];
  $total=@$_GET['t'];
  $ans=$_POST['ans'];
  $qid=@$_GET['qid'];

  $sel_user = "SELECT * FROM `waechistory` where `eid`='$eid' AND `email` = '$email' ";

  $run_user = mysqli_query($con, $sel_user);
  $check_user = mysqli_num_rows($run_user);
  if($sn == 1 && $check_user==0)
  {
    $q=mysqli_query($con,"INSERT INTO `waechistory` VALUES('$email','$eid' ,'0','0','0','0',NOW(),'0')")or die('Error1323');
  }
  $q=mysqli_query($con,"SELECT * FROM `waechistory` WHERE `eid`='$eid' AND `email`='$email' ")or die('Error115');
    
  while($row=mysqli_fetch_array($q) )
  {
    $que_no=$row['sn'];
  }

  if($sn<=$que_no){
    $que_no++;
    echo "<script>alert('You have answered the question already!')</script>";
    echo "<script>window.open('waecaccount.php?q=waecquiz&step=2&eid=$eid&n=$que_no&t=$total','_self')</script>";
  }else{

    
  $q=mysqli_query($con,"SELECT * FROM `answer` WHERE `qid`='$qid' " )or die('Error14');
  while($row=mysqli_fetch_array($q) )
  {
    $ansid=$row['ansid'];
  }
  
  if($ans == $ansid)
  {
    $q=mysqli_query($con,"SELECT * FROM `waecquiz` WHERE `eid`='$eid' " )or die('Error15');
    while($row=mysqli_fetch_array($q) )
    {
      $sahi=$row['sahi'];
    }
    $r;
    $q=mysqli_query($con,"SELECT * FROM `waechistory` WHERE `eid`='$eid' AND `email`='$email' ")or die('Error16');
    
    while($row=mysqli_fetch_array($q) )
    {
      $s=$row['score'];
      $r=$row['sahi'];
      $que_no=$row['sn'];
    }
    $r++;
    $s=$s+$sahi;
    
    $q=mysqli_query($con,"UPDATE `waechistory` SET `score`='$s',`level`='$sn',`sahi`='$r', `date`= NOW(), `sn`='$sn'  WHERE  `email` = '$email' AND `eid` = '$eid'")or die('Error124');

    $q1=mysqli_query($con,"SELECT * FROM `waecrank` WHERE `email`='$email'" )or die('Error161');

    $rowcount=mysqli_num_rows($q1);
    if($rowcount == 0)
    {
      $q2=mysqli_query($con,"INSERT INTO `waecrank` VALUES('$email','$s',NOW())")or die('Error165');
    }
    else
    {
      $q3=mysqli_query($con,"SELECT * FROM `waechistory` WHERE `email`='$email' ")or die('Error16');
      $sum=0;
      while($row=mysqli_fetch_array($q3) )
      {
        $sum+=$row['score'];
      }
      $q=mysqli_query($con,"UPDATE `waecrank` SET `score`='$sum' ,`time`=NOW() WHERE `email`= '$email'")or die('Error174');
    }

  } 
  else
  {
    $q=mysqli_query($con,"SELECT * FROM `waecquiz` WHERE `eid`='$eid' " )or die('Error129');

    while($row=mysqli_fetch_array($q) )
    {
      $wrong=$row['wrong'];
    }

    $q=mysqli_query($con,"SELECT * FROM `waechistory` WHERE `eid`='$eid' AND `email`='$email' " )or die('Error139');
    while($row=mysqli_fetch_array($q) )
    {
      $s=$row['score'];
      $w=$row['wrong'];
    }
    $w++;
    $s=$s-$wrong;
    $q=mysqli_query($con,"UPDATE `waechistory` SET `score`='$s',`level`='$sn',`wrong`='$w', `date`=NOW(), `sn`='$sn' WHERE  `email` = '$email' AND `eid` = '$eid'")or die('Error147');
  
  }
  if($sn != $total)
  {
    $sn++;
    header("location:waecaccount.php?q=waecquiz&step=2&eid=$eid&n=$sn&t=$total")or die('Error152');
  }
  else
  {
    unset($_SESSION["waecstart"]);
    header("location:waecquiz_start.php?q=result&eid=$eid");
  }
}
}

//Automatic Submit Waec quiz
if(@$_GET['q']== 'waecquiz' && @$_GET['step']== 7) {
  $eid=@$_GET['eid'];
  $sn=@$_GET['n'];
  $total=@$_GET['t'];
  $ans=@$_GET['ans'];
  $qid=@$_GET['qid'];
  $q=mysqli_query($con,"SELECT * FROM `answer` WHERE `qid`='$qid' " )or die('Error17');
  while($row=mysqli_fetch_array($q) )
  {
    $ansid=$row['ansid'];

    
  }
  if($ans == $ansid)
  {
    $q=mysqli_query($con,"SELECT * FROM `jambquiz` WHERE `eid`='$eid' " )or die('Error18');
    while($row=mysqli_fetch_array($q) )
    {
      $sahi=$row['sahi'];
    }
    if($sn == 1)
    {
      $q=mysqli_query($con,"INSERT INTO `waechistory` VALUES('$email','$eid' ,'0','0','0','0',NOW(),'0')")or die('Error19');
    }
    $q=mysqli_query($con,"SELECT * FROM `waechistory` WHERE `eid`='$eid' AND `email`='$email' ")or die('Error115');

    while($row=mysqli_fetch_array($q) )
    {
      $s=$row['score'];
      $r=$row['sahi'];
    }
    $r++;
    $s=$s+$sahi;
    $q=mysqli_query($con,"UPDATE `waechistory` SET `score`='$s',`level`='$sn',`sahi`='$r', `date`= NOW(),`sn`='$sn'  WHERE  `email` = '$email' AND `eid` = '$eid'")or die('Error124');

  } 
  else
  {
    $q=mysqli_query($con,"SELECT * FROM `waecquiz` WHERE `eid`='$eid' " )or die('Error129');

    while($row=mysqli_fetch_array($q))
    {
      $wrong=$row['wrong'];
    }
    if($sn == 1)
    {
      $q=mysqli_query($con,"INSERT INTO `waechistory` VALUES('$email','$eid' ,'0','0','0','0',NOW(),'0' )")or die('Error137');
    }
    $q=mysqli_query($con,"SELECT * FROM `waechistory` WHERE `eid`='$eid' AND `email`='$email' " )or die('Error139');
    while($row=mysqli_fetch_array($q) )
    {
      $s=$row['score'];
      $w=$row['wrong'];
    }
    $w++;
    $s=$s-$wrong;
    $q=mysqli_query($con,"UPDATE `waechistory` SET `score`='$s',`level`='$sn',`wrong`='$w', `date`=NOW(),`sn`='$sn' WHERE  `email` = '$email' AND `eid` = '$eid'")or die('Error147');
  }
 if( $_SESSION['key'] == 'sunny7785068889')
  {
    $q1=mysqli_query($con,"SELECT * FROM `waecrank` WHERE `email`='$email'" )or die('Error161');

    $rowcount=mysqli_num_rows($q1);
    if($rowcount == 0)
    {
      $q2=mysqli_query($con,"INSERT INTO `waecrank` VALUES('$email','$s',NOW())")or die('Error165');
    }
    else
    {
      $q3=mysqli_query($con,"SELECT * FROM `waechistory` WHERE `email`='$email' ")or die('Error16');
      $sum=0;
      while($row=mysqli_fetch_array($q3) )
      {
        $sum+=$row['score'];
      }
      $q=mysqli_query($con,"UPDATE `waecrank` SET `score`='$sum' ,`time`=NOW() WHERE `email`= '$email'")or die('Error174');
    }
    unset($_SESSION["waecstart"]);
    header("location:waecquiz_start.php?q=result&eid=$eid");
  }
  else
  {
  header("location:waecquiz_start.php?q=result&eid=$eid");
  }
}

//Jamb quiz start
if(@$_GET['q']== 'jambquiz' && @$_GET['step']== 2) {
  $eid=@$_GET['eid'];
  $sn=@$_GET['n'];
  $total=@$_GET['t'];
  $ans=$_POST['ans'];
  $qid=@$_GET['qid'];

  $sel_user = "SELECT * FROM `jambhistory` where `eid`='$eid' AND `email` = '$email' ";

  $run_user = mysqli_query($con, $sel_user);
  $check_user = mysqli_num_rows($run_user);
  if($sn == 1 && $check_user==0)
  {
    $q=mysqli_query($con,"INSERT INTO `jambhistory` VALUES('$email','$eid' ,'0','0','0','0',NOW(),'0')")or die('Error13');
  }
  $q=mysqli_query($con,"SELECT * FROM `jambhistory` WHERE `eid`='$eid' AND `email`='$email' ")or die('Error115');
    
  while($row=mysqli_fetch_array($q) )
  {
    $que_no=$row['sn'];
  }

  if($sn<=$que_no){
    $que_no++;
    echo "<script>alert('You have answered the question already!')</script>";
    echo "<script>window.open('jambaccount.php?q=jambquiz&step=2&eid=$eid&n=$que_no&t=$total','_self')</script>";
  }else{

    
  $q=mysqli_query($con,"SELECT * FROM `answer` WHERE `qid`='$qid' " )or die('Error14');
  while($row=mysqli_fetch_array($q) )
  {
    $ansid=$row['ansid'];
  }
  
  if($ans == $ansid)
  {
    $q=mysqli_query($con,"SELECT * FROM `jambquiz` WHERE `eid`='$eid' " )or die('Error15');
    while($row=mysqli_fetch_array($q) )
    {
      $sahi=$row['sahi'];
    }
    $r;
    $q=mysqli_query($con,"SELECT * FROM `jambhistory` WHERE `eid`='$eid' AND `email`='$email' ")or die('Error16');
    
    while($row=mysqli_fetch_array($q) )
    {
      $s=$row['score'];
      $r=$row['sahi'];
      $que_no=$row['sn'];
    }
    $r++;
    $s=$s+$sahi;
    
    $q=mysqli_query($con,"UPDATE `jambhistory` SET `score`='$s',`level`='$sn',`sahi`='$r', `date`= NOW(), `sn`='$sn'  WHERE  `email` = '$email' AND `eid` = '$eid'")or die('Error124');

    $q1=mysqli_query($con,"SELECT * FROM `jambrank` WHERE `email`='$email'" )or die('Error161');

    $rowcount=mysqli_num_rows($q1);
    if($rowcount == 0)
    {
      $q2=mysqli_query($con,"INSERT INTO `jambrank` VALUES('$email','$s',NOW())")or die('Error165');
    }
    else
    {
      $q3=mysqli_query($con,"SELECT * FROM `jambhistory` WHERE `email`='$email' ")or die('Error16');
      $sum=0;
      while($row=mysqli_fetch_array($q3) )
      {
        $sum+=$row['score'];
      }
      $q=mysqli_query($con,"UPDATE `jambrank` SET `score`='$sum' ,`time`=NOW() WHERE `email`= '$email'")or die('Error174');
    }

  } 
  else
  {
    $q=mysqli_query($con,"SELECT * FROM `jambquiz` WHERE `eid`='$eid' " )or die('Error129');

    while($row=mysqli_fetch_array($q) )
    {
      $wrong=$row['wrong'];
    }

    $q=mysqli_query($con,"SELECT * FROM `jambhistory` WHERE `eid`='$eid' AND `email`='$email' " )or die('Error139');
    while($row=mysqli_fetch_array($q) )
    {
      $s=$row['score'];
      $w=$row['wrong'];
    }
    $w++;
    $s=$s-$wrong;
    $q=mysqli_query($con,"UPDATE `jambhistory` SET `score`='$s',`level`='$sn',`wrong`='$w', `date`=NOW(), `sn`='$sn' WHERE  `email` = '$email' AND `eid` = '$eid'")or die('Error147');
  
  }
  if($sn != $total)
  {
    $sn++;
    header("location:jambaccount.php?q=jambquiz&step=2&eid=$eid&n=$sn&t=$total")or die('Error152');
  }
  else
  {
    unset($_SESSION["jambstart"]);
    header("location:jambquiz_start.php?q=result&eid=$eid");
  }
}
}

//Automatic Submit Jamb quiz
if(@$_GET['q']== 'jambquiz' && @$_GET['step']== 7) {
  $eid=@$_GET['eid'];
  $sn=@$_GET['n'];
  $total=@$_GET['t'];
  $ans=@$_GET['ans'];
  $qid=@$_GET['qid'];
  $q=mysqli_query($con,"SELECT * FROM `answer` WHERE `qid`='$qid' " )or die('Error17');
  while($row=mysqli_fetch_array($q) )
  {
    $ansid=$row['ansid'];

    
  }
  if($ans == $ansid)
  {
    $q=mysqli_query($con,"SELECT * FROM `jambquiz` WHERE `eid`='$eid' " )or die('Error18');
    while($row=mysqli_fetch_array($q) )
    {
      $sahi=$row['sahi'];
    }
    if($sn == 1)
    {
      $q=mysqli_query($con,"INSERT INTO `jambhistory` VALUES('$email','$eid' ,'0','0','0','0',NOW(),'0')")or die('Error19');
    }
    $q=mysqli_query($con,"SELECT * FROM `jambhistory` WHERE `eid`='$eid' AND `email`='$email' ")or die('Error115');

    while($row=mysqli_fetch_array($q) )
    {
      $s=$row['score'];
      $r=$row['sahi'];
    }
    $r++;
    $s=$s+$sahi;
    $q=mysqli_query($con,"UPDATE `jambhistory` SET `score`='$s',`level`='$sn',`sahi`='$r', `date`= NOW(),`sn`='$sn'  WHERE  `email` = '$email' AND `eid` = '$eid'")or die('Error124');

  } 
  else
  {
    $q=mysqli_query($con,"SELECT * FROM `jambquiz` WHERE `eid`='$eid' " )or die('Error129');

    while($row=mysqli_fetch_array($q))
    {
      $wrong=$row['wrong'];
    }
    if($sn == 1)
    {
      $q=mysqli_query($con,"INSERT INTO `jambhistory` VALUES('$email','$eid' ,'0','0','0','0',NOW(),'0' )")or die('Error137');
    }
    $q=mysqli_query($con,"SELECT * FROM `jambhistory` WHERE `eid`='$eid' AND `email`='$email' " )or die('Error139');
    while($row=mysqli_fetch_array($q) )
    {
      $s=$row['score'];
      $w=$row['wrong'];
    }
    $w++;
    $s=$s-$wrong;
    $q=mysqli_query($con,"UPDATE `jambhistory` SET `score`='$s',`level`='$sn',`wrong`='$w', `date`=NOW(),`sn`='$sn' WHERE  `email` = '$email' AND `eid` = '$eid'")or die('Error147');
  }
 if( $_SESSION['key'] == 'sunny7785068889')
  {
    $q1=mysqli_query($con,"SELECT * FROM `jambrank` WHERE `email`='$email'" )or die('Error161');

    $rowcount=mysqli_num_rows($q1);
    if($rowcount == 0)
    {
      $q2=mysqli_query($con,"INSERT INTO `jambrank` VALUES('$email','$s',NOW())")or die('Error165');
    }
    else
    {
      $q3=mysqli_query($con,"SELECT * FROM `jambhistory` WHERE `email`='$email' ")or die('Error16');
      $sum=0;
      while($row=mysqli_fetch_array($q3) )
      {
        $sum+=$row['score'];
      }
      $q=mysqli_query($con,"UPDATE `jambrank` SET `score`='$sum' ,`time`=NOW() WHERE `email`= '$email'")or die('Error174');
    }
    unset($_SESSION["start"]);
    header("location:jambquiz_start.php?q=result&eid=$eid");
  }
  else
  {
  header("location:jambquiz_start.php?q=result&eid=$eid");
  }
}

?>




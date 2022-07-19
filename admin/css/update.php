<?php
include_once 'database/db.php';
session_start();
$email=$_SESSION['username'];
//delete feedback
if(isset($_SESSION['key'])){
if(@$_GET['fdid'] && $_SESSION['key']=='sunny7785068889') {
$id=@$_GET['fdid'];
$result = mysqli_query($con,"DELETE FROM feedback WHERE id='$id' ") or die('Error');
header("location:dash.php?q=3");
}
}

//delete user
if(isset($_SESSION['key'])){
  if(@$_GET['demail'] && $_SESSION['key']=='sunny7785068889') {
    $demail=@$_GET['demail'];

    $q=mysqli_query($con,"SELECT * FROM `user` WHERE `email`='$demail' " );
    while($row=mysqli_fetch_array($q) )
    {
      $image=$row['m_image'];
    }
    $path="../members/images/$image";
    if(unlink($path)){
      $r1 = mysqli_query($con,"DELETE FROM `rank` WHERE `email`='$demail' ") or die('Error');
      $r2 = mysqli_query($con,"DELETE FROM `freeairtime` WHERE `email`='$demail' ") or die('Error');
      $r3 = mysqli_query($con,"DELETE FROM `profquiz` WHERE `email`='$demail' ") or die('Error');
      $r4 = mysqli_query($con,"DELETE FROM `legendquiz` WHERE `email`='$demail' ") or die('Error');
      $r5 = mysqli_query($con,"DELETE FROM `history` WHERE `email`='$demail' ") or die('Error');
      $result = mysqli_query($con,"DELETE FROM `user` WHERE `email`='$demail' ") or die('Error');
      header("location:dash.php?q=1");
    }
     echo"<script>alert('Image Not Found!')</script>";
      echo"<script>window.open('dash.php?q=1','_self')</script>";
  }
}

//delete Registered Airtime User
if(isset($_SESSION['key'])){
  if(@$_GET['a_email'] && $_SESSION['key']=='sunny7785068889') {
    $a_email=@$_GET['a_email'];
      $r1 = mysqli_query($con,"DELETE FROM `freeairtime` WHERE `email`='$a_email' ") or die('Error');
      $r2 = mysqli_query($con,"DELETE FROM `history` WHERE `email`='$a_email' ") or die('Error');
      $result = mysqli_query($con,"DELETE FROM `rank` WHERE `email`='$a_email' ") or die('Error');
      header("location:dash.php?q=13");
  }
}

//delete Registered Waec User
if(isset($_SESSION['key'])){
  if(@$_GET['w_email'] && $_SESSION['key']=='sunny7785068889') {
    $w_email=@$_GET['w_email'];
      $r1 = mysqli_query($con,"DELETE FROM `profquiz` WHERE `email`='$w_email' ") or die('Error');
      $r2 = mysqli_query($con,"DELETE FROM `history` WHERE `email`='$w_email' ") or die('Error');
      $result = mysqli_query($con,"DELETE FROM `rank` WHERE `email`='$w_email' ") or die('Error');
      header("location:dash.php?q=11");
  }
}

//delete Registered Jamb User
if(isset($_SESSION['key'])){
  if(@$_GET['j_email'] && $_SESSION['key']=='sunny7785068889') {
    $j_email=@$_GET['j_email'];
      $r1 = mysqli_query($con,"DELETE FROM `legendquiz` WHERE `email`='$j_email' ") or die('Error');
      $r2 = mysqli_query($con,"DELETE FROM `history` WHERE `email`='$j_email' ") or die('Error');
      $result = mysqli_query($con,"DELETE FROM `rank` WHERE `email`='$j_email' ") or die('Error');
      header("location:dash.php?q=19");
  }
}
//delete Ranked User
if(isset($_SESSION['key'])){
  if(@$_GET['del_rank'] && $_SESSION['key']=='sunny7785068889') {
    $ranked_email=@$_GET['del_rank'];
      $r2 = mysqli_query($con,"DELETE FROM `history` WHERE `email`='$ranked_email' ") or die('Error');
      $result = mysqli_query($con,"DELETE FROM `rank` WHERE `email`='$ranked_email' ") or die('Error');
      header("location:dash.php?q=2");
  }
}
//remove quiz
if(isset($_SESSION['key'])){
  if(@$_GET['q']== 'rmquiz' && $_SESSION['key']=='sunny7785068889') {
    $eid=@$_GET['eid'];
    $result = mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' ") or die('Error');
    while($row = mysqli_fetch_array($result)) {
        $qid = $row['qid'];
      $r1 = mysqli_query($con,"DELETE FROM options WHERE qid='$qid'") or die('Error');
      $r2 = mysqli_query($con,"DELETE FROM answer WHERE qid='$qid' ") or die('Error');
    }
    $r3 = mysqli_query($con,"DELETE FROM questions WHERE eid='$eid' ") or die('Error');
    $r4 = mysqli_query($con,"DELETE FROM quiz WHERE eid='$eid' ") or die('Error');
    $r4 = mysqli_query($con,"DELETE FROM history WHERE eid='$eid' ") or die('Error');

  header("location:dash.php?q=5");
  }
}

//add quiz Detail
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
$q3=mysqli_query($con,"INSERT INTO quiz VALUES  ('$id','$name' , '$sahi' , '$wrong','$total','$time' ,'$desc','$tag', NOW())");

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
  $q3=mysqli_query($con,"INSERT INTO questions VALUES  ('$eid','$qid','$qns' , '$ch' , '$i')");
    $oaid=uniqid();
    $obid=uniqid();
  $ocid=uniqid();
  $odid=uniqid();
  $a=$_POST[$i.'1'];
  $a = mysqli_escape_string($con,$a);
  $b=$_POST[$i.'2'];
  $b = mysqli_escape_string($con,$b);
  $c=$_POST[$i.'3'];
  $c = mysqli_escape_string($con,$c);
  $d=$_POST[$i.'4'];
  $d = mysqli_escape_string($con,$d);
  $qa=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$a','$oaid')") or die('Error61');
  $qb=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$b','$obid')") or die('Error62');
  $qc=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$c','$ocid')") or die('Error63');
  $qd=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$d','$odid')") or die('Error64');
  $e=$_POST['ans'.$i];
  $e = mysqli_escape_string($con,$e);
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

//Edit quiz Detail
if(isset($_SESSION['key'])){
  if(@$_GET['q']== 'editquiz' && $_SESSION['key']=='sunny7785068889') {
    $eid=@$_GET['eid'];
    $name = $_POST['name'];
    $name= ucwords(strtolower($name));
    $name = mysqli_escape_string($con,$name);
    $sahi = $_POST['right'];
    $wrong = $_POST['wrong'];
    $time = $_POST['time'];
    $tag = $_POST['tag'];
    $tag = mysqli_escape_string($con,$tag);
    $desc = $_POST['desc'];
    $desc = mysqli_escape_string($con,$desc);
    $q=mysqli_query($con,"UPDATE `quiz` SET `title`='$name',`sahi`='$sahi',`wrong`='$wrong',`time`='$time',`tag`='$tag',`intro`='$desc' WHERE `eid`='$eid'");
    if($q){
      echo"<script>alert('Inserted Succesfully!')</script>";
      echo"<script>window.open('dash.php?q=5','_self')</script>";
    }
  }
}

//Edit Question
if(isset($_SESSION['key'])){
  if(@$_GET['q']== 'editqns' && $_SESSION['key']=='sunny7785068889') {
  $n=@$_GET['n'];
  $eid=@$_GET['eid'];
  $ch=@$_GET['ch'];
  
  for($i=1;$i<=$n;$i++)
   {
    $qns=$_POST['qns'.$i];
    $qns = mysqli_escape_string($con,$qns);
    $result = mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' AND sn='$i'") or die('ErrorD');
    
    while($row=mysqli_fetch_array($result) )
    {
      $qid=$row['qid'];

      $r1 = mysqli_query($con,"DELETE FROM `questions` WHERE `eid`='$eid' AND sn='$i'") or die('Error');
      $q3=mysqli_query($con,"INSERT INTO questions VALUES  ('$eid','$qid','$qns' , '$ch' , '$i')");

      $oaid=uniqid();
      $obid=uniqid();
      $ocid=uniqid();
      $odid=uniqid();

      $a=$_POST[$i.'1'];
      $a = mysqli_escape_string($con,$a);
      $b=$_POST[$i.'2'];
      $b = mysqli_escape_string($con,$b);
      $c=$_POST[$i.'3'];
      $c = mysqli_escape_string($con,$c);
      $d=$_POST[$i.'4'];
      $d = mysqli_escape_string($con,$d);

      $r2=mysqli_query($con,"DELETE FROM `options` WHERE `qid`='$qid'") or die('Error');
      $qa=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$a','$oaid')") or die('Error61');
      $qb=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$b','$obid')") or die('Error62');
      $qc=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$c','$ocid')") or die('Error63');
      $qd=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$d','$odid')") or die('Error64');

      $e=$_POST['ans'.$i];
      $e = mysqli_escape_string($con,$e);
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
  
      $r3=mysqli_query($con,"DELETE FROM `answer` WHERE `qid`='$qid'") or die('Error');
      $qans=mysqli_query($con,"INSERT INTO answer VALUES  ('$qid','$ansid')");

    }
  
  }
  header("location:dash.php?q=5");
  }
  }

//quiz start
if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {
  $eid=@$_GET['eid'];
  $sn=@$_GET['n'];
  $total=@$_GET['t'];
  $ans=$_POST['ans'];
  $ans = mysqli_escape_string($con,$ans);
  $qid=@$_GET['qid'];
  $q=mysqli_query($con,"SELECT * FROM answer WHERE qid='$qid' " );
  while($row=mysqli_fetch_array($q) )
  {
    $ansid=$row['ansid'];
  }
  if($ans == $ansid)
  {
    $q=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid' " );
    while($row=mysqli_fetch_array($q) )
    {
      $sahi=$row['sahi'];
    }
    if($sn == 1)
    {
      $q=mysqli_query($con,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW(),'0')")or die('Error161');
    }
    $q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' ")or die('Error115');

    while($row=mysqli_fetch_array($q) )
    {
      $s=$row['score'];
      $r=$row['sahi'];
    }
    $r++;
    $s=$s+$sahi;
    $q=mysqli_query($con,"UPDATE `history` SET `score`=$s,`level`=$sn,`sahi`=$r, date= NOW()  WHERE  email = '$email' AND eid = '$eid'")or die('Error124');

  } 
  else
  {
    $q=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid' " )or die('Error129');

    while($row=mysqli_fetch_array($q) )
    {
      $wrong=$row['wrong'];
    }
    if($sn == 1)
    {
      $q=mysqli_query($con,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW(),'0' )")or die('Error137');
    }
    $q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error139');
    while($row=mysqli_fetch_array($q) )
    {
      $s=$row['score'];
      $w=$row['wrong'];
    }
    $w++;
    $s=$s-$wrong;
    $q=mysqli_query($con,"UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w, date=NOW() WHERE  email = '$email' AND eid = '$eid'")or die('Error147');
  }
  if($sn != $total)
  {
    $sn++;
    header("location:account.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total")or die('Error152');
  }
  else if( $_SESSION['key']!='sunny7785068889')
  {
    $q=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error156');
    while($row=mysqli_fetch_array($q) )
    {
      $s=$row['score'];
    }
    $q=mysqli_query($con,"SELECT * FROM rank WHERE email='$email'" )or die('Error161');

    $rowcount=mysqli_num_rows($q);
    if($rowcount == 0)
    {
      $q2=mysqli_query($con,"INSERT INTO rank VALUES('$email','$s',NOW())")or die('Error165');
    }
    else
    {
      while($row=mysqli_fetch_array($q) )
      {
        $sun=$row['score'];
      }
      $sun=$s+$sun;
      $q=mysqli_query($con,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'")or die('Error174');
    }

    
    header("location:index.php?q=result&eid=$eid");
  }
  else
  {
    unset($_SESSION["started"]);
  header("location:index.php?q=result&eid=$eid");
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
$q=mysqli_query($con,"DELETE FROM `history` WHERE eid='$eid' AND email='$email' " )or die('Error184');
$q=mysqli_query($con,"SELECT * FROM rank WHERE email='$email'" )or die('Error161');
while($row=mysqli_fetch_array($q) )
{
$sun=$row['score'];
}
$sun=$sun-$s;
$q=mysqli_query($con,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'")or die('Error174');
header("location:account.php?q=quiz&step=2&eid=$eid&n=1&t=$t");
}


//Automatic Submit
if(@$_GET['q']== 'quiz' && @$_GET['step']== 7) {
  $eid=@$_GET['eid'];
  $sn=@$_GET['n'];
  $total=@$_GET['t'];
  $ans=@$_GET['ans'];
  $ans = mysqli_escape_string($con,$ans);
  $qid=@$_GET['qid'];
  $q=mysqli_query($con,"SELECT * FROM answer WHERE qid='$qid' " );
  while($row=mysqli_fetch_array($q) )
  {
    $ansid=$row['ansid'];

    
  }
  if($ans == $ansid)
  {
    $q=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid' " );
    while($row=mysqli_fetch_array($q) )
    {
      $sahi=$row['sahi'];
    }
    if($sn == 1)
    {
      $q=mysqli_query($con,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW(),'0')")or die('Error');
    }
    $q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' ")or die('Error115');

    while($row=mysqli_fetch_array($q) )
    {
      $s=$row['score'];
      $r=$row['sahi'];
    }
    $r++;
    $s=$s+$sahi;
    $q=mysqli_query($con,"UPDATE `history` SET `score`=$s,`level`=$sn,`sahi`=$r, date= NOW()  WHERE  email = '$email' AND eid = '$eid'")or die('Error124');

  } 
  else
  {
    $q=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid' " )or die('Error129');

    while($row=mysqli_fetch_array($q) )
    {
      $wrong=$row['wrong'];
    }
    if($sn == 1)
    {
      $q=mysqli_query($con,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW(),'0' )")or die('Error528');
    }
    $q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error139');
    while($row=mysqli_fetch_array($q) )
    {
      $s=$row['score'];
      $w=$row['wrong'];
    }
    $w++;
    $s=$s-$wrong;
    $q=mysqli_query($con,"UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w, date=NOW() WHERE  `email` = '$email' AND eid = '$eid'")or die('Error147');
  }
 if( $_SESSION['key'] != 'sunny7785068889')
  {
    $q=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error156');
    while($row=mysqli_fetch_array($q) )
    {
      $s=$row['score'];
    }
    $q=mysqli_query($con,"SELECT * FROM rank WHERE email='$email'" )or die('Error161');

    $rowcount=mysqli_num_rows($q);
    if($rowcount == 0)
    {
      $q2=mysqli_query($con,"INSERT INTO rank VALUES('$email','$s',NOW())")or die('Error165');
    }
    else
    {
      while($row=mysqli_fetch_array($q) )
      {
        $sun=$row['score'];
      }
      $sun=$s+$sun;
      $q=mysqli_query($con,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'")or die('Error174');
    }
    unset($_SESSION["started"]);
    header("location:index.php?q=result&eid=$eid");
  }
  else
  {
    unset($_SESSION["started"]);
  header("location:index.php?q=result&eid=$eid");
  }
}
//insert WaecID
if(@$_GET['q']== 'uniqueid') {
  $pid=uniqid();
  $q=mysqli_query($con,"INSERT INTO `profquiz` VALUES('0','0','0','$pid','0','0','0','0','0','0','0' )")or die('Error324');
  if($q){
    echo"<script>alert('Unique ID Inserted!')</script>";
    echo"<script>window.open('dash.php?q=10','_self')</script>";
  }
}

//insert JambID
if(@$_GET['q']== 'legendid') {
  $pid=uniqid();
  $q=mysqli_query($con,"INSERT INTO `legendquiz` VALUES('0','0','0','$pid','0','0','0','0','0','0','0' )")or die('Error324');
  if($q){
    echo"<script>alert('Unique ID Inserted!')</script>";
    echo"<script>window.open('dash.php?q=18','_self')</script>";
  }
}

//Enter Post Detail
if(isset($_SESSION['key'])){
  if(@$_GET['q']=='post' && $_SESSION['key']=='sunny7785068889') {
    $title = $_POST['title'];
    $title = mysqli_escape_string($con, $title);
    $body = $_POST['body'];
    $body = mysqli_escape_string($con,$body);
    $q=mysqli_query($con,"INSERT INTO post VALUES('','$title','$body',NOW())")or die('Error328');
    if($q){
      echo"<script>alert('Post Inserted Succesfully!')</script>";
      echo"<script>window.open('dash.php?q=14','_self')</script>";
    }
  }
}

//Edit post Detail
if(isset($_SESSION['key'])){
  if(@$_GET['q']== 'editpost' && $_SESSION['key']=='sunny7785068889') {
    $pid=@$_GET['pid'];
    $title = $_POST['title'];
    $title = mysqli_escape_string($con,$title);
    $body = $_POST['body'];
    $body = mysqli_escape_string($con,$body);
    
    $q=mysqli_query($con,"UPDATE `post` SET `post_title`='$title',`post_body`='$body',`post_date`=NOW() WHERE `post_id`='$pid'")or die('Error590');
    if($q){
      echo"<script>alert('Updated Succesfully!')</script>";
      echo"<script>window.open('dash.php?q=15','_self')</script>";
    }
  }
}
  
//Delete post
if(isset($_SESSION['key'])){
  if(@$_GET['q']== 'rmpost' && $_SESSION['key']=='sunny7785068889') {
    $pid=@$_GET['pid'];
    $delete_post = mysqli_query($con,"DELETE FROM `post` WHERE `post_id`='$pid'") or die('Error350');
    
    if($delete_post){
      echo"<script>alert('Post Deleted!')</script>";
      echo"<script>window.open('dash.php?q=15','_self')</script>";
    }
  }
}

//Enter Subject Detail
if(isset($_SESSION['key'])){
  if(@$_GET['q']=='addsub' && $_SESSION['key']=='sunny7785068889') {
    $subject = $_POST['subject'];
    $subject = mysqli_escape_string($con, $subject);
    $q=mysqli_query($con,"INSERT INTO `subjects` VALUES('','$subject')")or die('Error328');
    if($q){
      echo"<script>alert('Subject Inserted Succesfully!')</script>";
      echo"<script>window.open('dash.php?q=17','_self')</script>";
    }
  }
}
?>
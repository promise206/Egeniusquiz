<?php
include('account/admin.class.php');
$admin=new admin();
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
    unlink($path);
      $sel_user2=mysqli_query($con,"SELECT * FROM `referrer` WHERE `ref_email`='$demail' " );
      while($row = mysqli_fetch_array($sel_user2)) {
        $referred_by = $row['referred_by'];
      
      }
      $sel_user3=mysqli_query($con,"SELECT * FROM `referrer` WHERE `ref_email`='$referred_by' " );
      $referrer_bonus = 0;
      while($row = mysqli_fetch_array($sel_user3)) {
        $referrer_bonus = $row['ref_bonus'];
      }
      $total_ref = $total_ref-1;
      if($referrer_bonus==0){
        $referrer_bonus=0;
      }else{
      $referrer_bonus = $referrer_bonus-10;
      }
      $update_referrer=mysqli_query($con,"UPDATE `referrer` SET `ref_bonus`='$referrer_bonus' WHERE `ref_email`='$referred_by'")or die('Error992');
     
      $r1 = mysqli_query($con,"DELETE FROM `rank` WHERE `email`='$demail' ") or die('Error');
      $r2 = mysqli_query($con,"DELETE FROM `freeairtime` WHERE `email`='$demail' ") or die('Error');
      $r3 = mysqli_query($con,"DELETE FROM `profquiz` WHERE `email`='$demail' ") or die('Error');
      $r4 = mysqli_query($con,"DELETE FROM `legendquiz` WHERE `email`='$demail' ") or die('Error');
      $r5 = mysqli_query($con,"DELETE FROM `history` WHERE `email`='$demail' ") or die('Error');
      $r6 = mysqli_query($con,"DELETE FROM `referrer` WHERE `ref_email`='$demail' ") or die('Error');
      $result = mysqli_query($con,"DELETE FROM `user` WHERE `email`='$demail' ") or die('Error');
     
      header("location:dash.php?q=1");
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
//delete Airtime Quiz Ranked User
if(isset($_SESSION['key'])){
  if(@$_GET['del_rank'] && $_SESSION['key']=='sunny7785068889') {
    $ranked_email=@$_GET['del_rank'];
      $r2 = mysqli_query($con,"DELETE FROM `history` WHERE `email`='$ranked_email' ") or die('Error');
      $result = mysqli_query($con,"DELETE FROM `rank` WHERE `email`='$ranked_email' ") or die('Error');
      header("location:dash.php?q=2");
  }
}

//delete Waec Quiz Ranked User
if(isset($_SESSION['key'])){
  if(@$_GET['del_waecrank'] && $_SESSION['key']=='sunny7785068889') {
    $ranked_email=@$_GET['del_waecrank'];
      $r2 = mysqli_query($con,"DELETE FROM `waechistory` WHERE `email`='$ranked_email' ") or die('Error');
      $result = mysqli_query($con,"DELETE FROM `waecrank` WHERE `email`='$ranked_email' ") or die('Error');
      header("location:dash.php?q=39");
  }
}

//delete Jamb Quiz Ranked User
if(isset($_SESSION['key'])){
  if(@$_GET['del_jambrank'] && $_SESSION['key']=='sunny7785068889') {
    $ranked_email=@$_GET['del_jambrank'];
      $r2 = mysqli_query($con,"DELETE FROM `jambhistory` WHERE `email`='$ranked_email' ") or die('Error');
      $result = mysqli_query($con,"DELETE FROM `jambrank` WHERE `email`='$ranked_email' ") or die('Error');
      header("location:dash.php?q=40");
  }
}
//remove AIRTIME quiz
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

//remove WAEC quiz
if(isset($_SESSION['key'])){
  if(@$_GET['q']== 'rmwaecquiz' && $_SESSION['key']=='sunny7785068889') {
    $eid=@$_GET['eid'];
    $result = mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' ") or die('Error');
    while($row = mysqli_fetch_array($result)) {
        $qid = $row['qid'];
      $r1 = mysqli_query($con,"DELETE FROM options WHERE qid='$qid'") or die('Error');
      $r2 = mysqli_query($con,"DELETE FROM answer WHERE qid='$qid' ") or die('Error');
    }
    $r3 = mysqli_query($con,"DELETE FROM questions WHERE eid='$eid' ") or die('Error');
    $r4 = mysqli_query($con,"DELETE FROM waecquiz WHERE eid='$eid' ") or die('Error');
    $r4 = mysqli_query($con,"DELETE FROM waechistory WHERE eid='$eid' ") or die('Error');

  header("location:dash.php?q=33");
  }
}

//remove JAMB quiz
if(isset($_SESSION['key'])){
  if(@$_GET['q']== 'rmjambquiz' && $_SESSION['key']=='sunny7785068889') {
    $eid=@$_GET['eid'];
    $result = mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' ") or die('Error');
    while($row = mysqli_fetch_array($result)) {
        $qid = $row['qid'];
      $r1 = mysqli_query($con,"DELETE FROM options WHERE qid='$qid'") or die('Error');
      $r2 = mysqli_query($con,"DELETE FROM answer WHERE qid='$qid' ") or die('Error');
    }
    $r3 = mysqli_query($con,"DELETE FROM questions WHERE eid='$eid' ") or die('Error');
    $r4 = mysqli_query($con,"DELETE FROM jambquiz WHERE eid='$eid' ") or die('Error');
    $r4 = mysqli_query($con,"DELETE FROM jambhistory WHERE eid='$eid' ") or die('Error');

  header("location:dash.php?q=34");
  }
}

//add AIRIME quiz Detail
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


//add AIRIME question
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

//Edit AIRTIME quiz Detail
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

//Edit WAEC quiz Detail
if(isset($_SESSION['key'])){
  if(@$_GET['q']== 'editwaecquiz' && $_SESSION['key']=='sunny7785068889') {
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
    $q=mysqli_query($con,"UPDATE `waecquiz` SET `title`='$name',`sahi`='$sahi',`wrong`='$wrong',`waectime`='$time',`tag`='$tag',`intro`='$desc' WHERE `eid`='$eid'");
    if($q){
      echo"<script>alert('Waec Quiz Updated Succesfully!')</script>";
      echo"<script>window.open('dash.php?q=33','_self')</script>";
    }
  }
}

//Edit AIRTIME quiz Detail
if(isset($_SESSION['key'])){
  if(@$_GET['q']== 'editjambquiz' && $_SESSION['key']=='sunny7785068889') {
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
    $q=mysqli_query($con,"UPDATE `jambquiz` SET `title`='$name',`sahi`='$sahi',`wrong`='$wrong',`jambtime`='$time',`tag`='$tag',`intro`='$desc' WHERE `eid`='$eid'");
    if($q){
      echo"<script>alert('Jamb Quiz Updated Succesfully!')</script>";
      echo"<script>window.open('dash.php?q=34','_self')</script>";
    }
  }
}



//Edit AIRTIME Question
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

  //Edit WAEC Question
if(isset($_SESSION['key'])){
  if(@$_GET['q']== 'editwaecqns' && $_SESSION['key']=='sunny7785068889') {
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
  header("location:dash.php?q=33");
  }
  }

  //Edit JAMB Question
if(isset($_SESSION['key'])){
  if(@$_GET['q']== 'editjambqns' && $_SESSION['key']=='sunny7785068889') {
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
  header("location:dash.php?q=34");
  }
  }

//AIRTIME quiz start
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


//Automatic Submit AIRTIME QUIZ
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
  $q=mysqli_query($con,"INSERT INTO `profquiz` VALUES('0','0','0','$pid','0','0','0','0','0','0','0','0' )")or die('Error324');
  if($q){
    echo"<script>alert('Unique ID Inserted!')</script>";
    echo"<script>window.open('dash.php?q=10','_self')</script>";
  }
}

//insert JambID
if(@$_GET['q']== 'legendid') {
  $pid=uniqid();
  $q=mysqli_query($con,"INSERT INTO `legendquiz` VALUES('0','0','0','$pid','0','0','0','0','0','0','0','0' )")or die('Error324');
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

//Enter News Detail
if(isset($_SESSION['key'])){
  if(@$_GET['q']=='news' && $_SESSION['key']=='sunny7785068889') {
    $b_title = $_POST['b_title'];
    $b_title = mysqli_escape_string($con, $b_title);
    $b_body = $_POST['b_body'];
    $b_body = mysqli_escape_string($con,$b_body);
  
    $uploadedFile = $_FILES['file']['tmp_name'];
    $sourceProperties = getimagesize($uploadedFile);
    $newFileName = time();
    $dirPath = "../blog_images/";
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $newFileRename = $newFileName. "_thump.". $ext;
    $imageType = $sourceProperties[2];


    if(is_array($_FILES)){

      switch ($imageType){
  
        case IMAGETYPE_PNG:
        $imageSrc = imagecreatefrompng($uploadedFile);
        $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
        imagepng($tmp,$dirPath. $newFileRename);
        break;
  
        case IMAGETYPE_JPEG:
        $imageSrc = imagecreatefromjpeg($uploadedFile);
        $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
        imagepng($tmp,$dirPath. $newFileRename);
        break;
  
        case IMAGETYPE_GIF:
        $imageSrc = imagecreatefromjif($uploadedFile);
        $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
        imagepng($tmp,$dirPath. $newFileRename);
        break;
  
        default:
        echo "<script>alert('Invalid Image Type!')</script>";
        echo "<script>window.open('dash.php?q=21','_self')</script>";
        exit;
        break;
      }
      $q=mysqli_query($con,"INSERT INTO `blog` VALUES('','$b_title','$b_body','$newFileRename',NOW())")or die('Error328');
      if($q){
        
        echo"<script>alert('News Inserted Succesfully!')</script>";
        echo"<script>window.open('dash.php?q=21','_self')</script>";
      }
    }else{
      echo "<script>alert('Image File Not Supported!')</script>";
      echo"<script>window.open('dash.php?q=21','_self')</script>";
    }
    }
}

//Delete Blog News
if(isset($_SESSION['key'])){
  if(@$_GET['q']== 'rmnews' && $_SESSION['key']=='sunny7785068889') {
    $bid=@$_GET['bid'];
    

    $q=mysqli_query($con,"SELECT * FROM `blog` WHERE `blog_id`='$bid' " );
    while($row=mysqli_fetch_array($q) )
    {
      $blog_image=$row['blog_image'];
    }
    $path="../blog_images/$blog_image";
    if(unlink($path)){
    $delete_post = mysqli_query($con,"DELETE FROM `blog` WHERE `blog_id`='$bid'") or die('Error350');
    if($delete_post){
      echo"<script>alert('News Deleted!')</script>";
      echo"<script>window.open('dash.php?q=22','_self')</script>";
    }
    else{
      echo"<script>alert('News Not Deleted!')</script>";
      echo"<script>window.open('dash.php?q=22','_self')</script>";
    }
  }
  else{
    echo"<script>alert('Image Not Deleted!')</script>";
    echo"<script>window.open('dash.php?q=22','_self')</script>";
  }
  }
}

//Edit Blog news Detail
if(isset($_SESSION['key'])){
  if(@$_GET['q']== 'editnews' && $_SESSION['key']=='sunny7785068889') {
    $bid=@$_GET['bid'];
    $b_title = $_POST['b_title'];
    $b_title = mysqli_escape_string($con, $b_title);
    $b_body = $_POST['b_body'];
    $b_body = mysqli_escape_string($con,$b_body);
  
    $uploadedFile = $_FILES['file']['tmp_name'];
    $sourceProperties = getimagesize($uploadedFile);
    $newFileName = time();
    $dirPath = "../blog_images/";
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $newFileRename = $newFileName. "_thump.". $ext;
    $imageType = $sourceProperties[2];

    if(is_array($_FILES)){

      switch ($imageType){
  
        case IMAGETYPE_PNG:
        $imageSrc = imagecreatefrompng($uploadedFile);
        $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
        imagepng($tmp,$dirPath. $newFileRename);
        break;
  
        case IMAGETYPE_JPEG:
        $imageSrc = imagecreatefromjpeg($uploadedFile);
        $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
        imagepng($tmp,$dirPath. $newFileRename);
        break;
  
        case IMAGETYPE_GIF:
        $imageSrc = imagecreatefromjif($uploadedFile);
        $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
        imagepng($tmp,$dirPath. $newFileRename);
        break;
  
        default:
        echo "<script>alert('Invalid Image Type!')</script>";
        echo "<script>window.open('dash.php?q=22','_self')</script>";
        exit;
        break;
      }

    $q=mysqli_query($con,"SELECT * FROM `blog` WHERE `blog_id`='$bid' " );
    while($row=mysqli_fetch_array($q) )
    {
      $news_image=$row['blog_image'];
    }
    $path="../blog_images/$news_image";
    if(unlink($path)){
    
    $q=mysqli_query($con,"UPDATE `blog` SET `blog_title`='$b_title',`blog_body`='$b_body',`blog_image`='$newFileRename',`blog_date`=NOW() WHERE `blog_id`='$bid'")or die('Error591');
    if($q){
      
      echo"<script>alert('News Updated Succesfully!')</script>";
      echo"<script>window.open('dash.php?q=22','_self')</script>";
    }
  }
  else{
    echo "<script>alert('Image Not Deleted Supported!')</script>";
    echo"<script>window.open('dash.php?q=22','_self')</script>";
    exit();
  }
}else{
  echo "<script>alert('Image File Not Supported!')</script>";
  echo"<script>window.open('dash.php?q=22','_self')</script>";
  exit();
}
  }
}

//Delete Subject
if(isset($_SESSION['key'])){
  if(@$_GET['q']== 'rmsub' && $_SESSION['key']=='sunny7785068889') {
    $sid=@$_GET['sid'];
    $delete_sub = mysqli_query($con,"DELETE FROM `subjects` WHERE `subject_id`='$sid'") or die('Error1000');
    if($delete_sub){
      echo"<script>alert('Subject Deleted!')</script>";
      echo"<script>window.open('dash.php?q=24','_self')</script>";
    }
  }
}

//Enter slider Detail
if(isset($_SESSION['key'])){
  if(@$_GET['q']=='slider' && $_SESSION['key']=='sunny7785068889') {
    $s_title = $_POST['s_title'];
    $s_title = mysqli_escape_string($con, $s_title);
    $s_body = $_POST['s_body'];
    $s_body = mysqli_escape_string($con,$s_body);
  
    $uploadedFile = $_FILES['file']['tmp_name'];
    $sourceProperties = getimagesize($uploadedFile);
    $newFileName = time();
    $dirPath = "../sliderImage/";
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $newFileRename = $newFileName. "_thump.". $ext;
    $imageType = $sourceProperties[2];

    
    if(is_array($_FILES)){

      switch ($imageType){
  
        case IMAGETYPE_PNG:
        $imageSrc = imagecreatefrompng($uploadedFile);
        $tmp = sliderImageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
        imagepng($tmp,$dirPath. $newFileRename);
        break;
  
        case IMAGETYPE_JPEG:
        $imageSrc = imagecreatefromjpeg($uploadedFile);
        $tmp = sliderImageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
        imagepng($tmp,$dirPath. $newFileRename);
        break;
  
        case IMAGETYPE_GIF:
        $imageSrc = imagecreatefromjif($uploadedFile);
        $tmp = sliderImageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
        imagepng($tmp,$dirPath. $newFileRename);
        break;
  
        default:
        echo "<script>alert('Invalid Image Type!')</script>";
        echo "<script>window.open('dash.php?q=25','_self')</script>";
        exit;
        break;
      }
    
    $q=mysqli_query($con,"INSERT INTO `slider` VALUES('','$newFileRename','$s_title','$s_body',NOW())")or die('Error777');
      if($q){
        echo"<script>alert('slider Inserted Succesfully!')</script>";
        echo"<script>window.open('dash.php?q=25','_self')</script>";
      }
    }else{
      echo "<script>alert('Image File Not Supported!')</script>";
    }
    }
}

//Delete Slider
if(isset($_SESSION['key'])){
  if(@$_GET['q']== 'rmslider' && $_SESSION['key']=='sunny7785068889') {
    $sid=@$_GET['sid'];
    

    $q=mysqli_query($con,"SELECT * FROM `slider` WHERE `slider_id`='$sid' " );
    while($row=mysqli_fetch_array($q) )
    {
      $slider_image=$row['ImageName'];
    }
    $path="../sliderImage/$slider_image";
    if(unlink($path)){
    $delete_slider = mysqli_query($con,"DELETE FROM `slider` WHERE `slider_id`='$sid'") or die('Error888');
    if($delete_slider){
      echo"<script>alert('Slider Deleted!')</script>";
      echo"<script>window.open('dash.php?q=26','_self')</script>";
    }
    else{
      echo"<script>alert('Slider Not Deleted!')</script>";
      echo"<script>window.open('dash.php?q=26','_self')</script>";
    }
  }
  else{
    echo"<script>alert('Image Not Deleted!')</script>";
    echo"<script>window.open('dash.php?q=26','_self')</script>";
  }
  }
}


//Edit Slider news Detail
if(isset($_SESSION['key'])){
  if(@$_GET['q']== 'editslider' && $_SESSION['key']=='sunny7785068889') {
    $sid=@$_GET['sid'];
    $s_title = $_POST['s_title'];
    $s_title = mysqli_escape_string($con, $s_title);
    $s_body = $_POST['s_body'];
    $s_body = mysqli_escape_string($con,$s_body);
  
    $uploadedFile = $_FILES['file']['tmp_name'];
    $sourceProperties = getimagesize($uploadedFile);
    $newFileName = time();
    $dirPath = "../sliderImage/";
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $newFileRename = $newFileName. "_thump.". $ext;
    $imageType = $sourceProperties[2];

    
    if(is_array($_FILES)){

      switch ($imageType){
  
        case IMAGETYPE_PNG:
        $imageSrc = imagecreatefrompng($uploadedFile);
        $tmp = sliderImageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
        imagepng($tmp,$dirPath. $newFileRename);
        break;
  
        case IMAGETYPE_JPEG:
        $imageSrc = imagecreatefromjpeg($uploadedFile);
        $tmp = sliderImageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
        imagepng($tmp,$dirPath. $newFileRename);
        break;
  
        case IMAGETYPE_GIF:
        $imageSrc = imagecreatefromjif($uploadedFile);
        $tmp = sliderImageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
        imagepng($tmp,$dirPath. $newFileRename);
        break;
  
        default:
        echo "<script>alert('Invalid Image Type!')</script>";
        echo "<script>window.open('dash.php?q=26','_self')</script>";
        exit;
        break;
      }
    $q=mysqli_query($con,"SELECT * FROM `slider` WHERE `slider_id`='$sid' " );
    while($row=mysqli_fetch_array($q) )
    {
      $slider_image=$row['ImageName'];
    }
    $path="../sliderImage/$slider_image";
    if(unlink($path)){
    
    $q=mysqli_query($con,"UPDATE `slider` SET `ImageName`='$newFileRename',`slider_title`='$s_title',`slider_body`='$s_body',`slider_date`=NOW() WHERE `slider_id`='$sid'")or die('Error999');
    if($q){
      
      echo"<script>alert('Slider Updated Succesfully!')</script>";
      echo"<script>window.open('dash.php?q=26','_self')</script>";
    }
  }
  else{
    echo "<script>alert('Image Not Deleted Supported!')</script>";
    echo"<script>window.open('dash.php?q=26','_self')</script>";
    exit();
  }
}else{
  echo "<script>alert('Image File Not Supported!')</script>";
  echo"<script>window.open('dash.php?q=26','_self')</script>";
  exit();
}
  }
}


//Approve Ent&Sports
if(isset($_SESSION['key'])){
include('../blog.class.php');
$blog = new blog();
  if(@$_GET['q']== 'approve' && $_SESSION['key']=='sunny7785068889') {
    $ent_id=@$_GET['ent_id'];
    
    if($blog->approve($ent_id)){
      echo"<script>window.open('dash.php?q=28','_self')</script>";
    }
  }
}

//Delete Ent&Sports
if(isset($_SESSION['key'])){
    if(@$_GET['ent_post']== 'delete' && $_SESSION['key']=='sunny7785068889') {
      $ent_id=@$_GET['ent_id'];
      
      if($blog->delete_ent($ent_id)){
        echo"<script>window.open('dash.php?q=28','_self')</script>";
      }
    }
  }
//activate Registered Airtime quiz 
  if(isset($_SESSION['key'])){
    if(@$_GET['activate']== 'airtime' && $_SESSION['key']=='sunny7785068889') {
      $status=@$_GET['active'];
      $activate_value = 1;
      $deactivate_value = 0;
      
    if($status=="2"){
      $q=mysqli_query($con,"UPDATE `freeairtime` SET `active`='$activate_value' WHERE `active`='0'")or die('Error993');
      echo "<script>alert('Activated!')</script>";
      echo"<script>window.open('dash.php?q=13','_self')</script>";
    }elseif($status=="3"){
      $q=mysqli_query($con,"UPDATE `freeairtime` SET `active`='$deactivate_value' WHERE `active`='1'")or die('Error992');
      echo "<script>alert('Deactivated!')</script>";
      echo"<script>window.open('dash.php?q=13','_self')</script>";
    }
    }
  }

  //activate Registered Jamb quiz 
  if(isset($_SESSION['key'])){
    if(@$_GET['activate']== 'jamb' && $_SESSION['key']=='sunny7785068889') {
      $status=@$_GET['active'];
      $activate_value = 1;
      $deactivate_value = 0;
      
    if($status=="2"){
      $q=mysqli_query($con,"UPDATE `legendquiz` SET `active`='$activate_value' WHERE `active`='0'")or die('Error993');
      echo "<script>alert('Activated!')</script>";
      echo"<script>window.open('dash.php?q=19','_self')</script>";
    }elseif($status=="3"){
      $q=mysqli_query($con,"UPDATE `legendquiz` SET `active`='$deactivate_value' WHERE `active`='1'")or die('Error992');
      echo "<script>alert('Deactivated!')</script>";
      echo"<script>window.open('dash.php?q=19','_self')</script>";
    }
    }
  }

   //activate Registered Jamb quiz 
   if(isset($_SESSION['key'])){
    if(@$_GET['activate']== 'waec' && $_SESSION['key']=='sunny7785068889') {
      $status=@$_GET['active'];
      $activate_value = 1;
      $deactivate_value = 0;
      
    if($status=="2"){
      $q=mysqli_query($con,"UPDATE `profquiz` SET `active`='$activate_value' WHERE `active`='0'")or die('Error993');
      echo "<script>alert('Activated!')</script>";
      echo"<script>window.open('dash.php?q=11','_self')</script>";
    }elseif($status=="3"){
      $q=mysqli_query($con,"UPDATE `profquiz` SET `active`='$deactivate_value' WHERE `active`='1'")or die('Error992');
      echo "<script>alert('Deactivated!')</script>";
      echo"<script>window.open('dash.php?q=11','_self')</script>";
    }
    }
  }

  //add WAEC quiz Detail
  if(isset($_SESSION['key'])){
    if(@$_GET['q']== 'addwaecquiz' && $_SESSION['key']=='sunny7785068889') {
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
    $q3=mysqli_query($con,"INSERT INTO waecquiz VALUES  ('$id','$name' , '$sahi' , '$wrong','$total','$time' ,'$desc','$tag', NOW())");
    
    header("location:dash.php?q=30&step=2&eid=$id&n=$total");
    }
  }

  //add WAEC question
if(isset($_SESSION['key'])){
  if(@$_GET['q']== 'addwaecqns' && $_SESSION['key']=='sunny7785068889') {
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

    //add JAMB quiz Detail
    if(isset($_SESSION['key'])){
      if(@$_GET['q']== 'addjambquiz' && $_SESSION['key']=='sunny7785068889') {
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
      $q3=mysqli_query($con,"INSERT INTO jambquiz VALUES  ('$id','$name' , '$sahi' , '$wrong','$total','$time' ,'$desc','$tag', NOW())");
      
      header("location:dash.php?q=32&step=2&eid=$id&n=$total");
      }
    }
  
    //add JAMB question
  if(isset($_SESSION['key'])){
    if(@$_GET['q']== 'addjambqns' && $_SESSION['key']=='sunny7785068889') {
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

  //Enter Tech News Detail
if(isset($_SESSION['key'])){
  if(@$_GET['q']=='technews' && $_SESSION['key']=='sunny7785068889') {
    $email=$_SESSION['username'];
    $t_title = $_POST['t_title'];
    $t_body = $_POST['t_body'];
    $posterName = 'Admin';
  
    $uploadedFile = $_FILES['file']['tmp_name'];
    if($uploadedFile==""){
      $newFileRename = "";
    }else{
    $sourceProperties = getimagesize($uploadedFile);
    $newFileName = time();
    $dirPath = "../blog_images/";
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $newFileRename = $newFileName. "_thump.". $ext;
    $imageType = $sourceProperties[2];
    }
    
    $approved = 1;
	

	$insert_tech = array(

		'poster_name' => mysqli_real_escape_string($blog->get_conn(), $posterName),
		'poster_email' => mysqli_real_escape_string($blog->get_conn(), $email),
		'technews_title' => mysqli_real_escape_string($blog->get_conn(), $t_title),
		'technews_body' => mysqli_real_escape_string($blog->get_conn(), $t_body),
		'technews_image' => mysqli_real_escape_string($blog->get_conn(), $newFileRename),
        'approved' => mysqli_real_escape_string($blog->get_conn(), $approved),
		
		);

    if(is_array($_FILES)){
      if($uploadedFile!=""){
      switch ($imageType){
  
        case IMAGETYPE_PNG:
        $imageSrc = imagecreatefrompng($uploadedFile);
        $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
        imagepng($tmp,$dirPath. $newFileRename);
        break;
  
        case IMAGETYPE_JPEG:
        $imageSrc = imagecreatefromjpeg($uploadedFile);
        $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
        imagepng($tmp,$dirPath. $newFileRename);
        break;
  
        case IMAGETYPE_GIF:
        $imageSrc = imagecreatefromjif($uploadedFile);
        $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
        imagepng($tmp,$dirPath. $newFileRename);
        break;
  
        default:
        echo "<script>alert('Invalid Image Type!')</script>";
        echo "<script>window.open('dash.php?q=41','_self')</script>";
        exit;
        break;
      }
    }
      if ($admin->register("tech_news", $insert_tech)) {
        
        echo"<script>alert('News Inserted Succesfully!')</script>";
        echo"<script>window.open('dash.php?q=41','_self')</script>";
      }
    }else{
      echo "<script>alert('Image File Not Supported!')</script>";
      echo"<script>window.open('dash.php?q=41','_self')</script>";
    }
    }
}

 //Enter Edit Tech News Detail
 if(isset($_SESSION['key'])){
  if(@$_GET['q']=='editTechNews' && $_SESSION['key']=='sunny7785068889') {
    $tid=@$_GET['tid'];
    $email=$_SESSION['username'];
    $t_title = $_POST['t_title'];
    $t_title = mysqli_escape_string($con, $t_title);
    $t_body = $_POST['t_body'];
    $t_body = mysqli_escape_string($con,$t_body);
    $posterName = 'Admin';
  
    $uploadedFile = $_FILES['file']['tmp_name'];
    if($uploadedFile==""){
      $newFileRename = "";
    }else{
    $sourceProperties = getimagesize($uploadedFile);
    $newFileName = time();
    $dirPath = "../blog_images/";
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $newFileRename = $newFileName. "_thump.". $ext;
    $imageType = $sourceProperties[2];
    }
    
    $approved = 1;
	
    if(is_array($_FILES)){
      if($uploadedFile!=""){
      switch ($imageType){
  
        case IMAGETYPE_PNG:
        $imageSrc = imagecreatefrompng($uploadedFile);
        $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
        imagepng($tmp,$dirPath. $newFileRename);
        break;
  
        case IMAGETYPE_JPEG:
        $imageSrc = imagecreatefromjpeg($uploadedFile);
        $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
        imagepng($tmp,$dirPath. $newFileRename);
        break;
  
        case IMAGETYPE_GIF:
        $imageSrc = imagecreatefromjif($uploadedFile);
        $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
        imagepng($tmp,$dirPath. $newFileRename);
        break;
  
        default:
        echo "<script>alert('Invalid Image Type!')</script>";
        echo "<script>window.open('dash.php?q=43','_self')</script>";
        exit;
        break;
      }
    }
    $q=mysqli_query($con,"SELECT * FROM `tech_news` WHERE `technews_id`='$tid' " );
    while($row=mysqli_fetch_array($q) )
    {
      $technews_image=$row['technews_image'];
    }
    if($technews_image!=""){
    $path="../blog_images/$technews_image";
    if(unlink($path));
    }
    
    $q=mysqli_query($con,"UPDATE `tech_news` SET `technews_image`='$newFileRename',`technews_title`='$t_title',`technews_body`='$t_body',`technews_date`=NOW() WHERE `technews_id`='$tid'")or die('Error999');
    if($q){
        
        echo"<script>alert('Tech News Updated Succesfully!')</script>";
        echo"<script>window.open('dash.php?q=42','_self')</script>";
      }
    
    }else{
      echo "<script>alert('Image File Not Supported!')</script>";
      echo"<script>window.open('dash.php?q=43','_self')</script>";
    }
    }
}

//Delete Tech News
if(isset($_SESSION['key'])){
  if(@$_GET['q']== 'rmtech' && $_SESSION['key']=='sunny7785068889') {
    $tid=@$_GET['t_id'];

    $q=mysqli_query($con,"SELECT * FROM `tech_news` WHERE `technews_id`='$tid' " );
    $technews_image=0;
    while($row=mysqli_fetch_array($q) )
    {
      $technews_image=$row['technews_image'];
    }
    if($technews_image!=""){
    $path="../blog_images/$technews_image";
    if(unlink($path));
    }
    $delete_technews = mysqli_query($con,"DELETE FROM `tech_news` WHERE `technews_id`='$tid'") or die('Error888');
    if($delete_technews){
      echo"<script>alert('Tech News Deleted!')</script>";
      echo"<script>window.open('dash.php?q=42','_self')</script>";
    }
    else{
      echo"<script>alert('Slider Not Deleted!')</script>";
      echo"<script>window.open('dash.php?q=42','_self')</script>";
    }
  }
}


//Delete Tech News
if(isset($_SESSION['key'])){
  if(@$_GET['q']== 'rmcmt' && $_SESSION['key']=='sunny7785068889') {
    $cid=@$_GET['c_id'];

    $q=mysqli_query($con,"SELECT * FROM `comments` WHERE `comment_id`='$cid' " );
    
    $delete_comment = mysqli_query($con,"DELETE FROM `comments` WHERE `comment_id`='$cid'") or die('Error111');
    if($delete_comment){
      echo"<script>alert('Comment Deleted!')</script>";
      echo"<script>window.open('dash.php?q=44','_self')</script>";
    }
  }
}
//History Update
if(isset($_SESSION['key'])){
  if(@$_GET['history_eid'] && $_SESSION['key']=='sunny7785068889') {
    $eid = @$_GET['history_eid'];
    $candidate_email = @$_GET['email'];
    $subject_score = @$_GET['score'];

    $del_subject_history = mysqli_query($con,"DELETE FROM `history` WHERE `email`='$candidate_email' AND `eid`='$eid'") or die('Error934');
    if($del_subject_history){
      $sel_user_rank = mysqli_query($con,"SELECT * FROM `rank` WHERE `email`='$candidate_email' " );
      while($row=mysqli_fetch_array($sel_user_rank) )
      {
        $total_score=$row['score'];

      }
      $current_score = $total_score - $subject_score;
      $update_user_rank=mysqli_query($con,"UPDATE `rank` SET `score`='$current_score' WHERE `email`='$candidate_email'")or die('Error991');
      if($update_user_rank){
        echo"<script>alert('Candidate Rank History Deleted!')</script>";
        echo"<script>window.open('dash.php?q=46','_self')</script>";
      }else{
        echo"<script>alert('Candidate Rank Not Updated!')</script>";
        echo"<script>window.open('dash.php?q=46','_self')</script>";
      }
    }else{
      echo"<script>alert('Candidate Subject History Not Deleted!')</script>";
      echo"<script>window.open('dash.php?q=46','_self')</script>";
    }
  }
}
//Block & Unblock Airtime Quiz Users
if(isset($_SESSION['key'])){
  if(@$_GET['user_email'] && $_SESSION['key']=='sunny7785068889') {
    $candidate_email = @$_GET['user_email'];
    $block = @$_GET['block'];

    if($block==1){
      $block_airtimequiz_cand=mysqli_query($con,"UPDATE `freeairtime` SET `win_count`='3', `blocked`='1' WHERE `email`='$candidate_email'")or die('Not Blocked');
      if($block_airtimequiz_cand){
        echo"<script>alert('Candidate blocked!')</script>";
        echo"<script>window.open('dash.php?q=13','_self')</script>";
      }
    }
    else{
      $update_user_wincount=mysqli_query($con,"UPDATE `freeairtime` SET `win_count`='2' WHERE `email`='$candidate_email' AND `blocked`='1'")or die('Error994');
      if($update_user_wincount){
        $unblock_user=mysqli_query($con,"UPDATE `freeairtime` SET `blocked`='0' WHERE `email`='$candidate_email'")or die('Error991');
        if($unblock_user){
          echo"<script>alert('Candidate Unblocked!')</script>";
          echo"<script>window.open('dash.php?q=47','_self')</script>";
        }else{
          echo"<script>alert('Candidate Not Unblocked!')</script>";
          echo"<script>window.open('dash.php?q=47','_self')</script>";
        }
      }else{
        echo"<script>alert('Candidate Win Count Status Not Updated!')</script>";
        echo"<script>window.open('dash.php?q=47','_self')</script>";
      }
    }
  }
}


  function imageResize($imageSrc,$imageWidth, $imageHeight){
    $newImageWidth = 900;
    $newImageHeight = 500;
    
    $newImageLayer=imagecreatetruecolor($newImageWidth,$newImageHeight);
    imagecopyresampled($newImageLayer,$imageSrc,0,0,0,0,$newImageWidth,$newImageHeight,$imageWidth,$imageHeight);
    
    return $newImageLayer;
  }

  function sliderImageResize($imageSrc,$imageWidth, $imageHeight){
    $newImageWidth = 900;
    $newImageHeight = 480;
    
    $newImageLayer=imagecreatetruecolor($newImageWidth,$newImageHeight);
    imagecopyresampled($newImageLayer,$imageSrc,0,0,0,0,$newImageWidth,$newImageHeight,$imageWidth,$imageHeight);
    
    return $newImageLayer;
  }
?>
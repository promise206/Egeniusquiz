<?php
/* [INIT] */
include('database/db.class.php');
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "2a-config.php";
require PATH_LIB . "2b-lib-comments.php";
$pdo = new Comments();

/* [HANDLE AJAX REQUESTS] */
switch ($_POST['req']) {
	/* [INVALID REQUEST] */
	default:
		echo "ERR";
		break;

	/* [SHOW COMMENTS] */
	case "show":
	$post_id = $_POST['post_id'];
	$sel_post = mysqli_query($con,"SELECT * FROM `comments` WHERE `post_id`='$post_id'") or die('ErrorD');
	while($row=mysqli_fetch_array($sel_post))
	{
	$category=$row['category'];
	}
    $comments = $pdo->get($_POST['post_id'],$_POST['category']);
    function show ($cid, $rid, $name, $time, $message, $indent = 0) { 
    $date = date('d M,Y', strtotime($time));
    $time = date('h:m:s', strtotime($time));
    ?>
    <div class="ccomment<?= $indent ? " creply" : "" ?>">
      <div>
        <span class="cname"><?=$name?></span>
        <span class="ctime"><?=$date.' | '.$time;?></span>
      </div>
			<div class="cmessage"><?=$message?></div>
			<input type="button" class="cbutton" value="Reply" onclick="comments.reply(<?=$cid?>, <?=$rid?>)"/>
			<div id="reply-<?=$cid?>"></div>
		</div>
		<?php }
		if (is_array($comments)) { foreach ($comments as $c) {
			show($c['comment_id'], $c['comment_id'], $c['first_name'], $c['timestamp'], $c['message']);
			if (is_array($c['reply'])) { foreach ($c['reply'] as $r) {
				show($r['comment_id'], $c['comment_id'], $r['first_name'], $r['timestamp'], $r['message'], 1);
			}}
		}}
		break;

	/* [SHOW REPLY FORM] */
	case "reply":
	$email = $_SESSION['email'];
	$sel_user = mysqli_query($con,"SELECT * FROM `user` WHERE `email`='$email'") or die('ErrorD');
	while($row=mysqli_fetch_array($sel_user))
	{
	$first_name=$row['first_name'];
	}
	if($_SESSION['email']){?>
		<form onsubmit="return comments.add(this)" class="creplyform">
      <h1>Leave a reply</h1>
			<input type="hidden" name="reply_id" value="<?=$_POST['reply_id']?>"/>
			
      <input type="hidden" name="name" value="<?=$first_name	?>" required/>
      <textarea name="message" placeholder="Message" required></textarea>
      <input type="submit" class="cbutton" value="Post Comment"/>
    </form>
	<?php }else { echo '<a class="btn btn-primary" href="members/login.php" role="button">Login to Comment</a>'; } break;

	/* [ADD COMMENT] */
	case "add": if($_SESSION['email']){
		echo $pdo->add($_POST['post_id'], $_POST['first_name'], $_POST['name'], $_POST['message'], $_POST['reply_id'], $_POST['category']) ? "OK" : "ERR";
		}else{echo "ERR"; }	break;
}
?>
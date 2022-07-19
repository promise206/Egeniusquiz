
<!--view blog News start-->

<?php if (isset($_GET['message'])): ?>
    <h1 style="color: blue; text-align: center;"><?php echo $_GET['message'] ?></h1>
    <?php endif; ?>
<?php 
 if(@$_GET['view_blog']=='view_ent') {
  $blog = new blog();
  $email=$_SESSION['email'];
  if (isset($_GET['page_no']) && $_GET['page_no']!="") {
  
  
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }

	$total_records_per_page = 10;
    $offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2"; 

	$result_count = mysqli_query($blog->get_conn(),"SELECT COUNT(*) As total_records FROM `ent_sports`");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
  $total_no_of_pages = ceil($total_records / $total_records_per_page);
  $second_last = $total_no_of_pages - 1; // total page minus 1
  
  $result = mysqli_query($blog->get_conn(),"SELECT * FROM `ent_sports` WHERE `poster_email`='$email' ORDER BY `ent_date` DESC  LIMIT $offset, $total_records_per_page") or die('Error');

echo  '<div class="card mb-3">
<div class="card-header">
  <i class="fas fa-table"></i>
  Post Details</div><div class="card-body"><div class="table-responsive"><thead><table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
<tr><th><b>S.N.</b></th><th><b>Title</b></th><th><b>Date</b></th></tr></thead>
<tfoot><tr><th>S.N</th><th>Title</th><th>Date</th></tr></tfoot>';
$c=1;
$i=1;
while($row = mysqli_fetch_array($result)) {
    $ent_id = $row['ent_id'];
  $ent_title = $row['ent_title'];
  $ent_title = substr("$ent_title",0,60);
  $ent_title = $ent_title.'...';
    $ent_date = $row['ent_date'];
    $approved = $row['approved'];

    if ($page_no != 1) {
      $num = (($page_no - 1) * $total_records_per_page) + $i;
    } else {
      $num = $i;
    }

	echo '<tbody><tr><td>'.$num.'</td><td>'.$ent_title.' </td><td>'.$ent_date.'</td>
  ';
  if($approved==0){
  echo '<td><p class="pull-right btn sub1" style="margin:0px;background:red"><b>Waiting Approval</b></p></b>
  <a href="member_profile.php?ent_post=delete&ent_id='.$ent_id.'" class="pull-right btn sub1" style="margin:0px;background:blue"><b>Delete</b></a></b></td></tr></tbody>';
  }
  else{
    echo '<td><p class="pull-right btn sub1" style="margin:0px;background:green"><b>Approved</b></p></b></td></tr></tbody>';
  }
  $i++;
}
mysqli_close($blog->get_conn());
$c=0;
echo '</table></div></div>';
 }

?>

<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>

<ul class="pagination">
	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
	<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no > 1){ echo "href='member_profile.php?view_blog=view_ent&page_no=$previous_page'"; } ?>>Previous</a>
	</li>
       
    <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='member_profile.php?view_blog=view_ent&page_no=$counter'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='member_profile.php?view_blog=view_ent&page_no=$counter'>$counter</a></li>";
				}
        }
		echo "<li><a>...</a></li>";
		echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
		echo "<li><a href='member_profile.php?view_blog=view_ent&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "<li><a href='member_profile.php?view_blog=view_ent&page_no=1'>1</a></li>";
		echo "<li><a href='member_profile.php?view_blog=view_ent&page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='member_profile.php?view_blog=view_ent&page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li><a>...</a></li>";
	   echo "<li><a href='member_profile.php?view_blog=view_ent&page_no=$second_last'>$second_last</a></li>";
	   echo "<li><a href='member_profile.php?view_blog=view_ent&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "<li><a href='member_profile.php?view_blog=view_ent&page_no=1'>1</a></li>";
		echo "<li><a href='member_profile.php?view_blog=view_ent&page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='member_profile.php?view_blog=view_ent&page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>
    
	<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no < $total_no_of_pages) { echo "href='member_profile.php?view_blog=view_ent&page_no=$next_page'"; } ?>>Next</a>
	</li>
    <?php if($page_no < $total_no_of_pages){
		echo "<li><a href='member_profile.php?view_blog=view_ent&page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
		} ?>
</ul>
<!--view Blog News end-->
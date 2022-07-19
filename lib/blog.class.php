<?php
//Creating class for login form and to check user authentication
class blog
{
    //Declare Variable
    private $conn;
    private $table;

    //Function to connect to database server
    function __construct() {
        
        $this->conn = mysqli_connect('localhost', 'egenujyx_jaspino206', 'Promsy_205$', 'egenujyx_egeniusquiz');
    }

    // returns the db connection instance
    function get_conn() {
        return $this->conn;
    }

    //Function to insert new Entertainment And Sports
    Public function insert($table_name,$data)
    {
        date_default_timezone_set('Africa/Lagos');
        $string = "INSERT INTO ".$table_name." (";
        $string .= implode(",", array_keys($data)).') values (';
        $string .= "'". implode("','", array_values($data))."')";

        if (mysqli_query($this->conn, $string)) {
            return true;
        }
        else{
            echo mysqli_error($this->conn);
        }

    }

    Public function entertainment(){
        return ('<div class="row">
        <span class="title1" style="margin-left:40%;font-size:30px;"><b>Entertainment & Sports</b></span><br /><br />
         <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="../ent_action.php" enctype="multipart/form-data" method="POST">
        <fieldset>
        
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-6 control-label" for="ent_title">Enter News Title</label>  
          <div class="col-md-12">
          <input id="ent_title" name="ent_title" placeholder="Enter News Title" class="form-control input-md" type="text" required/>
            
          </div>
        </div>
        
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-6 control-label" for="ent_body">Enter News Body</label>  
          <div class="col-md-12">
          <textarea rows="8" cols="8" name="ent_body" class="form-control" placeholder="Body" ></textarea>  
          </div>
        </div>
        
        <div class="form-group">
        <label for="b_image" class=""col-md-12 control-label">Image:</label>
            <input type="file" class="form-control" id="ent_image" name="file" required>     
            
            </div>   
        
            <div class="col-sm-12">
            <div class="pos-relative pr-80">
            <button type="submit" name="submit" class="btn btn-success">Submit for Approval</button>
            </div><!-- pos-relative -->
        </div><!-- col-sm-6 -->
        
        </fieldset>
        </form></div>');
    }
    
    Public function approve($ent_id){
        date_default_timezone_set('Africa/Lagos');
        $q=mysqli_query($this->get_conn(),"UPDATE `ent_sports` SET `approved`='1',`ent_date`= NOW() WHERE `ent_id`='$ent_id'")or die('Error999');

        return 1;

    }

    Public function delete_ent($ent_id){
        date_default_timezone_set('Africa/Lagos');
        $q=mysqli_query($this->get_conn(),"DELETE FROM `ent_sports` WHERE `ent_id`='$ent_id'")or die('Error999');

        return 1;

    }

    Public function view_ent(){
        
        $limit=6;
        $approved =1;
              $sel_ent = mysqli_query($this->get_conn(),"SELECT * FROM `ent_sports` WHERE `approved`='$approved' ORDER BY `ent_date` DESC LIMIT $limit") or die('ErrorD');
                while($row=mysqli_fetch_array($sel_ent) )
                {
                  $ent_id=$row['ent_id'];
                  $ent_title=$row['ent_title'];
                  $ent_date=$row['ent_date'];
                  $ent_poster=$row['poster_name'];
                  $ent_image=$row['ent_image'];
                  $ent_date = date('d M,Y', strtotime($ent_date));
                  $category = 'ent';

                  $sel_viewn = mysqli_query($this->conn, "SELECT * FROM `like_view` WHERE post_id='$ent_id' AND category='$category'");
                    $view=0;
                  while($row = mysqli_fetch_array($sel_viewn)) {
                    $view = $row['view'];
                }

                  $sel_comments = mysqli_query($this->conn, "SELECT * FROM `comments` WHERE post_id='$ent_id' AND category='$category'");
                    $get_total = mysqli_num_rows($sel_comments);
                    echo'
                    <div class="col-sm-6">
                        <img src="blog_images/'.$ent_image.'" height="200px" alt="">
                        <h4 class="pt-20"><a href="view_post.php?q=ent&ent_id='.$ent_id.'"><b>'.$ent_title.'</b></a></h4>
                        <ul class="list-li-mr-20 pt-10 mb-30">
                            <li class="color-lite-black">by <a href="#" class="color-black"><b>'.$ent_poster.',</b></a>
                            '.$ent_date.'</li>
                            <li><i class="color-primary mr-5 font-12 ion-ios-bolt"></i>'.$view.'</li>
                            <li><i class="color-primary mr-5 font-12 ion-chatbubbles"></i>'.$get_total.'</li>
                        </ul>
                    </div><!-- col-sm-6 -->';
                }
    }

    Public function get_title($q, $id){

        if($q=='ent'){
            $sel_ent = mysqli_query($this->get_conn(),"SELECT * FROM `ent_sports` WHERE `ent_id`='$id'") or die('ErrorD1');
            while($row=mysqli_fetch_array($sel_ent) )
            {
            $ent_title=$row['ent_title'];
            }
            echo $ent_title;
        }elseif($q=='post'){
            $sel_post = mysqli_query($this->get_conn(),"SELECT * FROM `post` WHERE `post_id`='$id'") or die('ErrorD');
            while($row=mysqli_fetch_array($sel_post) )
            {
            $post_title=$row['post_title'];
            }
            echo $post_title;
        }
        elseif($q=='blog'){
        $sel_blog = mysqli_query($this->get_conn(),"SELECT * FROM `blog` WHERE `blog_id`='$id'") or die('ErrorD');
            while($row=mysqli_fetch_array($sel_blog) )
            {
            $blog_title=$row['blog_title'];
            }
            echo $blog_title;
        }
        else{
            $sel_technews = mysqli_query($this->get_conn(),"SELECT * FROM `tech_news` WHERE `technews_id`='$id'") or die('ErrorD');
                while($row=mysqli_fetch_array($sel_technews) )
                {
                $technews_title=$row['technews_title'];
                }
                echo $technews_title;
        }
    }

    Public function view_technews(){
        
        $limit=5;
        $approved =1;
              $sel_ent = mysqli_query($this->get_conn(),"SELECT * FROM `tech_news` WHERE `approved`='$approved' ORDER BY `technews_date` DESC LIMIT $limit") or die('ErrorD');
                $i=1;
              while($row=mysqli_fetch_array($sel_ent) )
                {
                  $technews_id=$row['technews_id'];
                  $technews_title=$row['technews_title'];
                  $technews_date=$row['technews_date'];
                  $technews_poster=$row['poster_name'];
                  $technews_image=$row['technews_image'];
                  $technews_date = date('d M,Y', strtotime($technews_date));
                  $category = 'technews';

                  $sel_viewn = mysqli_query($this->conn, "SELECT * FROM `like_view` WHERE post_id='$technews_id' AND category='$category'");
                    $view=0;
                  while($row = mysqli_fetch_array($sel_viewn)) {
                    $view = $row['view'];
                }

                  $sel_comments = mysqli_query($this->conn, "SELECT * FROM `comments` WHERE post_id='$technews_id' AND category='$category'");
                    $get_total = mysqli_num_rows($sel_comments);
                    echo'
                    <div class="single-popular-post">
                            <a href="view_post.php?q=technews&technews_id='.$technews_id.'">
                                <h6><span>'.$i.'.</span>'.$technews_title.'</h6>
                            </a>
                            <p>'.$technews_date.'</p>
                        </div>';
                        $i++;
                }
    }

}

?>
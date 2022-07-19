<?php
include_once './manage/slider/sliderClass.php';
$sliderClass= new SliderClass();
$sliderList=$sliderClass->listSlider();
?>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
  <link rel="stylesheet" href="css/owl-carousel.css">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <?php
    $i=0;
    if(count($sliderList)){
        foreach ($sliderList as $value) {
            if($i==0){
                echo '<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>';
                $i++;
            }
            else
            {
                echo '<li data-target="#carousel-example-generic" data-slide-to="0"></li>';
                $i++;
            }
        }
    }
    ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
      
      <?php
    $a=0;
    if(count($sliderList)){
        foreach ($sliderList as $value) {
            if($a==0){
                echo '<div class="item active">
      <img src="sliderImage/'.$value["ImageName"].'" alt="..." width="100%">
      <div class="carousel-caption">'.$value["slider_title"].'</div>
    </div>';
                $a++;
            }
            else
            {
                echo '<div class="item">
      <img src="sliderImage/'.$value["ImageName"].'" alt="..." width="100%">
      <div class="carousel-caption">'.$value["slider_title"].'</div>
    </div>';
                $a++;
            }
        }
    }
    ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<script src="js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    $('.carousel').carousel()
    </script>
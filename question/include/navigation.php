  <!--Navigation bar-->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><img src="../img/logo3.jpg" alt="Bootstrappin" width="250" height="45px"></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../index.php">Home</a></li>
          <li><a href="../features.php">Features</a></li>
          <li><a href="../organisation.php">About Us</a></li>
          <li><a href="../quizwinner.php">Quiz Winners</a></li>
          <li><a href="../contact.php">Contact Us</a></li>
          <li class="dropdown"><br>
            <button class="btn-trial btn-success" data-toggle="dropdown" role="button" arial-haspopup="true" aria-expanded="false">Account<span class="carat"></span></button>
            <ul class="dropdown-menu">
            <?php
              if(isset($_SESSION['email'])){
                echo "<li><a href='../members/member_profile.php'><b>View Profile</b></li></a>
                <li><a href='#'><b> " . $_SESSION['email'] . "</b></a></li>";
              
              }
              else{
                }
              if(!isset($_SESSION['email'])){
                echo "<li><a href='../members/register.php'><b>SignUp</b></a></li>";
                echo "<li><a href='../members/login.php'><b> Login</b></a></li>";
              }
              else{
                  echo "<li><a href='../members/member_logout.php'><b>Logout</b></li></a>";
              }
            ?>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Navigation bar-->
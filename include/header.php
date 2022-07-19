<link rel="stylesheet" href="css/bootstrap.min.css">
<header>
		<div class="bg-191">
			<div class="container">	
				<div class="oflow-hidden color-ash font-9 text-sm-center ptb-sm-5">
				
					<ul class="float-left float-sm-none list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-10">
					<?php
					if(isset($_SESSION['email'])){
					echo "<li><a href='members/member_profile.php'><b>View Profile</b></li></a>
					<li><a href='#'><b> " . $_SESSION['email'] . "</b></a></li>";
					
					}
					else{
					}
					if(!isset($_SESSION['email'])){
					
						echo "<li><a href='members/register.php'><b>SignUp</b></a></li>";
					echo "<li><a href='members/login.php?page_url=$redirect_link_var'><b> Login</b></a></li>";
					
					}
					else{
						echo "<li><a href='members/member_logout.php'><b>Logout</b></li></a>";
					}
					?>
						<li><a href="organisation.php">About</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
					<ul class="float-right float-sm-none list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-5">
						<li><a class="pl-0 pl-sm-10" href="https://facebook.com/egeniusquiz"><i class="ion-social-facebook"></i></a></li>
						<li><a href="https://twitter.com/egeniusquiz"><i class="ion-social-twitter"></i></a></li>
						<li><a href="#"><i class="ion-social-google"></i></a></li>
						<li><a href="#"><i class="ion-social-instagram"></i></a></li>
						<li><a href="https://wa.me/2348037869935"><i class="ion-social-whatsapp"></i></a></li>
					</ul>
					
				</div><!-- top-menu -->
			</div><!-- container -->
		</div><!-- bg-191 -->
		
		<div class="container">
			<a class="logo" href="index.php"><img src="img/logo4.jpg" alt="Logo" width="300" height="60px"></a>
			
			<a class="right-area src-btn" href="#" >
				<i class="active src-icn ion-search"></i>
				<i class="close-icn ion-close"></i>
			</a>
			<div class="src-form">
				<form>
					<input type="text" placeholder="Search here">
					<button type="submit"><i class="ion-search"></i></a></button>
				</form>
			</div><!-- src-form -->
			
			<a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>
			
			<ul class="main-menu" id="main-menu">
				<li><a href="index.php">HOME</a></li>
				
				<li><a href="quizwinner.php">QUIZ WINNERS</a></li>
				<li><a href="features.php">FEATURES</a></li>
				
				<li class="dropdown">
				<div class="dropdown">
				  <a class="daropdown-toggle" data-toggle="dropdown" href="#">ACCOUNT</a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						<?php
					if(isset($_SESSION['email'])){
					echo "<li><a href='members/member_profile.php'><b>View Profile</b></li></a>
					<br><li><a href='#'><b> " . $_SESSION['email'] . "</b></a></li><br>";
					
					}
					else{
					}
					if(!isset($_SESSION['email'])){
					
						echo "<li><a href='members/register.php'><b>SignUp</b></a></li><br>";
					echo "<li><a href='members/login.php'><b> Login</b></a></li>";
					
					}
					else{
						echo "<li><a href='members/member_logout.php'><b>Logout</b></li></a>";
					}
					?>
					</ul>
				</div>
			</li>
			</ul>
			<div class="clearfix"></div>
		</div><!-- container -->
	</header>
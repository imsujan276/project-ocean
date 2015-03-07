<?php include_once("class/classes.php");?>
<html>
	<head>
		<title> Project Ocean </title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
	<!--header start -->
		<?php 
		include('include/menu.php');
		?>
	<!--header end -->

	<!--search start -->
		<?php
			include("include/search_bar.php");
		?> 
	<!--search end -->

	<!--content start -->
		<div class="content">
			<div class="wrapper">
				<div class="intro">
					<h1>Be a Standout in College Projects</h1>
				</div>
				<div class="banner">
					<img src="image/banner.png" width="1000px" height="280px" align="center">
				</div>
			</div>
				<hr/>
			<div class="wrapper">
				<div class="intro">
					<h1>How It Works?</h1>
					<p>Projects provide contexts to bring new workable idea, understand teamwork and solve problems. 
					Projects are the real footprints of student's academic course and profile.</p>
				</div>
				<div class="div">
					<div class="div1">
		               <img src="image/booking.gif" height="100" />
		               <h4>Student</h4>
		               <p>Student can create their profile. They can validate their project ideas, upload their works and get involved with community.</p>
					</div>
					<div class="div2">
		                <img src="image/trophy.gif" height="100" />
		               <h4>College</h4>
		               <p>Colleges can suggest <span>Project Ocean</span> to their students to enhance their learning capabilities and make them more practical. </p>
					</div>
					<div class="div3">
		                 <img src="image/league.png" height="100" />
		               <h4>Professionals</h4>
		                <p>The professionals can play the vital role to develop the learning skills by supporting the students and helping them in projects.</p>
					</div>
				</div>
			</div>
		</div>
    <!--content end -->
    <!--footer start -->
        <?php
			include("include/footer.php");
		?> 
	<!--footer end -->
	</body>
</html>		



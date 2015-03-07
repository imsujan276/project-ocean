<?php
	include_once("class/classes.php");
	$search=$_GET['search'];
	$query=$item->search($search);
	$num=mysql_num_rows($query);
	if($num>0){
?>

<html>
<head>
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
			<div class="left-sidebar">
				<div class="courses">
					<div class="title">
						<h3> Project Courses </h3>
					</div>
					<ul class="list">
						<li><a href="search.php?search=major"> Third year project (minor) </a> </li>
						<li><a href="search.php?search=minor"> Final year project (major) </a> </li>
						<li><a href="search.php?search=other"> Others </a> </li>
						<li><a href="search.php?search=c"> C </a> </li>
						<li><a href="search.php?search=cpp"> C++ </a> </li>
						<li><a href="search.php?search=database"> Database Management </a> </li>
						<li><a href="search.php?search=ai"> Artificial Intelligence </a> </li>
						<li><a href="search.php?search=fosp"> Open Source Programming </a> </li>
						<li><a href="search.php?search=graphics"> Computer Graphics </a> </li>
						<li><a href="search.php?search=software"> Software Engineering </a> </li>
						<li><a href="search.php?search=management"> Organization and management </a> </li>
					</ul>
				</div>

			</div>
			<div class="posts">
					<p align="right"> <b><?php echo $num. "&nbsp;Result Found &nbsp;&nbsp;&nbsp;&nbsp;"; ?></b> </p>
					<?php
						while($data=mysql_fetch_array($query)){
					?>
						<div class="post">
							<div class="image">
								<?PHP $imgName = $data['image']; ?>
   								<img src="up_image/<?PHP echo $imgName;?>" width="110px" height="100px">
							</div>
							<div class="ptitle">
								<h2><a href="post.php?project_id=<?PHP echo $data['project_id']; ?>"> <?php echo $data['title']; ?> </a></h2>
								<p> &bull;&nbsp;<a href="#"> <?php echo $data['firstname'];?> <?php echo $data['lastname']; ?> </a>  
									</br>&bull;&nbsp;<?php echo $data['college']; ?>
									&bull;&nbsp;<?php echo $data['date']; ?></p>
							</div>	
						</div>
					<?php
						}
					?>

					<?php

						}
						else{
							echo "NO items found";
						}
					?>

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

<?php
	include_once("class/classes.php");
	$query=$item->viewall();
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
				<?php
						while($data=mysql_fetch_array($query)){
					?>
						<div class="post">
							<div class="image">
								<?php $imgName = $data['image']; ?>
   								<img src="up_image/<?PHP echo $imgName;?>" width="110px" height="100px">
							</div>
							<div class="ptitle">
								<h2><a href="post.php?project_id=<?php echo $data['project_id']; ?>"> <?php echo $data['title']; ?> </a></h2>
								<p> &bull;&nbsp;<a href="profile.php?user=<?php echo $data['username'] ?>"> <?php echo $data['firstname'];?>
									&nbsp;<?php echo $data['lastname']; ?> </a>  
									&bull;&nbsp;<?php echo $data['college']; ?>
									&bull;&nbsp;<?php echo $data['date']; ?>
								</p>
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
	</div>
	<!--content end -->
    <!--footer start -->
        <?php
			include("include/footer.php");
		?> 
	<!--footer end -->
</body>
</html>

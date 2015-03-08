<?php
	include_once("class/classes.php");
	$query=$item->viewall();
	$num=mysql_num_rows($query);
	if($num>0){
?>

<!-- pagination code -->
<?php 

	$num_rec_per_page=6;
	$targetpage= "home.php";
	if (isset($_GET["page"])) { 
		$page  = $_GET["page"]; 
	} 
		else {
		 $page=1; 
	}; 

	$start_from = ($page-1) * $num_rec_per_page; 

	$sql = "select * from projects,user where projects.user_id=user.user_id order by projects.date desc LIMIT $start_from, $num_rec_per_page"; 
	
	$rs_result = mysql_query ($sql); //run the query
	
?>
<!-- pagination code -->

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
	<div class="wrapper">
		<div id="stage" style="background: rgba(0,0,0,0.5);"> 
			<p id="spinner" style="background: rgba(0,0,0,0.5); text-align: center; color: #fff;">Stop, I'm getting dizzy!</p> 
		</div>
	</div>


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
					while ($data = mysql_fetch_array($rs_result)) { 
				?> 
					       <div class="post">
							<div class="image" id="image" >
								<?php $imgName = $data['image']; ?>
								<a href="post.php?project_id=<?php echo $data['project_id']; ?>">
   								<img class="image"src="up_image/<?PHP echo $imgName;?>" width="100px" height="100px" title="<?php echo $data['title'];?>">
   								</a>
							</div>
							<div class="ptitle" id="t1">
								<h2><a  href="post.php?project_id=<?php echo $data['project_id']; ?>"> &nbsp;<?php echo $data['title']; ?> </a></h2>
								<p> &bull;&nbsp;<a href="profile.php?user_id=<?php echo $data['user_id'] ?>"> <?php echo $data['firstname'];?>
									&nbsp;<?php echo $data['lastname']; ?> </a>  
									&bull;&nbsp;<?php echo $data['college']; ?>
									&bull;&nbsp;<?php echo $data['date']; ?>
								</p>
							</div>	
						</div>
				<?php 
					}; 
				?> 

				<!-- pagination code -->
				<?php 
					//	$sql = $item->viewall(); 
					$rs_result = $item->viewall();  //run the query
					include_once("include/pagination.php");
				?>
				<!-- pagination code -->

				<!-- pagination navbar -->
				<?=$pagination ?>
				<!-- pagination navbar -->

						<!--
							echo "<div class='current'><a href='home.php?page=1'>".'|<'."</a> </div>"; // Goto 1st page  

							for ($i=1; $i<=$total_pages; $i++) { 
							            echo "<div class='current'><a href='home.php?page=".$i."'>".$i."</a> </div>"; 
							}; 
							echo "<div class='current'><a href='home.php?page=$total_pages'>".'>|'."</a></div> "; // Goto last page
						?>
						</div>
						-->
				
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


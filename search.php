<?php
	include_once("class/classes.php");
	$search=$_GET['search'];
	$query=$item->search($search);
	$num=mysql_num_rows($query);
	if($num>0){
?>

<!-- pagination code -->
<?php 

	include_once("class/classes.php");
	$num_rec_per_page=6;
	$targetpage= "search.php";
	if (isset($_GET["page"])) { 
		$page  = $_GET["page"]; 
	} 
		else {
		 $page=1; 
	}; 

	$start_from = ($page-1) * $num_rec_per_page; 
	if(!isset($search)||empty($search)){
				$search='%';
			}
	$sql="select * from projects,user where projects.user_id=user.user_id AND (projects.catagory like '$search%' OR 
		projects.title like '%$search%' OR projects.description like '%$search%' OR user.firstname like '%$search%' OR 
		user.lastname like '%$search%') order by projects.date desc LIMIT $start_from, $num_rec_per_page";
	
	$rs_result = mysql_query ($sql); //run the query
?>
<!-- pagination code -->

<html>
<head>
	<link rel="icon" href="profile_image/Project.png" type="image/gif" sizes="16x16">
	<title> Project Ocean | Search <?php echo $search; ?></title>
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
				<p align="center"><b><u> <?php echo $num." Results Found"; ?> </u> </b> </p>
						<?php 
					while ($data = mysql_fetch_array($rs_result)) { 
				?> 
					       <div class="post">
							<div class="image">
								<?php $imgName = $data['image']; ?>
   								<img src="up_image/<?PHP echo $imgName;?>" width="110px" height="100px">
							</div>
							<div class="ptitle">
								<h2><a href="post.php?project_id=<?php echo $data['project_id']; ?>"> <?php echo $data['title']; ?> </a></h2>
								<p> &nbsp;<a href="profile.php?user=<?php echo $data['username'] ?>"> <?php echo $data['firstname'];?>
									&nbsp;<?php echo $data['lastname']; ?> </a>  <br>
									&nbsp;<?php echo $data['college']; ?><br>
									&nbsp;<?php echo $data['date']; ?>
								</p>
							</div>	
						</div>
				<?php 
					}; 
				?>
				<!-- pagination code -->
				<?php 
					
					$rs_result=$item->search($search);
					include_once("include/search_pagination.php");
				?>
				<!-- pagination code -->

				<!-- pagination navbar -->
				<?=$pagination ?>
				<!-- pagination navbar -->

					<?php

						}
						else{
							echo "<script language=javascript>
								alert('$search not found')
							</script>";
							die();
							//header("Location:search.php?no_result_found&search=");
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

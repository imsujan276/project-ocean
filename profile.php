<?php 
	include_once("class/classes.php");
	$uname=$_GET['user'];
	$query=$user->profile($uname);
	$post=$item->viewallmy($uname);
	
?>

<html>
<head>
	<title> Project Ocean | <?php echo $uname; ?></title>
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
	<div class="lcontent">
		<div class="wrapper">
			<div class="scontent">
				<table cellspacing=15 align=center>
					<tr>
						<td rowspan=5> <img src="#" width=150 height=150 alt="Profile picture"></td>
					</tr>
					<tr>
						<td> <?php echo $query['firstname']; ?><?php echo $query['lastname']; ?></td> 
						<td> Nepal </td>
					</tr>
					<tr>
						<td> Username :</td> 
						<td> <?php echo $query['uname']; ?> </td>
					</tr>
					<tr>
						<td> College :</td> 
						<td> Khwopa Engineering College </td>
					</tr>
					<tr>
						<td> Educatiom :</td> 
						<td> B.E. Computer </td>
					</tr>
				</table>
				<div class="project">
					<div class="title">
						My Projects
					</div>

					
					<table cellspacing=5 width=100% cellpadding=5>
					<?php
							while($data=mysql_fetch_array($post)){
						?>
						<tr>
							<td><a href="index.php?project_id=<?PHP echo $data['id']; ?>"><?PHP echo $data['title']; ?> </a></td>
							<td><a href="index.php?project_id=<?PHP echo $data['id']; ?>"> view </a></td>
							<td><a href="index.php?project_id=<?PHP echo $data['id']; ?>"> edit </a></td>
							<td><a href="index.php?project_id=<?PHP echo $data['id']; ?>">
								onClick="return confirm('Are u sure to delete Record ? ')""> delete </a></td>
						</tr>
					<?php
						}
					?>

					</table>
					
				</div>
				<div class="project">
					<div class="title">
						Posts i have commented
					</div>
					<table cellspacing=5 cellpadding=5 width=100%>
						<tr>
							<td>Demo Comment on <a href="#">Demo Post </a> </td>
						</tr>
					</table>
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
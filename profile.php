<?php 
	include_once("class/classes.php");
	$user_id=$_GET['user_id'];

	$query=$user->profile($user_id);
	$query=mysql_fetch_array($query);
	if($query['profilepic']==""){
		$img="profile_image/demo.png";
	}
	else{
		$img="profile_image/".$query['profilepic'];
	}

	$post=$item->viewallmy($user_id);
	$comment=$item->viewcomment($user_id);
	
?>

<html>
<head>
	<link rel="icon" href="profile_image/Project.png" type="image/gif" sizes="16x16">
	<title> Project Ocean | <?php echo $query['username']; ?></title>
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
		<div class="wrapper"></br>
			<div class="scontent">
				<table cellspacing=15 align=center>
					<tr>
						<td rowspan=5> <img src="<?php echo $img ?>" width=150 height=150 alt="Profile picture"></td>
					</tr>
					<tr>
						<td><b> <?php echo $query['firstname']; ?>&nbsp;<?php echo $query['lastname']; ?> </b></td> 
						<td><font size=2px> Nepal </font></td>
					</tr>
					<tr>
						<td><b> Username :</b></td> 
						<td><b> <?php echo $query['username']; ?> </b></td>
					</tr>
					<tr>
						<td><b> College :</b></td> 
						<td><b> Khwopa Engineering College </b></td>
					</tr>
					<tr>
						<td><b> Educatiom :</b></td> 
						<td><b> B.E. Computer</b> </td>
					</tr>
				</table>
				<div class="project">
					<div class="title">
						My Projects
					</div>
					<table cellspacing=5 width=100% cellpadding=5>
					<?php	$i=0; ?>
					<?php
						while($data=mysql_fetch_array($post)){
					?>
						<tr>
							<td width=70%><b><a href="post.php?project_id=<?PHP echo $data['project_id']; ?>"><?php echo ++$i.'.';?> <?PHP echo $data['title']; ?> </b></li></a></td>
							<td width=10%><a href="post.php?project_id=<?PHP echo $data['project_id']; ?>"> view </a></td>
							<td width=10%><a href="editpost.php?project_id=<?PHP echo $data['project_id']; ?>"> edit </a></td>
							<td width=10%><a href="deletepost.php?project_id=<?PHP echo $data['project_id']; ?>" onClick="return confirm('Are u sure to delete Record ? ')"> delete </a></td>
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
							<td><b><?php echo $comment['comment']; ?></b>&nbsp;&nbsp;<b><a href="post.php?<?php echo $comment['project_id']; ?>"><?php echo $comment['title']; ?> </a></b> </td>
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
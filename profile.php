<?php 
	include_once("class/classes.php");
	$user_id=$_GET['user_id'];
	//$user_id=$_SESSION['user_id'] ;

	$query=$user->profile($user_id);
	$query=mysql_fetch_array($query);
	if($query['profilepic']==""){
		$img="profile_image/demo.png";
	}
	else{
		$img="profile_image/".$query['profilepic'];
	}

	$post=$item->viewallmy($user_id);
	$comment=$item->viewmycomment($user_id);
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
		<div class="wrapper">
		</br>
		<center><h1> <?php echo $query['firstname']; ?>&nbsp;<?php echo $query['lastname']; ?> </h1></center>
			<div class="scontent1">
				<table cellspacing=15 align=center>
					<tr>
						<td colspan=5 align="center"> <img src="<?php echo $img ?>" width=190 height=200 alt="Profile picture"></td>
					</tr>
					<tr>
						<td><h4> <?php echo $query['firstname']; ?>&nbsp;<?php echo $query['lastname']; ?> </h4></td> 
						<td><b> <font size=2px color="#a08"> Nepal </font> </b> </td>
					</tr>
					<tr>
						<td><b> Username :</b></td> 
						<td><b> <?php echo $query['username']; ?> </b></td>
					</tr>
					<tr>
						<td><b> College :</b></td> 
						<td><b> <?php echo $query['college']; ?> </b></td>
					</tr>
					<tr>
						<td><b> Educatiom :</b></td> 
						<td><b> <?php echo $query['education']; ?></b> </td>
					</tr>
				</table>
			</div>
				<!--<div class="project"> -->
				<div class="project1">
					<div class="title">
						<h3>My Projects</h3>
					</div>
					<table cellspacing=5 width=100% cellpadding=5>
					<?php	$i=0; ?>
					<?php
						while($data=mysql_fetch_array($post)){
					?>
						<tr>
							<td width=70%><b><a href="post.php?project_id=<?PHP echo $data['project_id']; ?>"><?php echo ++$i.'.';?> <?PHP echo $data['title']; ?> </b></li></a></td>
							<?php if(isset($_SESSION['uname'])){ ?>
								<?php if($_SESSION['uname']==$query['username']) { ?>
							<td width=10%><a href="post.php?project_id=<?PHP echo $data['project_id']; ?>"> view </a></td>
							<td width=10%><a href="editpost.php?project_id=<?PHP echo $data['project_id']; ?>"> edit </a></td>
							<td width=10%><a href="deletepost.php?project_id=<?PHP echo $data['project_id']; ?>&user_id=<?PHP echo $data['user_id']; ?>" onClick="return confirm('Are u sure to delete Record ? ')"> delete </a></td>
								<?php } ?>
							<?php } ?>
						</tr>
					<?php
						}
					?>
					</table>
					
				</div>
			<!--	<div class="project">
					<div class="title">
						Posts i have commented
					</div>
					<table cellspacing=5 cellpadding=5 width=100%>
						<?php	
							$i=0; 
							//$count=mysql_num_rows($comment);
						?>
						<?php
							if(mysql_num_rows($comment)>0){
							while($data=mysql_fetch_array($comment)){
						?>
						<tr>
							<td><b><?php echo ++$i.'.';?><?php echo $data['comment']; ?></b>&nbsp;&nbsp;<b>
								<a href="post.php?<?php echo $data['project_id']; ?>"><?php echo $data['title']; ?> </a></b> 
							</td>
						</tr>
						<?php
							}
						}
						?>
					</table>
				</div>
-->
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
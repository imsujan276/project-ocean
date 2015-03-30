<?php
	include_once("class/classes.php");
	$id=$_GET['project_id'];
	$query=$item->viewpost($id);
	$query=mysql_fetch_array($query);

	$hits=$item->hits($id);

	$dat=$item->viewpopular();

	/*$user=$item->lastID();*/
	$user=$_SESSION['uname'];
	$viewcomment=$item->viewcomment($id);
	$count=mysql_num_rows($viewcomment);
?>


<html>
<head>
	<link rel="icon" href="profile_image/Project.png" type="image/gif" sizes="16x16">
	<title> Project Ocean | edit <?php echo $query['title']; ?></title>
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
<body>
<div class="content">
	<div class="wrapper">
		<div class="ppost">
			<div class="ptitle">
				<h2> <?php echo $query['title']; ?></h2>
				<p> &bull;&nbsp;<a href="profile.php?user_id=<?php echo $query['user_id']; ?>"><?php echo $query['firstname'];?> 
					<?php echo $query['lastname']; ?> </a> </p>
			</div>
			<div class="pbody">
				<div class="pcontent">
					<table width=100% cellspacing=15>
						<tr>
							<td><a href="up_image/<?PHP echo $query['image'];?>">
								<?PHP $imgName = $query['image']; ?> 
								<img class="img" src="up_image/<?PHP echo $imgName;?>" width="150px" height="200px">
								</a> 
							</td>
							<td> <p>	<?php echo $query['description']; ?> </p> </td>
						</tr>
					</table>
				</div>
			</div>
			<div class="files">
				<?PHP $fileName = $query['mainfile']; ?>
				<p ><?PHP echo $query['hits'].' Views'; ?></p><a class="btn" href="up_file/<?PHP echo $query['mainfile'];?>">Download Main Report</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
			</div>
			<hr/>


			<!-- Comment starts -->

			<div class="comment">
				<?php if(isset($_SESSION['uname'])) 
					{ 
				?>
					<h3><u>Comment: </u></h3></br>
					<form name="comment" method="post" action="comment_action.php?project_id=<?php echo $id ?>&user=<?php echo $user ?>">
						<textarea class="dtext" cols=60 name="comment" placeholder="Comments" value="" required maxlength="255"> </textarea>
						<input type="submit" name="cmt" class="btn" value="Comment"><br/><br/>
					</form>
				<?php
				}
				else{
				?>
					<h1> Please <a href="login.php">login</a> or <a href="register.php">register</a> to comment. </h1> </br>
				<?php
					}
				?>
				
				<h3><u>Latest Comments: </u></h3></br>
				<table cellpadding=5>
					<?php
						while($comment=mysql_fetch_array($viewcomment)) {
					?>
						<tr>
							<td><b> <?php echo $comment['user']; ?> </b></td>
							<td>:</td>
							<td><?php echo $comment['comment'];?> </td>
						</tr>
					<?php
						}
					?>
				</table>

				<?php 
					
				?>

			<!-- Comment ended -->

			</div>
		</div>
		<div class="right-sidebar">
			<div class="rtitle">
				<h4>Popular posts </h4>
			</div>
			<div class="ptitle">
				<table width=100% cellspacing=8>
					<?php
						while($data=mysql_fetch_array($dat)){
					?>
						
						<tr>
						<td><a href="post.php?project_id=<?PHP echo $data['project_id']; ?>" title="<?php echo $data['title']; ?>">
							<img  class="himg"  src="up_image/<?php echo $data['image']; ?>" width="100px"></a></td>
						<td><a href="post.php?project_id=<?PHP echo $data['project_id']; ?>">&nbsp;<?php echo $data['title']; ?></a></td>
						</tr>				
					
					<?php
						}
					?>
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
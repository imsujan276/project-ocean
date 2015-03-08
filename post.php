<?php
	include_once("class/classes.php");
	$id=$_GET['project_id'];
	$query=$item->viewpost($id);
	$query=mysql_fetch_array($query);

	$dat=$item->viewrecent();

	$user=$item->lastID();
	$viewcomment=$item->viewcomment($user,$id);

	if(isset($_POST['sbtn'])){
			$comment=trim($_POST['comment']);
			$user=$item->lastID();
			$id=$_GET['project_id'];
			$query=$item->setcomment($user,$id,$comment);
			if($query){
				echo"Sucessfuly commented";
			}
			else{
				echo"error occured";
			}
	}
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
<body>
<div class="content">
	<div class="wrapper">
		<div class="ppost">
			<div class="ptitle">
				<h2> <?php echo $query['title']; ?></h2>
				<p> &bull;&nbsp;<a href="profile.php?<?php echo $query['user_id']; ?>"><?php echo $query['firstname'];?> <?php echo $query['lastname']; ?> </a> </p>
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
				<a class="btn" href="up_file/<?PHP echo $query['mainfile'];?>">Download Main Report</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a class="btn" href="<?PHP echo $query['filelink']; ?>"> Link to report/file</a>
			</div>
			<hr/>


			<!-- Comment starts -->

			<div class="comment">
				<?php if(isset($_SESSION['uname'])) 
					{ 
				?>
					<h3><u>Comments: </u></h3></br>
					<form name="comment" method="post" action="">
						<textarea class="dtext" cols=60 name="comment" placeholder="Comments" value="" required maxlength="70"> </textarea>
						<input type="submit" name="sbtn" class="btn" value="Comment"><br/><br/>
					</form>
				<?php
				}
				else{
				?>
				<h1> Please <a href="login.php">login</a> or <a href="register.php">register</a> to comment. </h1> </br>
			<?php
				}
				while($comment=mysql_fetch_array($viewcomment)) {
			?>
				<i> <?php echo $comment['user_id']; ?> </i><p><?php echo $comment['comment'];?> </p><br/><br/>
			<?php
				}
			?>

			<!-- Comment ended -->

			</div>
		</div>
		<div class="right-sidebar">
			<div class="rtitle">
				<h4>Recent Uploads </h4>
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
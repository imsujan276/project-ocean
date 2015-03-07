<?php
	include_once("class/classes.php");
	$id=$_GET['project_id'];
	$query=$item->viewpost($id);
	$dat=$item->viewrecent();
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
					<table width=100% cellspacing=5>
						<tr>
							<td> <?PHP $imgName = $query['image']; ?> <img src="up_image/<?PHP echo $imgName;?>" width="150px" height="200px"> </td>
							<td> <p>	<?php echo $query['description']; ?> </p> </td>
						</tr>
					</table>
				</div>
			</div>
			<div class="files">
				<?PHP $fileName = $query['mainfile']; ?>
				<a class="btn" href="up_file/<?PHP echo $query['$fileName'];?>">Main Report</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a class="btn" href="<?PHP echo $query['filelink']; ?>"> Link to report/file</a>
			</div>
			<hr/>
			<div class="comment">
				<h3><u>Comments: </u></h3></br>
				<form name="comment" method="post" action="">
					<input type="text" class="ltext" name="cname" placeholder="Name" value="" required maxlength="20">
					<textarea class="dtext" cols=60 name="comment" placeholder="Comments" value="" required maxlength="70"> </textarea>
					<input type="submit" name="sbtn" class="btn" value="Comment"><br/><br/>
				</form>
				<i> Name : </i><p>this is demo comment </p><br/><br/>
			</div>
		</div>
		<div class="right-sidebar">
			<div class="rtitle">
				<h4>Recent Uploads </h4>
			</div>
			<?php
					while($data=mysql_fetch_array($dat)){
				?>
			<div class="ptitle">
				
				<p><a href="post.php?project_id=<?PHP echo $data['project_id']; ?>">&bull;&nbsp;<?php echo $data['title']; ?></a></p>
				
			</div>	
			
			<?php
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

		





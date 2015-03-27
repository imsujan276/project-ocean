
<?php 
	include_once("class/classes.php");
	$project_id=$_GET['project_id'];
	$query=$item->viewpost($project_id);
	$data=mysql_fetch_array($query);

	if(isset($_POST['upbtn'])){
			$ptitle=trim($_POST['ptitle']);
			$description=trim($_POST['description']);
			$catagory=trim($_POST['catagory']);
			$filelink=trim($_POST['filelink']);
			$image= "Img"."_".rand(0,99)."_".$_FILES["image"]["name"];
			$mainfile= "File"."_".rand(0,99)."_".$_FILES["mainfile"]["name"];
			
			$query=$item->updatepost($ptitle,$description,$catagory,$image,$mainfile,$filelink,$project_id);

			if($query){
				if($_FILES["image"]["size"]>1024)
				{
					move_uploaded_file($_FILES["image"]["tmp_name"],"up_image/".$image);	
				}
				if($_FILES["mainfile"]["size"]>1024)
				{
				move_uploaded_file($_FILES["mainfile"]["tmp_name"],"up_file/".$mainfile);	
				}
				echo"updated successfully!!";
				header('Location:post.php?project_id='.$item->lastID());
			}
			else{
				echo"Something went wrong... Try again ";
				header('Location:submit.php?act=error');
			}
		}
?>

<html>
<head>
	<link rel="icon" href="profile_image/Project.png" type="image/gif" sizes="16x16">
	<title> Project Ocean | Edit Project</title>
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
				<div class="rdiv">
					<div class="rform">
						<div class="rtitle">
							<strong> Please Fill in the below Details</strong>
						</div>
						<div class="form">
							<form name="submit" method="post" action="#" enctype="multipart/form-data">
								<table cellspacing=5>
									<tr>
										<td> </td>
									</tr> 
									<tr>
										<td style="font-size: 17px;">Project Title :</td>
										<td> <input type="text" class="ltext" name="ptitle" placeholder="Project title" value="<?php echo $data['title'] ?>" required> </td>
									</tr> 
									<tr>
										<td style="font-size: 17px;">Description :</td>
										<td> <textarea cols=35 rows=4 class="dtext" name="description" placeholder="Description" <?php echo $data['description'] ?> required></textarea> </td>
									</tr> 
									<tr>
										<td style="font-size: 17px;"> Catagory :</td>
										<td>
											<select name="catagory" required>
												<option value="">Select any one catagory</option>
												<option value="major" <?PHP if($data['catagory'] == 'major'){ echo "selected"; }?>>Final year project (Major) </option>
												<option value="minor" <?PHP if($data['catagory'] == 'minor'){ echo "selected"; }?>>Third year project (Minor) </option>
												<option value="c" <?PHP if($data['catagory'] == 'c'){ echo "selected"; }?>>C </option>
												<option value="cpp" <?PHP if($data['catagory'] == 'cpp'){ echo "selected"; }?>>C++ </option>
												<option value="database" <?PHP if($data['catagory'] == 'database'){ echo "selected"; }?>>Database management </option>
												<option value="ai" <?PHP if($data['catagory'] == 'ai'){ echo "selected"; }?>>Artificial intelligence </option>
												<option value="fosp" <?PHP if($data['catagory'] == 'fosp'){ echo "selected"; }?>>Open source programming </option>
												<option value="graphics" <?PHP if($data['catagory'] == 'graphics'){ echo "selected"; }?>>Computer graphics </option>
												<option value="software" <?PHP if($data['catagory'] == 'software'){ echo "selected"; }?>>Software Engineering </option>
												<option value="management" <?PHP if($data['catagory'] == 'management'){ echo "selected"; }?>>Organization and management </option>
												<option value="other" <?PHP if($data['catagory'] == 'other'){ echo "selected"; }?>>Other </option>
											</select> 
										</td>
									</tr> 
									<tr>
										<td style="font-size: 17px;"> Snapshot :</td>
										<td> <input type="file"  name="image" value="<?php echo $data['image'] ?>" required><a href="up_image/<?php echo $data['image']; ?>">  <font size=1px><?php echo $data['image'] ?></font> </a> </td>
									</tr> 
									<tr>
										<td style="font-size: 17px;"> Main report<span>*</span> :</td>
										<td> <input type="file"  name="mainfile" value="<?php echo $data['mainfile'] ?>" required><a href="up_file/<?php echo $data['mainfile']; ?>"> <font size=1px><?php echo $data['mainfile'] ?></font></a></td>
									</tr> 
									<tr>
										<td style="font-size: 17px;"> Link to file :</td>
										<td> <input type="text"  class="ltext" name="filelink" placeholder="Link to file or report (optional)" 
											value="<?php echo $data['filelink'] ?>"> </td>
									</tr>
									<tr>
										<td colspan=2> <span>*</span> Please upload the zipped file </td>
									</tr>
									<tr>
										<td colspan=2 align="right"> <input type="submit" class="btn" name="upbtn" value="Edit Project" ></td>
									</tr> 

								</table>
							</form>
						</div>
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
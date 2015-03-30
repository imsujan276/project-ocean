<?php
	include_once("class/classes.php");
	$msg="";
	if(isset($_POST['upbtn'])){
			$ptitle=trim($_POST['ptitle']);
			$description=trim($_POST['description']);
			$catagory=trim($_POST['catagory']);
			$image= "SG"."_".rand(0,9999)."_".$_FILES["image"]["name"];
			$mainfile= "SuGa"."_".rand(0,9999)."_".$_FILES["mainfile"]["name"];
			
			$check=$item->viewallmy($_SESSION['user_id']);
			$count=mysql_num_rows($check);
			if($count<11){
				$query=$item->submit($ptitle,$description,$catagory,$image,$mainfile);
				
				if($query){
					if($_FILES["image"]["size"]>1024)
					{
						move_uploaded_file($_FILES["image"]["tmp_name"],"up_image/".$image);	
					}
					if($_FILES["mainfile"]["size"]>1024)
					{
						move_uploaded_file($_FILES["mainfile"]["tmp_name"],"up_file/".$mainfile);	
					}
					echo"Registered successfully!!";
					header('Location:post.php?project_id='.$item->lastID());
				}
				else{
					echo"Something went wrong... Try again ";
					header('Location:submit.php?act=error');
				}
			}
			else{
				$msg="You have reached your maximum upload i.e. 10 project uploads...";
			}
		}
?>

<html>
<head>
	<link rel="icon" href="profile_image/Project.png" type="image/gif" sizes="16x16">
	<title> Project Ocean | Submit Projet</title>
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
										<td> <input type="text" class="ltext" name="ptitle" placeholder="Project title" value="" required> </td>
									</tr> 
									<tr>
										<td style="font-size: 17px;">Description :</td>
										<td> <textarea cols=35 rows=6 class="dtext" name="description" placeholder="Description" value="" required></textarea> </td>
									</tr> 
									<tr>
										<td style="font-size: 17px;"> Catagory :</td>
										<td>
											<select name="catagory" required>
												<option value="" selected>Select any one catagory</option>
												<option value="major">Final year project (Major) </option>
												<option value="minor">Third year project (Minor) </option>
												<option value="c">C </option>
												<option value="cpp">C++ </option>
												<option value="database">Database management </option>
												<option value="ai">Artificial intelligence </option>
												<option value="fosp">Open source programming </option>
												<option value="graphics">Computer graphics </option>
												<option value="software">Software Engineering </option>
												<option value="management">Organization and management </option>
												<option value="other">Other </option>
											</select> 
										</td>
									</tr> 
									<tr>
										<td style="font-size: 17px;"> Snapshot :</td>
										<td> <input type="file"  name="image" value="" required> </td>
									</tr> 
									<tr>
										<td style="font-size: 17px;"> Main report<span>*</span> :</td>
										<td> <input type="file"  name="mainfile" value="" required> </td>
									</tr> 
									<tr>
										<td colspan=2> <span>*</span> Please upload the zipped file </td>
									</tr>
									<tr>
										<td colspan=2 align="right"> <input type="submit" class="btn" name="upbtn" value="Upload Project" ></td>
									</tr> 
									<tr>
										<td colspan=2> <font color="red" size=3px> <blink><?php echo $msg; ?> </blink> </font></td>
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
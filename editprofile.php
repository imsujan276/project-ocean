<?php
	include_once("class/classes.php");
	if(isset($_POST['update'])){
			$fname=trim($_POST['fname']);
			$lname=trim($_POST['lname']);
			$email=trim($_POST['email']);
			$pass=trim($_POST['password']);
			$profilepic= "pro"."_".rand(0,9999)."_".$_FILES["profilepic"]["name"];
			$country=trim($_POST['country']);
			$city=trim($_POST['city']);
			$college=trim($_POST['college']);
			if($pass==""){
				$query=$user->profileupdate1($fname,$lname,$email,$profilepic,$country,$city,$college);
			}
			else{
				$query=$user->profileupdate($fname,$lname,$email,$pass,$profilepic,$country,$city,$college);
			}
			if($query){
				if($_FILES["profilepic"]["size"]>1024)
				{
					move_uploaded_file($_FILES["profilepic"]["tmp_name"],"profile_image/".$profilepic);	
				}
				echo"Updated successfully!!";
				header('Location:profile.php?user_id='.$_SESSION['user_id']);
			}
			else{
				echo"Something went wrong... Try again ";
				header('Location:editprofile.php?act=error&user_id='.$_SESSION['user_id']);
			}
		}
?>
<?php 
	include_once("class/classes.php");
	$user_id=$_GET['user_id'];
	$query=$user->profile($user_id);
	$query=mysql_fetch_array($query);	
?>

<html>
<head>
	<link rel="icon" href="profile_image/Project.png" type="image/gif" sizes="16x16">
	<title> Project Ocean | edit <?php echo $query['username']; ?></title>
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
		<h1 align="center"><blink> UPDATE YOUR PROFILE </blink></h1>
		</br>
			<div class="scontent">
				<form name="editprofile" method="post" action="" enctype="multipart/form-data">
					<table cellspacing=15 align=center>
						<tr>
							<td rowspan=5> <img src="profile_image/demo.png" width=150 height=150 alt="Profile picture"></td>
						</tr>
						<tr>
							<td><input type="text" class="Ltext" readonly value="<?php echo $query['username']; ?>"> <font size="2px">You can't edit your username</font></td>
						</tr>
						<tr>
							<td><input type="text" class="Ltext" name="fname" value="<?php echo $query['firstname']; ?>" placeholder="First name" required> </td>
							<td><input type="text" class="Ltext" name="lname" value="<?php echo $query['lastname']; ?>"placeholder="Last Name" required></td> 
						</tr>
						<tr>
							<td><input type="email" class="Ltext" name="email" value="<?php echo $query['email']; ?>" required placeholder="Email"></td> 
							<td><input type="password" class="Ltext" name="password" value="" placeholder="new password" ></td>
						</tr>
						<tr>
							<td><input type="text" class="Ltext" name="country" value="<?php echo $query['country']; ?>" placeholder="Country"></td>
							<td><input type="text" class="Ltext" name="city" value="<?php echo $query['city']; ?>" placeholder="city"></td>
						</tr>

						<tr>
							<td><input type="file" name="profilepic"></td>
						</tr>
						<tr>
							 <td colspan="3" align="right"><input type="submit" name="update" class="btn" value="Update Profile"></td>
						</tr>
					</table>
				</form>
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
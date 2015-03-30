<?php
session_start();
if(isset($_SESSION['uname'])){
header('Location:home.php');
	}
?>
<?php
	$err="";
	include_once("class/classes.php");
	if(isset($_POST['rbtn'])){
		if(($_POST['pass'])===($_POST['cpass'])){
			$fname=trim($_POST['fname']);
			$lname=trim($_POST['lname']);
			$email=trim($_POST['email']);
			$uname=trim($_POST['uname']);
			$pass=trim($_POST['pass']);
			$query=$user->register($fname,$lname,$email,$uname,$pass);
			if($query){
				echo"Registered successfully!!";
				header('Location:login.php');
			}
			else{
				echo"Something went wrong... Try again ";
				header('Location:register.php');
			}
		}
	}
?>
<!--
/*
	if(isset($_POST['rbtn'])){
		if(($_POST['pass'])===($_POST['cpass'])){
			include('class/user.php');
			$user=new user();
			$user->setemail($_POST['email']);
			$user->setusername($_POST['uname']);
			$user->setpassword($_POST['pass']);
			$user->setfname($_POST['fname']);
			$user->setlname($_POST['lname']);

			$check=$user->register();
			if($check==false){
					header('Location:register.php');
			}
			else{
			header('Location:login.php');		
			}
		}
	}
	*/
?>
-->

<html>
<head>
	<link rel="icon" href="profile_image/Project.png" type="image/gif" sizes="16x16">
	<title> Project Ocean | Register</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!--<script language="javascript" src="js/formvalid.js"> </script>-->
</head>

<body>
	<!--header start -->
		<?php 
			include("include/header.php"); 
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
							<strong> Register</strong>
						</div>
						<div class="form">
							<form name="signup" method="post" action="">
								<table cellspacing=5>
									<tr>
										<td> </td>
									</tr> 
									<p>Please with <span> Project Ocean</span> and explore deep into the ocean of the knowledge.</p>
									<tr>
										<td style="font-size: 17px;">First name :</td>
										<td> <input type="text" class="ltext" name="fname" placeholder="First name" value="" required> </td>
									</tr> 
									<tr>
										<td style="font-size: 17px;">Last name :</td>
										<td> <input type="text" class="ltext" name="lname" placeholder="Last name" value="" required> </td>
									</tr> 
									<tr>
										<td style="font-size: 17px;"> Email :</td>
										<td> <input type="email" class="ltext" name="email" placeholder="Email" value="" required> </td>
									</tr> 
									<tr>
										<td style="font-size: 17px;"> Username :</td>
										<td> <input type="text" class="ltext" name="uname" placeholder="Username" value="" required
											title="Username must not be blank and contain only letters, numbers and underscores." 
											pattern="\w+"> </td>
									</tr> 
									<tr>
										<td style="font-size: 17px;"> Password :</td>
										<td> <input type="password" class="ltext" name="pass" placeholder="Password" value="" required
											 title="Password must contain at least 6 characters, including UPPER/lowercase and numbers." 
											 pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"> </td>
									</tr> 
									<tr>
										<td style="font-size: 17px;"> Confirm password :</td>
										<td> <input type="password" class="ltext" name="cpass" placeholder="Confirm Password" value="" required
											title="Please enter the same Password as above." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"> </td>
									</tr>
									<tr>
										<td colspan=2 align="right"> <input type="submit" class="btn" name="rbtn" value="Register" > <input class="btn" type="button" value="Reset" onclick=" resetForm(this.form); "></td>
									</tr> 
									<tr>
										<td colspan=2 align="right"></td>
									</tr> 
									<tr>
										<td colspan=2 style="font-size: 17px;"> Already have n account? <a href="login.php">Log In</a></td>
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


	</body>
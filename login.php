<!--User inactivity check --> 
<?php 
if (isset($_SESSION['username'])) {
  // only if user is logged in perform this check
  if ((time() - $_SESSION['last_login_timestamp']) > 5) {
    header("location:logout.php");
    exit;
  } else {
    $_SESSION['last_login_timestamp'] = time();
    header('Location:home.php');
  }
}
?>

<?php
	if(isset($_POST['sbtn'])){
		include('class/userClass.php');
		$uname=trim($_POST['uname']);
		$pass=trim($_POST['pass']);
		$query=$user->login($uname,$pass);
		if($query){
			$_SESSION["msg"] = "Registered successfully!! Please log in";
			session_start();
			$_SESSION['uname']="$uname";
			header('Location:home.php');
		}
		else{
			$_SESSION["msg"] = "<font color='red'><em>Email/Password are incorrect. Try again.</em></font>";
			header('Location:login.php');
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
				<div class="ldiv">
					<div class="lform">
						<div class="ltitle">
							<strong> Log In </strong>
						</div>
						<div class="form">
							<form name="login" method="post" action="">
								<table cellspacing=5>
									<tr>
										<td colspan=2 align=center> <?php //echo $_SESSION["msg"]; //unset($_SESSION["msg"]); ?> </td>
									</tr> 
									<p>Please log in with your valid credentials</p>
									<tr>
										<td style="font-size: 17px;"> Email/Username :</td>
										<td> <input type="text" class="ltext" name="uname" placeholder="Email/Username" value="" required> </td>
									</tr> 
									<tr>
										<td style="font-size: 17px;"> Password :</td>
										<td> <input type="password" class="ltext" name="pass" placeholder="Password" value="" required> </td>
									</tr> 
								<!--	<tr>
										<td align=right><input type="checkbox" name="rem" value="" >
										<td>Remember me &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="forgot.php">Forgot Password? </a>
										</td>
								-->	</tr>
									<tr>
										<td colspan=2 align="right"> <input type="submit" class="btn" name="sbtn" value="Log In" ></td>
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
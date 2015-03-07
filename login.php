<!--User inactivity check --> 
<?php 
include('class/classes.php');
if (isset($_SESSION['uname'])) {
  // only if user is logged in perform this check
  
    $_SESSION['last_login_timestamp'] = time();
    header('Location:home.php');
	exit();
}
?>

<?php
	if(isset($_POST['sbtn'])){
		
		$uname=trim($_POST['uname']);
		$pass=trim($_POST['pass']);
		$query=$user->login($uname,$pass);
		if(mysql_num_rows($query)>0){
			while($row=mysql_fetch_array($query)){
				$_SESSION['user_id']=$row[0];
				$_SESSION['uname']=$row[4];
			}
			$_SESSION["msg"] = "Registered successfully!! Please log in";
			header('Location:home.php');
		}
		else{
			echo"<script type='text/javascript'>
			alert('Incorrect Username or Password.<br/> Please check and enter again.');
			</script>";
			$_SESSION["msg"] = "<font color='red'><em>Email/Password are incorrect. Try again.</em></font>";
			header('Location:login.php?act=incorrect username or password');
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
									<tr>
										<td align=right><input type="checkbox" name="rem" value="" >
										<td>Remember me &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="forgot.php">Forgot Password? </a>
										</td>
									</tr>
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
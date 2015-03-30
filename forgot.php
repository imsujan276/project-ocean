<?php
	$error="";
	$sucess="";
	if(isset($_POST['verify'])){
		include_once("class/classes.php");
		$question=trim($_POST['question']);
		$answer=trim($_POST['security_ans']);
		$pass=trim($_POST['pass']);
		$cpass=trim($_POST['cpass']);

		if(!(is_null($question))) {
			if( !(is_null($answer))) {
				if($pass===$cpass) {
					$query=$user->check($question,$answer,$pass,$cpass);
					if($query){
						$sucess="Password Reset Sucessfully! Please <a href='login.php'>log in </a>again...";
					}
					else{
						$error=" Incorrect Security answer";
					}
				}
				else{
					$error=" Password not matched";
				}
			}
			else{
				$error="You can't leave answer field blank";
			}
		}
		else{
			$error="You can't leave question field blank";
		}
	}
?>

<html>
<head>

	<link rel="icon" href="profile_image/Project.png" type="image/gif" sizes="16x16">
	<title> Project Ocean | Forgot password </title>
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
			<div class="fdiv">
					<div class="fform">
						<div class="ltitle">
							<strong> Forgot password??? </strong>
						</div>
						<div class="form">
							<form name="login" method="post" action="">
								<table cellspacing=5>
									<p><b>If you have forgot your password then use youer security question to reset your password.</b></p>
									<tr>
										<td style="font-size: 17px;"> Security question :</td>
										<td>
											<select name="question">
												<option value=""> Select any security question </option>
												<option value="1" > What is your nick name? </option>
												<option value="2" > What is your birth city?</option>
												<option value="3" > What is your first project?</option>
												<option value="4" > What is your first contact number?</option>
												<option value="5" >Who are you?</option>
											</select>
										</td>
									</tr> 
									<tr>
										<td style="font-size: 17px;"> Security answer :</td>
										<td> <input type="text" name="security_ans" value="" required Placeholder="Security answer" class="ltext"> </td>
									</tr> 
									<tr>
										<td style="font-size: 17px;"> Enter New Password :</td>
										<td><input type="password" class="ltext" name="pass" placeholder="Password" value="" required
											 title="Password must contain at least 6 characters, including UPPER/lowercase and numbers." 
											 pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">  </td>
									</tr> 
									<tr>
										<td style="font-size: 17px;"> Confirm New Password :</td>
										<td><input type="password" class="ltext" name="cpass" placeholder="Confirm password" value="" required</td>
									</tr> 
									<tr>
										<td colspan="2" align="center"><font color="red" size="3px"> <?php echo $error; ?> </font></td>
									</tr>
									<tr>
										<td colspan=2 align="right"> <input type="submit" class="btn" name="verify" value="Recover Password" ></td>
									</tr>
									<tr>
										<td colspan=2 align=center> <?php echo $sucess; ?> </td>
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
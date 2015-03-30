<?php 
	$msg="";
	include_once("class/classes.php");
	if(isset($_POST['cbtn'])){
		// message
		$name = $_POST['name'];
		// message
		$contact = $_POST['contact'];
		// message
		$from = $_POST['email'];
		// message
		$message = $_POST['message'];

		$query=$feedback->feedback($name,$contact,$from,$message);
		if($query){
			$msg="Thank you for your response.<br> Your message to Project Ocean has been sent sucessfully !!!!')";
		  //	header("location:contact.php?sucessfully_sent");
		}
		else{
			 $msg="Error Occured.... Please try again.')";
		  //	header("location:contact.php?error_occured");
		}
	
		$to  = 'imsujan276@gmail.com'; // note the comma

		// subject
		$subject = 'Contact Us message from Project Ocean';

		

		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		$headers .= 'To: sujan <imsujan276@gmail.com>' . "\r\n";
		$headers .= 'From:'.$name .$from. "\r\n";

		// Mail it
		$mail=mail($to, $subject, $message, $headers);
		if($mail){
		  /* $msg="Email Sent')";  */
		}
		else{
		  /* $msg="Error Occured.... Please try again.')";*/
		}

	}
?>

<html>
<head>
	<title> Project Ocean | Contact Us </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" href="profile_image/Project.png" type="image/gif" sizes="16x16">
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
							<strong> Contact Us</strong>
						</div>
						<div class="form">
							<form name="submit" method="post" action="">
								<table cellspacing=5>
									<tr>
										<td Colspan=2> </td>
									</tr> 
									<tr>
										<td style="font-size: 17px;">Name<span>*</span> :</td>
										<td> <input type="text" class="ltext" name="name" placeholder="Full name" value="" required> </td>
									</tr> 
									<tr>
										<td style="font-size: 17px;">Contact :</td>
										<td> <input type="number" class="ltext" name="contact" placeholder="Contact Number (optional)" value=""> </td>
									</tr> 
									<tr>
										<td style="font-size: 17px;">Email<span>*</span> :</td>
										<td> <input type="email" class="ltext" name="email" placeholder="Email" value="" required> </td>
									</tr> 
									<tr>
										<td style="font-size: 17px;">Message<span>*</span> :</td>
										<td> <textarea cols=35 rows=6 class="dtext" name="message" placeholder="message" value="" required></textarea> </td>
									</tr> 	
									<tr>
										<td colspan=2> <span>*</span> Required Fields </td>
									</tr>
									<tr>
										<td colspan=2 align="center"> <font color="#800"> <?php echo $msg; ?> </font></td>
									</tr>
									<tr>
										<td colspan=2 align="right"> <input type="submit" class="btn" name="cbtn" value="Contact Us" >
											<input type="reset" class="btn" value="Reset" ></td>
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
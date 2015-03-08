
<header>
			<div class="header">
				<div class="wrapper">`
					<div class="title">
						<a href="home.php"><img class="himg" src="image/Logo.png" width=300px height=70px></a>
					</div>
					<div class="nav">
						<p>Welcome&nbsp;<font color="#ff7"><?php echo $_SESSION['uname'] ?></font></p>
						<ul>
							<li class="selected"><a href="home.php">HOME</a></li>
							<li class="selected"><a href="profile.php?user_id=<?php echo $_SESSION['user_id'] ?>"><?php echo $_SESSION['uname'] ?></a></li>
							<li class="selected"><a href="editprofile.php">EDIT PROFILE </a></li>
							<li class="selected"><a href="submit.php"> <font color="#f77">UPLOAD PROJECT</font></a></li>
							<li class="selected"><a href="logout.php">LOGOUT </a></li>
							<li class="selected"><a href="contact.php">CONTACT US</a></li>
						</ul>
						
					</div>
				</div>
			</div>
		</header>
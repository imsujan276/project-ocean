<?php
	include_once("class/itemClass.php");
	$query=$item->viewfooter();
?>
<footer>
        	<div class="subfooter">
				<div class="wrapper">
					<div class="about" id="about">
						<h3 align="center">ABOUT US </h3>
						<br>
						<p> Project Ocean, a platform for student to generate new project ideas and share their works online. </p>
					</div>
					<div class="social">
						<h3 align="center">FOLLOW US</h3>
						<ul class="list">
							<li><a href="#"> <img src="image/facebook.png" width="15px">Facebook</a></li>
							<li><a href="#"><img src="image/twitter.png" width="15px">Twitter</a></li>
							<li><a href="#"><img src="image/google.png" width="15px">Google +</a></li>
							<li><a href="#"><img src="image/pinterest.png" width="15px">Pinterest</a></li>
							
						</ul>
					</div>
					<div class="recent_upload">
						<h3 >RECENT UPLOADS</h3></br>
						<?php
							while($data=mysql_fetch_array($query)){
						?>
						<div class="recent">
							<a href="post.php?project_id=<?PHP echo $data['project_id']; ?>">&nbsp;<?php echo $data['title']; ?></a>
						</div>	
						<?php
							}
						?>
					</div>
				</div>
			</div>
			<div class="mainfooter">
				<div class="wrapper">
					<address> 2014 &copy; Project Ocean. All rights reserved</address>
				</div>
			</div>
		</footer>
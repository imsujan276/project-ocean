<?php
	include_once("class/classes.php");
	if(isset($_POST['cmt'])){
		session_start();
		$project_id=$_GET['project_id'];
		$user=$_GET['user'];
		$user_id=$_SESSION['user_id'];
		$comment=$_POST['comment'];
		$query=$item->setcomment($user,$user_id, $project_id,$comment);
		if($query){
			echo"Sucessfuly commented";
			header("Location:post.php?project_id=$project_id");
		}
		else{
			echo"error occured";
		}
	}
?>

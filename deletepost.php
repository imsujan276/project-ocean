<?PHP
include_once("class/classes.php");
$user_id=$_GET['user_id'];
$project_id = $_GET['project_id'];
$query = $item->deletepost($project_id);
if($query)
{
	header('Location:profile.php?user_id=<?php echo $user_id ?>');
}
else
{
	echo "OOps ! Error occured. Please try again !";	
}



?>
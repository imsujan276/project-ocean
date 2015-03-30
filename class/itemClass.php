<?php

class itemClass extends database{
		
		public function exec($sql){
			if(empty($sql)){
				return mysql_error();
			}
			else{
				return mysql_query($sql);
			}
		}

		public function submit($ptitle,$description,$catagory,$image,$mainfile,$filelink){
		$sql = "insert into projects set title='$ptitle', description='$description', catagory='$catagory', image='$image', 
		mainfile='$mainfile', filelink='$filelink', user_id='".$_SESSION['user_id']."'";
		return $this->exec($sql);
		}

		public function lastID(){
			return mysql_insert_id();
		}

		public function viewall(){
			$sql="select * from projects,user where projects.user_id=user.user_id order by projects.date desc";
			return $this->exec($sql);
		}

		public function viewallmy($user_id){
			$sql="select * from projects,user where projects.user_id=user.user_id and user.user_id=$user_id order by projects.date desc";
			return $this->exec($sql);
		}

		public function viewpopular(){
			$sql="select * from projects,user where projects.user_id=user.user_id order by projects.hits desc limit 0,10";
			return $this->exec($sql);
		}

		public function viewrecent(){
			$sql="select * from projects,user where projects.user_id=user.user_id order by projects.date desc limit 0,10";
			return $this->exec($sql);
		}

		public function viewfooter(){
			$sql="select * from projects,user where projects.user_id=user.user_id order by projects.date desc limit 0,5";
			return $this->exec($sql);
		}

		public function viewpost($id){
			$sql="select * from projects,user where projects.project_id='$id' AND user.user_id=projects.user_id";
			return $this->exec($sql);
		}

		public function updatepost($ptitle,$description,$catagory,$image,$mainfile,$project_id){
			$sql="update projects set title='$ptitle', description='$description', catagory='$catagory', image='$image', 
			mainfile='$mainfile' where project_id=$project_id";
		}

		public function search($search){
			if(!isset($search)||empty($search)){
				$search='%';
			}
			$sql="select * from projects,user where projects.user_id=user.user_id AND (projects.catagory like '$search%' OR 
				projects.title like '%$search%' OR projects.description like '%$search%' OR user.firstname like '%$search%' OR 
				user.lastname like '%$search%')";
			return $this->exec($sql);
		}

		public function setcomment($user,$user_id,$id,$comment){
			$sql="insert into comment set `comment`='$comment', `project_id`='$id', `user`='$user', `user_id`=$user_id";
			return $this->exec($sql);
		}

		public function viewcomment($project_id){
			$sql="SELECT * FROM `comment` WHERE `project_id`=$project_id limit 0,15";
			return $this->exec($sql);
		}

		public function viewmycomment($user_id){
			$sql="SELECT * FROM `comment`WHERE `comment.user_id`=$user_id limit 0,10";
			return $this->exec($sql);
		}

		public function deletepost($projectid){
			$sql = "delete from projects where project_id=$projectid";
			return $this->exec($sql);
		}

		public function hits($id){
			$sql="UPDATE projects set `hits`=`hits`+1 where (project_id ='$id')";
			return $this->exec($sql);
		}
} //end of itemClass

$item = new itemClass();

?>
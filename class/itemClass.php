<?php
include_once('database.php');

class itemClass extends database{

		public function exec($sql){
			if(empty($sql)){
				return mysql_error();
			}
			else{
				return mysql_query($sql);
			}
		}

		public function getuser_id(){
			return $this->user_id;
		}

		public function setuser_id($user_id){
			$this->user_id=$user_id;
		}


		public function submit($ptitle,$description,$catagory,$image,$mainfile,$filelink, $user_id){
		$sql = "insert into projects set title='$ptitle', description='$description', catagory='$catagory', image='$image', mainfile='$mainfile', filelink='$filelink', user_id='$user_id'";
		return $this->exec($sql);
		}

		public function viewall(){
			$sql="select * from projects inner join user";
			return $this->exec($sql);
		}

		public function viewpost($id){
			$sql="select * from projects inner join user where project_id='$id'";
			return $this->exec($sql);
		}

		public function search($search){
		if(!isset($search)||empty($search)){
			$search='%';
		}
		$sql="select * from projects,user where projects.catagory like '$search%' OR projects.title like '%$search%' OR projects.description like '%$search%' OR user.firstname like '%$search%'";
		return $this->exec($sql);
		}

} //end of itemClass

$item = new itemClass;

?>
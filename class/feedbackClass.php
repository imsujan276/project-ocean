<?php

class feedbackClass extends database{
		
		public function exec($sql){
			if(empty($sql)){
				return mysql_error();
			}
			else{
				return mysql_query($sql);
			}
		}
		public function feedback($name,$contact,$from,$message){
		$sql = "INSERT INTO `project`.`feedback` (`sn`, `name`, `phone`, `email`, `message`) VALUES (NULL, '$name', '$contact', '$from', '$message')";
		return $this->exec($sql);
		}

}

$feedback= new feedbackClass();

?>
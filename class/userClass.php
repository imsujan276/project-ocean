<?php


class userClass{

	public function exec($sql){
		if(empty($sql)){
			return mysql_error();
		}
		else{
			return mysql_query($sql);
		}
	}

	public function register($fname,$lname,$email,$uname,$pass){
		$sql = "select * from user where username=$uname OR email=$email";
		$result  =  $this->exec($sql);
		$num = mysql_num_rows($result);
		if($num == 0){
			$sql = "insert into user set firstname='$fname',lastname='$lname',email='$email',username='$uname',password='".md5($pass)."'";
			return $this->exec($sql);
		}
	}

	public function login($uname,$pass){
		$sql = "select * from user where username='$uname' OR email='$uname' AND password='".md5($pass)."'";
		$result  =  $this->exec($sql);
		$num = mysql_num_rows($result);
		if($num>0){
			return $this->exec($sql);
		}
	}

	public function profile($user_id){
		$sql="select * from user where user_id='$user_id'";
		return $this->exec($sql);
	}
	

	public function profileupdate($fname,$lname,$email,$uname,$pass,$profilepic,$country,$city,$education,$college,$aboutme){
			$sql = "insert into user set firstname='$fname',lastname='$lname',email='$email',username='$uname',
			password='".md5($pass)."',profilepic='$profilepic',aboutme='$aboutme',country='$country',city='$city',
			education='$education',college='$college'";
			return $this->exec($sql);
	}


}	//end of userClass

$user = new userClass();

?>

<!--
/*
	private $sn;
	private $fname;
	private $lname;
	private $email;
	private $username;
	private $password;

	public function getuser_id(){
		return $this->sn;
	}

	public function setuser_id($sn){
		$this->sn=$sn;
	}

	public function getusername(){
		return $this->uname;
	}

	public function setusername($uname){
		$this->uname=$uname;
	}

	public function getpassword(){
		return $this->pass;
	}

	public function setpassword($pass){
		$this->pass=$pass;
	}

	public function getfname(){
		return $this->getfname;
	}

	public function setfname($fname){
		$this->fname=$fname;
	}

	public function getlname(){
		return $this->lname;
	}

	public function setlname($lname){
		$this->lname=$lname;
	}

	public function getemail(){
		return $this->email;
	}

	public function setemail($email){
		$this->email=$email;
	}



	public function register(){
		$query="select * from users where username='$this->uname' AND email='$this->email'";
		$data=mysql_query($query);
		echo $num=mysql_num_rows($data);
		if($num>0){

				return false;

			}
		else{
			$query="insert into user(sn,fname,lname,email,username,password) values('$this->sn','$this->fname','$this->lname','$this->email''$this->uname','$this->pass')";
			return ($data);
		}
	}

	public function login(){
		$query="select * from user where username='$this->uname'  AND password='$this->pass'";
		$result=mysql_query($query);
		$num=mysql_num_rows($result);
		if($num>0){
			$data=mysql_fetch_array($result);
			$this->setuser_id($data['sn']);
			return true;
		}
		else{
			return false;
		}

	}

	public function getuserinfo(){
	$query="select * from users where sn=$this->sn";
	return mysql_query($query);

	}

*/
}


?>
-->
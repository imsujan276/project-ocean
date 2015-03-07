<?php
class database
{
	private $host;
	private $username;
	private $password;
	private $database;
	private $con;

	function __construct()
	{
		$this->host = "localhost";
		$this->username = "root";
		$this->password = "";
		$this->database = "project";
		$this->connect();
	}

	 private function connect()
	{
		$this->con = mysql_connect($this->host, $this->username, $this->password);
		mysql_select_db($this->database,$this->con);
		return($this->con);
	}


}
$DB = new database();
if(!isset($_SESSION)){
	session_start();
	ob_start();
}

?>
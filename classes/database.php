<?php 
Class DatabaseConnection{

	public $server;
	public $username;
	public $password;
	public $conn;
	public $database;

	public function __construct(){

		$this->server='localhost';
		$this->username='root';
		$this->password='';
		$this->database="edonation";

		$this->conn=mysqli_connect($this->server,$this->username,$this->password,$this->database);

		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
		} 
		@session_start();
	}
	public function queryFunction($sql){
		$query=mysqli_query($this->conn,$sql);

		return $query;
	}
}
?>

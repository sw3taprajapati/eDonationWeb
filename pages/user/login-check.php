<?php

if(isset($_POST['submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];

	$obj=new User();
	$obj->login($username,$password); 	
}

?>
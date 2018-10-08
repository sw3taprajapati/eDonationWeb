<?php
if(isset ($_POST['submit'])){

	$db=new Organization();
	$organizationName=$_POST['organization-name'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['new-password'];
	$confirmPassword=$_POST['confirm-password'];
	$street=$_POST['street'];
	$district=$_POST['district'];
	$zone=$_POST['zone'];
	$contactNumber=$_POST['contact-number'];
	$website=$_POST['website'];
	$panNumber=$_POST['pan-number'];

	$db->insertToOrganization($organizationName,$email,$username,$password,$street,$district,$zone,$contactNumber,$website,$panNumber);
} 
?>
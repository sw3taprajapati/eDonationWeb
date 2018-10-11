<?php
include_once('classes/database.php');
Class User extends DatabaseConnection{
	public $db;

	public function __construct(){
		$this->db=new DatabaseConnection();
	}

	public function login($username,$password){

		$hashPassword=md5($password);
		$sql ="SELECT * FROM user where username LIKE '".$username."' and  password LIKE '".$hashPassword."' LIMIT 1;";

		$result=$this->db->queryFunction($sql);
		$count=0;
		$id;
		$userid;
		$user;
		foreach ($result as $value) {
			$count++;
			$id=$value['role_id'];
			$user=$value['username'];
		}

		if($count>0){
			$count=0;
			$roleName;
			$sql="SELECT role_name from role where role_id=".$id. " LIMIT 1";
			$result=$this->db->queryFunction($sql);

			foreach ($result as $value) {
				$roleName=$value['role_name'];
				$count++;
			}

			if($count>0){

				$_SESSION['username']=$user;
				$_SESSION['role-id']=$id;

				if($roleName=="Admin"){
					
					header('Location:index.php?filename=admin/admin');

				}else if($roleName=="Receiver"){


					$sql="SELECT organization.status from Organization inner join user on organization.user_id=user.user_id where user.username LIKE '".$username."' AND user.password LIKE '".$hashPassword."'";

					$result=$this->db->queryFunction($sql);
					$status;
					foreach ($result as $value) {
						$status=$value['status'];
					}
					
					if($status==1){

						header('Location:index.php?filename=organization/organization-dashboard');

					}else if($status==0){

						$_SESSION['status']="Cant login!!! Not Approved yet";
						$_SESSION['class']="fail";
						header('Location:index.php?filename=user/login');

						unset($_SESSION['username']);
						unset($_SESSION['role-id']);

					}else{

						$_SESSION['status']="username or password incorrect";
						$_SESSION['class']="fail";
						header('Location:index.php?filename=user/login');

						unset($_SESSION['username']);
						unset($_SESSION['role-id']);

					}
					

				}else if($roleName=="Donor"){

					header('Location:index.php?filename=donor/donor-dashboard');

				}else{
					$_SESSION['status']="Username or Password Incorrect";
					$_SESSION['class']="fail";
					header('Location:index.php?filename=user/login');
				}
			}
		}else{
			$_SESSION['status']="Username or Password Incorrect";
			$_SESSION['class']="fail";
			header('Location:index.php?filename=user/login');
		}

	}

	public function getData(){

		$sql="SELECT organization_id,organization_name,street,zone,district,contact_number,item_description,website from organization where status=1";

		$data=$this->db->queryFunction($sql);
		return $data;
	}

	public function searchOrg($searchText){

		$sql="SELECT organization_id,organization_name,street,zone,district,contact_number,item_description,website from organization where (organization_name like '%".$searchText."%' or street like '%".$searchText."%' or district like '%".$searchText."%' or zone like '%".$searchText."%' or website like '%".$searchText."%') and status=1";

		$data=$this->db->queryFunction($sql);
		return $data;
	}

	public function viewDonors(){
		$query="Select * from Donor where status=1";

		$result=$this->db->queryFunction($query);

		return $result;
	}

	public function countTotal($name,$table,$status=2){
		if($status==2){
			$query = "SELECT count(".$name.") as total_number from ".$table;
		}else{
			$query = "SELECT count(".$name.") as total_number from ".$table." where status = ".$status;
		}
		
		$result=$this->db->queryFunction($query);
		$count;

		foreach ($result as $value) {
			$count = $value['total_number'];
		}
		return $count;
	}

	public function getName($name,$table){
		$query= "SELECT ".$name.",status from ".$table;

		$result=$this->db->queryFunction($query);

		return $result;
	}
}
?>
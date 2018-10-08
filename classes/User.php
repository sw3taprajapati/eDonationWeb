<?php
include_once('classes/database.php');
Class User extends DatabaseConnection{
	public $db;

	public function __construct(){
		$this->db=new DatabaseConnection();
	}

	public function login($username,$password){

		$sql ="SELECT * FROM user where username LIKE '".$username."' and  password LIKE '".$password."' LIMIT 1;";

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
					
					header('Location:index.php?filename=pages/admin/admin.php');

				}else if($roleName=="Receiver"){


					$sql="SELECT organization.status from Organization inner join user on organization.user_id=user.user_id where user.username LIKE '".$username."' AND user.password LIKE '".$password."'";

					$result=$this->db->queryFunction($sql);
					$status;
					foreach ($result as $value) {
						$status=$value['status'];
					}
					
					if($status==1){

						header('Location:index.php?filename=pages/organization/organization-dashboard.php');

					}else if($status==0){

						$_SESSION['status']="Cant login!!! Not Approved yet";
						$_SESSION['class']="fail";
						header('Location:index.php?filename=pages/user/login.php');

						unset($_SESSION['username']);
						unset($_SESSION['role-id']);

					}else{

						$_SESSION['status']="username or password incorrect";
						$_SESSION['class']="fail";
						header('Location:index.php?filename=pages/user/login.php');

						unset($_SESSION['username']);
						unset($_SESSION['role-id']);

					}
					

				}else if($roleName=="Donor"){

					header('Location:../../index.php?filename=pages/donor/donor-dashboard.php');

				}else{
					$_SESSION['status']="Username or Password Incorrect";
					$_SESSION['class']="fail";
					header('Location:../../index.php?filename=pages/login-logout/login.php');
				}
			}
		}else{
			$_SESSION['status']="Username or Password Incorrect";
			$_SESSION['class']="fail";
			header('Location:index.php?filename=pages/user/login.php');
		}

	}

	public function getData(){

		$sql="SELECT organization_id,organization_name,street,zone,district,contact_number,item_description,website from organization where status=1";

		$data=$this->db->queryFunction($sql);
		return $data;
	}

	public function searchOrg($searchText){

		$sql="SELECT organization_name,street,zone,district,contact_number,item_description,website from organization where (organization_name like '%".$searchText."%' or street like '%".$searchText."%' or district like '%".$searchText."%' or zone like '%".$searchText."%' or website like '%".$searchText."%') and status=1";

		$data=$this->db->queryFunction($sql);
		return $data;
	}

	public function viewDonors(){
		$query="Select * from Donor where status=1";

		$result=$this->db->queryFunction($query);

		return $result;
	}
}
?>
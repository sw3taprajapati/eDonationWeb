<?php

include_once('classes/database.php');

class Organization extends DatabaseConnection{

	public $db;

	public function __construct(){
		$this->db=new DatabaseConnection();
	}

	public function insertToOrganization($organizationName,$email,$username,$password,$street,$district,$zone,$contactNumber,$website,$panNumber){

		$description="Not Set";
		$status=0;
		$verify="Not Set";
		$role_name="Receiver";
		$id;
		$sql="Insert into user (username,password,role_id) VALUES ('".$username."', '".$password."',(SELECT role_id from Role where role_name LIKE '".$role_name."'));";

		$query=$this->db->queryFunction($sql);

		if($query>0){
			$sql="SELECT user_id FROM user where username='".$username."' and password='".$password."';";
			$result=$this->db->queryFunction($sql);

			foreach ($result as $value) {
				$id=$value['user_id'];			
			}

			$sql="INSERT INTO organization(organization_name,email,street,district,zone,contact_number,website,pan_number,item_description,status,verification_code,user_id) VALUES( '".$organizationName."', '".$email."', '".$street."', '".$district."', '".$zone."', ".$contactNumber.", '".$website."', '".$panNumber."' , '".$description."', ".$status.", '".$verify."',".$id.");";

			$query=$this->db->queryFunction($sql);

			if($query>0){
				$_SESSION['status']="Registered successfully";
				$_SESSION['class']="success";
				header('Location:index.php?filename=pages/organization/register-organization.php');
			}else{
				$_SESSION['status']="Something went wrong!!Can't insert";
				$_SESSION['class']="fail";
				header('Location:index.php?filename=pages/organization/register-organization.php');
			}
		}else{
			$_SESSION['status']="Something went wrong!!Can't insert";
			$_SESSION['class']="fail";
			header('Location:index.php?filename=pages/organization/register-organization.php');
		}
	}

	public function getData($username){

		$count=0;
		$userId;
		$roleId;

		$this->sql="SELECT * FROM user where username LIKE '".$username."'";
		
		$list=$this->db->queryFunction($this->sql);

		foreach($list as $value) {

			$userId=$value['user_id'];
			$roleId=$value['role_id'];
			$count=1;
		}
		if($count==1){

			if($roleId==3){

				$this->sql="SELECT * FROM Organization where user_id=".$userId;

				$list=$this->db->queryFunction($this->sql);

				return $list;
			}else if($roleId==2){

				$this->sql="SELECT * FROM Donor where user_id=".$userId;

				$list=$this->db->queryFunction($this->sql);
				return $list;
			}
			
		}
	}

	public function updateData($email,$username,$street,$district,$zone,$contactNumber){
		$this->sql="Update Organization SET email ='".$email."' , street= '".$street."' , district='".$district."' , zone= '".$zone."' , contact_number= ".$contactNumber." where user_id= (Select user_id from user where username LIKE '".$username."')";

		$query=$this->db->queryFunction($this->sql);

		if($query>0){
			$_SESSION['status']="Update successfully";
			$_SESSION['class']="success";
			header('location:index.php?filename=pages/organization/edit-detail.php');
			
		}else{
			$_SESSION['status']="Something went wrong!!Try again later";
			$_SESSION['class']="fail";
			header('location:index.php?filename=pages/organization/edit-detail.php');
			
		}
	}

	public function getCategoriesList(){

		$this->sql="SELECT * FROM Categories";
		
		$list=$this->db->queryFunction($this->sql);

		return $list;
	}

	public function getRequirementDetails(){
		$this->sql="Select categories.categories_id,categories.categories_list,organization.item_description from categories inner join organizationcategories on categories.categories_id= organizationcategories.categories_id inner join organization on Organization.organization_id=organizationcategories.organization_id where organization.user_id = (SELECT user_id from user where username LIKE '".$_SESSION['username']."')";

		$result=$this->db->queryFunction($this->sql);
		return $result;
	}

	public function addRequirements($categories, $description){

		$count=0;
		$result;

		foreach ($categories as $value) {
			$this->sql="select organizationcategories.categories_id from organizationcategories inner join categories on organizationcategories.categories_id=categories.categories_id where categories.categories_id =".$value;

			$result=$this->db->queryFunction($this->sql);

			foreach ($result as $value) {
				$count++;
			}
		}

		if($count==0){

			foreach ($categories as $value) {

				$this->sql="INSERT INTO organizationcategories(organization_id,categories_id) VALUES ((SELECT organization.organization_id from organization inner join user on organization.user_id=user.user_id where user.username LIKE '".$_SESSION['username']."'),".$value.");";

				$result=$this->db->queryFunction($this->sql);
			}
			if($result>0){

				$this->sql="UPDATE organization set item_description = '".$description."' where user_id = (SELECT user_id from user where username LIKE '".$_SESSION['username']."')";
				$result=$this->db->queryFunction($this->sql);

				if($result>0){
					$_SESSION['status']="Categories added";
					$_SESSION['class']="success";
					header('location:index.php?filename=pages/organization/add-requirements.php');
				}else{
					$_SESSION['status']="Something went wrong!!! Try again later.";
					$_SESSION['class']="fail";
					header('location:index.php?filename=pages/organization/add-requirements.php');
				}
			}else{
				$_SESSION['status']="Something went wrong try again later";
				$_SESSION['class']="fail";
				header('location:index.php?filename=pages/organization/add-requirements.php');
			}

		} else{
			$_SESSION['status']="Please only choose those categories that are not added Earlier";
			$_SESSION['class']="fail";
			header('location:index.php?filename=pages/organization/add-requirements.php');

		}
	}

	public function updateDescription($description){

		$this->sql="UPDATE organization SET item_description = '".$description."' where user_id = (SELECT user_id from user where username LIKE '".$_SESSION['username']."')";

		$result=$this->db->queryFunction($this->sql);

		if($result==true){
			$_SESSION['status']="description updated";
			$_SESSION['class']="success";
			header('location:index.php?filename=pages/organization/add-requirements.php');
		}else{
			$_SESSION['status']="Something went wrong. Try again later!!";
			$_SESSION['class']="fail";
			header('location:index.php?filename=pages/organization/add-requirements.php');
		}
	}
}
?>
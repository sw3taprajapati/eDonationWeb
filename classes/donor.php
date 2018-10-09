<?php
include_once('classes/database.php');

Class Donor extends DatabaseConnection{
	public $db;
	public $sql;

	public function __construct(){
		$this->db=new DatabaseConnection();
	}

	public function getOrganizationCategories($id){
		$this->sql="Select organization.organization_name, organization.item_description,categories.categories_list, categories.categories_id from categories inner join organizationcategories on categories.categories_id = organizationcategories.categories_id inner join organization on organization.organization_id=organizationcategories.organization_id where organizationcategories.organization_id =".$id;

		$result=$this->db->queryFunction($this->sql);

		return $result;
	}

	public function insertIntoDonors($donorname,$email,$username,$password,$street,$district,$zone,$contactNumber){
		$description = "Not Set";
		$status = 0;
		$verify = "Not Set";
		$role_name = "Donor";
		$id;
		$hashPassword=md5($password);
		$sql = "Insert into user (username,password,role_id) VALUES ('".$username."', '".$hashPassword."',(SELECT role_id from Role where role_name LIKE '".$role_name."'));";

		$query = $this->db->queryFunction($sql);

		if($query>0){
			$sql = "SELECT user_id FROM user where username='".$username."' and password='".$hashPassword."';";
			$result = $this->db->queryFunction($sql);

			foreach ($result as $value) {
				$id = $value['user_id'];			
			}

			$sql = "INSERT INTO donor(donor_name,email,contact_number,street,district,zone,item_description,status,user_id) VALUES( '".$donorname."', '".$email."', ".$contactNumber.",'".$street."', '".$district."', '".$zone."', '".$description."', ".$status.",".$id.");";

			$query=$this->db->queryFunction($sql);

			if($query>0){
				$_SESSION['status']="Registered successfully!!! Now You can login to your account";
				$_SESSION['class']="success";
				// header('Location:index.php?filename=pages/donor/register-donor.php');
			}else{

				$sql = "DELETE FROM user WHERE user_id = ".$id;

				$query = $this->db->queryFunction($sql);

				if($query>0){
					$_SESSION['status']="Something went wrong!!Can't insert";
					$_SESSION['class']="fail";
				}else{
					$_SESSION['status']="Something went wrong!!Can't insert";
					$_SESSION['class']="fail";
				}
				
			}
		}else{
			$_SESSION['status']="Something went wrong!!Can't insert";
			$_SESSION['class']="fail";
		}
	}
}
?>
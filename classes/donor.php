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

	public function getCategoriesList($date=NULL){

		if($date==NULL){
			$this->sql="Select organization.organization_name, categories.categories_list,categories.categories_id, donorcategories.donation_date from organization inner join donororganization on organization.organization_id=donororganization.organization_id inner join donor on donor.donor_id= donororganization.donor_id inner join donorcategories on donorcategories.donor_id=donor.donor_id inner join categories on categories.categories_id=donorcategories.categories_id where donor.donor_id =(Select donor_id from donor where user_id =(Select user_id from user where username LIKE '".$_SESSION['username']."'))";
		}else{
			$this->sql="Select categories_id from donorcategories where donor_id =(Select donor_id from donor where user_id =(Select user_id from user where username LIKE '".$_SESSION['username']."')) and donation_date LIKE '".$date."'";
		}
		$result=$this->db->queryFunction($this->sql);

		return $result;
	}
	public function addDonation($categories,$description,$orgId){

		$date=date("Y-m-d");
		$res=0;

		$result=$this->getCategoriesList($date);

		foreach ($result as $value) {
			echo $res;
			foreach ($categories as $category) {
				if($value['categories_id']==$category){
					$res=1;
					break;
				}
			}
		}
		if($res==0){
			foreach ($categories as $value) {
				$this->sql="INSERT INTO donorcategories(donor_id,categories_id,donation_date) VALUES ((SELECT donor_id from donor WHERE user_id = (SELECT user_id from user where username LIKE '".$_SESSION['username']."')), ".$value.", '".$date."')";

				$result=$this->db->queryFunction($this->sql);
			}

			if($result>0){

				$this->sql="DELETE FROM donororganization WHERE donor_id =(SELECT donor_id from donor where user_id= (SELECT user_id from user where username LIKE '".$_SESSION['username']."')) and organization_id = ".$orgId;
				
				$result=$this->db->queryFunction($this->sql);

				$this->sql="INSERT INTO donororganization (donor_id,organization_id) VALUES ((SELECT donor_id from donor WHERE user_id = (SELECT user_id from user where username LIKE '".$_SESSION['username']."')), ".$orgId.")";

				$result=$this->db->queryFunction($this->sql);

				if($result>0){
					$this->sql="UPDATE donor SET item_description = '".$description."' WHERE user_id = (SELECT user_id from user where username LIKE '".$_SESSION['username']."')";

					$result=$this->db->queryFunction($this->sql);

					if($result>0){
						$_SESSION['status']="Donation applied!!! You'll be informed after approval";
						$_SESSION['class']="success";
						header('location:index.php?filename=donor/donor-dashboard');
					}else{
						$this->sql="DELETE FROM donororganization WHERE donor_id =(SELECT donor_id from donor where user_id= (SELECT user_id from user where username LIKE '".$_SESSION['username']."')) and organization_id = ".$orgId;
						$result=$this->db->queryFunction($this->sql);

						$_SESSION['status']="Something went wrong try again later";
						$_SESSION['class']="fail";
					}
				}else{
					$this->sql="DELETE FROM donorcategories WHERE user_id = (SELECT user_id from user where username LIKE '".$_SESSION['username']."') and donation_date LIKE '".$date."'";
					$result=$this->db->queryFunction($this->sql);

					$_SESSION['status']="Something went wrong try again later";
					$_SESSION['class']="fail";
				}

			}else{
				$_SESSION['status']="Already in the list!!! Add only those which aren't in the list";
				$_SESSION['class']="fail";
			}
			
		}else{
			$_SESSION['status']="Already in the list!!! Add only those which aren't in the list";
			$_SESSION['class']="fail";
		}
	}

	public function deleteDonorCategories($id){

		$this->sql="DELETE FROM donorcategories where categories_id = ".$id;

		$result=$this->db->queryFunction($this->sql);

		if($result>0){
			$_SESSION['status']="Deleted category";
			$_SESSION['class']="success";
		}else{
			$_SESSION['status']="Something went wrong!! Try again later";
			$_SESSION['class']="fail";
		}
	}
}
?>
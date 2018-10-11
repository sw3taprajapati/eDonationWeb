<?php 

include_once('classes/database.php');

Class Admin extends DatabaseConnection{

	public $db;
	public $sql;

	public function __construct(){

		$this->db=new DatabaseConnection();
	}

	public function selectOrganizationList(){

		$this->sql="SELECT * FROM organization where status=0";

		$list=$this->db->queryFunction($this->sql);
		return $list;
	}

	public function deleteOrganization($id){

		$this->sql="DELETE FROM user where user_id= (SELECT user_id from organization where organization_id=".$id.");";
		
		$query=$this->db->queryFunction($this->sql);

		if($query>0){

			$this->sql="DELETE FROM organization where organization_id=".$id;

			$query=$this->db->queryFunction($this->sql);

			if($query>0){
				$_SESSION['status']="Decline sucessfully";
				$_SESSION['class']="fail";
				header('Location:index.php?filename=admin/organization-list');
			}else{
				$_SESSION['status']="Decline not successful";
				$_SESSION['class']="fail";
				header('Location:index.php?filename=admin/organization-list');
			}


		}else{
			$_SESSION['status']="Something went wrong!!! Try later";
			$_SESSION['class']="fail";
			header('Location:index.php?filename=admin/organization-list');
		}
	}

	public function approveOrganization($id){
		
		$this->sql="UPDATE organization SET status=1 where organization_id=".$id;

		$query=$this->db->queryFunction($this->sql);

		if($query>0){
			$_SESSION['status'] = "Aprroval successful";
			$_SESSION['class']="success";
			header('Location:index.php?filename=admin/organization-list');

		}else{
			$_SESSION['status'] = "Approval not successful";
			$_SESSION['class']="fail";
			header('Location:index.php?filename=admin/organization-list');
		}
	}

	public function addCategories($categories){

		$this->sql="Select * from categories where categories_list LIKE '".$categories."'";

		$result=$this->db->queryFunction($this->sql);
		$count=0;

		foreach ($result as $value) {
			$count++;
		}

		if($count>0){
			$_SESSION['status']="Already in the list!!! Try another";
			$_SESSION['class']="fail";
			header('Location:index.php?filename=admin/add-delete-categories');
		}else{
			$sql="INSERT INTO Categories (categories_list) VALUES ('".$categories."');";

			$result=$this->db->queryFunction($sql);

			if($result==true){
				$_SESSION['status']="Category added";
				$_SESSION['class']="success";
				header('Location:index.php?filename=admin/add-delete-categories');
			}else{
				$_SESSION['status']="Something went wrong!! try again later";
				$_SESSION['class']="fail";
				header('Location:index.php?filename=admin/add-delete-categories');
			}
		}
	}

	public function viewCategories(){

		$this->sql="SELECT * FROM Categories";

		$result=$this->db->queryFunction($this->sql);

		return $result;
	}

	public function deleteCategories($categoriesId){

		$count=0;
		$this->sql="select * from organizationcategories where categories_id= ".$categoriesId;
		$data=$this->db->queryFunction($this->sql);

		foreach ($data as $value) {
			$count++;
		}
		if ($count==0){
			$this->sql="Delete from Categories where categories_id = ".$categoriesId;

			$result=$this->db->queryFunction($this->sql);

			if($result>0){
				$_SESSION['status']="Deleted sucessfully!!";
				$_SESSION['class']="success";
				header('Location:index.php?filename=admin/add-delete-categories');
			}else{
				$_SESSION['status']="Something went wrong!!!Try again later.";
				$_SESSION['class']="fail";
				header('Location:index.php?filename=admin/add-delete-categories');
			}
		}else{
			$_SESSION['status']="The list is in requirement of the organzation!cant delete!!";
			$_SESSION['class']="fail";
			header('location:index.php?filename=admin/add-delete-categories');
		}
	}
}
?>
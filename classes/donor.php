<?php
include_once('classes/database.php');

Class Donor extends DatabaseConnection{
	public $db;
	public $sql;

	public function __construct(){
		$this->db=new DatabaseConnection();
	}

	public function getOrganizationCategories($id){
		$this->sql="Select categories.categories_list, categories.categories_id from categories inner join organizationcategories on categories.categories_id = organizationcategories.categories_id where organizationcategories.organization_id =".$id;

		var_dump($this->sql);
		die;
	}
}
?>
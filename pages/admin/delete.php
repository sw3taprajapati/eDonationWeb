<?php
$obj=new Admin();
if(isset($_GET['id'])){
	
	$id=$_GET['id'];

	$obj->deleteOrganization($id);
}

if(isset($_GET['category-id'])){
	$categoryId=$_GET['category-id'];

	$obj->deleteCategories($categoryId);



}

?>
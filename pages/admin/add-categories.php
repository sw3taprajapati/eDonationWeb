<?php
	$categoryName=$_POST['category-name'];

	$obj=new Admin();
	$obj->addCategories($categoryName);
?>
<?php
public class Categories{

	public $categories_id;
	public $categories_list;

	public function setCategoriesId($categories_id){
		$this->categories_id=$categories_id;
	}

	public function getCategoriesId(){
		return $this->categories_id;
	}

	public function setCategoriesList($categories_list){
		$this->categories_list=$categories_list;
	}

	public function getCategoriesList(){
		return $this->categories_list;
	}
}
?>
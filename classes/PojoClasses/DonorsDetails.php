<?php
public class DonorsDetails{
	private $organizationName;
	private $donationDate;
	private $categories;

	public function setOrganizationName($organizationName){
		$this->organizationName=$organizationName;
	}

	public function getOrganizationName(){
		return $this->categories_id;
	}

	public function setDonationDate($donationDate){
		$this->donationDate=$donationDate;
	}

	public function getCategoriesId(){
		return $this->donationDate;
	}

	public function setCategories($categories){
		$this->categories=$categories;
	}

	public function getCategoriesId(){
		return $this->categories;
	}
} 
?>
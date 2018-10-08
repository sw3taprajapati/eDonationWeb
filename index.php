<?php
@session_start();

include_once('pages/includes/head.php');
include_once('pages/includes/header.php');
include_once('pages/includes/main.php');
include_once('classes/includeClasses.php');

if(isset($_GET['filename']) || isset($_SESSION['username'])){
	if(isset($_GET['filename'])){
		$filename=$_GET['filename'];
	}
	if(isset($_SESSION['role-id'])){

		if($_SESSION['role-id']==1){

			if(!isset($_GET['filename'])){
				$filename='pages/admin/admin.php';
			}

			include($filename);

		}else if($_SESSION['role-id']==3){
			
			if(!isset($_GET['filename'])){
				$filename='pages/organization/organization-dashboard.php';
			}

			include($filename);

		}else if($_SESSION['role-id']==2){
			
			if(!isset($_GET['filename'])){
				$filename='pages/donor/donor-dashboard.php';
			}

			include($filename);
			
		}
	}else{
		include($filename);

	}
}else{
	include('pages/includes/banner.php');
	include ('pages/user/section-categories.php');

}
include_once('pages/includes/footer.php');
?>
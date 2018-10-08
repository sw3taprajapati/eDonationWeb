<?php

$id=$_GET['id'];

$obj=new Admin();
$obj->approveOrganization($id);
?>
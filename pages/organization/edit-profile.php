<?php
if(isset($_SESSION['username'])){
	?>

	<section class="organization-menu">
		<div class="container">
			<h2>Menu</h2>
			<div class="menu-div">
				<div class="section-image">
					<a href="index.php?filename=organization/add-requirements"><img src="assets/images/edit.png" alt="add/delete"></a>
				</div>
				<div class="section-categories">
					<a href="index.php?filename=organization/add-requirements"><p>Add/Delete/Update Requirements</p></a>
				</div>
			</div>

			<div class="menu-div">
				<div class="section-image">
					<a href="index.php?filename=organization/edit-detail"><img src="assets/images/edit-detail.png" alt=""></a>
				</div>
				<div class="section-categories">
					<a href="index.php?filename=organization/edit-detail"><p>Edit Details</p></a>
				</div>
			</div>

			<div class="menu-div">
				<div class="section-image">
					<a href="index.php?filename=organization/add-delete-categories"><img src="assets/images/info.png" alt=""></a>
				</div>
				<div class="section-categories">
					<a href="index.php?filename=organization/add-delete-categories"><p>Change Password</p></a>
				</div>
			</div>
		</div>
	</section>
	<?php
}else{
	header('Location:index.php');
}
?>
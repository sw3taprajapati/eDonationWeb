<?php
if(isset($_SESSION['username'])){
	?>

	<section class="organization-menu">
		<div class="container">
			<h2>Menu</h2>
			<div class="menu-div">
				<div class="section-image">
					<a href="index.php?filename=pages/organization/add-requirements.php"><img src="assets/images/edit.png" alt="add/delete"></a>
				</div>
				<div class="section-categories">
					<a href="index.php?filename=pages/organization/add-requirements.php"><p>Add/Delete/Update Requirements</p></a>
				</div>
			</div>

			<div class="menu-div">
				<div class="section-image">
					<a href="index.php?filename=pages/organization/edit-detail.php"><img src="assets/images/edit-detail.png" alt=""></a>
				</div>
				<div class="section-categories">
					<a href="index.php?filename=pages/organization/edit-detail.php"><p>Edit Details</p></a>
				</div>
			</div>

			<div class="menu-div">
				<div class="section-image">
					<a href="index.php?filename=pages/organization/add-delete-categories.php"><img src="assets/images/info.png" alt=""></a>
				</div>
				<div class="section-categories">
					<a href="index.php?filename=pages/organization/add-delete-categories.php"><p>Change Password</p></a>
				</div>
			</div>
		</div>
	</section>
	<?php
}else{
	header('Location:index.php');
}
?>
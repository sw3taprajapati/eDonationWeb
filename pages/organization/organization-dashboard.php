<?php 
if(isset($_SESSION['username'])){

	?>
	<section class="organization-menu">
		<div class="container">
			<h2>Menu</h2>
			<div class="menu-div">
				<div class="section-image">
					<a href="index.php?filename=pages/organization/donors-list.php"><img src="assets/images/edit.png" alt="add/delete"></a>
				</div>
				<div class="section-categories">
					<a href="index.php?filename=pages/organization/donors-list.php"><p>View Donation Request</p></a>
				</div>
			</div>

			<div class="menu-div">
				<div class="section-image">
					<a href="index.php?filename=pages/organization/edit-profile.php"><img src="assets/images/add.png" alt=""></a>
				</div>
				<div class="section-categories">
					<a href="index.php?filename=pages/organization/edit-profile.php"><p>Edit Profile</p></a>
				</div>
			</div>

			<div class="menu-div">
				<div class="section-image">
					<a href="index.php?filename=pages/organization/view-organization-donors.php"><img src="assets/images/info.png" alt=""></a>
				</div>
				<div class="section-categories">
					<a href="index.php?filename=pages/organization/view-organization-donors.php"><p>View Donors</p></a>
				</div>
			</div>
		</div>
	</section>
	<?php
}else{
	header('Location:index.php');
}
?>
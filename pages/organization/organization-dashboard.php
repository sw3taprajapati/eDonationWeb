<?php 
if(isset($_SESSION['username'])){

	?>
	<section class="organization-menu">
		<div class="container">
			<h2>Menu</h2>
			<div class="menu-div">
				<div class="section-image">
					<a href="index.php?filename=organization/donors-list"><img src="assets/images/edit.png" alt="add/delete"></a>
				</div>
				<div class="section-categories">
					<a href="index.php?filename=organization/donors-list"><p>View Donation Request</p></a>
				</div>
			</div>

			<div class="menu-div">
				<div class="section-image">
					<a href="index.php?filename=organization/edit-profile"><img src="assets/images/add.png" alt=""></a>
				</div>
				<div class="section-categories">
					<a href="index.php?filename=organization/edit-profile"><p>Edit Profile</p></a>
				</div>
			</div>

			<div class="menu-div">
				<div class="section-image">
					<a href="index.php?filename=organization/view-organization-donors"><img src="assets/images/info.png" alt=""></a>
				</div>
				<div class="section-categories">
					<a href="index.php?filename=organization/view-organization-donors"><p>View Donors</p></a>
				</div>
			</div>
		</div>
	</section>
	<?php
}else{
	header('Location:index.php');
}
?>
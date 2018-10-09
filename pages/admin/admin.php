<?php 
if (isset($_SESSION['username'])) {
	?>
	<section class="admin-menu">
		<div class="container">

			<h2>Menu</h2>
			<div class="menu-div">
				<div class="section-image">
					<a href="index.php?filename=pages/admin/organization-list.php"><img src="assets/images/edit.png" alt="add/delete"><a href=""></a></a>
				</div>
				<div class="section-categories">
					<a href="pages/admin/organization-list.php"><p>Organization List</p></a>
				</div>
			</div>

			<div class="menu-div">
				<div class="section-image">
					<a href="index.php?filename=pages/admin/view-information.php"><img src="assets/images/info.png" alt=""><a href=""></a></a>
				</div>
				<div class="section-categories">
					<a href="index.php?filename=pages/admin/view-information.php"><p>View Information</p></a>
				</div>
			</div>

			<div class="menu-div">
				<div class="section-image">
					<a href="index.php?filename=pages/admin/add-delete-categories.php"><img src="assets/images/add.png" alt=""><a href=""></a></a>
				</div>
				<div class="section-categories">
					<a href="index.php?filename=pages/admin/add-delete-categories.php"><p>Add/Delete Categories</p></a>
				</div>
			</div>
		</div>
	</section>
	<?php 
}else{
	header('Location:index.php');
} ?>
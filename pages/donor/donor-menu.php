<?php if(isset($_SESSION['role-id'])==2){
	?>
	<div class="donor">
		<div class="container">
			<div class="navigation-bar">
				<nav>
					<div class="searchbox">
						<form action="index.php?filename=donor/donor-dashboard" method="POST">
							<input type="text" name="search-text" id="search-text" placeholder="Search Here" class="input-field" value="<?php if(isset($_POST['search-text'])){echo $_POST['search-text'];}  ?>">
							<button type="submit" name="submit" class="input-field"><i class="fa fa-search" aria-hidden="true"></i></button>
						</form>
					</div>
					<ul>
						<li><a href="index.php">Pending Request</a></li>
						<li><a href="index.php?filename=organization/register-organization">Donated To</a></li>
						<li><a href="index.php?filename=donor/register-donor">My Profile</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<?php
} ?>
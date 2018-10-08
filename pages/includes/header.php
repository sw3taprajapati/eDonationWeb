
<div class="wrapper">
	<div class="wrapper-1">
		<header class="header">
			<div class="container">
				<div class="logo-wrapper">
					<a href="index.php"><img src="assets/images/logo.png" alt="Logo"></a>
				</div>

				<div class="navigation-bar">
					<nav>
						<?php 
						if(isset($_SESSION['username'])){
							?>
							<ul>
								<li><span class="heading">Welcome <?php echo $_SESSION['username'] ?></span></li>
								<li><a href="index.php?filename=pages/user/logout.php" onclick="return logout();" class="button btn-blue" ><i class="fa fa-sign-out icon" ></i> Logout</a></li>
							</ul>

							<?php
						}else{
							?>
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="index.php?filename=pages/organization/register-organization.php">Register Organization</a></li>
								<li><a href="index.php?filename=pages/user/view-donors.php">Our Donors</a></li>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Contact us</a></li>
								<li><a href="index.php?filename=pages/user/login.php" class="button btn-blue"><i class="fa fa-user icon"></i> Log in</a></li>
							</ul>
						<?php } ?>
					</nav>
				</div>
			</div>
		</header>

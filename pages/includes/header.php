
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
								<li><a href="index.php?filename=user/logout" onclick="return logout();" class="button btn-blue" ><i class="fa fa-sign-out icon" ></i> Logout</a></li>
							</ul>
							<?php

						}else{
							?>
							<ul>
								<li <?php echo (isset($_GET['filename']))=='organization/register-organization'?'class="active"':'ddd'?>>
									<a href="index.php?filename=organization/register-organization" id="register-menu">Register Organization</a>
								</li>
								<li <?php echo (isset($_GET['filename']))=='donor/register-donor'?'class="active"':'ddd'?>><a href="index.php?filename=donor/register-donor" id="donor-register-menu">Become a Donor</a></li>
								<li <?php echo (isset($_GET['filename']))=='user/view-donors'?'class="active"':'ddd'?>><a href="index.php?filename=user/view-donors" id="view-donors-menu">Our Donors</a></li>
								<li><a href="index.php?filename=user/login" class="button btn-blue"><i class="fa fa-user icon"></i> Log in</a></li>
							</ul>
						<?php } ?>
					</nav>
				</div>
			</header>

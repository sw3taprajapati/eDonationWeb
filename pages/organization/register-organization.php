<?php 
if(!isset($_SESSION['username'])){
	?>
	<div class="div-register-organization">
		<div class="container">
			<div class="div-form">
				<?php
				
				if(isset($_SESSION['status'])){

					if($_SESSION['class']=='success'){
						$icon='fa fa-check';
					}else{
						$icon='fa fa-times'; 
					}
					?>
					<div class="<?php echo $_SESSION['class'] ?>" id="<?php echo $_SESSION['class'] ?>"><i class="<?php echo $icon ?>"></i><?php echo $_SESSION['status']; ?></div>
					<?php
					unset($_SESSION['status']);
					unset($_SESSION['class']);
				}
				?>
				<h2>Register Organization</h2>
				<form action="index.php?filename=pages/organization/insert-organization.php" method="POST">
					<h3>(Note: * denotes required field)</h3>
					<div class="form-group">
						<!-- <label for="organization-name">Organization Name</label> -->
						<input type="text" name="organization-name" id="organization-name" placeholder="Organization Name*" class="input-field" required="required">

					</div>

					<div class="form-group">
						<!-- <label for="email">Email</label> -->
						<input type="email" name="email" id="email" placeholder="Email*" class="input-field" required="required">
						<span id="email"></span>
					</div>

					<div class="form-group">
						<!-- <label for="username">Username</label> -->
						<input type="text" name="username" id="username" placeholder="Username*" class="input-field" required="required">
						<span id="username"></span>
					</div>

					<div class="form-group">
						<!-- <label for="password">Password</label> -->
						<input type="password" name="new-password" id="new-password" placeholder="Password*" class="input-field" required="required">
						<span id="password-new"></span>
					</div>

					<div class="form-group">
						<!-- <label for="confirm-password">Confirm Password</label> -->
						<input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password*" class="input-field" required="required">
						<span id="password-confirm"></span>
					</div>

					<div class="form-group">
						<!-- <label for="street">Street</label> -->
						<input type="text" name="street" id="street" placeholder="Street*" class="input-field" required="required">
					</div>
					<div class="form-group">
						<!-- <label for="district">District</label> -->
						<input type="text" name="district" id="district" placeholder="District*" class="input-field" required="required">
					</div>
					<div class="form-group">
						<!-- <label for="zone">Zone</label> -->
						<input type="text" name="zone" id="zone" placeholder="Zone*" class="input-field" required="required">
					</div>
					<div class="form-group">
						<!-- <label for="contact-number">Contact Number</label> -->
						<input type="text" name="contact-number" id="contact-number" placeholder="Contact Number*" class="input-field" required="required">
					</div>
					<div class="form-group">
						<!-- <label for="website">Website</label> -->
						<input type="text" name="website" id="website" placeholder="Website*" class="input-field" required="required">
					</div>
					<div class="form-group">
						<!-- <label for="pan-number">Pan Number</label> -->
						<input type="text" name="pan-number" id="pan-number" placeholder="Pan Number*" class="input-field" required="required">
					</div>
					<div class="form-group">
						<input type="submit" value="Register" name="submit" class="button btn-blue">
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
}else{
	header('Location:index.php');
}
?>


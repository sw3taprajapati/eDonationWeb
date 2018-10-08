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
			}
			?>
			<h2>Become a Donor</h2>
			<form action="" method="POST">
				<h3>(Note: * denotes required field)</h3>
				<div class="form-group">
					<!-- <label for="organization-name">Organization Name</label> -->
					<input type="text" name="donor-name" id="donor-name" placeholder="Donor Name*" class="input-field" required="required">

				</div>

				<div class="form-group">
					<!-- <label for="email">Email</label> -->
					<input type="email" name="email" id="email" placeholder="Email*" class="input-field" required="required">
					<span id="email"></span>
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
					<input type="submit" value="Apply" name="submit" class="button btn-blue">
				</div>
			</form>
		</div>
	</div>
</div>
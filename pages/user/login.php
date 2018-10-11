<?php 

if(isset($_POST['register-link'])){
	$name=$_POST['register'];

	if($name=='organization'){
		header('location:index.php?filename=organization/register-organization');
	}else if($name=='donor'){
		header('location:index.php?filename=donor/register-donor');
	}else{
		header('location:index.php');
	}
}
if(!isset($_SESSION['username'])){
	?>
	<section class="login-div">
		<div class="container">
			<div class="form-div">
				<h2>Log in</h2>
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
				<form action="index.php?filename=user/login-check" method="POST">
					<div class="form-group">
						<input type="username" placeholder="Username" id="username" name="username" class="input-field" required="required">
					</div>
					<div class="form-group">
						<input type="password" placeholder="Password" id="password" name="password" class="input-field" required="required">
					</div>
					<div class="form-group">
						<input type="submit" value="Log in" name="submit" class="button btn-blue">
					</div>
				</form>
				<div class="div-forgot-password">
					<a href="#">Forgot Password?</a>
				</div>
			</div>
			<div class="div-register">
				<a href="" data-toggle="modal" data-target="#modalRegister">No Account?Register</a>
			</div>
		</div>
	</section>
	<div class="modal-class">
		<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title" id="exampleModalLongTitle">Register as</h2>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="" method="POST">
							<div class="form-group">
								<input type="radio" name="register" id="organization" value="organization" class="input-field">
								<label for="organization">Register as Organization</label>
							</div>
							<div class="form-group">
								<input type="radio" name="register" id="donor" value="donor" class="input-field">
								<label for="donor">Become a donor</label>
							</div>

							<div class="form-group">
								<input type="submit" name="register-link"  value="SUBMIT" class="button btn-blue">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}else{
	header('Location:index');
}
?>
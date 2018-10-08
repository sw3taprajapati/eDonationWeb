<?php 
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
			<form action="index.php?filename=pages/user/login-check.php" method="POST">
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
			<a href="index.php?filename=pages/organization/register-organization.php">No Account?Register</a>
		</div>
	</div>
</section>
	<?php
}else{
	header('Location:index.php');
}
?>
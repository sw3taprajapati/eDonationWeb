<?php
if(isset($_SESSION['username'])){
	?>

	<section class="add-delete-categories">
		<div class="container">
			<div class="add-categories">
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
				}
				?>
				<form action="index.php?filename=pages/admin/add-categories.php" method="Post">
					<div class="form-group">
						<input type="text" name="category-name" id="category-name" class="input-field" placeholder="Add Categories" required="required">
						<input type="submit" value="Add" name="submit" class="button btn-blue">
					</div>
				</form>
			</div>
			<div class="delete-view-categories">
				<h2>List of Categories</h2>
				<table>
					<thead>
						<tr>
							<th>S.N</th>
							<th>Category Name</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$obj=new Admin();
						$data=$obj->viewCategories();

						$i=1;

						foreach ($data as$value) {
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $value['categories_list']; ?></td>
								<td><a href="index.php?filename=pages/admin/delete.php&category-id=<?php echo $value['categories_id'] ?>" onclick="return confirmationBox('remove?');"><i class="fa fa-trash"></i></a></td>
							</tr>
							<?php
							$i++;
						}
						?>
						<tr>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>

	<?php
}else{
	header('location:index.php');
}
?>
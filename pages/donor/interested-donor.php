<?php
$obj=new Donor();
$id;
if(isset($_GET['id'])){
	$id=$_GET['id'];
}
if(isset($_POST['submit'])){
	$obj->addDonation($_POST['checkbox'],$_POST['description'],$_GET['id']);
}
if(isset($_SESSION['username'])){
	if(isset($_SESSION['role-id'])==2){
		if(isset($_GET['id'])){
			$data=$obj->getOrganizationCategories($id);
		}

		if(isset($_GET['category-id'])){
			$obj->deleteDonorCategories($_GET['category-id']);
		}
		?>
		<section class="interested-donor">
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
					<form action="" method="POST">
						<h2>Interested Donors</h2>
						<div class="form-group">
							<?php foreach ($data as $value) {
								?>
								<input type="checkbox" name="checkbox[]" id="<?php echo $value['categories_list'] ?>" value="<?php echo $value['categories_id']?>">
								<label for="<?php echo $value['categories_list'] ?>"><?php echo $value['categories_list'] ?></label>
								<?php
							} ?>
						</div>
						<p><b>Note : </b>Your description will be replaced by new description</p>
						<div class="form-group">
							<textarea name="description" id="description" placeholder="Enter the detail of item" cols="30" rows="6" required="required"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="Apply" name="submit" class="button btn-blue">
						</div>
						<p><b>Note : </b><?php echo $value['organization_name'].' wants '.$value['item_description'];?> Your description will be replaced by new description</p>

					</form>
				</div>
				<div class="div-table">
					<table>
						<thead>
							<tr>
								<th>S.N</th>
								<th>Donation</th>
								<th>Organization Name</th>
								<th>Date</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$data= $obj->getCategoriesList(); 
							$i=1;
							foreach ($data as $value) {?>

								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $value['categories_list'] ?></td>
									<td><?php echo $value['organization_name'] ?></td>
									<td><?php echo $value['donation_date'] ?></td>
									<td><a href="index.php?filename=donor/interested-donor&category-id=<?php echo $value['categories_id'
									] ?>&id=<?php echo $id ?>" onclick="return confirmationBox('delete?');"><i class='fa fa-trash'></i></a></td>
								</tr>
								<?php
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
		<?php
	}
} ?>

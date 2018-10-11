<?php
$donorobj=new Donor(); 
if(isset($_SESSION['username'])){
	if(isset($_SESSION['role-id'])==2){
		$orgId;

		if(isset($_GET['id'])){
			$data=$donorobj->getOrganizationCategories($_GET['id']);
		}
		?>
		<div class="modal-class">
			<div class="modal fade" id="modalDonate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h2 class="modal-title" id="exampleModalLongTitle">Interested Donor</h2>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<?php  ?>
							<form action="" method="POST">
								<div class="form-group">
									<?php foreach ($data as $value) {
										?>
										<input type="checkbox" name="checkbox[]" id="<?php echo $value['categories_list'] ?>" value="<?php echo $value['categories_id']?>">
										<label for="<?php echo $value['categories_list'] ?>"><?php echo $value['categories_list'] ?></label>
										<?php
									} ?>
								</div>
								<div class="form-group">
									<input type="submit" value="Apply" name="submit" class="button btn-blue">
								</div>
								<p><b>Note : </b><?php echo $value['organization_name'].' wants '.$value['item_description'];?> Your description will be replaced by new description</p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<section class="donor">
			<div class="container">
				<div class="list">
					<?php
					var_dump($_SESSION);
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
					<div class="three-column">
						<?php
						$count=0;
						$obj=new User();
						if(isset($_POST['submit'])){
							$searchText=$_POST['search-text'];
							$data=$obj->searchOrg($searchText);
						}else{
							$data=$obj->getData();
						}
						$id;
						foreach ($data as $value) {
							$count++;
							if($value['item_description']!='Not Set'){
								?>
								<div class="view-organization">
									<h2><?php echo $value['organization_name'] ?></h2>
									<p><i class="fa fa-location-arrow"></i> <?php echo $value['street'].", ".$value['district'].", ".$value['zone'] ?></p>
									<p><i class="fa fa-phone"></i> <?php echo $value['contact_number'] ?></p>
									<?php
									if($value['item_description']!='Not Set'){
										?>
										<p>Wanted : <?php echo $value['item_description'] ?></p>
										<?php
									}
									?>

									<p>
										<a href="<?php echo 'http://'.$value['website'] ?>" target="_blank" class="button btn-sky"><i class="fa fa-globe"></i> Website</a>
										<a href="index.php?filename=donor/donor-dashboard&id=<?php echo $value['organization_id']; ?>#modalDonate" data-toggle="modal" data-id="<?php echo $value['organization_id'] ?>" data-target="#modalDonate" class="button btn-green"><i class="fa fa-star"></i> Intrested</a>
									</p>
								</div>
								<?php
							}
						}
						if($count==0){
							?>
							<span class = "fa fa-times fail"> No data found</span>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</section>

		

		<?php
	}else{
		header('location:index.php');
	}
}else{
	header('location:index.php');
} ?>

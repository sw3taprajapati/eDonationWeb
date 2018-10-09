<?php
$obj=new User();
if(isset($_SESSION['username'])){
	?>
	<section class="view-information">
		<div class="container">
			<h2>Total number of Organization and Donors</h2>
			<div class="two-column">
				<div class="name">
					<?php $data=$obj->countTotal('organization_name','organization'); ?>
					<p><b>Total number of organization : </b><?php echo $data ?></p>

					<?php $data=$obj->countTotal('organization_name','organization',1); ?>
					<p><b>Approved Organization : </b><?php echo $data ?></p>

					<?php
					$data=$obj->countTotal('organization_name','organization',0);
					?>
					<p><b>Pending Organization : </b><?php echo $data ?></p>
					<table>
						<thead>
							<tr>
								<th>Organization name</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$data=$obj->getName('organization_name','organization');
							foreach ($data as $value) {
								?>
								<tr>
									<td><?php echo $value['organization_name'] ?></td>
									<td>
										<i class="<?php if($value['status']==1){ echo "success";}else{ echo "fail";} ?>">
											<?php if($value['status']==0){
												echo 'Not Approved';
											} else{
												echo 'Approved';
											}?>
										</i>
									</td>
								</tr>
								<?php
							} ?>
						</tbody>
					</table>

				</div>
				<div class="name">
					<?php $data=$obj->countTotal('donor_name','donor'); ?>
					<p><b>Total number of Donors : </b><?php echo $data ?></p>

					<?php $data = $obj->countTotal('donor_name','donor',1); ?>
					<p><b>Approved Donors : </b><?php echo $data ?></p>

					<?php $data = $obj->countTotal('donor_name','donor',0); ?>
					<p><b>Pending Donors : </b><?php echo $data ?></p>

					<table>
						<thead>
							<tr>
								<th>Donor name</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$data=$obj->getName('donor_name','donor');
							foreach ($data as $value) {
								?>
								<tr>
									<td><?php echo $value['donor_name'] ?></td>
									<td>
										<i class="<?php if($value['status']==1){ echo "success";}else{ echo "fail";} ?>">
											<?php if($value['status']==0){
												echo 'Not Approved';
											} else{
												echo 'Approved';
											}?>
										</i>
									</td>
								</tr>
								<?php
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<?php
}
?>

<?php if(!isset($_SESSION['username'])){
	?>
<section class="view-donors">
	<div class="container">
		<div class="heading">	
			<h2>Our Donors</h2>
		</div>
		<div class="content">

			<?php 
			$obj=new User();
			$data=$obj->viewDonors();
			$i=1;
			?>

			<table>	
				<thead>
					<tr>
						<th>S.N</th>
						<th>Name</th>
						<th>Address</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $value) {
						?>

						<tr>
							<td><?php echo $i ?></td>
							<td><?php echo $value['donor_name'] ?></td>
							<td><?php echo $value['street'].",".$value['district'].",".$value['zone']?></td>
						</tr>
						<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
	
</section>
<?php
}else{
	header('Location:index.php');
} ?>
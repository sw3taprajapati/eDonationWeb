<?php include ('classes/admin/ApproveDeclineOrganization.php');
if(isset($_SESSION['username'])){
	?>
	<section class="display-org-list">

		<h2>Organization List</h2>
		<?php 
		$obj=new Admin();
		$list=$obj->selectOrganizationList();
		$i=1;

		?>
		<?php
		if(isset($_SESSION['status'])){

			if(isset($_SESSION['class'])){
				if($_SESSION['class']=='success'){
					$icon='fa fa-check';
				}else{
					$icon='fa fa-times';
				}
			}
			?>
			<div class="<?php echo $_SESSION['class'] ?>" id="<?php echo $_SESSION['class'] ?>"><i class="<?php echo $icon ?>"></i><?php echo $_SESSION['status']; ?></div>
			<?php
			unset($_SESSION['status']);

		}
		?>
		<table>
		<thead>
		<tr>
		<th>S.N</th>
		<th>Organization Name</th>
		<th>Organization Address</th>
		<th>Pan Number</th>
		<th>Approve/Delete</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($list as $value) {
			?>
			<tr>
			<td><?php echo $i++; ?></td>
			<td><?php echo $value['organization_name'] ?></td>
			<td><?php echo $value['street'].", ".$value['district'].", ".$value['zone'] ?></td>
			<td><?php echo $value['pan_number'] ?></td>
			<td><a href="index.php?filename=pages/admin/edit.php&id=<?php echo $value['organization_id'];?>" onclick="return confirmationBox('approve?');" title='Approve Organization'><i class="fa fa-check"></i></a> | <a href="index.php?filename=pages/admin/delete.php&id=<?php echo $value['organization_id']; ?>" onclick="return confirmationBox('decline?');" title='Decline Organization'><i class="fa fa-times"></i></a></td>
			</tr>
			<?php
			/*$i++;*/
		} ?>
		</tbody>
		</table>
		</section>
		<?php 
	}else{
		header('Location:index.php');
	}?>

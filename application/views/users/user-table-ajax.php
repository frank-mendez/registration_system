<table class="table table-bordered user-table">
	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Address</th>
			<th>Phone</th>
			<th>Date Created</th>
			<th>Role</th>
			<?php if($role == 'admin'): ?>
			<th>Action</th>
			<?php endif; ?>
		</tr>
	</thead>
	<tbody>

	<?php 

		foreach($users as $data) { 

			$user_id = $data['user_id'];
			$username = $data['username'];
			$first_name = $data['first_name'];
			$last_name = $data['last_name'];
			$email = $data['email'];
			$address = $data['address'];
			$phone_num = $data['phone_num'];
			$date_created = $data['date_created'];
			$role_id = $data['role_id'];

	?>

		<tr class="<?php echo $user_id; ?>">
			<td><?php echo $first_name; ?></td>
			<td><?php echo $last_name; ?></td>
			<td><?php echo $email; ?></td>
			<td><?php echo $address; ?></td>
			<td><?php echo $phone_num; ?></td>
			<td><?php echo $date_created; ?></td>
			<td><?php echo $role_id; ?></td>
			<?php if($role == 'admin'): ?>
			<td>
				<button class="btn btn-primary edit-user-btn btn-sm" data-id="<?php echo $user_id; ?>"><span class="glyphicon glyphicon-pencil"></span></button>
				<button class="btn btn-danger delete-user-btn btn-sm" data-id="<?php echo $user_id; ?>"><span class="glyphicon glyphicon-trash"></span></button>
			</td>
			<?php endif; ?>
		</tr>

	<?php } ?>
	</tbody>
</table>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Address</th>
			<th>Phone</th>
			<th>Date Created</th>
			<th>Role</th>
			<th>Action</th>
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

		<tr>
			<td><?php echo $first_name; ?></td>
			<td><?php echo $last_name; ?></td>
			<td><?php echo $email; ?></td>
			<td><?php echo $address; ?></td>
			<td><?php echo $phone_num; ?></td>
			<td><?php echo $date_created; ?></td>
			<td><?php echo $role_id; ?></td>
			<td>
				<button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button>
				<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
			</td>
		</tr>

	<?php } ?>
	</tbody>
</table>
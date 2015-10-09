<table class="table table-bordered" >
	<thead>
		<tr>
			<th>Role ID</th>
			<th>Name</th>
			<th>Description</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($roles as $data){ 

			$role_id = $data->role_id;
			$name = $data->name;
			$description = $data->description;


			?>
			<tr class="<?php echo $role_id; ?>">
				<td><?php echo $role_id; ?></td>
				<td><?php echo $name; ?></td>
				<td><?php echo $description; ?></td>
				<td>
					<button class="btn btn-primary edit-role-btn" data-id="<?php echo $role_id; ?>"><span class="glyphicon glyphicon-pencil"></span></button>
					<button class="btn btn-danger delete-role-btn" data-id="<?php echo $role_id; ?>"><span class="glyphicon glyphicon-trash"></span></button>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
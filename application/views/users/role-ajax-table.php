<table class="table table-bordered" >
	<thead>
		<tr>
			<th>Role ID</th>
			<th>Name</th>
			<th>Description</th>
			<?php if($role == 'admin'): ?>
			<th>Action</th>
			<?php endif; ?>
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
				<?php if($role == 'admin'): ?>
				<td>
					<button class="btn btn-primary edit-role-btn btn-sm" data-id="<?php echo $role_id; ?>"><span class="glyphicon glyphicon-pencil"></span></button>
					<button class="btn btn-danger delete-role-btn btn-sm" data-id="<?php echo $role_id; ?>"><span class="glyphicon glyphicon-trash"></span></button>
				</td>
				<?php endif; ?>
			</tr>
			<?php } ?>
		</tbody>
	</table>
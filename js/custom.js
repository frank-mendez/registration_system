var Module = {}


Module.Users = (function(){

	var role_functions = (function(){

		var $modal = $('#role-modal');

		function role_ajax_table(){

			var $table_container = $('.role-table-container'),
				ajax_url = base_url + controller + '/role_ajax';

			$.ajax({
				type: 'POST',
				url: ajax_url,
				dataType: 'text',
				beforeSend: function(){

				},
				success: function(response){
					$table_container.html(response);
				},
				complete: function(response){
					edit_role_modal();
					delete_role_modal();
				}

			});

		}

		function create_role_modal(){

			var $btn = $('.create-role-btn'),
				ajax_url = base_url + controller + '/create_role_modal';

			$btn.on('click', function(){

				$.ajax({
					type: 'POST',
					url: ajax_url,
					dataType: 'text',
					beforeSend: function(){
						$modal.modal('show');
					},
					success: function(response){
						$modal.html(response);
					},
					complete: function(response){
						insert_role();
					}

				});

			});

		}

		function insert_role(){

			$('#create-role-form').on('submit', function(e){

				var form_data = $(this).serialize();
					ajax_url = base_url + controller + '/create_role';

				$.ajax({
					type: 'POST',
					data: form_data,
					url: ajax_url,
					dataType: 'text',
					beforeSend: function(){

					},
					success: function(response){

					},
					complete: function(response){
						role_ajax_table();
						$modal.modal('hide');
					}

				});


				e.preventDefault();

			});

		}

		function edit_role_modal(){

			var $btn = $('.edit-role-btn');

			$btn.on('click', function(){

				var data_id = $(this).data('id'),
					ajax_url = base_url + controller + '/get_role_by_id/' + data_id;

				$.ajax({
					type: 'POST',
					url: ajax_url,
					dataType: 'text',
					beforeSend: function(){
						$modal.modal('show');
					},
					success: function(response){
						$modal.html(response);
					},
					complete: function(){
						update_role();
					}

				});

			});

		}

		function update_role(){

			$('#edit-role-form').on('submit', function(e){

				var form_data = $(this).serialize(),
					ajax_url = base_url + controller + '/update_role';

				$.ajax({
					type: 'POST',
					url: ajax_url,
					data: form_data,
					dataType: 'text',
					beforeSend: function(){

					},
					success: function(response){

					},
					complete: function(response){
						$modal.modal('hide');
						role_ajax_table();
					}

				});


				e.preventDefault();

			});

		}

		function delete_role_modal(){

			var $btn = $('.delete-role-btn');

			$btn.on('click', function(){

				var data_id = $(this).data('id'),
					ajax_url = base_url + controller + '/delete_role_modal';

				$.ajax({
					type: 'POST',
					url: ajax_url,
					dataType: 'text',
					beforeSend: function(){
						$modal.modal('show');
					},
					success: function(response){
						$modal.html(response);
					},
					complete: function(){
						$('.yes-btn').attr('data-id', data_id);
						confirm_delete();
					}

				});

			});

		}

		function confirm_delete(){

			var $btn = $('.yes-btn');

			$btn.on('click', function(){

				var data_id = $(this).data('id'),
					ajax_url = base_url + controller + '/delete_role/' + data_id;

				$.ajax({
					type: 'POST',
					url: ajax_url,
					dataType: 'text',
					beforeSend: function(){

					},
					success: function(response){

					},
					complete: function(response){
						$modal.modal('hide');
						$('tr.' + data_id).fadeOut();
					}

				});

			});

		}


		return{
			role_ajax_table: role_ajax_table,
			create_role_modal: create_role_modal
		}

	})();

	var user_functions = (function(){

		var $modal = $('#user-modal');

		function get_user_ajax(){

			var $table_container = $('.user-table-container'),
				ajax_url = base_url + controller + '/user_table_ajax',
				table = '.user-table';

			$.ajax({
				type: 'POST',
				url: ajax_url,
				dataType: 'text',
				beforeSend: function(){

				},
				success: function(response){
					$table_container.html(response);
				},
				complete: function(response){
					$(table).DataTable({
						"drawCallback": function(settings){
							edit_user_modal();
							delete_user_modal();
						}
					});
					
				}

			});

		}

		function create_user_modal(){

			var $btn = $('.create-user-btn'),
				ajax_url = base_url + controller + '/create_user_modal';

			$btn.on('click', function(){

				$.ajax({
					type: 'POST',
					url: ajax_url,
					dataType: 'text',
					beforeSend: function(){
						$modal.modal('show');
					},
					success: function(response){
						$modal.html(response);
					},
					complete: function(response){
						insert_user();
					}

				});

			});

		}

		function insert_user(){

			$('#create-user-form').on('submit', function(e){

				var form_data = $(this).serialize(),
					ajax_url = base_url + controller + '/create_user';

				$.ajax({
					type: 'POST',
					data: form_data,
					url: ajax_url,
					dataType: 'text',
					beforeSend: function(){

					},
					success: function(response){

					},
					complete: function(response){

						var response_message = response.responseText;

						if(response_message == 'true'){

							$('.alert-success').css('display','block');
							$('.alert-success').fadeOut(3000);
							$('.message-success').html('User Created Succesfully!');

							$modal.modal('hide');
							get_user_ajax();


						}else{

							var message = $.parseJSON(response_message);

							$('.alert-danger').removeClass('hidden');
							$('.message').html(message);

						
						}
					}

				});

				e.preventDefault();

			});

		}

		function edit_user_modal(){

			var $btn = $('.edit-user-btn');

			$btn.on('click', function(){

				var data_id = $(this).data('id'),
					ajax_url = base_url + controller + '/edit_user_modal/' + data_id;

				$.ajax({
					type: 'POST',
					url: ajax_url,
					dataType: 'text',
					beforeSend: function(){
						$modal.modal('show');
					},
					success: function(response){
						$modal.html(response);
					},
					complete: function(response){
						update_user();
					}

				});

			});

		}

		function update_user(){

			$('#edit-user-form').on('submit', function(e){

				var data_form = $(this).serialize(),
					ajax_url = base_url + controller + '/update_user';

				$.ajax({
					type: 'POST',
					url: ajax_url,
					data: data_form,
					dataType: 'text',
					beforeSend: function(){

					},
					success: function(response){

					},
					complete: function(response){

						$modal.modal('hide');

						$('.message-success').html('User Updated Succesfully!');

						$('.alert-success').css('display','block');

						$('.alert-success').fadeOut(3000);
						
						get_user_ajax();
					}

				});

				e.preventDefault();

			});

		}

		function delete_user_modal(){

			var $btn = $('.delete-user-btn');

			$btn.on('click', function(){

				var data_id = $(this).data('id'),
					ajax_url = base_url + controller + '/delete_user_modal';

				$.ajax({
					type: 'POST',
					url: ajax_url,
					dataType: 'text',
					beforeSend: function(){
						$modal.modal('show');
					},
					success: function(response){
						$modal.html(response);
					},
					complete: function(){
						$('.yes-btn').attr('data-id', data_id);
						confirm_delete();
					}

				});

			});

		}

		function confirm_delete(){

			var $btn = $('.yes-btn');

			$btn.on('click', function(){

				var data_id = $(this).data('id'),
					ajax_url = base_url + controller + '/delete_user/' + data_id;

				$.ajax({
					type: 'POST',
					url: ajax_url,
					dataType: 'text',
					beforeSend: function(){

					},
					success: function(response){

					},
					complete: function(response){
						$modal.modal('hide');
						$('tr.' + data_id).fadeOut();

						get_user_ajax();
					}

				});

			});

		}


		return{
			get_user_ajax: get_user_ajax,
			create_user_modal: create_user_modal
		}

	})();



	return{
		role_functions: role_functions,
		user_functions: user_functions
	}

})();
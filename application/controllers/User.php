<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$user_model = $this->load->model('user_model');


	}

	public function index()
	{

		$footer_data = array();
		$footer_data['listeners'] = array(



		);

		$this->load->view('layout/header');
		$this->load->view('users/index');
		$this->load->view('layout/footer', $footer_data);
	}

	public function role()
	{
		

		$footer_data = array();
		$footer_data['listeners'] = array(

			'Module.Users.role_functions.role_ajax_table()',
			'Module.Users.role_functions.create_role_modal()'

		);

		$this->load->view('layout/header');
		$this->load->view('users/role');
		$this->load->view('layout/footer', $footer_data);
	}

	public function role_ajax()
	{
		$user_model = $this->user_model;

		$results = $user_model->get_user_role();

		$model_data = array(

			'roles' => $results

		);

		$this->load->view('users/role-ajax-table', $model_data);
	}

	public function create_role()
	{
		$user_model = $this->user_model;

		$data = $this->input->post();

		if($data){

			extract($data, EXTR_SKIP);

			$query_result = $user_model->insert_role($name, $description);

			echo json_encode($query_result);

		}
	}

	public function create_role_modal()
	{
		$this->load->view('users/create-role-modal');
	}

	public function get_role_by_id($role_id)
	{
		$user_model = $this->user_model;

		$role_result = $user_model->get_user_role_by_id($role_id);

		$model_data = array('role_result' => $role_result);

		$this->load->view('users/edit-role-modal', $model_data);
	}

	public function update_role()
	{
		$user_model = $this->user_model;

		$data = $this->input->post();

		if($data){

			extract($data, EXTR_SKIP);

			$query_result = $user_model->update_role($name, $description, $role_id);

			echo json_encode($query_result);

		}
	}

	public function delete_role_modal()
	{
		$this->load->view('users/delete-role-modal');
	}

	public function delete_role($role_id)
	{
		$user_model = $this->user_model;

		$query_result = $user_model->delete_role($role_id);

		echo json_encode($query_result);
	}


	/*USER TABLE AND FUNCTIONS*/
	public function user_table()
	{

		$footer_data = array();
		$footer_data['listeners'] = array(

			'Module.Users.user_functions.get_user_ajax()',
			'Module.Users.user_functions.create_user_modal()'

		);

		$this->load->view('layout/header');
		$this->load->view('users/user');
		$this->load->view('layout/footer', $footer_data);
	}

	public function user_table_ajax()
	{
		$user_model = $this->user_model;

		$query_result = $user_model->get_all_users();

		$user_array = array();
		$i = 0;
		foreach($query_result as $data)
		{
			$user_array[$i]['user_id'] = $data['user_id'];
			$user_array[$i]['username'] = $data['username'];
			$user_array[$i]['first_name'] = $data['first_name'];
			$user_array[$i]['last_name'] = $data['last_name'];
			$user_array[$i]['email'] = $data['email'];
			$user_array[$i]['address'] = $data['address'];
			$user_array[$i]['phone_num'] = $data['phone_num'];
			$user_array[$i]['date_created'] = $data['date_created'];
			$user_array[$i]['role_id'] = $this->get_role_name($data['role_id']);
			$i++;
		}

		$model_data['users'] = $user_array;

		$this->load->view('users/user-table-ajax', $model_data);

	}

	public function create_user_modal()
	{
		$model_data = array(

			'role_dropdown' => $this->role_dropdown()

		);

		$this->load->view('users/create-user-modal', $model_data);
	}


	public function create_user()
	{
		$user_model = $this->user_model;

		$data = $this->input->post();

		if($data)
		{

			extract($data, EXTR_SKIP);

			$this->form_validation->set_rules('username', 'Username', 'required|min_length[8]|is_unique[user.username]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
            $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');


            /*Form Error Messages*/
            $this->form_validation->set_message('required', '{field} is required.');
            $this->form_validation->set_message('min_length', '{field} must have at least {param} characters.');
            $this->form_validation->set_message('is_unique', '{field} already exists.');
            $this->form_validation->set_message('email', '{field} is invalid.');

            if ($this->form_validation->run() == FALSE)
            {
                   	echo json_encode(validation_errors());
            }
            else
            {
                    $query_result = $user_model->insert_user($username, md5($password), $first_name, $last_name, $email, $address, $phone_num, $role_id);

                    echo json_encode($query_result);
            }

		}
	}

	public function edit_user_modal($user_id)
	{
		$user_model = $this->user_model;

		$query_result = $user_model->get_user_by_id($user_id);

		$model_data = array(

			'user_id' => $query_result['user_id'],
			'username' => $query_result['username'],
			'first_name' => $query_result['first_name'],
			'last_name' => $query_result['last_name'],
			'email' => $query_result['email'],
			'address' => $query_result['address'],
			'phone_num' => $query_result['phone_num'],
			'role_dropdown' => $this->role_dropdown($query_result['role_id'])

		);

		//var_dump($query_result);

		$this->load->view('users/edit-user-modal', $model_data);
	}

	public function update_user()
	{
		$user_model = $this->user_model;

		$data = $this->input->post();

		if($data){

			extract($data, EXTR_SKIP);

			$query_result = $user_model->update_user($first_name, $last_name, $email, $address, $phone_num, $role_id, $user_id);

			echo json_encode($query_result);

		}
	}

	public function delete_user_modal()
	{
		$this->load->view('users/delete-user-modal');
	}

	public function delete_user($user_id)
	{
		$user_model = $this->user_model;

		$query_result = $user_model->delete_user($user_id);

		echo json_encode($query_result);
	}
}

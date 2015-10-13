<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {


	public function __construct()
    {
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->library('session');
            $this->load->database();
            //$this->load->model('User_Model');
            //$this->load->library('session');

            $user_model = $this->load->model('user_model');
    }

    public function get_role_name($role_id)
    {
        $user_model = $this->user_model;

        $user_role_result = $user_model->get_user_role_by_id($role_id);

        $name = $user_role_result['name'];

        return $name;

    }

    public function role_dropdown($role = null, $default_value = "- Select -")
    {
        $user_model = $this->user_model;

        $results = $user_model->get_user_role();

        $output = "";

        $output .= '<option value="">' . $default_value . '</option>';

        foreach ($results as $data) {

            $role_id = $data->role_id;
            $name = $data->name;

            if ($role_id == $role) {
                $output .= '<option value="' . $role_id . '" selected="selected">' . $name . '</option>';
            } else {
                $output .= '<option value="' . $role_id . '">' . $name . '</option>';
            }


        }

        return $output;
    }

    public function is_logged_in()
    {
        $data = $this->session->userdata;

        if(isset($data['is_logged_in']))
        {
            return true;
        }else{
            return false;
        }
    }
	
}
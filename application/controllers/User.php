<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		
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
}

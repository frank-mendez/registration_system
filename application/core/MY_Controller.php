<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {


	public function __construct()
    {
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->database();
            //$this->load->model('User_Model');
            //$this->load->library('session');
    }
	
}
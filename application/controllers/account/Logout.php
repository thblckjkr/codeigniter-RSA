<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	
	public function index($msg = NULL)
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('user_lastname');
		$this->session->unset_userdata('user_nickname');
		$this->session->unset_userdata('validated');
		$this->session->sess_destroy();
		redirect('account/login');
	}	
}
?>	
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	
	public function index($msg = NULL)
	{
		if(!$this->session->userdata('validated')) {
			redirect('account/login');
		}

		$data = array(
			'title' => "Maneja tus datos",
			'showmenus' => true,
			'msg' => $msg
		);

		$this->load->template('account/main', $data);
	}	
}
?>
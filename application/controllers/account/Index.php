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

	public function delete(){
		$this->load->model('user_model');
		$this->user_model->delete();
		redirect("account/logout");
	}

	public function process()
	{
		if(!$this->session->userdata('validated')) {
			redirect('account/login');
		}
		$this->load->model('user_model');
		$this->user_model->delete();
		redirect('account/login');
	}
}
?>
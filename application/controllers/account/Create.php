<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	
	public function index($msg = NULL)
	{
		if(!$this->session->userdata('validated')) {
			redirect('account/login');
		}

		$data = array(
			'title' => "Crea un nuevo usuario",
			'showmenus' => true,
			'msg' => $msg
		);

		$this->load->template('account/create', $data);
	}
	public function process(){
		$this->load->model('user_model');
		if( $this->user_model->insert()){
			$msg = "Se genero correctamente";
		}else{
			$msg = "No se pudo generar";
		}
		$this->session->set_flashdata('process_result', $msg);
		redirect("index");
	}
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	
	public function index()
	{
		if( !@$_SESSION['validated'] ){
			redirect('account');
		}
		$data = array(
			'title' => "Catalogo de claves de software"
		);

		$this->load->template('index/main', $data);
	}

	public function process($method){
		$this->output->set_header('Content-Type: application/json');
		$this->load->model('soft_model');

		switch($method){
			case "GET":
				echo json_encode(
					$this->soft_model->view()
				);
				break;
			case "INSERT":
				echo json_encode(
					array("info" => $this->soft_model->insert())
				);
				break;
			case "UPDATE":
				echo json_encode(
					array("info" => $this->soft_model->update())
				);
				break;
			case "DELETE":
				$this->soft_model->delete();
				echo json_encode(
					array("info" => true)
				);
				break;
		}
	}
}
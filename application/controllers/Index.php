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

		$this->load->template('index/main');
	}
	public function process($method){
		$this->load->model('soft_model');

		switch($method){
			case "GET":
				$data = $this->soft_model->view();
				echo json_encode($data);
				break;
		}
	}
}
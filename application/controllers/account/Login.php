<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	
	public function index($msg = NULL)
	{
		$this->load->helper('form');

		$data = array(
			'title' => "Vamos, entra",
			'showmenus' => false,
			'msg' => $msg,
			'csrf' => array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
			)
		);

		$this->load->template('account/login', $data);
	}
	
	public function process(){
		$this->load->model('user_model');

		$result = $this->user_model->login();
		if( $result ){
			redirect('index');
		} else {
			$msg = 'Usuario y/o password inválidos';
			$this->index($msg);
		}
	}
}
?>
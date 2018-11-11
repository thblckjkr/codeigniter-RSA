<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Soft_model extends CI_Model{
   function __construct(){
      parent::__construct();
   }
   
   public function set_new_password(){
      $this->load->database();
   }

   public function view($id = null){
      $this->load->database();
      $this->load->library('rsatool');
		$rsat = new RSATool();

      // So much work, but decrypt each thing in the database
      // $data = base64_decode($info);
      // $decrypted = $rsat->decrypt( $data );

      if($id !== null)
         $this->db->where('soft_id', 1); // TODO
      
      $query = $this->db->get('soft_keys');

      // Let's check if there are any results
      if($query->num_rows() > 0)
      {
         return $query->result_array();
      }else{
         return array();
      }
   }
}
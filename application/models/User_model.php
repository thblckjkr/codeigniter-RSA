<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{
   function __construct(){
      parent::__construct();
   }
   
   public function set_new_password(){
      $this->load->database();
   }

   public function login(){
      $this->load->database();
      // Grab user input
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      
      $this->db->where('user_nickname', $username);
      $query = $this->db->get('users');

      // Let's check if there are any results
      if($query->num_rows() == 1)
      {
         $row = $query->row();

         if( password_verify( $password, $row->user_password ) ) {
            // If the password is ok, create session
            $data = array(
               'user_id' => $row->user_id,
               'user_name' => $row->user_name,
               'user_lastname' => $row->user_lastname,
               'user_nickname' => $row->user_nickname,
               'company_id' => $row->company_id,
               'validated' => true
            );
            $this->session->set_userdata($data);
            return true;
         }
      }
      // If the previous process did not validate
      // then return false.
      return false;
   }
}
?>
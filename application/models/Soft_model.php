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
         $this->db->where('soft_id', $this->input->post('soft_id')); // TODO
      
      $this->db->order_by('soft_id', 'DESC');
      $query = $this->db->get('soft_keys');

      // Let's check if there are any results
      if($query->num_rows() > 0)
      {
         $rows = $query->result_array();
         foreach($rows as $i => $data){
            $data = base64_decode( $rows[$i]['soft_pid'] );
            $decrypt = $rsat->decrypt( $data );
            $rows[$i]['soft_pid'] = $decrypt;

            $data = base64_decode( $rows[$i]['soft_key'] );
            $decrypt = $rsat->decrypt( $data );
            $rows[$i]['soft_key'] = $decrypt;
         }
         return $rows;
      } else {
         return array();
      }
   }

   public function insert(){
      $data = array(
         'soft_name' => $this->input->post('soft_name'),
         'soft_description' => $this->input->post('soft_description'),
         'soft_pid' => $this->input->post('soft_pid'),
         'soft_key' => $this->input->post('soft_key'),
         'soft_notes' => $this->input->post('soft_notes')
      );

      if( $this->db->insert('soft_keys', $data) ){
         return true;
      }

      return false;
   }

   public function update(){
      $data = array(
         'soft_name' => $this->input->post('soft_name'),
         'soft_description' => $this->input->post('soft_description'),
         'soft_pid' => $this->input->post('soft_pid'),
         'soft_key' => $this->input->post('soft_key'),
         'soft_notes' => $this->input->post('soft_notes')
      );

      $this->db->where('soft_id', $this->input->post('soft_id'));

      if( $this->db->update('soft_keys', $data) ){
         return true;
      }

      return false;
   }

   public function delete(){
      $this->load->database();
      $id = $this->input->post("soft_id");

      $this->db->where('soft_id', $id);
      $query = $this->db->delete('soft_keys');
   }
}
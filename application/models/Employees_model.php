<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees_model extends CI_Model{
   function __construct(){
      parent::__construct();
      $this->load->library('cryptool');
   }

   public function view($id = null){
      $this->load->database();
		$rsat = new CrypTool();

      if($id !== null)
         $this->db->where('empleado_id', $this->input->post('empleado_id')); // TODO
      
      $this->db->order_by('empleado_id', 'DESC');
      $query = $this->db->get('empleados');

      // Let's check if there are any results
      if($query->num_rows() > 0)
      {
         $rows = $query->result_array();
         foreach($rows as $i => $data){
            $decrypt = $rsat->decrypt( $rows[$i]['nombre'] );
            $rows[$i]['nombre'] = $decrypt;

            $decrypt = $rsat->decrypt( $rows[$i]['puesto'] );
            $rows[$i]['puesto'] = $decrypt;
         }
         return $rows;
      } else {
         return array();
      }
   }

   public function insert(){
      $rsat = new CrypTool();
      $data = array(
         'nombre' => $rsat->crypt( $this->input->post('nombre') ),
         'puesto' => $rsat->crypt( $this->input->post('puesto') )
      );

      if( $this->db->insert('empleados', $data) ){
         return true;
      }

      return false;
   }

   public function update(){
      $rsat = new CrypTool();
      $data = array(
         'nombre' => $rsat->crypt( $this->input->post('nombre') ),
         'puesto' => $rsat->crypt( $this->input->post('puesto') )
      );

      $this->db->where('empleado_id', $this->input->post('empleado_id'));

      if( $this->db->update('empleados', $data) ){
         return true;
      }

      return false;
   }

   public function delete(){
      $this->load->database();
      $id = $this->input->post("empleado_id");

      $this->db->where('empleado_id', $id);
      $query = $this->db->delete('empleados');
   }
}
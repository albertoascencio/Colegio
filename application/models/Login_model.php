<?php
defined('BASEPATH') OR exit('No direct script access allowed');
      
class Login_model extends CI_Model {  
      
    public function validar_datos() {  
        $this->db->select('*');
        $this->db->from('personas');
        $this->db->where('username', $this->input->post('username'));  
        $this->db->where('password', $this->input->post('password'));  
        $query = $this->db->get();  

         return $query->row();
    }  
      
   public function validarUser($usuario){
       $this->db->where('username',$usuario);
        $resultado = $this->db->get('personas');
        if($resultado->num_rows()>0){
          return 1;
        }else{
          return 0;
        }
    }

    public function validar($user, $pass){
        $this->db->where('username', $user);
        $this->db->where('password', $pass);
      
        $var=$this->db->get('personas');
        return $var->result_array();
    }

    public function validateData ($var) {

        $this->db->where('username', $var['username']);
        $this->db->where('password', $var['password']);
        $var = $this->db->get('personas');
        
        if ($var->num_rows() < 1) {
            return FALSE;
        } else {
            return $var->row();
        }

    }
    public function getEstudiantebyId ($id) {

        $this->db->WHERE('persona_id', $id);
        $estudiante = $this->db->GET('estudiantes');
        return $estudiante->row();
    }
}
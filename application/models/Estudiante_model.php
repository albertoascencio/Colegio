<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiante_model extends CI_Model {
	
	public function getEstudiantes () {
		
		$var = $this->db->QUERY('CALL sp_getEstudiantes();');
		return $var->result();
	}

	public function insertEstudiante ($var) {

		$result = $this->db->QUERY('SELECT * FROM personas WHERE username LIKE "%'.$var['persona']['username'].'%";');
		if ($result->num_rows() > 0) {
			$rows = $result->num_rows() + 1;;
			$var['persona']['username'] = $var['persona']['username'].$rows;
		}

		$this->db->INSERT('personas', $var['persona']);

		$var['estudiante']['persona_id'] = $this->db->INSERT_ID();
		$this->db->INSERT('estudiantes', $var['estudiante']);
	}

	public function deleteEstudiante ($var) {

		$this->db->WHERE('id_persona', $var['id']);
		$this->db->DELETE('personas');
	}

	public function getEstudiante ($var) {

		$this->db->WHERE('id_persona', $var['id']);
		$var = $this->db->GET('personas');

		return $var->row();
	}

	public function updateEstudiante ($var) {

		$this->db->WHERE('id_persona', $var['id']);
		$this->db->UPDATE('personas', $var['data']);

		$this->db->WHERE('persona_id', $var['id']);
		$this->db->UPDATE('estudiantes', $var['estudiante']);
	}
}
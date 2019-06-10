<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Docente_model extends CI_Model {
	
	public function getDocentes () {
		
		$var = $this->db->QUERY('CALL sp_getDocentes();');
		return $var->result();
	}

	public function insertDocente ($var) {

		$result = $this->db->QUERY('SELECT * FROM personas WHERE username LIKE "%'.$var['persona']['username'].'%";');
		$rows = $result->num_rows();
		if ($rows > 0) {
			$rows = $rows + 1;;
			$var['persona']['username'] = $var['persona']['username'].$rows;
		}

		$this->db->INSERT('personas', $var['persona']);

		$var['docente']['persona_id'] = $this->db->INSERT_ID();
		$this->db->INSERT('maestros', $var['docente']);
	}


	public function getDocente ($var) {

		$this->db->WHERE('id_persona', $var['id']);
		$var = $this->db->GET('personas');
		return $var->row();
	}

	public function updateDocente ($var) {

		$this->db->WHERE('id_persona', $var['id']);
		$this->db->UPDATE('personas', $var['data']);
	}

	public function deleteDocente ($var) {

		$this->db->WHERE('id_persona', $var['id']);
		$this->db->DELETE('personas');
	}
}
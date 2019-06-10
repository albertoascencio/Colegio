<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Horario_model extends CI_Model {

	public function getHorario ($gs) {

		$var = $this->db->QUERY('SELECT * FROM horarios WHERE gs_id = '.$gs.';');

		if ($var->num_rows() < 1) {
			return FALSE;
		} else {
			return $var->row();
		}
	}
	
	public function insertHorario ($var) {
		
		$this->db->INSERT('horarios', $var);
	}

	public function updateHorario ($var) {

		$this->db->WHERE('gs_id', $var['gs_id']);
		$this->db->UPDATE('horarios', $var['horario']);
	}

	public function deleteHorario ($id) {

		$this->db->WHERE('gs_id', $id);
		$this->db->DELETE('horarios');
	}
}
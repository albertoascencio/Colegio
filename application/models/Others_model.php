<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Others_model extends CI_model {
	
	public function gs () {
		
		$currentYear = Date('Y');
		$var = $this->db->QUERY('
		SELECT
		gs.id_gs, g.indicativo grado, s.indicativo seccion
		FROM grados_secciones gs
		INNER JOIN grados g ON gs.grados_id = g.id_grados
		INNER JOIN secciones s ON gs.secciones_id = s.id_secciones
		WHERE gs.anio = "'.$currentYear.'"
		ORDER BY g.indicativo DESC;');
		return $var->result();
	}
}
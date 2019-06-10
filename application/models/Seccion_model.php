<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seccion_model extends CI_Model {

	public function getAllYears () {

		$var = $this->db->QUERY('
			SELECT
			COUNT(grados_id)Grados, anio
			FROM grados_secciones
			WHERE anio != YEAR(NOW())
			GROUP BY anio
			ORDER BY anio DESC');
		return $var->result();
	}
	
	public function getSeccionesbyYear ($year) {

		$var = $this->db->QUERY('CALL sp_getSeccionesbyYear('.$year.')');
		return $var->result();
	}

	public function getEstudiantesbySeccion ($year) {

		$var = $this->db->QUERY('CALL sp_getEstudiantesbySeccion('.$year.')');
		return $var->result();
	}

	public function getEstudiantesbySectionsNULL () {

		$var = $this->db->QUERY('
			SELECT
			e.id_estudiantes, p.nombre, p.apellido
			FROM estudiantes e
			INNER JOIn personas p
			ON e.persona_id = p.id_persona
			WHERE e.gs_id IS NULL
		');
		return $var->result();
	}

	public function addStudentintoSection ($var) {

		$this->db->WHERE('id_estudiantes', $var[0]['est']);
		$this->db->UPDATE('estudiantes', $var[1]);
	}

	public function validateSeccion ($var) {

		/*Antes de insertar, comprobamos si esta sección ya existe*/
		$result = $this->db->QUERY('SELECT * FROM grados_secciones WHERE grados_id = '.$var['grados_id'].' && secciones_id = '.$var['secciones_id'].' && anio = '.$var['anio'].';');
		if ($result->num_rows() > 0) {
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function insertSeccion ($var) {

		$this->db->INSERT('grados_secciones', $var);
	}

	public function deleteSeccion ($id_gs) {

		$this->db->WHERE('id_gs', $id_gs);
		$this->db->DELETE('grados_secciones');
	}

	public function updateEstudiante ($var) {

		$this->db->WHERE('id_estudiantes', $var[0]['id']);
		$this->db->UPDATE('estudiantes', $var[1]);
	}
}
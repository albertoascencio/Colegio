<?php 



class Notas_model extends CI_Model {
	
	public function getActividades () {
		
		$var = $this->db->get('actividades');
		return $var->result();
	}
	public function getAlumnos(){
		$al= $this->db->query("
			SELECT
			n.id_notas,pp.nombre estudiante,n.libro_1,n.ejercicio_1,n.examen_1,n.total_1,n.ejercicios_2,n.proyecto_2,n.examen_2,n.total_2,n.ejercicios_3,n.proyecto_grupal_3,n.examen_3,n.total_3,n.actividad_final4,n.cuaderno_tarea_4,n.examen_4,n.total_4,n.puntaje
			FROM materias_cursadas mc
			INNER JOIN personas pp
			on mc.estudiante_id=pp.id_persona
			INNER JOIN notas n 
			on mc.notas_id=n.id_notas");
		return $al->result();

	}
	public function updateAlumno($Alumno,$id_notas){
		$this->db->where('id_notas',$id_notas);
		$this->db->update('notas',$Alumno);
	}

	public function getNotasbyId ($id) {

		//$var = $this->db->QUERY('CALL sp_getNotasbyId('.$id.');');
		$var = $this->db->QUERY('SELECT * FROM notas WHERE id_notas = '.$id.';');
		return $var->row();
	}
	

}


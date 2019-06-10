<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seccion extends CI_Controller {
	
	public function __construct () {

		parent:: __construct();
		$this->load->model('Seccion_model', 'Seccion', TRUE); 
	}

	public function Index () {

		if ($this->session->userdata('username') == NULL || $this->session->userdata('password') == NULL || $this->session->userdata('rol') == NULL) {
			redirect('Login/invalid');
		} else {
			$var['anios']  = $this->Seccion->getAllYears();
			$var['navbar'] = $this->load->view('layouts/navbar', NULL, TRUE);
			$var['footer'] = $this->load->view('layouts/footer', NULL, TRUE);
			$this->load->view('Secciones', $var);
		}
	}

	public function getSeccionesbyYear () {

		$var = $this->Seccion->getSeccionesbyYear($_POST['year']);
		if (count($var) < 1) {
			echo 0;
		} else {
			foreach ($var as $seccion) {
				echo '<option value="'.$seccion->gs.'" class="list-group-item list-group-item-action" >'.$seccion->grado.' - '.$seccion->seccion.'</option>';
			}
		}
	}

	public function getEstudiantesbySeccion () {

		$var = $this->Seccion->getEstudiantesbySeccion($_POST['gs']);
		if (count($var) < 1) {
			echo 0;
		} else {
			$currentYear = Date('Y');
			echo '<thead>';
				echo '<tr>';
					echo '<td></td>';
					echo '<td>Nombre completo</td>';
					echo '<td>Edad</td>';
				echo '</tr>';
			echo '</thead>';
			echo '<tbody>';
				foreach ($var as $estudiante) {
					echo '<tr>';
						echo '<td><input type="radio" name="radio" value="'.$estudiante->id_estudiantes.'" ></td>';
						echo '<td>'.$estudiante->nombre.' '.$estudiante->apellido.'</td>';
						echo '<td>'.($currentYear - $estudiante->anio).' años</td>';
					echo '</tr>';
				}
			echo '</tbody>';
		}
	}

	public function saveSeccion () {

		$var['grados_id'] = $_POST['grado'];
		$var['secciones_id'] = $_POST['seccion'];
		$var['anio'] = Date('Y');

		$result = $this->Seccion->validateSeccion($var);

		if ($result == FALSE) {
			echo 1;
		} else {
			echo 0;
			$this->Seccion->insertSeccion($var);			
		}
	}

	public function getEstudiantesbySectionsNULL () {

		$var = $this->Seccion->getEstudiantesbySectionsNULL();

		foreach ($var as $estudiante) {
			echo '<option value="'.$estudiante->id_estudiantes.'" >'.$estudiante->nombre.' '.$estudiante->apellido.'</option>';
		}
	}

	public function addStudentintoSection () {

		$var[0]['est'] = $_POST['est'];
		$var[1]['gs_id'] = $_POST['gs'];

		$this->Seccion->addStudentintoSection($var);
	}

	public function deleteSeccion () {

		$this->Seccion->deleteSeccion($_POST['gs']);
	}

	public function editEstudiante () {

		$var[0]['id'] = $_POST['est'];
		$var[1]['gs_id'] = $_POST['gs'];

		$this->Seccion->updateEstudiante($var);
	}
}
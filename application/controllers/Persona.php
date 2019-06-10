<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Controller {

	public function __construct () {

		parent:: __construct();
		$this->load->model('Estudiante_model', 'Estudiante', TRUE);
		$this->load->model('Docente_model', 'Docente', TRUE);
		$this->load->model('Encargado_model', 'Encargado', TRUE);
		$this->load->model('Mail_model', 'Mail', TRUE);
		$this->load->model('Others_model', 'Others', TRUE);
	}

	public function Index () {
		
		$var['navbar'] = $this->load->view('layouts/navbar', NULL, TRUE);
		$var['footer'] = $this->load->view('layouts/footer', NULL, TRUE);
       	switch ($this->session->userdata('rol')) {
			case '':
				redirect('Error');
			case '1':
				$var['gs'] = $this->Others->gs();
				$var['estudiantes'] = $this->Estudiante->getEstudiantes();
				$this->load->view('Estudiantes', $var);
				break;
			case '2':
				$this->load->view('Boleta', $var);
			case '3':
				$this->load->view('Horarios', $var);				
		}
	}

	public function viewDocentes () {

		if ($this->session->userdata('rol') == 1) {
			$var['docentes'] = $this->Docente->getDocentes();
			$var['navbar'] = $this->load->view('layouts/navbar', NULL, TRUE);
			$var['footer'] = $this->load->view('layouts/footer', NULL, TRUE);
			$this->load->view('Docentes', $var);
		} else {
			$dato['error'] = $this->session->flashdata('error');
        	$this->load->view('login_vista', $dato);
		}
	}

	public function getEncargados () {

		$var = $this->Encargado->getEncargados($_POST['id']);
		echo json_encode($var);

	}

	public function savePersona () {

		$mail = array(
			'email' => $_POST['email'],
			'fullname' => $_POST['nombre'].' '.$_POST['apellido'],
			'username' => $_POST['username'],
			'password' => 'userli'
		);

		$var['persona']['nombre'] = $_POST['nombre'];
		$var['persona']['apellido'] = $_POST['apellido'];
		$var['persona']['f_nacimiento'] = $_POST['fecha'];
		$var['persona']['departamento'] = $_POST['depto'];
		$var['persona']['municipio'] = $_POST['municipio'];
		$var['persona']['direccion'] = $_POST['direccion'];
		if ($_POST['tel_fijo'] != NULL) { $var['persona']['tel_fijo'] = $_POST['tel_fijo']; }
		if ($_POST['tel_movil'] != NULL) { $var['persona']['tel_movil'] = $_POST['tel_movil']; }
		$var['persona']['email'] = $_POST['email'];
		$var['persona']['sexo'] = $_POST['sexo'];
		$var['persona']['username'] = md5($_POST['username']);
		$var['persona']['password'] = md5('userli');
		$var['persona']['rol'] = $_POST['rol'];

		switch ($var['persona']['rol']) {
			case '2':
				$this->Docente->insertDocente($var);
				break;
			case '3':
				if ($_POST['gs'] != NULL) {
					$var['estudiante']['gs_id'] = $_POST['gs'];
				} else {
					$var['estudiante']['gs_id'] = NULL;
				}
				$this->Estudiante->insertEstudiante($var);
				break;
			case '4':
				$this->Estudiante->insertEncargado($var);
				break;
		}
		$this->Mail->registrationMessage($mail);
	}

	public function getPersona () {

		$data['id'] = $_POST['id'];
		$data['rol'] = $_POST['rol'];

		switch ($data['rol']) {
			case '1':
				$var = $this->Admin->getAdmin($data);
				break;
			case '2':
				$var = $this->Docente->getDocente($data);
				break;
			case '3':
				$var = $this->Estudiante->getEstudiante($data);
				break;
			case '4':
				$var = $this->Encargado->getEncargado($data);
				break;
		}
		echo json_encode($var);
	}

	public function editPersona () {

		$var['id'] = $_POST['id'];
		$var['rol'] = $_POST['rol'];
		$var['data']['nombre'] = $_POST['nombre'];
		$var['data']['apellido'] = $_POST['apellido'];
		$var['data']['f_nacimiento'] = $_POST['fecha'];
		$var['data']['departamento'] = $_POST['depto'];
		$var['data']['municipio'] = $_POST['municipio'];
		$var['data']['direccion'] = $_POST['direccion'];
		$var['data']['tel_fijo'] = $_POST['tel_fijo'];
		$var['data']['tel_movil'] = $_POST['tel_movil'];
		$var['data']['email'] = $_POST['email'];
		$var['data']['sexo'] = $_POST['sexo'];

		switch ($var['rol']) {

			case '2':
				$this->Docente->updateDocente($var);
				break;
			case '3':
				if ($_POST['gs'] != NULL) {
					$var['estudiante']['gs_id'] = $_POST['gs'];
				} else {
					$var['estudiante']['gs_id'] = NULL;
				}
				$this->Estudiante->updateEstudiante($var);
				break;
			case '4':
				$this->Encargado->updateEncargado($var);
				break;
		}
	}

	public function deletePersona () {

		$var['id'] = $_POST['id'];
		$var['rol'] = $_POST['rol'];

		switch ($var['rol']) {
			case '2':
				$var = $this->Docente->deleteDocente($var);
				break;
			case '3':
				$var = $this->Estudiante->deleteEstudiante($var);
				break;
			case '4':
				$var = $this->Encargado->deleteEncargado($var);
				break;
		}		
	}
}

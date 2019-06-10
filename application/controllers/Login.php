<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Login extends CI_Controller {
	
	public function __construct () {

		parent:: __construct();
		$this->load->model('Login_model', 'Login', TRUE);
	}

	public function Invalid () {

		if ($this->session->userdata('username') == NULL || $this->session->userdata('password') == NULL || $this->session->userdata('rol') == NULL) {
			$this->load->view('Login');
	    } else {
	    	redirect('Persona');
	    }
	}

	public function validateData () {

		$var['username'] = md5($_POST['username']);
		$var['password'] = md5($_POST['password']);
		$result = $this->Login->validateData($var);

		if ($result == FALSE) {
			echo 0;
		} else {
			$session['username'] = $result->username;
          	$session['password'] = $result->password;
          	$session['rol'] = $result->rol;
          	if ($session['rol'] == 3) {
              	$estudiante = $this->Login->getEstudiantebyId($result->id_persona);
              	$session['gs_id'] = $estudiante->gs_id;
          	}
          	$this->session->set_userdata($session);
          	echo 1;
		}
	}

	public function Logout () {
		
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
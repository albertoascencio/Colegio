<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Inicio extends CI_Controller {
	
	public function __construct () {
		
		parent:: __construct();
	}

	public function Index () {

		if ($this->session->userdata('username') == NULL || $this->session->userdata('password') == NULL || $this->session->userdata('rol') == NULL) {
			$this->load->view('Inicio');
		} else {
			redirect('Persona');
		}
	}
}
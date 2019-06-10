<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Mail_model extends CI_Model {
	
	public function __construct() {
		
		parent:: __construct();
		$this->load->library('email');
		$this->email->set_mailtype("html");
	}

	public function registrationMessage ($var) {

		$message = "<br>
		Hola, ".$var['fullname']."<br>
		El registro de tus datos fue exitoso. <br>
		Apartir de hoy podrás acceder a <a href='http:/localhost/lorem_ipsum'>Lorem Ipsum</a> con las credenciales:<br><br>

		&nbsp&nbsp&nbspNombre de usuario: ".$var['username']."<br>
		&nbsp&nbsp&nbspContraseña: ".$var['password']."
		";

		$this->email->from('lorem_ipsumschool@zoho.com',' Lorem Ipsum');
        $this->email->to($var['email']);
    	$this->email->subject("Registro de datos exitoso");
    	$this->email->message($message);
        $this->email->send();
	} 
}
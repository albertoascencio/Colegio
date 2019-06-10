<?php
class contacto extends CI_Controller {
   public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }
     
   public function index(){
       if ($this->session->userdata('user') == NULL || $this->session->userdata('pass') == NULL || $this->session->userdata('rol') == NULL) {
      $dato['login'] = $this->load->view('login/login_modal',NULL,TRUE); 
      $this->load->view('home',$dato);
    } else {
      redirect('Persona');
    }
  
   }
    
   public function enviar(){

       $this->load->library('email');
                
        $this->email->from('lorem_ipsumschool@zoho.com', 'Victor Robles');
         
      /*
       * Ponemos el o los destinatarios para los que va el email
       * en este caso al ser un formulario de contacto te lo enviarás a ti
       * mismo
       */
       
       $this->email->to('lorem_ipsumschool@zoho.com', 'Victor Robles');
         
      //Definimos el asunto del mensaje
        $this->email->subject($this->input->post("asunto"));
         
      //Definimos el mensaje a enviar
        $this->email->message(
                "Email: ".$this->input->post("email").
                "Nombre del padre: ".$this->input->post("nombre_padre").
                "Nombre de alumno: ".$this->input->post("nombre_alumno").
                " Mensaje: ".$this->input->post("mensaje")
                );
         
        //Enviamos el email y si se produce bien o mal que avise con una flasdata
        if($this->email->send()){
            $this->session->set_flashdata('envio', 'Email enviado correctamente');
        }else{
            $this->session->set_flashdata('envio', 'No se a enviado el email');
        }
         
        redirect(base_url("contacto"));
   }   
}
 
?>
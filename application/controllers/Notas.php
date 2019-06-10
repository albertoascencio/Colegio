<?php 

class Notas extends CI_controller
{

    function __construct(){
    	Parent::__construct();
    	$this->load->model('Notas_model');
    }	
    public function index(){

    	$var['actividad'] = $this->Notas_model->getActividades();
    	$var['al']=$this->Notas_model->getAlumnos();
        $var['navbar'] = $this->load->view('layouts/navbar', NULL, TRUE);
        $var['footer'] = $this->load->view('layouts/footer', NULL, TRUE);
    	$this->load->view('boleta',$var);
    }
    public function getData(){

        $var = $this->Notas_model->getNotasbyId($_POST['id']);
        echo json_encode($var);
    }
    

    public function actualizarAlumno(){
        $id_notas= $this->input->POST('ide');
        $Alumno['libro_1']=$this->input->POST('nota1');
        $Alumno['ejercicio_1']=$this->input->POST('nota2');
        $Alumno['examen_1']=$this->input->POST('nota3');
        $Alumno['total_1']=$this->input->POST('promedio1');
        $Alumno['ejercicios_2']=$this->input->POST('nota1_2');
        $Alumno['proyecto_2']=$this->input->POST('nota2_2');
        $Alumno['examen_2']=$this->input->POST('nota3_2');
        $Alumno['total_2']=$this->input->POST('promedio2');
        $Alumno['ejercicios_3']=$this->input->POST('nota1_3');
        $Alumno['proyecto_grupal_3']=$this->input->POST('nota2_3');
        $Alumno['examen_3']=$this->input->POST('nota3_3');
        $Alumno['total_3']=$this->input->POST('promedio3');
        $Alumno['actividad_final4']=$this->input->POST('nota1_4');
        $Alumno['cuaderno_tarea_4']=$this->input->POST('nota2_4');
        $Alumno['examen_4']=$this->input->POST('nota3_4');
        $Alumno['total_4']=$this->input->POST('promedio4');
        $Alumno['puntaje']=$this->input->POST('promedioFi');

        $this->Notas_model->updateAlumno($Alumno,$id_notas);
        redirect('Notas/index');



    }
}
?>
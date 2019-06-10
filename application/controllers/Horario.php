<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Horario extends CI_Controller {
	
	public function __construct() {
		
		parent:: __construct();
		$this->load->model('Horario_model', 'Horario', TRUE);
		$this->load->model('Others_model', 'Others', TRUE);
	}

	public function Index () {

		$var['navbar'] = $this->load->view('layouts/navbar', NULL, TRUE);
		$var['footer'] = $this->load->view('layouts/footer', NULL, TRUE);
		$var['gs'] = $this->Others->gs(); 

		$this->load->view('Horarios', $var);
	}

	public function getHorario () {
		
		$var = $this->Horario->getHorario($_POST['gs']);

		if ($var == FALSE) {
			echo 1;
		} else {
			$horas = explode(',', $var->horas);		$lunes = explode(',', $var->lunes);
			$martes = explode(',', $var->martes);	$miercoles = explode(',', $var->miercoles);
			$jueves = explode(',', $var->jueves);	$viernes = explode(',', $var->viernes);
			$sabado = explode(',', $var->sabado);	$domingo = explode(',', $var->domingo);
			echo '<thead>';
				echo '<tr>';
					echo '<td>Día \ Hora</td>';
					foreach ($horas as $hora) { echo '<td><strong>'.$hora.'</strong></td>'; }
				echo '</tr>';
			echo '</thead>';
			echo '<tbody>';
				echo '<tr>';
					echo '<td>Lunes</td>';
					foreach ($lunes as $lunes) { echo '<td>'.$lunes.'</td>'; }
				echo '</tr>';
				echo '<tr>';
					echo '<td>Martes</td>';
					foreach ($martes as $martes) { echo '<td>'.$martes.'</td>'; }
				echo '</tr>';
				echo '<tr>';
					echo '<td>Miércoles</td>';
					foreach ($miercoles as $miercoles) { echo '<td>'.$miercoles.'</td>'; }
				echo '</tr>';
				echo '<tr>';
					echo '<td>Jueves</td>';
					foreach ($jueves as $jueves) { echo '<td>'.$jueves.'</td>'; }
				echo '</tr>';
				echo '<tr>';
					echo '<td>Viernes</td>';
					foreach ($viernes as $viernes) { echo '<td>'.$viernes.'</td>'; }
				echo '</tr>';
				echo '<tr>';
					echo '<td>Sábado</td>';
					foreach ($sabado as $sabado) { echo '<td>'.$sabado.'</td>'; }
				echo '</tr>';
				echo '<tr>';
					echo '<td>Domingo</td>';
					foreach ($domingo as $domingo) { echo '<td>'.$domingo.'</td>'; }
				echo '</tr>';
			echo '</tbody>';
		}
	}

	public function saveHorario () {

		$var['gs_id'] 		= $_POST['gs'];
		$var['horas'] 		= implode(',', $_POST['hora']);
		$var['lunes'] 		= implode(',', $_POST['lunes']);
		$var['martes'] 		= implode(',', $_POST['martes']);
		$var['miercoles']	= implode(',', $_POST['miercoles']);
		$var['jueves'] 		= implode(',', $_POST['jueves']);
		$var['viernes'] 	= implode(',', $_POST['viernes']);
		$var['sabado'] 		= implode(',', $_POST['sabado']);
		$var['domingo'] 	= implode(',', $_POST['domingo']);

		$this->Horario->insertHorario($var);
	}

	public function getHorariobyId () {
		
		$var = $this->Horario->getHorario($_POST['gs']);

		$horas = explode(',', $var->horas); 	$lunes = explode(',', $var->lunes);
		$martes = explode(',', $var->martes); 	$miercoles = explode(',', $var->miercoles);
		$jueves = explode(',', $var->jueves); 	$viernes = explode(',', $var->viernes);
		$sabado = explode(',', $var->sabado); 	$domingo = explode(',', $var->domingo);
		echo '<thead>';
			echo '<tr id="throw" >';
				echo '<td>Día \ Hora</td>';
				foreach ($horas as $hora) { echo '<td><input type="time" name="hora[]" class="transparent" size="10" value="'.$hora.'" ></td>'; }
			echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
			echo '<tr id="lunes" >';
				echo '<td>Lunes</td>';
				foreach ($lunes as $lunes) { echo '<td><input name="lunes[]" class="transparent" size="10" value="'.$lunes.'" ></td>'; }
			echo '</tr>';
			echo '<tr id="martes" >';
				echo '<td>Martes</td>';
				foreach ($martes as $martes) { echo '<td><input name="martes[]" class="transparent" size="10" value="'.$martes.'" ></td>'; }
			echo '</tr>';
			echo '<tr id="miercoles" >';
				echo '<td>Miércoles</td>';
				foreach ($miercoles as $miercoles) { echo '<td><input name="miercoles[]" class="transparent" size="10" value="'.$miercoles.'" ></td>'; }
			echo '</tr>';
			echo '<tr id="jueves" >';
				echo '<td>Jueves</td>';
				foreach ($jueves as $jueves) { echo '<td><input name="jueves[]" class="transparent" size="10" value="'.$jueves.'" ></td>'; }
			echo '</tr>';
			echo '<tr id="viernes" >';
				echo '<td>Viernes</td>';
				foreach ($viernes as $viernes) { echo '<td><input name="viernes[]" class="transparent" size="10" value="'.$viernes.'" ></td>'; }
			echo '</tr>';
			echo '<tr id="sabado" >';
				echo '<td>Sábado</td>';
				foreach ($sabado as $sabado) { echo '<td><input name="sabado[]" class="transparent" size="10" value="'.$sabado.'" ></td>'; }
			echo '</tr>';
			echo '<tr id="domingo" >';
				echo '<td>Domingo</td>';
				foreach ($domingo as $domingo) { echo '<td><input name="domingo[]" class="transparent" size="10" value="'.$domingo.'" ></td>'; }
			echo '</tr>';
		echo '</tbody>';		
	}

	public function editHorario () {

		$var['gs_id'] 					= $_POST['gs'];
		$var['horario']['horas'] 		= implode(',', $_POST['hora']);
		$var['horario']['lunes'] 		= implode(',', $_POST['lunes']);
		$var['horario']['martes'] 		= implode(',', $_POST['martes']);
		$var['horario']['miercoles'] 	= implode(',', $_POST['miercoles']);
		$var['horario']['jueves']	 	= implode(',', $_POST['jueves']);
		$var['horario']['viernes'] 		= implode(',', $_POST['viernes']);
		$var['horario']['sabado'] 		= implode(',', $_POST['sabado']);
		$var['horario']['domingo']		= implode(',', $_POST['domingo']);

		$this->Horario->updateHorario($var);
	}

	public function deleteHorario () {

		$this->Horario->deleteHorario($_POST['id']);
	} 
}
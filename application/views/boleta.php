<html>
	<head>
		<title>Estudiantes</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/bootstrap/css/bootstrap.css" >
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/datatables/dataTables.bootstrap4.css" >
	</head>
    <body>
	    <div class="preloader">
	        <div class="loader">
	            <div class="loader__figure"></div>
	            <p class="loader__label">Cargando</p>
	        </div>
	    </div>
	    <div id="main-wrapper">
			<?=$navbar?>
	        <div class="page-wrapper">
	            <div class="container-fluid"><br>
					<div class="row justify-content-center my-3" >
					<div class="col-lg-10" >
						<div class="shadow p-3 mb-5 bg-white rounded" >
							<div class="card" >
								<div class="card-body" >
									<button type="button" id="edit" disabled class="btn btn-primary btn-sm" data-toggle="modal" data-target="#form" >Editar</button>
									<br><br>
									<table id="table" class="table table-responsive table-hover" >
										<thead>
											<tr>
												<th></th>
												<th hidden>n°</th>
												<th>Nombre</th>
												<?php foreach($actividad as $Acti){?>
													<th><?=$Acti->nombre?></th>
												<?php }?>
											</tr>
										</thead>
										<tbody id="tablebody" >
											<?php  foreach ($al as $a ) {?>
												<tr>
													<td>
														<input type="radio" id="radio" name="radio" value="<?=$a->id_notas?>" class="form-control" onclick="notDisabled()"></td>
														<td><?=$a->estudiante?></td>
														<td><?=$a->libro_1?></td>
														<td><?=$a->ejercicio_1?></td>
														<td><?=$a->examen_1?></td>
														<td><?=$a->total_1?></td>
														<td><?=$a->ejercicios_2?></td>
														<td><?=$a->proyecto_2?></td>
														<td><?=$a->examen_2?></td>
														<td><?=$a->total_2?></td>
														<td><?=$a->ejercicios_3?></td>
														<td><?=$a->proyecto_grupal_3?></td>
														<td><?=$a->examen_3?></td>
														<td><?=$a->total_3?></td>
														<td><?=$a->actividad_final4?></td>
														<td><?=$a->cuaderno_tarea_4?></td>
														<td><?=$a->examen_4?></td>
														<td><?=$a->total_4?></td>
														<td><?=$a->puntaje?></td>
													<?php } ?>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal fade" id="form" tabindex="-1" role="dialog" >
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="modalon" ></h5>
									<button type="button" class="close" data-dismiss="modal" data-toggle="tooltip" data-placement="bottom" title="Cerrar" ><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body blackfont">
									<form   action="<?php echo base_url();?>Notas/actualizarAlumno" method="post">
										<fieldset>
											<legend><strong>Ingreso de Notas</strong></legend>
											<legend><strong> Periodo 1</strong></legend>
											<div class="row" >
												<div class="col-sm-3">
													<div class="form-group" >
														<label>Libro <span class="redfont" >*</span></label>
														<input type="text" name="nota1" id="nota1" class="form-control" maxlength="3" >
														<input type="hidden" name="ide" id="ide" class="form-control" >
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group" >
														<label>Ejercicios <span class="redfont" >*</span></label>
														<input type="text" name="nota2" id="nota2" class="form-control" maxlength="3" onkeyup="calculo1()" >
													</div>
												</div>

												<div class="col-sm-3">
													<div class="form-group" >
														<label>Examen<span class="redfont" >*</span></label>
														<input type="text" name="nota3" id="nota3" class="form-control" maxlength="3" onkeyup="calculo1()" >
													</div>
												</div>
												<div class="col" >
													<div class="form-group" >
														<label>Total periodo 1<span class="redfont" >*</span></label>
														<input type="text" name="promedio1" id="promedio1" class="form-control" maxlength="3" readonly=""  >
													</div>
												</div>
											</div>
										</fieldset>
										<fieldset>
											<legend><strong> Periodo 2</strong></legend>
											<div class="row" >
												<div class="col-sm-3">
													<div class="form-group" >
														<label>Ejercicios Evaluados <span class="redfont" >*</span></label>
														<input type="text" name="nota1_2" id="nota1_2" class="form-control" maxlength="3" onkeyup="calculo2()" >
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group" >
														<label>Proyecto en Grupo <span class="redfont" >*</span></label>
														<input type="text" name="nota2_2" id="nota2_2" class="form-control" maxlength="3" onkeyup="calculo2()" >
													</div>
												</div>

												<div class="col-sm-3">
													<div class="form-group" >
														<label>Examen<span class="redfont" >*</span></label>
														<input type="text" name="nota3_2" id="nota3_2" class="form-control" maxlength="3" onkeyup="calculo2()" >
													</div>
												</div>
												<div class="col-sm-3" >
													<div class="form-group" >
														<label>Total periodo 2<span class="redfont" >*</span></label>
														<input type="text" name="promedio2" id="promedio2" class="form-control" maxlength="3"  readonly="" >
													</div>
												</div>
											</div>
										</fieldset>
										<fieldset>
											<legend><strong> Periodo 3</strong></legend>
											<div class="row" >
												<div class="col-sm-3">
													<div class="form-group" >
														<label>Ejercicios Evaluados <span class="redfont" >*</span></label>
														<input type="text" name="nota1_3" id="nota1_3" class="form-control" maxlength="3" onkeyup="calculo3()"  >
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group" >
														<label>Proyecto Grupal <span class="redfont" >*</span></label>
														<input type="text" name="nota2_3" id="nota2_3" class="form-control" maxlength="3" onkeyup="calculo3()" >
													</div>
												</div>

												<div class="col-sm-3">
													<div class="form-group" >
														<label>Examen<span class="redfont" >*</span></label>
														<input type="text" name="nota3_3" id="nota3_3" class="form-control" maxlength="3" onkeyup="calculo3()" >
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group" >
														<label>Total periodo 3<span class="redfont" >*</span></label>
														<input type="text" name="promedio3" id="promedio3" class="form-control" maxlength="3"  readonly="" >
													</div>
												</div>
											</div>
										</fieldset>
										<fieldset>
											<legend><strong> Periodo 4</strong></legend>
											<div class="row" >
												<div class="col-sm-3">
													<div class="form-group" >
														<label>Actividad Final<span class="redfont" >*</span></label>
														<input type="text" name="nota1_4" id="nota1_4" class="form-control" maxlength="3" onkeyup="calculo4()" >
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group" >
														<label>Cuaderno<span class="redfont" >*</span></label>
														<input type="text" name="nota2_4" id="nota2_4" class="form-control" maxlength="3" onkeyup="calculo4()" >
													</div>
												</div>

												<div class="col-sm-3">
													<div class="form-group" >
														<label>Examen<span class="redfont" >*</span></label>
														<input type="text" name="nota3_4" id="nota3_4" class="form-control" maxlength="3" onkeyup="calculo4()" >
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group" >
														<label>Total periodo 4<span class="redfont" >*</span></label>
														<input type="text" name="promedio4" id="promedio4" class="form-control" maxlength="3" readonly=""  >
													</div>
												</div>
											</div>
										</fieldset>
										<fieldset>
											<legend><strong>Promedio Final</strong></legend>
											<div class="row" >
												<div class="col-sm-4">
													<div class="form-group" >
														<label>Promedio Final<span class="redfont" >*</span></label>
														<input type="text" name="promedioFi" id="promedioFi" class="form-control" maxlength="3" readonly="" >
													</div>
												</div>
											</div>
											<div>
												<input type="button" name="botoneta" id="botoneta" class="btn btn-success btn-lg" value="Calcular" onclick="calcular()">
											</div>
										</fieldset>

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal" >Cancelar</button>
										<button type="submit" class="btn btn-primary" id="button" >Guardar</button>
									</div>
								</div>
							</div>
						</div>

					</form>
					<!-- ==================== aqui termina elcodigo prrrrrrros========================================== -->
					<!-- ==================== aqui termina elcodigo prrrrrrros========================================== -->
				</div>
			</div>   
					<script type="text/javascript" >
						var url = '<?php echo base_url(); ?>';
					</script>
					<script src="<?php echo base_url(); ?>resources/jquery.js" ></script>
					<script src="<?php echo base_url(); ?>resources/bootstrap/js/bootstrap.js" ></script>
					<script src="<?php echo base_url(); ?>resources/bootstrap/js/bootstrap.bundle.js" ></script>
					<script src="<?php echo base_url(); ?>resources/datatables/jquery.dataTables.js" ></script>
			        <script src="<?php echo base_url(); ?>resources/datatables/dataTables.bootstrap4.js" ></script>
			        <script src="<?php echo base_url(); ?>resources/scripts/nota.js"></script>
	            </div>
	        </div>
			<?=$footer?>
	    </div>
	</body>	    
</html>
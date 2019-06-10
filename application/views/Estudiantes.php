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
					<div class="row justify-content-center" >
						<div class="col-lg-11" >
							<div class="shadow p-3 mb-5 bg-white rounded" >
								<div class="card" >
									<div class="card-body" >
										<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#form" onclick="New()" >Nuevo registro</button>
										<button type="button" id="edit" disabled class="btn btn-primary btn-sm" data-toggle="modal" data-target="#form" onclick="Get()" >Editar</button>
										<button type="button" id="delete" disabled class="btn btn-primary btn-sm" data-toggle="modal" data-target="#confirmation1" onclick="Delete()" >Eliminar</button>
										<br><br>
										<table id="table" class="table table-responsive table-hover" >
									        <thead>
									            <tr>
									            	<th></th>
									            	<th>#</th>
									            	<th>Nombre completo</th>
									            	<th>Fecha de nacimiento</th>
									            	<th>Departamento</th>
									            	<th>Municipio</th>
									            	<th>Dirección</th>
									            	<th>Tel. fijo</th>
									            	<th>Tel. móvil</th>
									            	<th>E-mail</th>
									            	<th>Sexo</th>
									            </tr>
									        </thead>
									        <tbody>
									        	<?php $n=1; foreach ($estudiantes as $estudiante) { ?>
									        		<tr>
									        			<td><input type="radio" name="radio" class="form-control" onclick="notDisabled()" value="<?=$estudiante->id_persona;?>" ></td>
									        			<td><?=$n++;?></td>
									        			<td><?=$estudiante->nombre;?> <?=$estudiante->apellido;?></td>
									        			<td><?=$estudiante->f_nacimiento;?></td>
									        			<td><?=$estudiante->departamento;?></td>
									        			<td><?=$estudiante->municipio;?></td>
									        			<td><?=$estudiante->direccion;?></td>
									        			<td><?=$estudiante->tel_fijo;?></td>
									        			<td><?=$estudiante->tel_movil;?></td>
									        			<td><?=$estudiante->email;?></td>
									        			<td><?=$estudiante->sexo;?></td>
									        		</tr>
									        	<?php } ?>
									        </tbody>
									    </table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal fade blackfont" id="form" tabindex="-1" role="dialog" >
					  	<div class="modal-dialog modal-dialog-centered" role="document">
						    <div class="modal-content">
						      	<div class="modal-header">
							        <h5 class="modal-title" id="modaltitle" ></h5>
							        <button type="button" class="close" data-dismiss="modal" data-toggle="tooltip" data-placement="bottom" title="Cerrar" tabindex="-1" ><span aria-hidden="true">&times;</span></button>
						      	</div>
						      	<div class="modal-body">
						        	<form id="formulario" >
						        		<fieldset>
						        			<legend><strong>Información personal</strong></legend>
						        			<div class="row" >
							        			<div class="col">
							        				<div class="form-group" >
									        			<label>Nombre(s) <span class="redfont" >*</span></label>
									        			<input type="text" name="nombre" id="fname" class="form-control" maxlength="50"  >
									        		</div>
							        			</div>
							        			<div class="col" >
							        				<div class="form-group" >
									        			<label>Apellido(s) <span class="redfont" >*</span></label>
									        			<input type="text" name="apellido" id="lname" class="form-control" maxlength="50" >
									        		</div>
							        			</div>
							        		</div>
							        		<div class="row" >
							        			<div class="col">
							        				<div class="form-group" >
									        			<label>Fecha de nacimiento <span class="redfont" >*</span></label>
									        			<input type="date" name="fecha" id="date" class="form-control" >
									        		</div>
							        			</div>
							        			<div class="col" >
							        				<div class="form-group" >
									        			<label>Sexo <span class="redfont" >*</span></label><br>
									        			<input type="radio" name="sexo" id="sexo1" value="Masculino" > Masculino
									        			<input type="radio" name="sexo" id="sexo2" value="Femenino" > Femenino
									        		</div>
							        			</div>
							        		</div>
							        		<div class="form-group" >
							        			<label>Correo eléctrónico <span class="redfont" >*</span></label>
							        			<input type="email" name="email" id="email" class="form-control" maxlength="100" >
							        		</div>
							        		<div class="row" >
							        			<div class="col">
							        				<div class="form-group" >
									        			<label>Teléfono fijo</label>
									        			<input type="text" name="tel_fijo" id="tel_fijo" maxlength="10" class="form-control" >
									        		</div>
							        			</div>
							        			<div class="col" >
							        				<div class="form-group" >
									        			<label>Teléfono móvil</label>
									        			<input type="text" name="tel_movil" id="tel_movil" maxlength="10" class="form-control" >
									        		</div>
							        			</div>
							        		</div>
						        		</fieldset>
						        		<fieldset>
						        			<legend><strong>Domicilio</strong></legend>
						        			<div class="row" >
							        			<div class="col">
							        				<div class="form-group" >
									        			<label>Departamento <span class="redfont" >*</span></label>
									        			<input type="text" name="depto" id="dpto" class="form-control" maxlength="30" >
									        		</div>
							        			</div>
							        			<div class="col" >
							        				<div class="form-group" >
									        			<label>Municipio <span class="redfont" >*</span></label>
									        			<input type="text" name="municipio" id="municipio" class="form-control" maxlength="30" >
									        		</div>
							        			</div>
							        		</div>
							        		<div class="form-group" >
							        			<label>Dirección de residencia <span class="redfont" >*</span></label>
							        			<textarea class="form-control" name="direccion" id="dir" maxlength="100" ></textarea>
							        		</div>
						        		</fieldset>
						        		<fieldset>
						        			<legend><strong>Grado que cursa</strong></legend>
						        			<select class="form-control" name="gs" id="gs" >
					        						<option value="" >Seleccionar en otro momento</option>
						        				<?php foreach ($gs as $gs): ?>
					        						<option value="<?=$gs->id_gs?>" ><?=$gs->grado;?> - <?=$gs->seccion;?></option>
						        				<?php endforeach ?>
						        			</select>
						        		</fieldset><br>
						        	</form>
						      	</div>
						      	<div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cancelar</button>
							        <button type="button" class="btn btn-primary" id="button" >Guardar</button>
						      	</div>
						    </div>
					  	</div>
					</div>
					<div class="modal fade blackfont" id="confirmation1" tabindex="-1" role="dialog" >
					  	<div class="modal-dialog modal-dialog-centered" role="document">
						    <div class="modal-content">
						      	<div class="modal-header">
							        <h5 class="modal-title" id="modaltitle" >Confirmar acción</h5>
							        <button type="button" class="close" data-dismiss="modal" data-toggle="tooltip" data-placement="bottom" title="Cerrar" ><span aria-hidden="true">&times;</span></button>
						      	</div>
						      	<div class="modal-body">
						      		<center id="text" ></center>
						      	</div>
						      	<div class="modal-footer">
							        <button type="button" class="btn btn-success" data-dismiss="modal" >No</button>
							        <button type="button" class="btn btn-danger" onclick="Confirmacion()" >Sí</button>
						      	</div>
						    </div>
					  	</div>
					</div>
	            </div>
	        </div>
			<?=$footer?>
	    </div>
	    <script type="text/javascript" > var url = '<?php echo base_url(); ?>'; </script>
        <script src="<?php echo base_url('resources/scripts/estudiante.js'); ?>" ></script>
	</body>	    
</html>
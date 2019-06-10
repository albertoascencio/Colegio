<html>
    <head>
    	<meta charset="utf-8" >
    	<title>Notas</title>
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/bootstrap/css/bootstrap.css'); ?>" >
    </head>
    <body <?php if ($this->session->userdata('rol') == 3): ?>
    	onload="getHorarioIndividual(<?php echo $this->session->userdata('gs_id'); ?>)"
    <?php endif ?> >
	    <div class="preloader">
	        <div class="loader">
	            <div class="loader__figure"></div>
	            <p class="loader__label">Cargando</p>
	        </div>
	    </div>
	    <div id="main-wrapper">
	        <?=$navbar;?>
	        <div class="page-wrapper">
	            <div class="container-fluid"><br>
	            	<div class="shadow p-3 mb-5 bg-white rounded">
	            		<div class="card" >
		            		<div class="card-body" >
		            			<?php if ($this->session->userdata('rol') == 1 || $this->session->userdata('rol') == 2) { ?>
		            				<!--Botoncitos-->
			            			<select name="gs" id="gs" class="btn btn-success" >
			            				<option value="" selected >Seleccione</option>
			            				<?php foreach ($gs as $gs): ?>
			            					<option value="<?=$gs->id_gs;?>" ><?=$gs->grado;?> - <?=$gs->seccion;?></option>
			            				<?php endforeach ?>
			            			</select>
		            			<?php } ?>
		            			<?php if ($this->session->userdata('rol') == 1) { ?>
			            			<button type="button" style="display: none;" name="action1" id="" class="btn btn-primary" data-toggle="modal" data-target="#horario1" >Agregar</button>
			            			<button type="button" style="display: none;" name="eliminar" class="btn btn-primary" data-toggle="modal" data-target="#confirmacion" >Eliminar</button>
			            			<!--Botoncitos-->
		            			<?php } ?><br><br>
		            			<table class="table table-bordered" id="table1" >
		            				<?php if ($this->session->userdata('rol') == 1) { ?>
		            					<tr><td style="text-align: center;" >Selecione una sección</td></tr>
		            				<?php } else { ?>
		            					<tr>
		            						<td>
		            							<div class="text-center">
												  	<div class="spinner-border" role="status">
												    	<span class="sr-only">Loading...</span>
												  	</div><br>
												  	<p>Cargando</p>
												</div>
		            						</td>
		            					</tr>
	            					<?php } ?>
	            				</table>
		            		</div>
		            	</div>
	            	</div>
	            	<?php if ($this->session->userdata('rol') == 1): ?>
					  	<div class="modal fade blackfont" id="horario1" >
						    <div class="modal-dialog modal-dialog-centered modal-xl" >
						      	<div class="modal-content" >
							        <div class="modal-body">
							        	<div class="row" >
							        		<div class="col-md-1" >
							        			<button type="button" class="btn btn-danger btn-sm" style="border-radius: 40px;" id="deleteall" >Eliminar todo</button>
							        		</div>
							        		<div class="col-md-1" >
											  	<button type="button" class="btn btn-success btn-sm" style="border-radius: 40px;" id="col" >Agregar columna</button>
							        		</div>
							        		<div class="col align-self-end">
							        			<button type="button" class="close" data-dismiss="modal" >&times;</button>
							        		</div>
							        	</div><br>
				            			<form id="formulario" >
				            				<table class="table table-bordered table-responsive" id="table2" ></table>
				            			</form>
							        </div>
							        <div class="modal-footer">
							          	<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
							          	<button type="button" name="action2" class="btn btn-sm btn-primary" ></button>
							        </div>
						      	</div>
					    	</div>
					  	</div>
					  	<div class="modal fade blackfont" id="confirmacion" >
						    <div class="modal-dialog modal-dialog-centered modal-sm" >
						      	<div class="modal-content" >
							        <div class="modal-header" >
							          <h4 class="modal-title" >Confirmar acción</h4>
							          <button type="button" class="close" data-dismiss="modal" >&times;</button>
							        </div>						        
							        <div class="modal-body">
							        	<center>¿Deseas eliminar el calendario registrado de esta sección?</center>
						        	</div>
							        <div class="modal-footer">
							          	<button type="button" class="btn btn-sm btn-warning" data-dismiss="modal" >No</button>
							          	<button type="button" class="btn btn-sm btn-danger" id="eliminar" >Sí</button>
							        </div>
						      	</div>
					    	</div>
					  	</div>
				  	<?php endif; ?>
	            </div>
	        </div>
	        <?=$footer;?>
	    </div>
	    <script type="text/javascript" > var url = '<?php echo base_url(); ?>'; </script>
        <script src="<?php echo base_url('resources/scripts/horarios.js'); ?>" ></script>
    </body>
</html>
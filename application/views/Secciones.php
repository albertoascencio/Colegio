<html>
    <head>
        <meta charset="utf-8" >
        <title>Secciones</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/bootstrap/css/bootstrap.css'); ?>" >
        <style type="text/css" >
            .vertical-menu {
              width: 225px;
              height: 300px;
              overflow-y: auto;
            }
        </style>
    </head>
    <body>
	    <div class="preloader">
	        <div class="loader">
	            <div class="loader__figure"></div>
	            <p class="loader__label">Cargando</p>
	        </div>
	    </div>
        <div id="main-wrapper">
            <?=$navbar;?>
            <div class="page-wrapper">
                <div class="container-fluid blackfont"><br><br>
                	<div class="row justify-content-center" >
                        <div class="col-10" >
                            <div class="shadow p-3 mb-5 bg-white rounded" >
                                <div class="card" >
                                    <div class="card-header" >
                                        <div class="card-title" >
                                            Mostrar las secciones registradas del año <select name="anio" id="anio" class="btn-secondary" >
                                                <option value="<?php echo Date('Y'); ?>" ><?php echo Date('Y'); ?></option>
                                            <?php foreach ($anios as $year): ?>
                                                <option value="<?=$year->anio;?>" ><?=$year->anio;?></option>
                                            <?php endforeach; ?>
                                        </select></div>
                                    </div>
                                    <div class="card-body" >
                                        <div class="row" >
                                            <div class="col-3" >
                                                <button type="button" class="btn btn-danger btn-sm" id="eliminargs" >Eliminar</button>
                                                <button type="button" class="btn btn-success btn-sm" id="agregargs" >Agregar</button>
                                                <br><br>
                                                <select style="width: 250px; height: 250px;" name="select" id="select" multiple="" >
                                                    <option disabled="" class="list-group-item list-group-item-action" >Selecione</option>
                                                </select>
                                            </div>
                                            <div class="col-9" >
                                                <button type="button" class="btn btn-primary btn-sm" id="agregarest" >Agregar</button>
                                                <button type="button" class="btn btn-success btn-sm" id="moverest" >Mover</button>
                                                <br><br>
                                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                                    <table class="table table-bordered" id="table" style="text-align: center;" >
                                                        <tr><td>Seleccione una sección</td></tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
            <div class="modal fade blackfont" id="confirmacion1" tabindex="-1" role="dialog" >
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
                            <button type="button" class="btn btn-danger" id="trueaction1" >Sí</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade blackfont" id="newgs" tabindex="-1" role="dialog" >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modaltitle" >Nueva sección</h5>
                            <button type="button" class="close" data-dismiss="modal" data-toggle="tooltip" data-placement="bottom" title="Cerrar" ><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form id="form" >
                                <div class="row justify-content-center" >
                                    <div class="col-5" >
                                        <select name="grado" class="form-control" >
                                            <option value="1" >Primer grado</option>
                                            <option value="2" >Segundo grado</option>
                                            <option value="3" >Tercer grado</option>
                                            <option value="4" >Cuarto grado</option>
                                            <option value="5" >Quinto grado</option>
                                            <option value="6" >Sexto grado</option>
                                            <option value="7" >Séptimo grado</option>
                                            <option value="8" >Octavo grado</option>
                                            <option value="9" >Noveno grado</option>
                                        </select>
                                    </div>
                                    <div class="col-5" >
                                        <select name="seccion" class="form-control" >
                                            <option value="1" >Sección A</option>
                                            <option value="2" >Sección B</option>
                                            <option value="3" >Sección C</option>
                                            <option value="4" >Sección D</option>
                                            <option value="5" >Sección E</option>
                                            <option value="6" >Sección F</option>
                                            <option value="7" >Sección G</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal" >No</button>
                            <button type="button" class="btn btn-danger" id="trueaction2" >Sí</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade blackfont" id="moverestudiante" tabindex="-1" role="dialog" >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modaltitle" >Selecciona la nueva sección</h5>
                            <button type="button" class="close" data-dismiss="modal" data-toggle="tooltip" data-placement="bottom" title="Cerrar" ><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div id="action" >
                                <select name="secionesdisponibles" id="seccionesdisponibles" class="form-control" ></select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal" >Cancelar</button>
                            <button type="button" class="btn btn-danger" id="trueaction3" >Mover</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade blackfont" id="agregarestudiante" tabindex="-1" role="dialog" >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modaltitle" >Selecciona la estudiante</h5>
                            <button type="button" class="close" data-dismiss="modal" data-toggle="tooltip" data-placement="bottom" title="Cerrar" ><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div id="action" >
                                <select name="estudiantes" id="estudiantes" class="form-control" ></select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal" >Cancelar</button>
                            <button type="button" class="btn btn-danger" id="trueaction4" >Agregar</button>
                        </div>
                    </div>
                </div>
            </div>
            <?=$footer;?>
        </div>
        <script type="text/javascript" > var url = '<?php echo base_url(); ?>'; </script>
        <script src="<?php echo base_url('resources/scripts/seccion.js'); ?>" ></script>
    </body>
</html>
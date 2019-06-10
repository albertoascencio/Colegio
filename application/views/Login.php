<html>
	<head>
		<title>Estudiantes</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/bootstrap/css/bootstrap.css'); ?>" >
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/login-styles.css'); ?>" >
		<style type="text/css" >
			.forgot{
				text-align: center;
				font-size: 12px;
				color: red;
			}
		</style>
	</head>
    <body class="align" >
	  	<div class="grid">
	  		<div class="row justify-content-center" >
	    		<div class="col-11" >
	    			<div class="card-alert" id="cardalert" >
	    				<div class="card-body" id="cardmessage" >Inicia sesión para acceder a este sitio</div>
	    			</div>
	    		</div>
	    	</div><br>
	  		<header class="login-header">
	            <h1 class="login-title" ><strong>Iniciar sesión</strong></h1>
	        </header>
        	<form id="loginform" >
	            <div class="login-body">
	              	<div class="form-group" >
	                	<label for="username" >Nombre de usuario</label>
	                	<input type="text" name="username" id="username" class="form-control" >
	                	<div class="errormessage" id="usermessage" ></div>
	              	</div>
	              	<div class="form-group" >
	                	<label for="password" >Contraseña</label>
	                	<input type="password" name="password" id="password" class="form-control" >
	                	<div class="errormessage" id="passmessage" ></div>
	              	</div><br>
	              	<div class="form-group" align="center" >
	              		<button type="button" id="submit" style="border-radius: 50px;" class="btn btn-outline-success" >Ingresar</button>
	              	</div>
	            </div>
        	</form>
	  	</div>
	  	<script type="text/javascript" > var url = '<?php echo base_url(); ?>'; </script>
    	<script src="<?php echo base_url('resources/js/jquery.js'); ?>" ></script>
		<script src="<?php echo base_url('resources/bootstrap/js/bootstrap.js'); ?>" ></script>
		<script src="<?php echo base_url('resources/bootstrap/js/bootstrap.bundle.js'); ?>" ></script>
		<script src="<?php echo base_url('resources/scripts/login.js'); ?>" ></script>
    </body>
</html>
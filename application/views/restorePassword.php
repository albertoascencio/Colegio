<html>
	<head>
		<title>Estudiantes</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/bootstrap/css/bootstrap.css" >
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/bootstrap/css/modalito.css" >
		<style type="text/css" >
			.card-warning {
			  text-align: center;
			  position: relative;
			  display: -ms-flexbox;
			  display: flex;
			  -ms-flex-direction: column;
			  flex-direction: column;
			  min-width: 0;
			  word-wrap: break-word;
			  background-color: #B8FFB9;
			  background-clip: border-box;
			  border: 1px solid rgba(0, 0, 0, 0.125);
			  border-radius: 0.25rem;
			}
			.hidden {
				display: none;
			}
			.visible {
				display: visible;
			}
		</style>
	</head>
    <body class="align" >
	  	<div class="grid">
	  		<div class="row justify-content-center" >
	    		<div class="col-11" >
	    			<div class="card-warning" id="cardalert" >
	    				<div class="card-body" id="cardmessage" >Ingresa tu correo electrónico</div>
	    			</div>
	    		</div>
	    	</div><br>
	    	<div class="text-center" id="url" ></div><br>
	  		<div id="form-space" class="visible" >
	  			<header class="login__header">
		        	<h3 class="login__title">Reestablecer contraseña</h3>
		      	</header>
	  			<form id="form" >
		      		<div class="login__body">
		      			<div class="form-group" >
		      				<label>Correo electrónico</label>
		      				<input type="mail" name="mail" id="mail" class="form-control" >
		      				<div id="mailmessage" class="errormessage" style="visibility: hidden;" ></div>
		      			</div>
		      			<div class="form-group" >
		      				<center>
		      					<button type="button" id="send" style="border-radius: 50px;" class="btn btn-outline-primary" >Enviar</button>
		      				</center>
		      			</div>
		      		</div>
		    	</form>
	  		</div>
	  	</div>
	  	<header>
  		<script type="text/javascript" >
  			var url = '<?php echo base_url(); ?>';
  		</script>
    	<script src="<?php echo base_url(); ?>resources/jquery.js" ></script>
    	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
		<script src="<?php echo base_url(); ?>resources/bootstrap/js/bootstrap.js" ></script>
		<script src="<?php echo base_url(); ?>resources/bootstrap/js/bootstrap.bundle.js" ></script>
		<script src="<?php echo base_url(); ?>resources/scripts/login.js" ></script>
    </body>
</html>
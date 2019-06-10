<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" >
		<title>Inicio</title>
		<link rel="icon" href="<?php echo base_url('resources/img/icons/home.ico'); ?>" >
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/bootstrap/css/bootstrap.css'); ?>" >
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/login-styles.css'); ?>" >
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" >
	    	<div class="container">
	      		<a class="navbar-brand js-scroll-trigger" href="#page-top" >Inicio</a>
	      		<div class="collapse navbar-collapse" id="navbarResponsive">
			        <ul class="navbar-nav text-uppercase ml-auto">
			          	<li class="nav-item">
			            	<a class="nav-link js-scroll-trigger" href="#section1" >Contáctanos</a>
			          	</li>
			          	<li  class="nav-item">
			          	  	<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#loginmodal" >Iniciar sesión</button>
			          	</li>
			        </ul>
	      		</div>
	    	</div>
	  	</nav>
	  	<div class="container-fluid" >
			<canvas id="canvas-image-blending" ></canvas>
		</div>
	  	<div class="modal fade" id="loginmodal" >
		    <div class="modal-dialog modal-sm" >
		      	<div class="modal-content md_cont" >
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
		    </div>
	  	</div>
        <script type="text/javascript" > var url = '<?php echo base_url(); ?>'; </script>
		<script src="<?php echo base_url('resources/js/jquery.js'); ?>" ></script>
		<script src="<?php echo base_url('resources/bootstrap/js/bootstrap.js'); ?>" ></script>
		<script src="<?php echo base_url('resources/bootstrap/js/bootstrap.bundle.js'); ?>" ></script>
		<script src="<?php echo base_url('resources/js/granim.js'); ?>" ></script>
		<script src="<?php echo base_url('resources/scripts/login.js'); ?>" ></script>
		<script type="text/javascript" >

			var granimInstance = new Granim({
			    element: '#canvas-image-blending',
			    direction: 'top-bottom',
			    isPausedWhenNotInView: true,
			    image : {
			        source: 'http://localhost/lorem_ipsum/resources/img/background.jpg',
			        blendingMode: 'overlay'
			    },
			    states : {
			        "default-state": {
			            gradients: [
			                ['#29323c', '#485563'],
			                ['#FF6B6B', '#556270'],
			                ['#80d3fe', '#7ea0c4'],
			                ['#f0ab51', '#eceba3']
			            ],
			            transitionSpeed: 4000
			        }
			    }
			});
		</script>
	</body>
</html>
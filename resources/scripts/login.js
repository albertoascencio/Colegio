$(document).ready(function() {

	$('#submit').click(function(){
		Login();
    });
    $('#loginmodal').on('show.bs.modal', function () {
	  	$(document).keypress(function(e) {
	       if(e.which == 13) {
	          Login();
	       }
	    });
	})
});

function Login () {

	if ($('#username').val() < 1 && $('#password').val() < 1) {

 		$('#usermessage').html('Ingresa tu nombre de usuario');
		$('#username').addClass('bad');
		$('#passmessage').html('Ingresa la contraseña');
		$('#password').addClass('bad');
		$('#cardmessage').html('Ingresa los datos del formulario');

 	} else if ($('#username').val() < 1) {

 		$('#usermessage').html('Ingresa tu nombre de usuario');
		$('#username').addClass('bad');
		$('#passmessage').html('');
		$('#password').removeClass('bad');
		$('#cardmessage').html('Ingresa todos los datos');

 	} else if ($('#password').val() < 1) {
 		
 		$('#usermessage').html('');
		$('#username').removeClass('bad');
		$('#passmessage').html('Ingresa tu contraseña');
		$('#password').addClass('bad');
		$('#cardmessage').html('Ingresa todos los datos');

 	} else {
 		
 		$.ajax({
	 		url: url+'Login/validateData',
	 		data: $('#loginform').serialize(),
	 		type: 'post',
	 		success: (function(response){
	 			if (response == 0) {

	 				$('#cardmessage').html('Inténtalo de nuevo');
	 				$('#usermessage').html('Verifica tu usuario');
					$('#username').addClass('bad');
					$('#passmessage').html('Verifica tu contraseña');
					$('#password').addClass('bad');

	 			} else if (response == 1) {
	 				location.reload();
	 			} else {
	 				$('#cardmessage').html('Ocurrió un error al iniciar sesión');
	 			}
	 		})
	 	});
 	}
}
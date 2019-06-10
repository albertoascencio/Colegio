$(document).ready(function() {
	
	var year = $('#anio').val();
	$.ajax({
		url: url+'Seccion/getSeccionesbyYear',
		data: 'year='+year,
		type: 'post',
		success: (function(response){
			if (response == 1) {
				$('#select').html('<option disabed >No hay secciones en este año</option>');
			} else {
				$('#select').html(response);
			}
		})
	});

	$('#anio').change(function(){
		var year = $('#anio').val();
		$.ajax({
			url: url+'Seccion/getSeccionesbyYear',
			data: 'year='+year,
			type: 'post',
			success: (function(response){
				if (response == 1) {
					$('#select').html('<option disabed >No hay secciones en este año</option>');
					$('#table').html('<tr><td>Seleccione otra sección</td></tr>');
				} else {
					$('#select').html(response);
					$('#table').html('<tr><td>Seleccione una sección</td></tr>');
				}
			})
		});
	});
	$('#select').click(function(){
		if ($(this).val().length > 1) {
			alert("Solo puede seleccionar 1 sección a la vez");
			$('#table').html('<tr><td>Selecciona solamente una sección</td></tr>');
		}else{
			var gs = $(this).val();
			$.ajax({
				url: url+'Seccion/getEstudiantesbySeccion',
				data: 'gs='+gs,
				type: 'post',
				success: (function(response){
					if (response == 0) {
						$('#table').html('<tr><td>No hay estudiantes en esta sección</td></tr>');
					} else {
						$('#table').html(response);
					}
				})
			});
		}
	});
	$('#eliminargs').click(function(){
		var year = $('#anio').val(),
			currentYear = new Date().getFullYear();
			var gs = $('#select').val();
		if (gs.length >= 2) {
			alert('Sólo puedes seleecionar una sección a la vez');
		} else if (year != currentYear) {
			alert('No puedes eliminar una sección de años anteriores al actual');
		} else {
			var text = $('#select option:selected').text(),
			seccion = text.split('-'),
			anio = $('#anio').val();
			$('#text').html('¿Deseas eliminar la <strong>'+seccion[1]+'</strong> de <strong>'+seccion[0]+'</strong> del año <strong>'+anio+'</strong>?');
			$('#confirmacion1').modal('show');
		}
	});
	$('#trueaction1').click(function(){
		var gs = $('#select').val();
		$.ajax({
			url: url+'Seccion/deleteSeccion',
			data: 'gs='+gs,
			type: 'post'
		}).then(function(){
			alert('Sección eliminada');
			location.reload();
		})
	});
	$('#agregargs').click(function(){
		var year = $('#anio').val(),
			currentYear = new Date().getFullYear();
		if (year != currentYear) {
			alert('No puedes agregar una sección de años anteriores al actual');
		} else {
			$('#newgs').modal('show');
		}
	});
	$('#trueaction2').click(function(){
		$.ajax({
			url: url+'Seccion/saveSeccion',
			data: $('#form').serialize(),
			type: 'post',
			success: (function(response){
				if (response == 0) {
					alert('Sección añadida');
					location.reload();
				} else {
					alert('Esta sección ya está registrada');
				}
			})
		});
	});
	$('#moverest').click(function(){

		var year = $('#anio').val(), currentYear = new Date().getFullYear();
		if (year != currentYear) {
			alert('No puedes realizar esta acción en años anteriores al actual');
		} else if ($("input:radio[name=radio]:checked").val() == undefined) {
			alert('Seleciona el estudiante');
		} else {
			var year = $('#anio').val();
			$.ajax({
				url: url+'Seccion/getSeccionesbyYear',
				data: 'year='+year,
				type: 'post',
				success: (function(response){
					if (response == 1) {
						$('#action').html('Ocurrió un error desconocido');
					} else {
						$('#seccionesdisponibles').html(response);
					}
				})
			});
			$('#moverestudiante').modal('show');
		}
	});
	$('#trueaction3').click(function(){

		var gs = $('#seccionesdisponibles').val(),
			est = $('input:radio[name=radio]:checked').val();
		$.ajax({
			url: url+'Seccion/editEstudiante',
			data: 'gs='+gs+'&est='+est,
			type: 'post'
		}).then(function(){
			alert('Movimiento realizado');
			location.reload();
		});
	});
	$('#agregarest').click(function(){
		var year = $('#anio').val(),
			currentYear = new Date().getFullYear(),
			seccion = $('#select').val();
		if (year != currentYear) {
			alert('No puedes realizar esta acción en años anteriores al actual');
		} else if (seccion == '') {
			alert('Seleciona la sección para realizar esta acción');
		} else if (seccion.length >= 2) {
			alert('Sólo puedes seleccionar una sección a la vez');
		} else {
			$.ajax({
				url: url+'Seccion/getEstudiantesbySectionsNULL',
				data: 'year='+currentYear,
				type: 'post'
			}).done(function(response) {
				$('#estudiantes').html(response);
			});
			$('#agregarestudiante').modal('show');
		}
	});
	$('#trueaction4').click(function(){

		var gs = $('#select').val(),
			est = $('#estudiantes').val();
		$.ajax({
			url: url+'Seccion/addStudentintoSection',
			data: 'gs='+gs+'&est='+est,
			type: 'post'
		}).then(function(){
			alert('Estudiante añadido');
			location.reload();
		});
	})
});
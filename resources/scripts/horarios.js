$(document).ready(function(){
	$('#col').click(function(){
		$('#throw').append('<th><input type="time" name="hora[]" class="transparent" size="10" ></th>');
		$('#lunes').append('<td><input name="lunes[]" class="transparent" size="10" value="-" ></td>');
		$('#martes').append('<td><input name="martes[]" class="transparent" size="10" value="-" ></td>');
		$('#miercoles').append('<td><input name="miercoles[]" class="transparent" size="10" value="-" ></td>');
		$('#jueves').append('<td><input name="jueves[]" class="transparent" size="10" value="-" ></td>');
		$('#viernes').append('<td><input name="viernes[]" class="transparent" size="10" value="-" ></td>');
		$('#sabado').append('<td><input name="sabado[]" class="transparent" size="10" value="-" ></td>');
		$('#domingo').append('<td><input name="domingo[]" class="transparent" size="10" value="-" ></td>');
	});
	$('#gs').change(function(){
		var id = $('#gs').val();
		if (id == '') {
			$('button[name=action1]').attr('style', 'display: none;').attr('id', '');
			$('button[name=eliminar]').attr('style', 'display: none;');
			$('#table1').html('<tr><td style="text-align: center;" >Seleccione una sección</td></tr>');
		} else {
			$.ajax({
				url: url+'Horario/getHorario',
				data: 'gs='+id,
				type: 'post',
				success: (function(answer){
					if (answer == 1) {
						$('button[name=action1]').removeAttr('style').html('Agregar').attr('onclick', 'addHorario()');
						$('button[name=action2]').removeAttr('style').html('Agregar').attr('onclick', 'add()');
						$('button[name=eliminar]').attr('style', 'display: none;');
						$('#table1').html('<tr><td style="text-align: center;" >No hay horario disponible para esta sección</td></tr>');
					} else {						
						$('button[name=action1]').removeAttr('style').html('Editar').attr('onclick', 'getHorariobyid()');
						$('button[name=action2]').removeAttr('style').html('Editar').attr('onclick', 'edit()');
						$('button[name=eliminar]').removeAttr('style');
						$('#table1').html(answer);
					}
				})
			});
		}
	});
	$('#eliminar').click(function(){
		var id = $('#gs').val().trim();
		$.ajax({
			url: url+'Horario/deleteHorario',
			data: 'id='+id,
			type: 'post'
		}).then(function(){
			alert('Horario eliminado');
			location.reload();
		})
	});
	$('#deleteall').click(function(){
		$('#table2').html(
		'<thead style="text-align: center;" >'+
			'<tr id="throw" >'+
				'<th>Día / hora</th>'+
			'</tr>'+
		'</thead>'+
		'<tbody>'+
			'<tr id="lunes" >'+
				'<td>Lunes</td>'+
			'</tr>'+
			'<tr id="martes" >'+
				'<td>Martes</td>'+
			'</tr>'+
			'<tr id="miercoles" >'+
				'<td>Miércoles</td>'+
			'</tr>'+
			'<tr id="jueves" >'+
				'<td>Jueves</td>'+
			'</tr>'+
			'<tr id="viernes" >'+
				'<td>Viernes</td>'+
			'</tr>'+
			'<tr id="sabado" >'+
				'<td>Sábado</td>'+
			'</tr>'+
			'<tr id="domingo" >'+
				'<td>Domingo</td>'+
			'</tr>'+
		'</tbody>');
	});
});
function addHorario () {
	$('#table2').html(
		'<thead style="text-align: center;" >'+
			'<tr id="throw" >'+
				'<th>Día / hora</th>'+
			'</tr>'+
		'</thead>'+
		'<tbody>'+
			'<tr id="lunes" >'+
				'<td>Lunes</td>'+
			'</tr>'+
			'<tr id="martes" >'+
				'<td>Martes</td>'+
			'</tr>'+
			'<tr id="miercoles" >'+
				'<td>Miércoles</td>'+
			'</tr>'+
			'<tr id="jueves" >'+
				'<td>Jueves</td>'+
			'</tr>'+
			'<tr id="viernes" >'+
				'<td>Viernes</td>'+
			'</tr>'+
			'<tr id="sabado" >'+
				'<td>Sábado</td>'+
			'</tr>'+
			'<tr id="domingo" >'+
				'<td>Domingo</td>'+
			'</tr>'+
		'</tbody>');
}
function getHorariobyid () {
	var id = $('#gs').val();
	$.ajax({
		url: url+'Horario/getHorariobyid',
		data: 'gs='+id,
		type: 'post',
		success: (function(response){
			$('#table2').html(response);
		})
	});
}
function add () {
	var id = $('#gs').val();
	$.ajax({
		url: url+'Horario/saveHorario',
		data: $('#formulario').serialize()+'&gs='+id,
		type: 'post'
	}).then(function(){
		alert('Horario añadido');
		location.reload();
	});
}
function edit () {
	var id = $('#gs').val();
	$.ajax({
		url: url+'Horario/editHorario',
		data: $('#formulario').serialize()+'&gs='+id,
		type: 'post'
	}).then(function(){
		alert('Horario editado');
		location.reload();
	});
}
function getHorarioIndividual (gsid) {
	$.ajax({
		url: url+'Horario/getHorario',
		data: 'gs='+gsid,
		type: 'post',
		success: (function(response) {
			if (response == 1) {
				$('#table1').html('<tr><td style="text-align: center;" >No hay horario disponible para tu sección</td></tr>');
			} else {
				$('#table1').html(response);
			}
		})
	});
}
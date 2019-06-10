$(document).ready(function() {
  	$('#table').DataTable();
  	$('#tel_fijo').mask('0000-0000');
  	$('#tel_movil').mask('0000-0000');
});
$(function () {
  	$('[data-toggle="tooltip"]').tooltip()
})
function notDisabled () {

	$('#edit').removeAttr('disabled');
	$('#delete').removeAttr('disabled');
}
function Delete () {

	var id = $('input:radio[name=radio]:checked').val();
	$.ajax({
		url: url+'Persona/getPersona',
		data: 'id='+id+'&rol=3',
		type: 'post',
		dataType: 'json'
	}).done(function(answer) {

		$('#text').html('¿Deseas eliminar el registro de <strong>'+answer.nombre+' '+answer.apellido+'</strong> permanentemente?')
	});
}
function Confirmacion () {

	var id = $('input:radio[name=radio]:checked').val();
	$.ajax({
		url: url+'Persona/deletePersona',
		data: 'id='+id+'&rol=3',
		type: 'post'
	}).then(function(){
		alert('Registro eliminado')
		location.reload();
	});
}
function New () {

	$('#modaltitle').html('Nuevo registro');
	$('#button').attr('onclick', 'Save()');
	$('#fname').val('');
	$('#lname').val('');
	$('#date').val('');
	$('#dpto').val('');
	$('#municipio').val('');
	$('#dir').val('');
	$('#tel_fijo').val('');
	$('#tel_movil').val('');
	$('#email').val('');
	$('#sexo1').removeAttr('checked');
	$('#sexo2').removeAttr('checked');
	$('#anio').val('');
}
function Save () {

	if($('#fname').val().length < 1) {  
        alert('Ingresa el nombre del estudiante');
    } else if ($("#lname").val().length < 1) {
    	alert('Ingresa el apellido');
    } else if ($("#date").val().length < 1) {
        alert('Ingresa la fecha de nacimiento');
    } else if ($("input:radio[name=sexo]:checked").val() == undefined) {
        alert('Selecciona el sexo');
    } else if ($("tel_fijo").val() > 0 && $("tel_fijo").val() < 8) {
        alert('Ingresa un número de teléfono fijo válido');
    } else if ($("tel_movil").val() > 0 && $("tel_movil").val() < 8) {
        alert('Ingresa un número de teléfono móvil válido');
    } else if ($("#dpto").val().length < 1) {
        alert('Seleccione un departamento');
    } else if ($("#municipio").val().length < 1) {
        alert('Seleccione un municipio');
    } else if ($("#dir").val().length < 1) {
        alert('Ingrese la dirección de domicilio');
    } else {

		var nombres = $('#fname').val().normalize('NFD').replace(/([^n\u0300-\u036f]|n(?!\u0303(?![\u0300-\u036f])))[\u0300-\u036f]+/gi,"$1")
						.normalize()
						.toLowerCase()
						.split(' '),
			apellidos = $('#lname').val().normalize('NFD').replace(/([^n\u0300-\u036f]|n(?!\u0303(?![\u0300-\u036f])))[\u0300-\u036f]+/gi,"$1")
						.normalize()
						.toLowerCase()
						.split(' '),
			username = nombres[0]+'.'+apellidos[0]+'LI';

		$.ajax({
			url: url+'Persona/savePersona',
			type: 'post',
			data: $('#formulario').serialize()+'&username='+username+'&rol=3',
			beforeSend: (function(){
				$('#button').html(
					'<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
					'<span class="sr-only">Procesando...</span>'
					);
			})
		}).then(function() {
			alert('Datos registrados');
			location.reload();
		});
	}
}
function Get () {

	$('#modaltitle').html('Editar datos');
	var id = $('input:radio[name=radio]:checked').val();
	$.ajax({
		url: url+'Persona/getPersona',
		data: 'id='+id+'&rol=3',
		type: 'post',
		dataType: 'json'
	}).done(function(answer) {

		$('#button').attr('onclick', 'Edit('+ answer.id_persona+ ')');
		$('#fname').val(answer.nombre);
		$('#lname').val(answer.apellido);
		$('#date').val(answer.f_nacimiento);
		$('#dpto').val(answer.departamento);
		$('#municipio').val(answer.municipio);
		$('#dir').val(answer.direccion);
		$('#tel_fijo').val(answer.tel_fijo);
		$('#tel_movil').val(answer.tel_movil);
		$('#email').val(answer.email);
		if (answer.sexo = 'Masculino') {
			$('#sexo1').attr('checked');
		} else {
			$('#sexo2').attr('checked');
		}
		$('#anio').val(answer.anio);
	});
}
function Edit (id) {

	if($('#fname').val().length < 1) {  
        alert('Ingresa el nombre del estudiante');
    } else if ($("#lname").val().length < 1) {
    	alert('Ingresa el apellido');
    } else if ($("#date").val().length < 1) {
        alert('Ingresa la fecha de nacimiento');
    } else if ($("input:radio[name=sexo]:checked").val() == undefined) {
        alert('Selecciona el sexo');
    } else if ($("#dpto").val().length < 1) {
        alert('Seleccione un departamento');
    } else if ($("#municipio").val().length < 1) {
        alert('Seleccione un municipio');
    } else if ($("#dir").val().length < 1) {
        alert('Ingrese la dirección de domicilio');
    } else {

		$.ajax({
			url: url+'Persona/editPersona',
			type: 'post',
			data: $('#formulario').serialize()+'&id='+id+'&rol=3',

		}).then(function() {
			alert('Datos editados');
			location.reload();
		});
	}
}
$(document).ready(function(){
	console.log('jquery its working');
	
	calculo1();
	calculo2();
	calculo3();
	calculo4();
	calcular();
	$('#edit').click(function(){
		var id = $('input:radio[name=radio]:checked').val();
		$('#modalon').html('Editar');
		$.ajax({
			url: url+'Notas/getData',
			data: 'id='+id,
			type: 'post',
			dataType: 'json'
		}).done(function(answer){
			$('#ide').val(answer.id_notas);
			$('#nota1').val(answer.libro_1);
			$('#nota2').val(answer.ejercicio_1);
			$('#nota3').val(answer.examen_1);
			$('#promedio1').val(answer.total_1);
			$('#nota1_2').val(answer.ejercicios_2);
			$('#nota2_2').val(answer.proyecto_2);
			$('#nota3_2').val(answer.examen_2);
			$('#promedio2').val(answer.total_2);
			$('#nota1_3').val(answer.ejercicios_3);
			$('#nota2_3').val(answer.proyecto_grupal_3);
			$('#nota3_3').val(answer.examen_3);
			$('#promedio3').val(answer.total_3);
			$('#nota1_4').val(answer.actividad_final4);
			$('#nota2_4').val(answer.cuaderno_tarea_4);
			$('#nota3_4').val(answer.examen_4);
			$('#promedio4').val(answer.total_4);
			$('#promedioFi').val(answer.puntaje);
		});
	});

});

function calculo1(){
	var nota1 = $('#nota1').val();
	var nota2 = $('#nota2').val();
	var nota3 = $('#nota3').val();
	

	var promedio1 = parseFloat(nota1)+parseFloat(nota2)+parseFloat(nota3);
	var promedio1 = (parseFloat(promedio1)/3).toFixed(2)
	$('#promedio1').val(promedio1);

}
function calculo2(){
	var nota1_2 = $('#nota1_2').val();
	var nota2_2 = $('#nota2_2').val();
	var nota3_2 = $('#nota3_2').val();

	var promedio2 = parseFloat(nota1_2)+parseFloat(nota2_2)+parseFloat(nota3_2);
	var promedio2 = (parseFloat(promedio2)/3).toFixed(2)
	$('#promedio2').val(promedio2);
}
function calculo3(){
	var nota1_3 = $('#nota1_3').val();
	var nota2_3 = $('#nota2_3').val();
	var nota3_3 = $('#nota3_3').val();

	var promedio3 = parseFloat(nota1_3)+parseFloat(nota2_3)+parseFloat(nota3_3);
	var promedio3 = (parseFloat(promedio3)/3).toFixed(2)
	$('#promedio3').val(promedio3);
}
function calculo4(){
	var nota1_4 = $('#nota1_4').val();
	var nota2_4 = $('#nota2_4').val();
	var nota3_4 = $('#nota3_4').val();

	var promedio4 = parseFloat(nota1_4)+parseFloat(nota2_4)+parseFloat(nota3_4);
	var promedio4 = (parseFloat(promedio4)/3).toFixed(2)
	$('#promedio4').val(promedio4);
}

function notDisabled (id) {
	var id = id; 
	$('#edit').removeAttr('disabled');
	$('#delete').removeAttr('disabled');
}
function calcular(){
	/*var promedio1 = $('#promedio1').val();
	var promedio2 = $('#promedio2').val();
	var promedio3 = $('#promedio3').val();
	var promedio4 = $('#promedio4').val();
	var promedio = (parseFloat(promedio1)+parseFloat(promedio2)+parseFloat(promedio3)+parseFloat(promedio4))/4;
	$('#promedioFi').val(promedio);*/
	

	var promedio1 = document.getElementById('promedio1').value;
	var promedio2 = document.getElementById('promedio2').value;
	var promedio3 = document.getElementById('promedio3').value;
	var promedio4 = document.getElementById('promedio4').value;
	var promedio = (parseFloat(promedio1)+parseFloat(promedio2)+parseFloat(promedio3)+parseFloat(promedio4))/4;
	document.getElementById('promedioFi').value=promedio.toFixed(2);
}
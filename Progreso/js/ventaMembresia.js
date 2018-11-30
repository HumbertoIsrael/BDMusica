function buscaMem(){
	var mem = $("#mem").val();
	var url = "consultaMembresiaVenta.php";
	$.ajax({
		type : "POST",
		url : url,
		data : "curp="+mem,
		success : function(datos){
			$("#resultado").html(datos);
		}
	});
}

function ampliarMem(){
	$.ajax({
		type : "POST",
		url : "ventaMembresiaBD.php",
		data : $("#formulario").serialize(),
		success : function(datos){
			if(datos == 0){
				$("#btnCrear").blur();
                $.alert({
                    title: 'La membresía no pudo extenderse',
                    content: 'Revise que la fecha sea correcta'
                });  
			} else {
				window.location = "ventaMembresia.php";
			}
		}
	});
	return false;
}
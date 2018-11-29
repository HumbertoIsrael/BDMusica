function buscaMem(){
	var mem = $("#mem").val();
	var url = "consultaMembresiaCaja.php";
	$.ajax({
		type: "POST",
		url: url,
		data: "curp="+mem,
		success:function(datos){
			$("#resultado").html(datos);
		}
	});
}

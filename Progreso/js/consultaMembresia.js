function Busca(){

	$.ajax({
        method:"post",
        url:"consultaMembresiaBE.php",
        data:$("#formulario").serialize(),                
        success:function(resp){                                    	                	
                $.dialog({
                    title: 'Resultado',
                    content: resp,
                });
        }
    });

	return false;
}

function Limpia(){
	$("#contenido").html("");
	return false;
}

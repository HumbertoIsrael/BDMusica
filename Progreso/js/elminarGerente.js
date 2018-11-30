function Busca(){

	$.ajax({
        method:"post",
        url:"eliminarGerenteBE1.php",
        data:$("#formulario").serialize(),                
        success:function(resp){                                    	                	
            alert(resp);
        }
    });

	return false;
}

function Limpia(){
	$("#contenido").html("");
	return false;
}

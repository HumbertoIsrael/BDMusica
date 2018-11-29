function Busca(){

	$.ajax({
        method:"post",
        url:"editarGerenteBE.php",
        data:$("#formulario").serialize(),                
        success:function(resp){                                    	                	
            $("#contenido").html(resp);
        }
    });

	return false;
}

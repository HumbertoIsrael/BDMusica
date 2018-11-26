function login(){						
	$.ajax({
        method:"post",
        url:"inicioConsultaBE.php",
        data:$("#formulario").serialize(),                
        success:function(resp){                                    	                	
            if(resp == 1){                       
                window.location = "./";
            }else{
                    $("#btnLogin").blur();
                    $.alert({
                        title: 'Datos incorrectos',
                        content: 'Por favor intente de nuevo'
                    });                
            }
        }
    });
    return false;
}
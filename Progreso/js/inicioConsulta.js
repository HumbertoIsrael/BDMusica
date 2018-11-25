function login(){						
	$.ajax({
        method:"post",
        url:"inicioConsultaBE.php",
        data:$("#formulario").serialize(),                
        success:function(resp){                                    	                	
            if(resp == 1){                       
                window.location = "./";
            }else{
                alert("Datos incorrectos");
            }
        }
    });
    return false;
}
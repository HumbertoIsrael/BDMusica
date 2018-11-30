function login(){						
	$.ajax({
        method:"post",
        url:"inicioSesionBE.php",
        data:$("#formulario").serialize(),                
        success:function(resp){                                    	                	           
            if(resp == 1){                       
                window.location = "menuGeneral.php";
            } else {
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

function loginCajero(){
    $.ajax({
        method:"post",
        url:"inicioCajero.php",
        data:$("#formCajero").serialize(),                
        success:function(resp){                                                         
            if(resp == 1){                       
                window.location = "caja.php";
            } else {
                $("#btnCajeroLogin").blur();
                $.alert({
                    title: 'Datos incorrectos',
                    content: 'Por favor intente de nuevo'
                });                
            }
        }
    });
    return false;
}
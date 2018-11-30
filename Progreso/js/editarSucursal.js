$(document).ready(function(){

	$('select').formSelect();
});

function Carga(){	
	idSucursal = $("#idSucursal").val();
	$("#btnCambiar").attr("disabled", false);	
	$.ajax({
        method:"post",
        url:"editarSucursalBE.php",
        data: "idSucursal="+idSucursal,
        success:function(resp){    
        	
        	$("#contenido").html(resp);
   			$("#idGerente").formSelect();     	
        	
        }
    });
}

function Cambia(){
	$("#btnCambiar").attr("disabled", true);
	$.ajax({
        method:"post",
        url:"reasignarGerente.php",
        data: $("#formulario").serialize(),        
        success:function(resp){    			
        	if(resp == 1){
                $.alert({
			        title: 'Todo bien',
			        content: 'Se ha cambiado el gerente',
			        onDestroy:function(){
                        $(location).attr("href", "./editarSucursal.php");
                    }					        
			    });
			} else {							
				$.alert({
					title: 'Error',
					content: 'Algo ha salido mal. Intente más tarde',
					onDestroy:function(){
						$("#btnCambiar").attr("disabled", false);
						$("#btnCambiar").blur();
					}							
				});
			}
        }        
    });
    return false;
}
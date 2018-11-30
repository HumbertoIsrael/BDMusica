function Busca(){

    $("#btnElimina").attr("disabled", true);
	$.ajax({
        method:"post",
        url:"eliminarGerenteBE1.php",
        data:$("#formulario").serialize(),                
        success:function(resp){                                    	                	            
            if(resp == "No se encontraron datos"){
                $.dialog({
                    title: 'Error',
                    content: resp,
                });
            } else {                            
                $.confirm({
                    title: 'Confirmar eliminación',
                    content: resp,
                    buttons: {
                        Sí: function () {                            
                            $.ajax({
                                method:"post",
                                url:"eliminarGerenteBE2.php",
                                data: $("#formulario").serialize(),        
                                success:function(resp){                                     
                                    if(resp == 1){
                                        $.alert({
                                            title: 'Todo bien',
                                            content: 'Se ha eliminado al gerente',                                            
                                            onDestroy: () => { $(location).attr("href", "./eliminarGerente.php"); }
                                        });
                                    } else if(resp == 0){
                                        $.alert({
                                            title: 'No se puede eliminar',
                                            content: 'Hay una sucursal asignada a este gerente',
                                            onDestroy:function(){
                                                $("#btnElimina").blur();
                                            }
                                        });
                                    } else {
                                        $.alert({
                                            title: 'Error',
                                            content: 'Algo salió mal, intente de nuevo',
                                            onDestroy:function(){
                                                $("#btnElimina").blur();
                                            }
                                        });
                                    }
                                }                       
                            });
                            $("#importe").attr('disabled','disabled');
                        },
                        No: function () {
                            
                        }                   
                    },
                    onDestroy: function () {                                
                        $("#btnElimina").blur();
                        $("#btnElimina").attr("disabled", false);                    
                    }
                }); 
            }
        }
    });

	return false;
}

function Limpia(){
	$("#contenido").html("");
	return false;
}

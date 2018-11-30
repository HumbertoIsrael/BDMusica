$(document).ready(function(){

	$('select').formSelect();

	$("#formulario").validetta({
		bubblePosition: "bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
		validators: {
            regExp: {
                rfcExp : {
                    pattern : /[A-Z|a-z][A-Z|a-z][A-Z|a-z][A-Z|a-z]\d\d\d\d\d\d/,
                    errorMessage : 'Debe contener formato de RFC'
                }
            }
        },
        onValid:function(e){
        	e.preventDefault();
        	$("#btnCrear").attr("disabled", true);
        	$.ajax({
		        method:"post",
		        url:"agregarSucursalBE.php",
		        data: $("#formulario").serialize(),        
		        success:function(resp){    		        			        	
		        	if(resp == 1){
		                $.alert({
					        title: 'Todo bien',
					        content: 'Se ha registrado la sucursal',
					        onDestroy:function(){
                                $(location).attr("href", "./agregarSucursal.php");
                            }					        
					    });
					} else {
						msj = 'Ese gerente ya tiene una sucursal asignada';
						$.alert({
							title: 'Error',
							content: msj,
							onDestroy:function(){
								$("#btnCrear").attr("disabled", false);
								$("#btnCrear").blur();
							}							
						});
					}
		        }
		    });
        }
	});
});
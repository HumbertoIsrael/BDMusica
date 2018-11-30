$(document).ready(function(){

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
		        url:"agregarProveedorBE.php",
		        data: $("#formulario").serialize(),        
		        success:function(resp){    					        	
		        	if(resp == 1){
		                $.alert({
					        title: 'Todo bien',
					        content: 'Se ha registrado al proveedor',
					        onDestroy:function(){
                                $(location).attr("href", "./agregarProveedor.php");
                            }					        
					    });
					} else {
						msj = 'Ese RFC ya está registrado';						
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
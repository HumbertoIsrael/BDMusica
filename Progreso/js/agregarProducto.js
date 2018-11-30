$(document).ready(function(){

	$("#formulario").validetta({
		bubblePosition: "bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,		
        onValid:function(e){
        	e.preventDefault();

        	//$("#btnCrear").attr("disabled", true);
        	formulario = new FormData($("form#formulario")[0]); //!important

            $.ajax({
                method:"post",
                url:"agregarProductoBE.php",
                data:formulario,
                processData:false, //!important
                contentType:false, //!important
                cache:false,
                success:function(resp){                   
		        	if(resp == 1){
		                $.alert({
					        title: 'Todo bien',
					        content: 'Se ha registrado el producto',
					        onDestroy:function(){
                                $(location).attr("href", "./agregarProducto.php");
                            }					        
					    });
					} else {
						if(resp == 0 ) msj = 'Ese código ya está registrado';						
						else msj = 'Ocurrió un error. Intente más tarde';
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
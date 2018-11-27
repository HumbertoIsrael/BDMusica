 $(document).ready(function(){     

 	$('select').formSelect();

    $("#formulario").validetta({		
        onValid:function(e){
        	e.preventDefault();
        	$("#btnCompra").attr("disabled", true);
        	importe = $("#importe").val();
        	$.confirm({
			    title: 'Confirmar compra',
			    content: '¿Realmente desea realizar la compra por $' + importe + '?',
			    buttons: {
			        Sí: function () {
			        	$("#importe").removeAttr('disabled');
			            $.ajax({
					        method:"post",
					        url:"nuevaCompraBE.php",
					        data: $("#formulario").serialize(),        
					        success:function(resp){    					        						        	
					        	if(resp == 1){
					                $.alert({
								        title: 'Todo bien',
								        content: 'Se ha realizado la compra',
								        onDestroy:function(){
			                                $(location).attr("href", "./nuevaCompra.php");
			                            }
								    });
								} else {
									$.alert({
										title: 'Error',
										content: 'Algo salió mal, intente de nuevo',
										onDestroy:function(){
											$("#btnCompra").blur();
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
					$("#btnCompra").blur();
					$("#btnCompra").attr("disabled", false);					
				}
			});        
        }
	});  

 });

 function formatoFecha(fecha){

	dia = fecha.getDate();
	mes = fecha.getMonth();
	year = fecha.getFullYear();

	cad = "";
	cad += year;

	cad += "-";

	if(mes < 10) cad += '0';
	cad += mes;

	cad += "-";

	if(dia < 10) cad += '0';
	cad += dia;

	return cad;

}

function rellena(){

	ahora = Date.now();	

	ahora = new Date(ahora);	
	ahora = formatoFecha(ahora);


	$("#ahora").val(ahora);	



}

 function calcula(){
 	precio = $("#idProducto").find(":selected").val(); 	
 	cantidad = $("#cantidad").val();

 	if(precio == "" || cantidad == ""){
 		importe = "Sin calcular";
 	} else {
 		precio = precio.split(";")[1];
 		importe = (precio * cantidad).toFixed(2);
 	}

 	$("#importe").val(importe);

 }
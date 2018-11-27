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

	//Obtiene la fecha actual y le da formato de MySQL

	ahora = Date.now();
	expira = ahora + 100 * 24 * 3600 * 1000;

	ahora = new Date(ahora);
	//ahora = ahora.getFullYear() + '-' + ahora.getMonth() + '-' + ahora.getDate();
	ahora = formatoFecha(ahora);
	//alert(ahora);

	expira = new Date(expira);
	expira = formatoFecha(expira);
	//alert(expira);

	//Rellenamos los 2 campos que no se ven.
	//Con $.("id") hacemos referencia al objeto con ese id
	//.val es para manipular su valor.
	$("#alta").val(ahora);
	$("#expira").val(expira);	

}

$(document).ready(function(){
	$("#formulario").validetta({
		validators: {
            regExp: {
                curpExp : {
                    pattern : /[A-Z|a-z][A-Z|a-z][A-Z|a-z][A-Z|a-z]\d\d\d\d\d\d[A-Z|a-z][A-Z|a-z][A-Z|a-z][A-Z|a-z][A-Z|a-z][A-Z|a-z]\d\d/,
                    errorMessage : 'Debe contener formato de CURP'
                }
            }
        },
        onValid:function(e){
        	e.preventDefault();
        	$("#btnCrear").attr("disabled", true);
        	$.ajax({
		        method:"post",
		        url:"subeCliente.php",
		        data: $("#formulario").serialize(),        
		        success:function(resp){    
		        	if(resp == 1){
		                $.alert({
					        title: 'Todo bien',
					        content: 'Se ha registrado al socio	',
					        onDestroy:function(){
                                $(location).attr("href", "./nuevoCliente.php");
                            }					        
					    });
					} else {
						$.alert({
							title: 'Error',
							content: 'Ese CURP ya está registrado',
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
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
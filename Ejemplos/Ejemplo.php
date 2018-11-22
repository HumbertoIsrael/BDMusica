<?php

	session_start();
	//Esto es para usar sesiones

	//$_SESSION es un arreglo que puede ser usado en todos los archivos PHP. 
	//En $_SESSION['var'] se puede almacenar algún valor que estará identificado por la cadena 'var'. 
	//Es como un map de C++. 
	//Es escritura como de lectura

	if (isset($_SESSION['modo'])) {

		//entra aquí si hay alguna sesión con algún modo.

		$modo = $_SESSION['modo'];

		if($modo == 'consulta'){
			
		} else if($modo == 'caja'){
			
		} else if($modo == 'administracion'){
			
		} else {
			//Si hay sesion, pero no es de los modos anteriores.
			//En teoria esto no debería de pasar, pero por si las dudas.
		}

	} else {
		//Si no hay ninguna sesion iniciada, entra aqui.

		//Si no queremos que en esta vista no haya alguien sin logearse, podemos, por ejemplo, regresarlo al index.
		//Se puede combinar PHP y html. 

		?>

<script>alert("Por favor inicia sesión");</script>
<script>window.location = "index.php";</script>		

		<?php

	}

	//Lo siguiente es para hacer una conexion a la base de datos. Checar archivo configBD.php
	//De ahi sale la variable $conexion
		
	/*
	include("./configBD.php"); //creo que esto va al inicio del archivo.
	$sql = "select * from tabla;"; //La consulta que se va a hacer.
	$res = mysqli_query($conexion, $sql); //Todos el resultado de la consulta.
	while($tupla = mysqli_fetch_row($res)){ //Esto es por cada tupla.
		//Aqui se tiene la infomración de cada tupla de la consulta.
		//$tupla[i] hace referencia al valor del i-esimo atributo de la consulta.
	}
	*/

?>


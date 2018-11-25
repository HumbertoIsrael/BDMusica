<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {

		//entra aquí si hay alguna sesión con algún modo.

		$modo = $_SESSION['modo'];

		if($modo == 'administracion'){
			
			//Obtenemos los datos del formulario
			//Ya que usamos metodo POST, usamos el arreglo $_POST
			//También existe $_GET
			//$_POST['name'] hace referencia al objeto del formulario que tenga ese name. 

			//Por eso es importante tener id y name.


			$curp = $_POST['curp'];
			$nombre = $_POST['nombre'];
			$ap_pat = $_POST['ap_pat'];
			$ap_mat = $_POST['ap_mat'];
			$alta = $_POST['alta'];
			$expira = $_POST['expira'];

			$sql = "insert into Socio values('$curp', '$expira', '$alta', '$nombre', '$ap_pat', '$ap_mat')";
			$res = mysqli_query($conexion, $sql); 
			$afectados = mysqli_affected_rows($conexion);			

			//Afectados dice cómo salió la consulta.
			//n >= 0 - significa que se alteraron n tuplas.
			//-1 - ocurrió algún error.
			//Aquí queremos n == 1, porque queremos insertar un valor.

?>
<?php

			if($afectados == 1){
				?>
<script>alert("Registro con exito");</script>	
<script>window.location = "nuevoCliente.php";</script>						
				<?php
			} else {
				?>
<script>alert("Algo salió mal. Intente de nuevo");</script>
<script>window.location = "nuevoCliente.php";</script>						
				<?php
			}			

		} else {
			?>
<meta http-equiv="Refresh" content="0; url=./" />
			<?php
		}

	} else {
		//Si no hay ninguna sesion iniciada, entra aqui.

		//Si no queremos que en esta vista no haya alguien sin logearse, podemos, por ejemplo, regresarlo al index.
		//Se puede combinar PHP y html. 

		?>
<meta http-equiv="Refresh" content="0; url=./" />
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


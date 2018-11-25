<?php

	session_start();

	if (isset($_SESSION['modo'])) {

		//entra aquí si hay alguna sesión con algún modo.

		$modo = $_SESSION['modo'];

		if($modo == 'administracion'){
					
			//Aquí genera la página html.

			?>

<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="./js/nuevoCliente.js"></script>
<html>
	<head>
		<title>Registro Socio</title>
	</head>
	<body>
		<h1>Rellena los siguientes campos</h1>

		<!-- Este es un formulario donde se pueden poner los campos a llenar en la BD  -->
		<!-- Cuando todo esté bien, llevará la información a la página subeCliente.php-->
		<form id='formulario' method='POST' action='subeCliente.php'>

			<!-- Cada entrada le podemos asignar un id y un name.-->
			CURP <input type='text' id='curp' name='curp'><br>
			Nombre <input type='text' id='nombre' name='nombre'><br>
			Apellido Paterno <input type='text' id='ap_pat' name='ap_pat'><br>
			Apellido Materno <input type='text' id='ap_mat' name='ap_mat'><br>

			<!-- Estos 2 no se ven, pero se mandan a la página -->
			<input type='hidden' id='expira' name='expira'>
			<input type='hidden' id='alta' name='alta'>

			<!-- rellena() está en nuevoCliente.js -->
			<!-- Cuando se da clic, ejecuta rellena() y luego sube la información -->
			<input type='submit' value ='Crear' onClick='rellena();'>

		</form>
	</body>
</html>

			<?php
			
		} else {

			//Si no es administración, no debería de mostrarse el contenido.

			?>
<meta http-equiv="Refresh" content="0; url=./" />
			<?php
		}

	} else {
		//Tampoco si no hay sesión iniciada.

		?>
<meta http-equiv="Refresh" content="0; url=./" />
		<?php
	}

?>


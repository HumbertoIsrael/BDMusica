<?php

	session_start();

	if (isset($_SESSION['modo'])) {
		?>
<script>window.location = "index.php";</script>
		<?php

	} else {
?>

<html>
	<head>
		<title>Inicio Consulta</title>
	</head>
	<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="./js/inicioConsulta.js"></script>

	<body>		
	<form id='formulario'>
		<h1>Iniciar consulta</h1>
		Usuario Gerente <input type='text' id='usuario' name='usuario'><br>
		Contraseña <input type='password' id='contra' name='contra'><br>
		<input type='submit' value = 'Iniciar' onclick="return login();">
	</form>
	</body>
</html>

<?php

	}

?>

<?php

	session_start();

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'consulta'){
			
?>

<html>
	<head>
		<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="./js/consultaMembresia.js"></script>
	</head>
	<body>
		<form id='formulario'>
			<h1>Consulta por CURP</h1>
			<input type="text" id="curp" name = "curp"><br>
			<button type="submit" onclick="return Busca();">Buscar</button>
			<button onclick = "return Limpia();">Limpiar</button>
		</form>
		<div id='contenido'>
			
		</div>
	</body>
</html>

<?php
			
		} else {
?>
<meta http-equiv="Refresh" content="0; url=./" />
<?php			
		}

	} else {
		
?>
<meta http-equiv="Refresh" content="0; url=./" />
<?php
	}

		
	//include("./configBD.php");
	//$sql1 = "select rfc, nombre, codigo from ganador where ";
	//$res = mysqli_query($conexion, $sql1);
	//while($tupla = mysqli_fetch_row($res)){

?>


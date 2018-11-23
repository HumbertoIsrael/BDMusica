<?php

	session_start();

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'consulta'){
			?>

<html>
	<head></head>
	<body>
		<h1>Consulta</h1>
		<a href="consultaInventario.php">Inventario</a><br>
		<a href="consultaMembresia.php">Membresía</a><br>
		<a href="consultaSucursales.php">Sucursales</a><br>
	</body>
</html>

			<?php
		} else if($tipo == 'caja'){
			echo 2;
		} else {
			echo 3;
		}

	} else {
		
		?>

		<a href='inicioConsulta.php'>Consulta</a>
		<br>
		<a href='administracion.php'>Administración</a>
		<br>
		<a href='inicioCaja.php'>Caja</a>		

		<?php


	}

?>

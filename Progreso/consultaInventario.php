<?php

	session_start();

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'consulta'){
			
			?>

<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="./js/consultaInventario.js"></script>
		<title>Inventario</title>
	</head>
	<body onload="Carga();">

		<input type="radio" value="sucursal" name="donde" checked onchange ="Carga()"> Esta sucursal.<br>
		<input type="radio" value="todas" name="donde" onchange="Carga();"> Todas las sucursales.<br>
		Buscar por nombre : <input type="text" id="busqueda" oninput="Busca();"><br>

		<div id='resultados'>
			
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

?>


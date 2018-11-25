<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'consulta'){
			
				$sql = "select dir, nombre, tel from Sucursal;";
				$res = mysqli_query($conexion, $sql);
				$contenido = "";
				while($tupla = mysqli_fetch_row($res)){

					$nombre = $tupla[1];
					$nombre_ = str_replace(" ", "_", $tupla[1]);
					$direccion = $tupla[0];
					$telefono = $tupla[2];

					$contenido .= 
			"<tr id='$nombre_' name='sucursales'> 
	    		<td>$nombre</td>
	    		<td>$direccion</td>
	    		<td>$telefono</td>
	    	</tr>\n";
				}

?>
<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <title>Sucursales</title>
	    <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
	    <script type="text/javascript" src="./js/consultaSucursales.js"></script>
	    <meta name="viewport" content="width=device-width, initial-scale=1">	    	    
	</head>
	<body>
	    Buscar: <input type="text" id="busqueda" oninput="Busca()"><br>
	    <table>
	    	<tr>
	    		<th>Nombre</th>
	    		<th>Dirección</th>
	    		<th>Teléfono</th>
	    	</tr>
	    	<?php echo $contenido ?>
	    </table>	    
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


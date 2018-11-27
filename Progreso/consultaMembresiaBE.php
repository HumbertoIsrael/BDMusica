<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'consulta'){

			$curp = $_POST['curp'];			
			
			$sql = "select * from Socio where curp = '$curp'";			
			$res = mysqli_query($conexion, $sql);
			$hay = mysqli_num_rows($res);
			
			if($hay == 1){

				$tupla = mysqli_fetch_row($res);
			
				echo "Nombre: $tupla[3] $tupla[4] $tupla[5]<br>\n";
				echo "Fecha de alta: $tupla[2]<br>\n";
				echo "Fecha de expiración: $tupla[1]<br>\n";


			} else {
				echo "No se encontraron datos";	
			}		

		} else {
			echo "No se encontraron datos";
		}

	} else {
		echo "No se encontraron datos";
	}


?>


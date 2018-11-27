<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {

		//entra aquí si hay alguna sesión con algún modo.

		$modo = $_SESSION['modo'];

		if($modo == 'caja'){		

			$curp = $_POST['curp'];
			$nombre = $_POST['nombre'];
			$apPat = $_POST['apPat'];
			$apMat = $_POST['apMat'];
			$alta = $_POST['alta'];
			$expira = $_POST['expira'];			

			$sql = "insert into Socio values('$curp', '$expira', '$alta', '$nombre', '$apPat', '$apMat')";
			
			$res = mysqli_query($conexion, $sql); 
			$afectados = mysqli_affected_rows($conexion);			

			echo $afectados;		

		}
	}

?>


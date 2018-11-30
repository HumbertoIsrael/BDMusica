<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'administracion'){

			$rfc = $_POST['rfc'];

			$sql = "select g.rfc from Gerente g, Sucursal s where g.rfc = s.idGerente and g.rfc = '$rfc'";
			$res = mysqli_query($conexion, $sql);
			$hay = mysqli_num_rows($res);		

			if($hay == 1){
				echo 0;
			} else {
				$sql = "delete from Gerente where rfc = '$rfc'";
				$res = mysqli_query($conexion, $sql);				
				$afectados = mysqli_affected_rows($conexion);

				echo $afectados;

			}			
			
		}

	}

?>
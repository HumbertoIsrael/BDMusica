<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'administracion'){
			
			$rfc = $_POST['rfc'];
			$idSucursal = $_POST['idSucursal'];
			$dir = $_POST['dir'];							
			$nombre = $_POST['nombre'];
			$apPat = $_POST['apPat'];
			$apMat = $_POST['apMat'];
			$tel = $_POST['tel'];			
			
			$sql = "insert into Cajero values('$rfc', $idSucursal ,'$dir', '$nombre', '$apPat', '$apMat', '$tel', 1);";				

			
			$res = mysqli_query($conexion, $sql);

			$afectados = mysqli_affected_rows($conexion);			

			echo $afectados;
		
		}

	} 
	

?>
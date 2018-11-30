<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'administracion'){
			
			$idGerente = $_POST['idGerente'];			

			if($idGerente == "-") $idGerente = "null";
			else $idGerente = "'$idGerente'";

			$dir = $_POST['dir'];				
			$nombre = $_POST['nombre'];		
			$tel = $_POST['tel'];			
			
			$sql = "insert into Sucursal(idGerente, dir, nombre, tel) values($idGerente, '$dir', '$nombre', $tel)";			
			
			$res = mysqli_query($conexion, $sql);

			$afectados = mysqli_affected_rows($conexion);			

			echo $afectados;
		
		}

	} 
	

?>
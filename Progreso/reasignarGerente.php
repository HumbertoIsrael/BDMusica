<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'administracion'){
			
			$idGerente = $_POST['idGerente'];			

			if($idGerente == "-") $idGerente = "null";
			else $idGerente = "'$idGerente'";

			$idSucursal = $_POST['idSucursal'];
			
			$sql = "update Sucursal set idGerente = $idGerente where idSucursal = $idSucursal";					
			
			$res = mysqli_query($conexion, $sql);

			$afectados = mysqli_affected_rows($conexion);			

			echo $afectados;
		
		}

	} 
	

?>
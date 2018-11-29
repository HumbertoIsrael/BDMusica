<?php

	$resultado = "";
	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$curp = $_POST['curp'];			
		
		$sql = "select * from Socio where curp = '$curp'";			
		$res = mysqli_query($conexion, $sql);
		$hay = mysqli_num_rows($res);
		
		if($hay == 1){
			$resultado = "Membresía Valida";
			echo "<p style='color: #00e676;'>Membresía Valida</p>";
		} else {
			$resultado = "Membresía Invalida";
			echo "<p style='color: #ff3d00;'>Membrespia Invalida</p>";
		}
	} else {
		$resultado = "Error de Sesión";
		echo "<p style='color: #ff3d00;'>Error de Sesión</p>";
	}
?>
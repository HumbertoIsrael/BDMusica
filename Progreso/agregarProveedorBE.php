<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'administracion'){
			
			$rfc = $_POST['rfc'];
			$email = $_POST['email'];
			$dir = $_POST['dir'];	
			$tel = $_POST['tel'];									
			$nombre = $_POST['nombre'];			
			
			$sql = "insert into Proveedor values('$rfc', '$email', '$dir', $tel, '$nombre', 1)";			
			
			$res = mysqli_query($conexion, $sql);

			$afectados = mysqli_affected_rows($conexion);			

			echo $afectados;
		
		}

	} 
	

?>
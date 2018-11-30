<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'administracion'){
			
			$rfc = $_POST['rfc'];
			$dir = $_POST['dir'];
			$usuario = $_POST['usuario'];
			$contra = $_POST['contra'];
			$nombre = $_POST['nombre'];
			$apPat = $_POST['apPat'];
			$apMat = $_POST['apMat'];
			$tel = $_POST['tel'];

			$sql = "select rfc from Gerente where usuario = '$usuario'";
			$res = mysqli_query($conexion, $sql);
			$usuarios = mysqli_num_rows($res);

			if($usuarios == 0){
				$sql = "insert into Gerente values('$rfc', '$dir', '$usuario', SHA1('$contra'), '$nombre', '$apPat', '$apMat', '$tel');";	
				$res = mysqli_query($conexion, $sql);

				$afectados = mysqli_affected_rows($conexion);			

				echo $afectados;

			} else {
				echo 0;
			}
		
		
		}

	} 
	

?>
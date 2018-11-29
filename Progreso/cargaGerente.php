<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];
		
		if($tipo == 'administracion'){

			$rfc =$_POST['rfc_in'];

			$sql = "select * from Gerente where rfc = '$rfc'";			

			$res = mysqli_query($conexion, $sql);			
						

			if($tupla = mysqli_fetch_row($res)){

				$dir = $tupla[1];
				$usuario = $tupla[2];
				$nombre = $tupla[4];
				$apPat = $tupla[5];
				$apMat = $tupla[6];
				$tel = $tupla[7];

				echo '{"rfc":"'.$rfc.'","nombre":"'.$nombre.'","apPat":"'.$apPat.'","apMat":"'.$apMat.'","usuario":"'.$usuario.'","tel":"'.$tel.'","dir":"'.$dir.'"}';					
				
			}
			
		}

	}

?>

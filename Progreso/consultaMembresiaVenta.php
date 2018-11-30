<?php
	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$curp = $_POST['curp'];			
		
		$sql = "select * from Socio where curp = '$curp';";			
		$res = mysqli_query($conexion, $sql);
		$hay = mysqli_num_rows($res);
		
		if($hay == 1){
			$res = mysqli_fetch_array($res);
			$_SESSION['membresia'] = $curp;
			echo "<p style='color: #00e676;'>Membresía Valida</p>
					<h6>Fecha de Alta: ".$res["fechaAlta"]."</h6>
			      	<h6>Fecha de Expiración: ".$res["fechaExpira"]."</h6>";
		} else {
			echo "<p style='color: #ff3d00;'>Membresía Invalida</p>";
		}
	} else {
		echo "<p style='color: #ff3d00;'>Error de Sesión</p>";
	}
?>
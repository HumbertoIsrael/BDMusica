<?php
	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		if($_SESSION['modo'] != "caja"){
			exit();
		}
		$curp = $_POST['curp'];
		$fecha = $_POST["anio"] . "-" .$_POST["mes"] . "-" . $_POST["dia"];			
		
		$sql = "update socio set fechaExpira = '$fecha' where curp = '$curp';";			
		try{
			mysqli_query($conexion, $sql);
			echo 1;
		} catch(Exception $ex) {
			echo 0;
			exit();
		}
	} 
?>
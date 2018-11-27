<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'consulta'){
			
			$contra = $_POST['contra'];
			$idSucursal = $_SESSION['idSucursal'];

			$sql = "select count(*) from Gerente g, Sucursal s where g.rfc = s.idGerente and s.idSucursal = '$idSucursal' and g.password = '$contra'";
			
			$res = mysqli_query($conexion, $sql);
			$tupla = mysqli_fetch_row($res);
			
			echo $tupla[0];

			if($tupla[0] == 1)
				session_unset(); 

		} else {
			?>

			<?php
		}

	} else {
		
		?>

		<?php

	}

		
	//include("./configBD.php");
	//$sql1 = "select rfc, nombre, codigo from ganador where ";
	//$res = mysqli_query($conexion, $sql1);
	//while($tupla = mysqli_fetch_row($res)){

?>
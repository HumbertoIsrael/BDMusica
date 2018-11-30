<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
	?>

	<?php		

	} else {

		$usuario = $_POST['usuario'];
		$contra = $_POST['contra'];		


		$sql = "select s.idSucursal from Gerente g, Sucursal s where g.rfc = s.idGerente and g.usuario = '$usuario' and g.password = SHA1('$contra')";

		$res = mysqli_query($conexion, $sql	);
		$hay = mysqli_num_rows($res);

		echo $hay;

		if($hay == 1){

			$tupla = mysqli_fetch_row($res);
			$_SESSION['usuario'] = $usuario;
			$_SESSION['idSucursal'] = $tupla[0];


		} 

	}

?>


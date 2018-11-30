<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'administracion'){
			$rfc = $_POST['rfc'];

			$sql = "select * from Gerente where rfc = '$rfc'";								
			$res = mysqli_query($conexion, $sql);
			$hay = mysqli_num_rows($res);		

			if($hay == 1){

				$tupla = mysqli_fetch_row($res);
				
				?>
			
	<b>RFC</b>: <?php echo $tupla[0] ?> <br>
	<b>Nombre</b>: <?php echo $tupla[4]." ".$tupla[5]." ".$tupla[6]; ?><br>
	<b>Usuario</b>: <?php echo $tupla[2]; ?> <br>

				<?php			

			} else {
				echo "No se encontraron datos";	
			}
		} else {
			echo "No se encontraron datos";	
		}

	} else {
		echo "No se encontraron datos";	
	}

		
	//include("./configBD.php");
	//$sql1 = "select rfc, nombre, codigo from ganador where ";
	//$res = mysqli_query($conexion, $sql1);
	//while($tupla = mysqli_fetch_row($res)){
	//mysqli_num_rows($res);

?>
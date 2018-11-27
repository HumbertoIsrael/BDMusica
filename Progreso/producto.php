<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'consulta'){
			$idProducto = $_POST['idProducto'];
			
			$sql = "select nombre, imagen, descripcion from Producto where idProducto=$idProducto";			

			$res = mysqli_query($conexion, $sql);

			$tupla = mysqli_fetch_row($res);

			$nombre = $tupla[0];
			$imagen = "imgs/".$tupla[1];
			$descripcion = $tupla[2];
			?>

<div class="row">
	<div class="col s12 center-align">
		<h5><?php echo $nombre; ?></h1>			
	</div>
	<div class="col s6 offset-s3 ">
		<img class="responsive-img" src="<?php echo $imagen; ?>">
	</div>
	<div class="col s12 center-align">
		<p><?php echo $descripcion; ?></p>
	</div>
</div>

			<?php
		} else {

		}

	} else {
		

	}

		
	
	//$sql1 = "select rfc, nombre, codigo from ganador where ";
	//$res = mysqli_query($conexion, $sql1);
	//while($tupla = mysqli_fetch_row($res)){

?>
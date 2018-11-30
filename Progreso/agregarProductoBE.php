<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'administracion'){				

			$idProducto = $_POST['codigo'];
			$nombre = $_POST['nombre'];
			$precio = $_POST['precio'];
			$descripcion = $_POST['descripcion'];
			$imagen = $idProducto."_".$_FILES["imagen"]["name"];

			$sql = "select idProducto from Producto where idProducto = $idProducto";			
			$res = mysqli_query($conexion, $sql);
			$hay = mysqli_num_rows($res);
			
			if($hay == 1){
				echo 0;
			} else {
				$dirSubida = "./imgs/";
				$rutaFullSubida = $dirSubida.basename($imagen);						

				if(move_uploaded_file($_FILES["imagen"]["tmp_name"],$rutaFullSubida)){
					$sql = "insert into Producto values($idProducto, '$nombre', $precio, '$imagen', '$descripcion')";
					$res = mysqli_query($conexion, $sql);
					$afectados = mysqli_affected_rows($conexion);			

					echo $afectados;
				}else{
				    echo "-1";
				}
			}
		
		}

	} 
	

?>
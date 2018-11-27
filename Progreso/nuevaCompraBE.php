<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'administracion'){
		
			$idSucursal = $_SESSION['idSucursal'];			


			$sql = "select count(*) from Compra";
			$res = mysqli_query($conexion, $sql);
			$tupla = mysqli_fetch_row($res);
			$hay = $tupla[0]+1;			


			$idProveedor = $_POST['idProveedor'];
			$idProducto = explode(";", $_POST['idProducto'])[0];
			$cantidad = $_POST['cantidad'];
			$fecha = $_POST['ahora'];
			$importe = $_POST['importe'];


			$sql = "insert into Compra values($hay, '$idProveedor', $idSucursal,$idProducto, $cantidad, '$fecha', $importe)";

			$res = mysqli_query($conexion, $sql);
			$afectados = mysqli_affected_rows($conexion);			

			echo $afectados;			

			$sql = "select * from Inventario where idProducto = $idProducto and idSucursal = $idSucursal";
			$res = mysqli_query($conexion, $sql);
			$existen = mysqli_num_rows($res);

			if($existen == 1){
				$tupla = mysqli_fetch_row($res);
				$unidades = $tupla[2] + $cantidad;

				$sql = "update Inventario set unidades = $unidades where idProducto = $idProducto and idSucursal = $idSucursal";

			} else {
				$sql = "insert into Inventario values($idProducto, $idSucursal, $cantidad)";
			}
		

			mysqli_query($conexion, $sql);

		}

	} 

			
	
?>
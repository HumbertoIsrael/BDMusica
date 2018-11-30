<?php
	session_start();
	include("./configBD.php");

	if(!isset($_SESSION['membresia']) || !isset($_SESSION['total']) || !isset($_SESSION['arregloItems'])){
		echo 0;
		exit();
	}

	mysqli_begin_transaction($conexion, MYSQLI_TRANS_START_READ_WRITE);
	try{
		$sql = "INSERT into venta(idCajero,idSocio,fecha,importe) values('".$_SESSION["cajero"]."','".$_SESSION["membresia"]."','".date("Y-m-d")."',".$_SESSION["total"].");";

		mysqli_query($conexion,$sql);

		$sql = "SELECT MAX(idVenta) from venta;";
		$idVenta = mysqli_fetch_array(mysqli_query($conexion,$sql))['MAX(idVenta)'];

		foreach ($_SESSION['arregloItems'] as &$item) {
			$sql = "insert into productosvta values($idVenta,".$item['idProducto'].",".$item['cantidad'].");";
			mysqli_query($conexion,$sql);

			$sql = "SELECT unidades from inventario WHERE idSucursal = ".$_SESSION['idSucursal']." AND idProducto = ".$item['idProducto'].";";
			$unidades = mysqli_fetch_array(mysqli_query($conexion,$sql))['unidades'];
			$unidades -= $item['cantidad'];

			$sql = "UPDATE inventario SET unidades = $unidades WHERE idSucursal = ".$_SESSION['idSucursal']." AND idProducto = ".$item['idProducto'].";";
			mysqli_query($conexion,$sql);
		}

	} catch(exception $e){
		echo 0;
		mysqli_rollback($conexion);
		mysqli_close($conexion);
		exit();
	}
	mysqli_commit($conexion);
	unset($_SESSION['membresia']);
	unset($_SESSION['total']);
	unset($_SESSION['arregloItems']);
	echo 1;
	mysqli_close($conexion);
?>
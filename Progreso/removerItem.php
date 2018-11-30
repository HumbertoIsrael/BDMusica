<?php
	session_start();
	include("./configBD.php");
	if (isset($_SESSION['cajero'])) {
		$idProducto = $_POST['item'];
		if (isset($_SESSION['arregloItems'])) {
			$count = 0;
	        foreach ($_SESSION['arregloItems'] as &$item) {
	            if ($item['idProducto'] == $idProducto) {
	                $_SESSION["total"] -= $item['precio'];
	                if($item['cantidad'] == 1){
	                	unset($_SESSION['arregloItems'][$count]);
	                } else {
	                	$item['cantidad'] -= 1;
	                }
	            }
	            $count += 1;
	        }
    	}
	}
	include("showItemsCaja.php");
?>
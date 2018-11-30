<?php
session_start();
include("./configBD.php");
if (isset($_SESSION['cajero'])) {
    if("" == trim($_POST['idProducto'])){
        echo 0;
        exit();
    }
    $numItems = 1;
    $idProducto = $_POST['idProducto'];
    if (isset($_SESSION['arregloItems'])) {
        foreach ($_SESSION['arregloItems'] as &$item) {
            if ($item['idProducto'] == $idProducto) {
                $numItems += $item['cantidad'];
                $itemInArray = &$item;
            }
        }
    }
    $sql = "select * from vwinventario where idProducto = $idProducto AND unidades >= $numItems AND idSucursal = ". $_SESSION['idSucursal'] .";";
    // AGREGAR SUCURSAL !!!
    $result = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($result) == 1) {
        $fila = mysqli_fetch_array($result);
        if(isset($_SESSION['total'])){
        	$_SESSION['total'] += $fila['precio'];
        } else {
        	$_SESSION['total'] = $fila['precio'];
        }
        if (isset($_SESSION['arregloItems'])) {
            if (isset($itemInArray)) {
                $itemInArray["cantidad"] = $numItems;
            } else {
                $newItem = array(
                    "producto" => $fila['producto'],
                    "precio" => $fila['precio'],
                    "idProducto" => $idProducto,
                    "cantidad" => $numItems
                );
                array_push($_SESSION['arregloItems'], $newItem);
            }
        } else {
            $newItem = array(
                "producto" => $fila['producto'],
                "precio" => $fila['precio'],
                "idProducto" => $idProducto,
                "cantidad" => $numItems
            );
            $_SESSION['arregloItems'] = array($newItem);
        }
    } else {
        echo 0;
        exit();
    }
    include 'showItemsCaja.php';
}
?>
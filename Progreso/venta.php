<?php

	session_start();

	include("./configBD.php");
	//$sql1 = "select rfc, nombre, codigo from ganador where ";
	//$res = mysqli_query($conexion, $sql1);
	//while($tupla = mysqli_fetch_row($res)){

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'administracion'){
			
			$idVenta = $_POST['idVenta'];


			$sql = "select * from vwVenta where idVenta = $idVenta";			

			$res = mysqli_query($conexion, $sql);

?>

<table>
	<tr>
		<th>Producto</th>
		<th>Precio</th>
		<th>Unidades</th>
	</tr>

<?php

			while($tupla = mysqli_fetch_row($res)){
				?>
	<tr>
				<?php
				for($i = 0; $i < 3; $i ++){
					?>	
		<td><?php echo $tupla[$i] ?></td>	
					<?php
				}
				?>
	</tr>
				<?php
			}
			
		?>
</table>			

		<?php

			$sql = "select importe from Venta where idVenta = $idVenta";
			$res = mysqli_query($conexion, $sql);
			$tupla = mysqli_fetch_row($res);

			$importe = $tupla[0];

			?>
<br>
<b>Total : <?php echo $importe; ?></b>
			<?php

		}
		
	}

?>
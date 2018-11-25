<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'consulta'){

			$donde = $_POST['donde'];
			$id_sucursal = $_SESSION['id_sucursal'];
			
			$sql = "";
			if($donde == "todas") $sql = "select * from vwInventario order by 1";
			else $sql = "select * from vwInventario where id_sucursal = '$id_sucursal' order by 1";			
			
			$res = mysqli_query($conexion, $sql);
			$cnt = 0;

			?>
<table>

	<tr>
		<th>Producto</th>
		<th>Precio</th>
		<th>Stock</th>
		<th>Imagen</th>
			
			<?php
			if($donde == "todas"){
				?>
		<th>Sucursal</th>
				<?php
			}
			?>
	</tr>	

			<?php

			while($tupla = mysqli_fetch_row($res)){		

				$cnt = $cnt + 1;

				?>
				
	<tr id="<?php echo $tupla[0]; ?>" name="articulo">
		<td><?php echo str_replace(" ", "_", $tupla[0])?></td>
		<td><?php echo $tupla[1]?></td>
		<td><?php echo $tupla[5]?></td>
		<td><?php echo $tupla[2]?></td>

				<?php
				if($donde == "todas"){
					?>
		<td><?php echo $tupla[3]?></td>
					<?php
				}
				?>
	</tr>
				<?php

			}
			?>
</table>
			<?php

			//
	//$sql1 = "select rfc, nombre, codigo from ganador where ";
	

			
		} else {
			?>

			<?php
		}

	} else {
		?>

		<?php

	}

?>


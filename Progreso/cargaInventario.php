<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'consulta' || $tipo == 'administracion'){

			$donde = $_POST['donde'];
			$idSucursal = $_SESSION['idSucursal'];			
			
			$sql = "";
			if($donde == "todas") $sql = "select * from vwInventario order by 1";
			else $sql = "select * from vwInventario where idSucursal = '$idSucursal' order by 1";

			$res = mysqli_query($conexion, $sql);
			$cnt = 0;

			?>
<table>
	<thead>
		<tr>
			<th>Producto</th>
			<th>Precio</th>
			<th>Stock</th>			
			
			<?php
			if($donde == "todas"){
				?>
			<th>Sucursal</th>
				<?php
			}
			?>
			<th>Sobre el producto</th>
		</tr>	
	</thead>
			<?php

			while($tupla = mysqli_fetch_row($res)){		

				$cnt = $cnt + 1;

				?>
	<tbody>
		<tr id="<?php echo str_replace(" ", "_", $tupla[0])?>" name="articulo">
			<td><?php echo $tupla[0]; ?></td>
			<td><?php echo $tupla[1]?></td>
			<td><?php echo $tupla[5]?></td>			

				<?php
				if($donde == "todas"){
					?>
			<td><?php echo $tupla[3]?></td>
					<?php
				}
				?>
			<td><i class="material-icons" onclick="Muestra(<?php echo $tupla[2] ?>);">remove_red_eye</i></td>
		</tr>
				<?php

			}
			?>
	</tbody>
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


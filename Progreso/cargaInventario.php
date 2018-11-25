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
			while($tupla = mysqli_fetch_row($res)){		

				$cnt = $cnt + 1;

				?>
<div id="<?php echo $tupla[0]; ?>" name="articulo">
	Producto : <?php echo str_replace(" ", "_", $tupla[0])?><br>
	Precio : <?php echo $tupla[1]?><br>
	Imagen : <?php echo $tupla[2]?><br>
	Stock : <?php echo $tupla[5]?><br>

				<?php
				if($donde == "todas"){
					?>
	Sucursal : <?php echo $tupla[3]?><br>					
					<?php
				}
				?>


</div>
				<?php

			}

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


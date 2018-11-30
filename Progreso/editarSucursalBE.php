<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'administracion'){

?>
<select id="idGerente" name="idGerente" >
<?php													

			$idSucursal = $_POST['idSucursal'];
			$sql = "select g.rfc,g.nombre, g.apPat, g.apMat  from Sucursal s, Gerente g where s.idGerente = g.rfc and s.idSucursal = $idSucursal";
			$res = mysqli_query($conexion, $sql);
			if($tupla = mysqli_fetch_row($res)){

			?>
	<option value="-">Sin gerente</option>
	<option value="<?php echo $tupla[0]; ?>" selected><?php echo $tupla[1]." ".$tupla[2]." ".$tupla[3]; ?></option>
			<?php

			} else{
?>
	<option value="-" selected>Sin gerente</option>
<?php
			}


			$sql = "select rfc, nombre, apPat, apMat from vwGerentesLibres where cuenta = 0";
			
			$res = mysqli_query($conexion, $sql);
			$gerentes = "";
			while($tupla = mysqli_fetch_row($res)){
				$gerentes .= "\t<option value=\"$tupla[0]\">$tupla[1] $tupla[2] $tupla[3]</option>\n";
			}	

			echo $gerentes;
?>
</select>
<label>Gerente</label>
<?php

		}

	} else {
		

	}

?>

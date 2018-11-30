<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'administracion'){

			$act = $_SESSION['idSucursal'];

			$sql = "select idSucursal, nombre from Sucursal;";			
			
			$res = mysqli_query($conexion, $sql);
			$sucurles = "";
			while($tupla = mysqli_fetch_row($res)){

				if($tupla[0] == $act) continue;

				$sucursales .= "<option value=\"$tupla[0]\">$tupla[1]</option>\n";

			}
			
?>

<html>
	<head>
		<meta charset="utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">	    
	    <meta name="viewport" content="width=device-width, initial-scale=1">	    	  	    
	    <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>	    
	    <script type="text/javascript" src="./confirm330/js/jquery-confirm.js"></script>
	    <script type="text/javascript" src="./validetta/validetta.min.js"></script>
		<script type="text/javascript" src="./validetta/validettaLang-es-ES.js"></script>  				
	    <script type="text/javascript" src="./materialize/js/materialize.min.js"></script>	    
		<link href="./confirm330/css/jquery-confirm.css" rel="stylesheet">
		<link href="./materialize/css/materialize.min.css" rel="stylesheet">	    
		<link href="./validetta/validetta.min.css" rel="stylesheet">		
	    <link href="./iconfont/material-icons.css" rel="stylesheet">    
	    <title>Editar sucursal</title>	
		<script type="text/javascript" src="./js/editarSucursal.js"></script>
	</head>
	<body>
		<div class="container">			
			<div class="row">
				<div class="col s12 center-align">
					<h3>Editar sucursal</h3>	
				</div>
			</div>									
			<div class="row">
				<form id="formulario">
					<div class="col s12 m6 offset-m3 input-field">					
						<select id="idSucursal" name="idSucursal" onchange="Carga();">
							<option value="" selected disabled>Escoger Sucursal</option>
							<?php echo $sucursales; ?>
						</select>
						<label>Sucursal</label>
					</div>
					<div class="col s12 m6 offset-m3 input-field" id="contenido">					
						
					</div>
		            <div class="col s6 m2 offset-m5 offset-s3 input-field">	            	
						<button type="submit" id="btnCambiar" class="btn" style="width: 100%" onclick="return Cambia();" disabled=""><i class="material-icons left">track_changes</i>Cambiar</button>				
					</div>
				</form>											
			</div>		
			
			<div class="row">
				<div class="col s1 offset-s11">
					<a class="btn-floating btn-large waves-effect waves-light" href="./sucursales.php"><i class="material-icons">keyboard_arrow_left</i></a>
				</div>			  
			</div>
		</div>
	</body>
</html>

<?php
			
		} else {
?>
<meta http-equiv="Refresh" content="0; url=./" />
<?php			
		}

	} else {
		
?>
<meta http-equiv="Refresh" content="0; url=./" />
<?php
	}

?>


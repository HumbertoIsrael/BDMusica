<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'administracion'){

			$sql = "select rfc, nombre from Proveedor;";
			
			$res = mysqli_query($conexion, $sql);
			$proveedores = "";
			while($tupla = mysqli_fetch_row($res)){
				$proveedores .= "<option value=\"$tupla[0]\">$tupla[1]</option>\n";
			}

			$sql = "select idProducto, nombre, precio from Producto;";
			
			$res = mysqli_query($conexion, $sql);
			$productos = "";
			while($tupla = mysqli_fetch_row($res)){
				$productos .= "<option value=\"$tupla[0];$tupla[2]\">$tupla[1]</option>\n";
			}

			?>
<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">	    
	    <meta name="viewport" content="width=device-width, initial-scale=1">	    	    
	    <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>	    
	    <script type="text/javascript" src="./confirm330/js/jquery-confirm.js"></script>				
	    <script type="text/javascript" src="./materialize/js/materialize.min.js"></script>
		<link href="./confirm330/css/jquery-confirm.css" rel="stylesheet">
		<link href="./materialize/css/materialize.min.css" rel="stylesheet">	    
	    <link href="./iconfont/material-icons.css" rel="stylesheet">
	    <link href="./validetta/validetta.min.css" rel="stylesheet">
		<script type="text/javascript" src="./validetta/validetta.min.js"></script>
		<script type="text/javascript" src="./validetta/validettaLang-es-ES.js"></script>	
		<script type="text/javascript" src="./js/nuevaCompra.js"></script>
	    <!--link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"-->
	    <title>Nueva compra</title>
	</head>
	<body>
	    <div class="container">
	    	
	    	<div class="row">
	    		<div class="col s12 center-align">
	    			<h3>Nueva compra</h3>
	    		</div>
	    	</div>
	    	
	    	<!--div class="input-field col s12">
	          <input disabled value="I am not editable" id="disabled" type="text" class="validate">
	          <label for="disabled">Disabled</label>
	        </div-->

	        <div class="row">
	        	<form id="formulario">
					<div class="input-field col s12 m6 offset-m3">
						<select id="idProveedor" name="idProveedor">							
							<?php echo $proveedores; ?>
						</select>
						<label>Proveedor</label>
					</div>						
					<div class="input-field col s12 m6 offset-m3">
						<select id="idProducto" name="idProducto" onchange="calcula();">			
							<?php echo $productos; ?>
						</select>
						<label>Proveedor</label>
					</div>
					<div class="input-field col s12 m6 offset-m3">
						<label for="cantidad">Cantidad</label>
		                <input type='number' id='cantidad' name='cantidad' data-validetta="required,number" oninput="calcula();" min="0" class="validate">
					</div>
					<div class="input-field col s12 m6 offset-m3">
						<label for="importe">Importe</label>
						<input disabled type="text" name="importe" id="importe" data-validetta="required" value="Sin calcular">
					</div>
					<div class="input-field col s12 m6 offset-m3">
						<button type="submit" id="btnCompra" class="btn" style="width: 100%" onclick="return rellena();">Comprar</button>
					</div>
					<input type="hidden" name="ahora" id="ahora">					
				</form>
			</div>
			<div class="row">				
				<div class="col s1 offset-s9">
					<a class="btn-floating btn-large waves-effect waves-light" href="./"><i class="material-icons">keyboard_arrow_left</i></a>
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
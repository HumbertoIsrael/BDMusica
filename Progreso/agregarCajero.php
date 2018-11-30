<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {		

		$modo = $_SESSION['modo'];

		if($modo == 'administracion'){					

			$sql = "select idSucursal, nombre from Sucursal;";			
			
			$res = mysqli_query($conexion, $sql);
			$sucurles = "";
			while($tupla = mysqli_fetch_row($res)){
				$sucurles .= "<option value=\"$tupla[0]\">$tupla[1]</option>\n";
			}		

			?>

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
		<script type="text/javascript" src="./js/agregarCajero.js"></script>
		<title>Nuevo Cajero</title>
	</head>
	<body>		
		<div class="container">

			<div class="row">
				<div class="col s12 center-align">
					<h3>Nuevo Cajero</h3>
				</div>				
			</div>
			

			<div class="row">
				<form id='formulario'>

					<div class="col s12 m4 offset-m1 input-field">
		                <label for="curp">RFC</label>
		                <input type='text' id='rfc' name='rfc' data-validetta="required,regExp[rfcExp]">
		            </div>

		            <div class="col s12 m4 offset-m2 input-field">
		                <label for="nombre">Nombre(s)</label>
		                <input type='text' id='nombre' name='nombre' data-validetta="required">
		            </div>

		            <div class="col s12 m4 offset-m1 input-field">
		                <label for="apPat">Apellido Paterno</label>
		                <input type='text' id='apPat' name='apPat' data-validetta="required">
		            </div>

		            <div class="col s12 m4 offset-m2 input-field">
		                <label for="apMat">Apellido Materno</label>
		                <input type='text' id='apMat' name='apMat' data-validetta="required">
		            </div>	           							

		            <div class="col s12 m4 offset-m1 input-field">
						<select id="idSucursal" name="idSucursal">		
							<?php echo $sucurles; ?>
						</select>
						<label>Sucursal</label>
					</div>		            		                
		                       			

		            <div class="col s12 m4 offset-m2 input-field">
		                <label for="tel">Teléfono</label>
		                <input type='text' id='tel' name='tel' data-validetta="required,number">
		            </div>	           					

		            <div class="col s12 m6 offset-m3 input-field">
		                <label for="dir">Dirección</label>
		                <input type='text' id='dir' name='dir' data-validetta="required">
		            </div>	

					<div class="col s12 m6 offset-m3 input-field">
	                    <button type="submit" id="btnCrear" class="btn" style="width: 100%">Registrar</button>
	                </div>						                
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


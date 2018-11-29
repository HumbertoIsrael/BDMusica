<?php

	session_start();

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'administracion'){
			
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
	    <title>Editar Gerente</title>	
		<script type="text/javascript" src="./js/editarGerente.js"></script>
	</head>
	<body>
		<div class="container">			
			<div class="row">
				<div class="col s12 center-align">
					<h3>Editar gerentes</h3>	
				</div>
			</div>									
			<div class="row">
				<form id="formulario">
					<div class="col s6 offset-s3 input-field">							
						<label for="rfc_in">RFC</label>
		                <input type="text" id="rfc_in" name = "rfc_in">
		            </div>
		            <div class="col s6 m2 offset-m5 offset-s3 input-field">	            	
						<button type="submit" id="btnBuscar" class="btn" style="width: 100%" onclick="return Busca();"><i class="material-icons left">search</i>Buscar</button>				
					</div>
				</form>											
			</div>
			<div class="row">
				<div class="col s12 center-align" id="contenido">
					
				</div>
			</div>
			<div class="row">
				<form id='formulario2'>

					<div class="col s12 m4 offset-m1 input-field">
		                <label for="curp">RFC</label>
		                <input type='text' disabled="" id='rfc' name='rfc' data-validetta="required,regExp[rfcExp]" value="<?php echo $rfc ?>">
		            </div>

		            <div class="col s12 m4 offset-m2 input-field">
		                <label for="nombre">Nombre(s)</label>
		                <input type='text' id='nombre' name='nombre' data-validetta="required" value="<?php echo $nombre ?>" disabled>
		            </div>

		            <div class="col s12 m4 offset-m1 input-field">
		                <label for="apPat">Apellido Paterno</label>
		                <input type='text' id='apPat' name='apPat' data-validetta="required" value="<?php echo $apPat ?>" disabled>
		            </div>

		            <div class="col s12 m4 offset-m2 input-field">
		                <label for="apMat">Apellido Materno</label>
		                <input type='text' id='apMat' name='apMat' data-validetta="required" value="<?php echo $apMat ?>" disabled>
		            </div>	           				
							         
					<div class="col s12 m4 offset-m1 input-field">
		                <label for="usuario">Usuario</label>
		                <input type='text' id='usuario' name='usuario' data-validetta="required" value="<?php echo $usuario ?>" disabled>
		            </div>	           						                       		

		            <div class="col s12 m4 offset-m2 input-field">
		                <label for="tel">Teléfono</label>
		                <input type='text' id='tel' name='tel' data-validetta="required,number" value="<?php echo $tel ?>" disabled>
		            </div>	           					

		            <div class="col s12 m6 offset-m3 input-field">
		                <label for="dir">Dirección</label>
		                <input type='text' id='dir' name='dir' data-validetta="required" value="<?php echo $dir ?>" disabled>
		            </div>	

					<div class="col s12 m6 offset-m3 input-field">
	                    <button type="submit" id="btnCrear" class="btn" style="width: 100%" disabled>Cambiar</button>
	                </div>						                

				</form>	
			</div>
			<div class="row">
				<div class="col s1 offset-s11">
					<a class="btn-floating btn-large waves-effect waves-light" href="./gerentes.php"><i class="material-icons">keyboard_arrow_left</i></a>
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


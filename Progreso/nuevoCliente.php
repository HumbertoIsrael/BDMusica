<?php

	session_start();

	if (isset($_SESSION['modo'])) {

		//entra aquí si hay alguna sesión con algún modo.

		$modo = $_SESSION['modo'];

		if($modo == 'caja'){
					
			//Aquí genera la página html.

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
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	    
	    <link href="./validetta/validetta.min.css" rel="stylesheet">
		<script type="text/javascript" src="./validetta/validetta.min.js"></script>
		<script type="text/javascript" src="./validetta/validettaLang-es-ES.js"></script>
		<script type="text/javascript" src="./js/nuevoCliente.js"></script>
		<title>Registro Socio</title>
	</head>
	<body>		
		<div class="container">

			<div class="row">
				<div class="col s12 center-align">
					<h3>Nuevo Socio</h3>
				</div>				
			</div>
			

			<div class="row">
				<form id='formulario' method='POST' action='subeCliente.php'>

					<div class="col s12 m6 offset-m3 input-field">
		                <label for="curp">CUPR</label>
		                <input type='text' id='curp' name='curp' data-validetta="required,regExp[curpExp]">
		            </div>

		            <div class="col s12 m6 offset-m3 input-field">
		                <label for="nombre">Nombre(s)</label>
		                <input type='text' id='nombre' name='nombre' data-validetta="required">
		            </div>

		            <div class="col s12 m6 offset-m3 input-field">
		                <label for="apPat">Apellido Paterno</label>
		                <input type='text' id='apPat' name='apPat' data-validetta="required">
		            </div>

		            <div class="col s12 m6 offset-m3 input-field">
		                <label for="apMat">Apellido Materno</label>
		                <input type='text' id='apMat' name='apMat' data-validetta="required">
		            </div>	           				
					
					<input type='hidden' id='expira' name='expira'>
					<input type='hidden' id='alta' name='alta'>
					<div class="col s12 m6 offset-m3 input-field">
	                    <button type="submit" id="btnCrear" class="btn" style="width: 100%" onclick="rellena();">Registrar</button>
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

			//Si no es administración, no debería de mostrarse el contenido.

			?>
<meta http-equiv="Refresh" content="0; url=./" />
			<?php
		}

	} else {
		//Tampoco si no hay sesión iniciada.

		?>
<meta http-equiv="Refresh" content="0; url=./" />
		<?php
	}

?>


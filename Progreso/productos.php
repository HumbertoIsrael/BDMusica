<?php

	session_start();

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'administracion'){
			?>
<!DOCTYPE html>
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
	    <title>Productos</title>
	</head>
	<body>
	    <div class="container">
			<div class="row">
				<div class="col s12 center-align">
					<h1>Productos</h1>	
				</div>
			</div>			
			<div class="row">
				<div class="col s12 m6 offset-m3 input-field">
		            <a href="agregarProducto.php" class="btn" style="width: 100%">Agrega Producto</a>
		        </div>
				<div class="col s12 m6 offset-m3 input-field">
		            <a href="editarProducto.php" class="btn" style="width: 100%">Editar Producto</a>
		        </div>					       
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

		
	//include("./configBD.php");
	//$sql1 = "select rfc, nombre, codigo from ganador where ";
	//$res = mysqli_query($conexion, $sql1);
	//while($tupla = mysqli_fetch_row($res)){

?>
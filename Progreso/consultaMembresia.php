<?php

	session_start();

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'consulta'){
			
?>

<html>
	<head>
		<meta charset="utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">	    
	    <meta name="viewport" content="width=device-width, initial-scale=1">	    	    
	    <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>	    
	    <script type="text/javascript" src="./confirm330/js/jquery-confirm.js"></script>				
	    <script type="text/javascript" src="./materialize/js/materialize.min.js"></script>
	    <script type="text/javascript" src="./js/consultaSucursales.js"></script>	    
		<link href="./confirm330/css/jquery-confirm.css" rel="stylesheet">
		<link href="./materialize/css/materialize.min.css" rel="stylesheet">	    
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	    
	    <title>Membresías</title>		
		<script type="text/javascript" src="./js/consultaMembresia.js"></script>
	</head>
	<body>
		<div class="container">			
			<div class="row">
				<div class="col s12 center-align">
					<h3>Consulta tu membresía</h3>	
				</div>
			</div>
			<br><br>
			<div class="row">
				<form id="formulario">
					<div class="col s6 offset-s3 input-field">							
						<label for="curp">CURP</label>
		                <input type="text" id="curp" name = "curp">
		            </div>
		            <div class="col s6 m2 offset-m5 offset-s3 input-field">	            	
						<button type="submit" id="btnBuscar" class="btn" style="width: 100%" onclick="return Busca();"><i class="material-icons left">search</i>Buscar</button>				
					</div>
				</form>											
			</div>
			<br><br>
			<div class="row">
				<div class="col s1 offset-s11">
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


<?php

	session_start();

	if (!isset($_SESSION['modo'])) {
		header("location:index.php");
		exit();
	}
	if ($_SESSION['modo'] != 'caja'){
		header("location:index.php");
		exit();
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
		<script type="text/javascript" src="./js/ventaMembresia.js"></script>
		<title>Venta de Membresía</title>
	</head>
	<body>		
		<div class="container">
			<div class="row">
				<div class="col s12 center-align">
					<h3>Venta de Membresía</h3>
				</div>				
			</div>
			<div class="row">
				<form id='formulario'>
					<div class="col s12 m6 offset-m3 input-field">
		                <label for="curp">CURP</label>
		                <input type='text' id='mem' name='curp' oninput="buscaMem();" data-validetta="required,regExp[curpExp]">
		            </div>
		            <div class="col s12 offset-m3" id="resultado">
		            </div>
		            <div class="col s12 offset-m3">
		            	<h5>Nueva Fecha de Expiración</h5>
		            </div>
		            <div class="col s2 offset-m3 input-field">
		            	<label for="anio">año</label>
		            	<input type='text' name='anio'>
		            </div>
		            <div class="col s2 input-field">
		            	<label for="mes">mes</label>
		            	<input type='text' name='mes'>
		            </div>
		            <div class="col s2  input-field">
		            	<label for="dia">Día</label>
		            	<input type='text' name='dia'>
		            </div>
					<input type='hidden' id='expira' name='expira'>
					<input type='hidden' id='alta' name='alta'>
					<div class="col s12 m6 offset-m3 input-field">
	                    <button type="submit" id="btnCrear" class="btn" style="width: 100%" onclick="return ampliarMem();">Ampliar Membresia</button>
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
<?php

	session_start();
	if(!isset($_SESSION['cajero'])){
		header("Location:index.php");
		exit();
	} 
?>

<html>
	<head>
	    <meta charset="utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <title>Mi Caja</title>
	    <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>	    
	    <script type="text/javascript" src="./confirm330/js/jquery-confirm.js"></script>				
	    <script type="text/javascript" src="./materialize/js/materialize.min.js"></script>
	    <script type="text/javascript" src="./js/inicioConsulta.js"></script>
		<link href="./confirm330/css/jquery-confirm.css" rel="stylesheet">
		<link href="./materialize/css/materialize.min.css" rel="stylesheet">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="./js/caja.js"></script>
	    <style>
	    	.content_cont,.left_nav{
				height:100vh;
				min-height:100vh;
				overflow: auto;
	    	}

	    	.sinPad{
	    		margin-bottom: 0px;
	    	}

	    	.content{
	    		width: 100%;
	    		height: 7%;
	    	}

	    	.articulos{
	    		height: 80%;
	    		border-radius: 5px;
	    		padding: 10px;
	    	}

	    	.finder{
	    		height: 10%;
	    	}
		    
		    .input-field label {
	    		color: rgb(255,255,255);
	   		}
	   		
	   		.input-field input[type=text]:focus {
			    border-bottom: 1px solid #9e9e9e;
				box-shadow: 0 1px 0 0 #9e9e9e;
			}

			.articulos_cont{
				height: 90%;
			}

			.articulos_tot{
				height: 10%;
			}
		</style>
	</head>

	<body>		
	<div class="container">
		<div class="row sinPad">
			<div class="col s3 left_nav grey lighten-4  z-depth-1">
				<h4>Caja</h4><h6>RFC : <?php echo $_SESSION["cajero"];?></h6>
				<div class="divider"></div>
				<div class="section">
					<div class="col s12 input-field">
						<a href="ventaMembresia.php"><button class="btn  cyan lighten-1" style="width: 100%">Venta de Membresía</button></a>
					</div>
					<div class="col s12 input-field">
						<a href="nuevoCliente.php"><button class="btn  cyan lighten-1" style="width: 100%">Agregar Socio</button></a>
					</div>
					<div class="col s12 input-field">
						<a href="cerrarMiCaja.php"><button class="btn teal darken-3" style="width: 100%">Cerrar Mi Caja</button></a>
					</div>
				</div>
			</div>
			<div class="col s9 content_cont grey lighten-3">
				<div class="content valign-wrapper">
					<h5>Articulos de la Venta<h5>
				</div>
				<div class="articulos grey lighten-5 z-depth-1">
					<div class="articulos_cont">
						<div class="row">
							<div class="col s8 valign-wrapper">
								<h6>Nombre de Articulo</h6>
							</div>
							<div class="col s2 valign-wrapper">
								<h6>Precio</h6>
							</div>
							<div class="col s2 valign-wrapper">
								
							</div>
						</div>
						<div class="divider"></div>
						
							<div class="col s8 valign-wrapper">
								<p>Donitas</p>
							</div>
							<div class="col s2 valign-wrapper">
								<p>$10</p>
							</div>
							<div class="col s2 valign-wrapper">
								<p>
								<button class="cyan darken-1 waves-effect waves-light btn" type="submit" name="action">Eliminar</button></p>
							</div>
						
					</div>

					<div class="articulos_tot">
						<div class="row">
							<div class="col s1">
								<h6>Socio:</h6>
							</div>
							<div class="col s3">
								<form method="post" id="form">
									<input id="membresia" type="text" placeholder="Membresía" oninput="buscaMem();">
								</form>
							</div>
							<div class="col s2" id="resultado">
							</div>
							<div class="col s2">
								<h6 style="float: right;">Total:</h6>
							</div>
							<div class="col s2 valign-wrapper">
								<h6>$21</h6>
							</div>
						</div>
					</div>
				</div>
				<div class="finder">
					<form class="s12">
						<div class="file-field input-field">
							<button class="cyan lighten-1 waves-effect waves-light btn" type="submit" name="action" onclick="agregarItem();">Agregar Item</button>
							<div class="file-path-wrapper">
								<input type="text" placeholder="Ingrese el codigo de barras aquí">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</body>
</html>
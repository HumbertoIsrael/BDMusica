<html>
	<head>
		<title>Inicio</title>
		<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script><script type="text/javascript" src="./confirm330/js/jquery-confirm.js"></script>				
	    <script type="text/javascript" src="./materialize/js/materialize.min.js"></script>
		<link href="./confirm330/css/jquery-confirm.css" rel="stylesheet">
		<link href="./materialize/css/materialize.min.css" rel="stylesheet">
		<script type="text/javascript" src="./js/index.js"></script>
	</head>
	<body>

<?php

	session_start();

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'consulta'){
			?>

		<div class="container">
			<div class="row">
				<div class="col s12 center-align">
					<h1>Consulta</h1>	
				</div>
			</div>			
			<div class="row">
				<div class="col s12 m6 offset-m3 input-field">
		            <a href="consultaInventario.php"><button class="btn" style="width: 100%">Inventario</button></a>
		        </div>
				<div class="col s12 m6 offset-m3 input-field">
		            <a href="consultaMembresia.php"><button class="btn" style="width: 100%">Membresía</button></a>
		        </div>
				<div class="col s12 m6 offset-m3 input-field">
		            <a href="consultaSucursales.php"  class="waves-effect waves-light btn" style="width: 100%">Sucursales</a>
		        </div>
		        <div class="col s12 m6 offset-m3 input-field">
		            <button class="waves-effect waves-light btn" style="width: 100%" onclick="terminarConsulta();" id="btnTerminar">Terminar Consultas</button>
		        </div>
		     </div>			
		</div>

			<?php
		} else if($tipo == 'caja'){
			echo 2;
		} else {
			echo 3;
		}

	} else {
		
		?>
		
		<div class="container">
			<div class="row">
				<div class="col s12 center-align">
					<h1>Inicio</h1>	
				</div>
			</div>			
			<div class="row">
				<div class="col s12 m6 offset-m3 input-field">
		            <a href="inicioConsulta.php"><button class="btn" style="width: 100%">Consulta</button></a>
		        </div>
				<div class="col s12 m6 offset-m3 input-field">
		            <a href="administracion.php"><button class="btn" style="width: 100%">Administración</button></a>
		        </div>
				<div class="col s12 m6 offset-m3 input-field">
		            <a href="inicioCaja.php"><button class="btn" style="width: 100%">Caja</button></a>
		        </div>		        
		     </div>			
		</div>
	
		<?php


	}

?>
	</body>
</html>
<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'consulta'){
			
				$sql = "select dir, nombre, tel from Sucursal;";
				$res = mysqli_query($conexion, $sql);
				$contenido = "";				
				while($tupla = mysqli_fetch_row($res)){

					$nombre = $tupla[1];
					$nombre_ = str_replace(" ", "_", $tupla[1]);
					$direccion = $tupla[0];
					$telefono = $tupla[2];

					$contenido .= 
			"<tr id='$nombre_' name='sucursales'> 
	    		<td>$nombre</td>
	    		<td>$direccion</td>
	    		<td>$telefono</td>
	    	</tr>\n";
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
	    <script type="text/javascript" src="./js/consultaSucursales.js"></script>	    
		<link href="./confirm330/css/jquery-confirm.css" rel="stylesheet">
		<link href="./materialize/css/materialize.min.css" rel="stylesheet">	    
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	    
	    <title>Sucursales</title>	    	    
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col s12 center-align">
					<h3>Sucursales</h3>	
				</div>
			</div>
			<div class="row">    			      
				<div class="input-field col s5">
          			<i class="material-icons prefix">search</i>
          			<label for="busqueda">Buscar</label>
          			<input id="busqueda" type="text" oninput="Busca();" >          			
        		</div>        
      		</div>  
		    
		    <div class="row">
			    <table>
			    	<tr>
			    		<th>Nombre</th>
			    		<th>Dirección</th>
			    		<th>Teléfono</th>
			    	</tr>
			    	<?php echo $contenido ?>
		    	</table>	    
		    </div>

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

?>


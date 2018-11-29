<?php

	session_start();
	include("./configBD.php");

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'administracion'){

			$sql = "select * from Venta";
			$res = mysqli_query($conexion, $sql);
			$contenido = "";		
			while($tupla = mysqli_fetch_row($res)){				
				$cajero_ = str_replace(" ", "_", $tupla[1]);				
				$socio_ = str_replace(" ", "_", $tupla[2]);				

				$contenido .= "				<tr id='$cajero_;$socio_' name='ventas'>";

				for($i = 0; $i < 5; $i++)
					$contenido .= "					<td>".$tupla[$i]."</td>\n";

				$contenido .= "<td><i class=\"material-icons\" onclick=\"Muestra($tupla[0]);\">remove_red_eye</i></td>\n";
				
    			$contenido .= "				</tr>\n";
    		}	
		
			?>

<!DOCTYPE html>
<html>
	<head>	
		<meta charset="utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">	    
	    <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>	    
	    <script type="text/javascript" src="./confirm330/js/jquery-confirm.js"></script>				
	    <script type="text/javascript" src="./materialize/js/materialize.min.js"></script>
		<link href="./confirm330/css/jquery-confirm.css" rel="stylesheet">
		<link href="./materialize/css/materialize.min.css" rel="stylesheet">
	    <meta name="viewport" content="width=device-width, initial-scale=1">		
		<script type="text/javascript" src="./js/consultaVentas.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title>Inventario</title>
	</head>
	<body>

		<div class="container">	
			<div class="row">
				<div class="col s12 center-align">
					<h3>Compras realizadas</h3>	
				</div>
			</div>
			<p>
			    <label>
			        <input name="criterio" type="radio" value="cajero" checked onchange="Cambia();" />
			        <span>Por cajero</span>
			    </label>
		    </p>
		    <p>	    
		      <label>
		        <input name="criterio" type="radio" value="socio" onchange="Cambia();" />
		        <span>Por Socio</span>
		      </label>
			    </p>
			<!--input type="radio" value="sucursal" name="donde" checked onchange ="Carga()"> Esta sucursal
			<input type="radio" value="todas" name="donde" onchange="Carga();"> Todas las sucursales.<br>
			Buscar por nombre : <input type="text" id="busqueda" oninput="Busca();"><br-->


			<div class="row">    			      
				<div class="input-field col s4">
          			<i class="material-icons prefix">search</i>
          			<label for="busqueda">Buscar</label>
          			<input id="busqueda" type="text" oninput="Busca();" >
        		</div>        
      		</div>    

      		<div class="row">
			    <table>
			    	<tr>
			    		<th>ID de venta</th>
			    		<th>Cajero</th>
			    		<th>Socio</th>
			    		<th>Fecha</th>
			    		<th>Importe</th>
			    		<th>Detalles</th>
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


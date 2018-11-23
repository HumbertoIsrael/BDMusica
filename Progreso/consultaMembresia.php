<?php

	session_start();

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'consulta'){
			
?>

<html>
	<head>
		<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript">
			function Busca(){

				$.ajax({
			        method:"post",
			        url:"consultaMembresiaBE.php",
			        data:$("#formulario").serialize(),                
			        success:function(resp){                                    	                	
			            $("#contenido").html( resp	);
			        }
			    });

				return false;
			}
		</script>
	</head>
	<body>
		<form id='formulario'>
			<h1>Consulta por CURP</h1>
			<input type="text" id="curp" name = "curp"><br>
			<button type="submit" onclick="return Busca();">Buscar</button>
		</form>
		<div id='contenido'>
			
		</div>
	</body>
</html>

<?php
			
		} else {
?>
<script>window.location = "index.php";</script>
<?php			
		}

	} else {
		
?>
<script>window.location = "index.php";</script>
<?php
	}

		
	//include("./configBD.php");
	//$sql1 = "select rfc, nombre, codigo from ganador where ";
	//$res = mysqli_query($conexion, $sql1);
	//while($tupla = mysqli_fetch_row($res)){

?>


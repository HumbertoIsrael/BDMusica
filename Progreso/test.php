<?php

	session_start();

	
?>
<html>
	<head>
	    <meta charset="utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <title>Caja</title>
	    <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>	    
	    <script type="text/javascript" src="./confirm330/js/jquery-confirm.js"></script>				
	    <script type="text/javascript" src="./materialize/js/materialize.min.js"></script>
	    <script type="text/javascript" src="./js/inicioConsulta.js"></script>
		<link href="./confirm330/css/jquery-confirm.css" rel="stylesheet">
		<link href="./materialize/css/materialize.min.css" rel="stylesheet">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<script>
			function buscaMem(){
				var mem = $("#mem").val();
				var url = "consultaMembresiaCaja.php";
				$.ajax({
					type: "POST",
					url: url,
					data: "curp="+mem,
					success:function(datos){
						$("#resultado").html(datos);
					}
				});
			}
		</script>
	</head>
	<body>
		<form id="form" method="post">
			<input type="text" id="mem" name="membresia" oninput="buscaMem();">
		</form>
		<div id="resultado"></div>
	</body>
</html>		
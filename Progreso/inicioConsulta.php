<?php

	session_start();

	if (isset($_SESSION['modo'])) {
		?>
<meta http-equiv="Refresh" content="0; url=./" />
		<?php

	} else {
?>

<html>
	<head>
	    <meta charset="utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <title>Inicio Consulta</title>
	    <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>	    
	    <script type="text/javascript" src="./confirm330/js/jquery-confirm.js"></script>				
	    <script type="text/javascript" src="./materialize/js/materialize.min.js"></script>
	    <script type="text/javascript" src="./js/inicioConsulta.js"></script>
		<link href="./confirm330/css/jquery-confirm.css" rel="stylesheet">
		<link href="./materialize/css/materialize.min.css" rel="stylesheet">
	    <meta name="viewport" content="width=device-width, initial-scale=1">	    	    
	</head>

	<body>		
	<div class="container">
		<div class="row">
			<form id='formulario'>
				<div class="col m6 offset-m3 center-align">
					<h1>Iniciar consulta</h1>
				</div>
				<div class="col s12 m6 offset-m3 input-field">
	                <label for="usuario">Usuario Gerente</label>
	                <input type="text" id="usuario" name="usuario" >
	            </div>
	            <div class="col s12 m6 offset-m3 input-field">
	                <label for="contra">Usuario Gerente</label>
	                <input type="password" id="contra" name="contra" >
	            </div>						

	            <div class="col s12 m6 offset-m3 input-field">
                    <button type="submit" id="btnLogin" class="btn" style="width: 100%" onclick="return login();">Iniciar</button>
                </div>				
			</form>
		</div>
	</div>
	</body>
</html>

<?php

	}

?>

<?php

	session_start();

	if (isset($_SESSION['modo'])) {		

		$modo = $_SESSION['modo'];

		if($modo == 'administracion'){							

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
		<script type="text/javascript" src="./js/agregarProducto.js"></script>
		<title>Nuevo Producto</title>
	</head>
	<body>		
		<div class="container">

			<div class="row">
				<div class="col s12 center-align">
					<h3>Nuevo Producto</h3>
				</div>				
			</div>
			

			<div class="row">
				<form id='formulario'>

					<div class="col s12 m4 offset-m1 input-field">
		                <label for="codigo">Código</label>
		                <input type='text' id='codigo' name='codigo' data-validetta="required,number">
		            </div>

		            <div class="col s12 m4 offset-m2 input-field">
		                <label for="nombre">Nombre</label>
		                <input type='text' id='nombre' name='nombre' data-validetta="required">
		            </div>

		            <div class="col s12 m4 offset-m1 input-field">
		                <label for="precio">Precio</label>
		                <input type='text' id='precio' name='precio' data-validetta="required,number">
		            </div>	 

		              
    				<div class="file-field input-field col s12 m4 offset-m2">
      					<div class="btn">
        					<span>Imagen</span>
        					<input type="file" id="imagen" name="imagen" data-validetta="required">
      					</div>
      					<div class="file-path-wrapper">
        					<input class="file-path validate" type="text">
      					</div>
    				</div>


    				<div class="col s12 m6 offset-m3">
      					<div class="row">
        					<div class="input-field col s12">
          						<textarea id="descripcion" name="descripcion" class="materialize-textarea" data-validetta="required"></textarea>
          						<label for="descripcion">Descripción</label>
        					</div>
      					</div>    
  					</div>
        
          							            

					<div class="col s12 m6 offset-m3 input-field">
	                    <button type="submit" id="btnCrear" class="btn" style="width: 100%">Registrar</button>
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


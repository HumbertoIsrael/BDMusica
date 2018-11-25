<?php

	session_start();

	if (isset($_SESSION['modo'])) {
		$tipo = $_SESSION['modo'];

		if($tipo == 'consulta'){
			?>

<html>
	<head>
		<title>Inicio</title>
		<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="./confirm330/js/jquery-confirm.js"></script>				
		<link href="./confirm330/css/jquery-confirm.css" rel="stylesheet">
		<script type="text/javascript">


			function aux(){
				return false;
			}

			function terminarConsulta(){				
				    $.confirm({
				        title: 'Seguridad requerida',
				        content: '' +
				        '<form action="chosto" class="formName" id = "formularioConsulta">' +
				        '<div class="form-group">' +
				        '<label>Ingrese su contraseña</label>' +
				        '<input type="password" placeholder="Contraseña" class="name form-control"  required id= "contra"/>' +
				        '</div>' +
				        '</form>',
				        buttons: {
				            formSubmit: {
				                text: 'Confirmar',
				                btnClass: 'btn-blue',
				                action: function () {
				                    var contra = $("#contra").val();				                   
				                    if(!contra){
					                    $.alert('No se puede dejar el campo vacío');
					                    return false;
					                }

					                $.ajax({
								        method:"post",
								        url:"terminarConsulta.php",
								        data: "contra="+contra,
								        success:function(resp){								       		
								        	if(resp == 1) window.location = 'index.php';
								        	else {
								        		$.alert("Contraseña incorrecta");
								        	}
								        }
					                });

					                return false;
				                    
				                }
				            },
				            cancel: function () {
				                //close
				            },
				        },
					    onContentReady: function () {
					        
					        var jc = this;
					        $("#formularioConsulta").on('submit', function (e) {					            
					            e.preventDefault();
					            jc.$$formSubmit.trigger('click'); // reference the button and click it
					        });
					    }			      
				    });
				/*$.ajax({
			        method:"post",
			        url:"terminarConsulta.php",
			        data: "contra=",
			        success:function(resp){                                    	                	
			            alert(resp);
			        }
			    })*/
				return false;
			}
		</script>
	</head>
	<body>
		<h1>Consulta</h1>
		<a href="consultaInventario.php">Inventario</a><br>
		<a href="consultaMembresia.php">Membresía</a><br>
		<a href="consultaSucursales.php">Sucursales</a><br>
		<a href="terminar.php" onclick="return terminarConsulta();"> Terminar consultas </a>
	</body>
</html>

			<?php
		} else if($tipo == 'caja'){
			echo 2;
		} else {
			echo 3;
		}

	} else {
		
		?>

<html>
	<head>
		<title>Inicio</title>
	</head>
	<body>
		<a href='inicioConsulta.php'>Consulta</a>
		<br>
		<a href='administracion.php'>Administración</a>
		<br>
		<a href='inicioCaja.php'>Caja</a>
	</body>
</html>
		<?php


	}

?>

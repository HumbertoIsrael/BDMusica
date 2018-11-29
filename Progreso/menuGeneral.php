<?php
session_start();

if (!isset($_SESSION['usuario']) || isset($_SESSION['modo'])) {
    ?>
    <meta http-equiv="Refresh" content="0; url=./" />
    <?php
} else {
    ?>
    <html>
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Menu General</title>
            <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>	    
            <script type="text/javascript" src="./confirm330/js/jquery-confirm.js"></script>				
            <script type="text/javascript" src="./materialize/js/materialize.min.js"></script>

            <link href="./confirm330/css/jquery-confirm.css" rel="stylesheet">
            <link href="./materialize/css/materialize.min.css" rel="stylesheet">
            <meta name="viewport" content="width=device-width, initial-scale=1">	    	    
        </head>
        <body>		
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
                        <a href="inicioAdmin.php"><button class="btn" style="width: 100%">Administración</button></a>
                    </div>
                    <div class="col s12 m6 offset-m3 input-field">
                        <a href="inicioCaja.php"><button class="btn" style="width: 100%">Caja</button></a>
                    </div>		        
                </div>			
            </div>
        </body>
    </html>

    <?php
}
?>
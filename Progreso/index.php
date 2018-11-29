<html>
    <head>
        <title>Inicio</title>
        <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script><script type="text/javascript" src="./confirm330/js/jquery-confirm.js"></script>             
        <script type="text/javascript" src="./materialize/js/materialize.min.js"></script>
        <link href="./confirm330/css/jquery-confirm.css" rel="stylesheet">
        <link href="./materialize/css/materialize.min.css" rel="stylesheet">
        <script type="text/javascript" src="./js/index.js"></script>
        <script type="text/javascript" src="./js/inicioSesion.js"></script>
    </head>
    <body>
        <?php
        session_start();

        if (isset($_SESSION['modo'])) {
            $tipo = $_SESSION['modo'];

            if ($tipo == 'consulta') {
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
            } else if ($tipo == 'caja') {
                if(isset($_SESSION['cajero'])){
                    header("Location:caja.php");
                }
                ?>
                <div class="container">
                    <div class="row">
                        <form id='formCajero'>
                            <div class="col m6 offset-m3 center-align">
                                <h1>Iniciar Caja</h1>
                            </div>
                            <div class="col s12 m6 offset-m3 input-field">
                                <label for="rfc">RFC</label>
                                <input type="text" id="rfc" name="rfc" >
                            </div>                  
                            <div class="col s12 m6 offset-m3 input-field">
                                <button type="submit" id="btnCajeroLogin" class="btn" style="width: 100%" onclick="return loginCajero();">Iniciar</button>
                            </div>              
                        </form>
                        <div class="col s12 m6 offset-m3 input-field">
                            <button class="waves-effect waves-light btn" style="width: 100%" onclick="terminarConsulta();" id="btnTerminar">Cerrar Caja</button>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col s12 center-align">
                            <h1>Administrador</h1>   
                        </div>
                    </div>          
                    <div class="row">
                        <div class="col s12 m6 offset-m3 input-field">
                            <a href=".php"><button class="btn" style="width: 100%">Sucursales</button></a>
                        </div>
                        <div class="col s12 m6 offset-m3 input-field">
                            <a href=".php"><button class="btn" style="width: 100%">Productos</button></a>
                        </div>
                        <div class="col s12 m6 offset-m3 input-field">
                            <a href=".php"><button class="btn" style="width: 100%">Proveedores</button></a>
                        </div>
                        <div class="col s12 m6 offset-m3 input-field">
                            <a href=".php"><button class="btn" style="width: 100%">Inventario</button></a>
                        </div>
                        <div class="col s12 m6 offset-m3 input-field">
                            <a href=".php"><button class="btn" style="width: 100%">Gerentes</button></a>
                        </div>
                        <div class="col s12 m6 offset-m3 input-field">
                            <a href=".php"><button class="btn" style="width: 100%">Cajeros</button></a>
                        </div>
                        <div class="col s12 m6 offset-m3 input-field">
                            <a href=".php"><button class="btn" style="width: 100%">Consulta de Compras</button></a>
                        </div>
                        <div class="col s12 m6 offset-m3 input-field">
                            <a href=".php"><button class="btn" style="width: 100%">Consulta de Ventas</button></a>
                        </div>
                        <div class="col s12 m6 offset-m3 input-field">
                            <a href=".php"><button class="btn" style="width: 100%">Nueva Compra</button></a>
                        </div>
                        <div class="col s12 m6 offset-m3 input-field">
                            <a href="cerrarSesion.php"><button class="btn cyan darken-3" style="width: 100%">Cerrar Sesión</button></a>
                        </div>
                    </div>          
                </div>
                <?php
            }
        } elseif (!isset($_SESSION['usuario'])) {
            ?>
            <div class="container">
                <div class="row">
                    <form id='formulario'>
                        <div class="col m6 offset-m3 center-align">
                            <h1>Iniciar Sesión</h1>
                        </div>
                        <div class="col s12 m6 offset-m3 input-field">
                            <label for="usuario">Usuario Gerente</label>
                            <input type="text" id="usuario" name="usuario" >
                        </div>
                        <div class="col s12 m6 offset-m3 input-field">
                            <label for="contra">Contraseña</label>
                            <input type="password" id="contra" name="contra" >
                        </div>                      

                        <div class="col s12 m6 offset-m3 input-field">
                            <button type="submit" id="btnLogin" class="btn" style="width: 100%" onclick="return login();">Iniciar</button>
                        </div>              
                    </form>
                </div>
            </div>
            <?php
        } else {
            header("location:menuGeneral.php");
        }
        ?>
    </body>
</html>
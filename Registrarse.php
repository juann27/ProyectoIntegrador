<html>
    <head>
        <title>Registrarse</title>
        <link rel="stylesheet" href="CSS/InicioSesion.css">
    </head>
    <body>
        <?php
            require_once './Extra/Header.php';
            require_once 'Conexion.php';
            require_once './Cliente.php';
            require_once 'Validaciones.php';
            
            $row = 0;
            $message = '';
            
            $tipoUsuario = $_POST['tipoUsuario'];
            
            
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nombre = $_POST["nombre"];
                $apellidoPaterno = $_POST["apellidoPaterno"];
                $apellidoMaterno = $_POST["apellidoMaterno"];
                $telefono = $_POST["telefono"];
                $direccion = $_POST["direccion"];
                $user = $_POST['usuario'];
                $pass = $_POST['contrasenia']; 
            }
            
            $validacion = new Validaciones();
            
            if($validacion->validarCamposCliente($nombre, $apellidoPaterno, $apellidoMaterno, $telefono, $direccion, $user, $pass) == true) {
                $tipoUsuario = $_POST['tipoUsuario'];
                if($tipoUsuario == 'Cliente') {
                    $conexion = new Conexion("localhost, 1433", "sa", "Password1234", "Proyecto");
                    $_conn = $conexion->abrirConexion();
                    
                    if($conexion->validarUsuarioExistente($_conn, "Usuario_Cliente", $user) == true ) {
                        $message =  '<span class=estiloError>Usuario ya existe</span>';
                    } else {
                        $objCliente = new Cliente($nombre, $apellidoPaterno, $apellidoMaterno, $telefono, $direccion, $user, $pass);
                        $id = $conexion->obtenerUltimoID($_conn, "id_cliente", "Cliente");

                        if($conexion->insertarCliente($_conn, $objCliente) == true) {
                            if($conexion->insertarUsuario($_conn, "Usuario_Cliente", $objCliente->getUsuarioCliente(), $objCliente->getUsuarioContrasenia(), $id) == true) {
                                $message =  '<span class=estiloAceptacion>Usuario creado</span>';
                            }
                        } else {
                            $message = '<span class=estiloError>No se pudo crear el usuario</span>';
                        }
                        sqlsrv_free_stmt($e, $f);  
                        sqlsrv_close($_conn); 
                    }
                } else {
                    
                }
            } else {
                $message = "<span class=estiloError>Favor de llenar todos los campos</span>";
            }
             
        ?>
        
        <section id="main-content">
            <br>
            <h1><b><p style="color:#333">Registrarse</p></h1></b>
        
            <?php if(!empty($message)):  ?>
            <p><?= $message ?></p>
            <?php endif;?>

            <form method="POST">
                <input type="text" name="nombre" placeholder="Ingresa tu nombre" value=""  />
                <input type="text" name="apellidoPaterno" placeholder="Ingresa tu apellido paterno" value="" />
                <input type="text" name="apellidoMaterno" placeholder="Ingresa tu apellido materno" value="" />
                <input type="text" name="telefono" placeholder="Ingresa tu telefono" value="" />
                <input type="text" name="direccion" placeholder="Ingresa tu direccion" value="" />
                <input type="text" name="usuario" placeholder="Ingresa tu usuario" value="" />
                <input type="password" name="contrasenia" placeholder="Ingresa tu contraseña" value="" />
                    <div class="caja">
                    <select name="tipoUsuario">
                        <option>Cliente</option>
                        <option>Empleado</option>
                    </select>
                    </div>
                <input type="submit" value="Enviar" name="enviar" />
            </form>
            <br>
        </section>
    </body>
</html>


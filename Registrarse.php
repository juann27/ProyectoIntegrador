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
            
            $row = 0;
            $message = '';
            
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nombre = $_POST["nombre"];
                $apellidoPaterno = $_POST["apellidoPaterno"];
                $apellidoMaterno = $_POST["apellidoMaterno"];
                $telefono = $_POST["telefono"];
                $direccion = $_POST["direccion"];
                $user = $_POST['usuario'];
                $pass = $_POST['contrasenia'];
                
                $objCliente = new Cliente($nombre, $apellidoPaterno, $apellidoMaterno, $telefono, $direccion, $user, $pass);
            }
            
            if(!empty($_POST["nombre"]) && !empty($_POST["apellidoPaterno"]) && !empty($_POST["apellidoMaterno"]) && !empty($_POST["telefono"]) && !empty($_POST["direccion"]) && !empty($_POST['usuario']) && !empty($_POST['contrasenia'])) {
                $tipoUsuario = $_POST['tipoUsuario'];
                if($tipoUsuario == 'Cliente') {
                    
                    $getNombre = $objCliente->getNombre();
                    $getApellidoPaterno = $objCliente->getApellidoPaterno();
                    $getApellidoMaterno = $objCliente->getApellidoMaterno();
                    $getTelefono = $objCliente->getTelefono();
                    $getDireccion = $objCliente->getDireccion();
                    
                    $query = "INSERT INTO Cliente VALUES ('".$getNombre."', '".$getApellidoPaterno."', '".$apellidoMaterno."', '".$getTelefono."', '".$getDireccion."')";
                    $consult = sqlsrv_query($_conn,"select MAX(id_cliente) FROM Cliente;");
                    
                    while($row = sqlsrv_fetch_array($consult)){
                       $id = $row[0];
                    }
                    
                    $getUsuario = $objCliente->getUsuarioCliente();
                    $getContrasenia = $objCliente->getUsuarioContrasenia();
                    
                    $query2 = "INSERT INTO Usuario_Cliente VALUES ('".$getUsuario."', '".$getContrasenia."', ($id+1))";
                    
                    $e = sqlsrv_prepare($_conn, $query);
                    $f = sqlsrv_prepare($_conn, $query2);
                    
                    if (sqlsrv_execute($e) === true) {
                        if (sqlsrv_execute($f) === true) {
                            $message =  '<span class=estiloAceptacion>Usuario creado</span>';
                        }
                    } else {
                        $message = '<span class=estiloError>No se pudo crear el usuario</span>';
                    }
                    sqlsrv_free_stmt($e, $f);  
                    sqlsrv_close($_conn); 
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


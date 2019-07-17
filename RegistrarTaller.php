<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php
            require_once 'Conexion.php';
            require_once 'Taller.php';
            require_once 'Validaciones.php';
            
            $row = 0;
            $message = '';
            
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nombreLocal = $_POST['nombre'];
                $telefono = $_POST['telefono'];
                $paginaWeb = $_POST['paginaWeb'];
                $direccion = $_POST['direccion'];
                $usuario = $_POST['usuario'];
                $password = $_POST['contrasenia'];  
            }
            
            $validacion = new Validaciones();
            
            if(($validacion->validarCamposTaller($nombreLocal, $telefono, $paginaWeb, $direccion, $usuario, $password)) == true) {
                $conexion = new Conexion("localhost,1433", "sa", "Password1234", "Proyecto");
                $_conn = $conexion->abrirConexion();
                
                if(($conexion->validarUsuarioExistente($_conn, "Usuario_Taller", $usuario)) == true) {
                    echo "Usuario existente";
                } else {
                    $objTaller = new Taller(null, $nombreLocal, $telefono, $paginaWeb, $direccion);
                    $id = $conexion->obtenerUltimoID($_conn, "id_taller", "Taller");
                    
                    if($conexion->insertarTaller($_conn, $objTaller) == true) {
                        if($conexion->insertarUsuario($_conn, "Usuario_Taller", $usuario, $password, $id) == true) {
                            echo 'Usuario agregado';
                        }
                    } else {
                        echo 'No se agregó';
                    }
                }
            } else {
                echo 'Lleno todos los campos';
            }
        ?>
        <form method="POST">
                <input type="text" name="nombre" placeholder="Ingresa el nombre" value=""  />
                <input type="text" name="telefono" placeholder="Ingresa el telefono" value="" />
                <input type="text" name="paginaWeb" placeholder="Ingresa la página web" value="" />
                <input type="text" name="direccion" placeholder="Ingresa tu direccion" value="" />
                <input type="text" name="usuario" placeholder="Ingresa tu usuario" value="" />
                <input type="password" name="contrasenia" placeholder="Ingresa tu contraseña" value="" />
                <input type="submit" value="Enviar" name="enviar" />
            </form>
    </body>
</html>


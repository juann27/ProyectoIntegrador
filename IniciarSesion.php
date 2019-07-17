<html>
    <head>
        <title>Iniciar sesión</title>
        <link rel="stylesheet" href="./CSS/InicioSesion.css">
    </head>
    <body>
        <?php
            require_once './Extra/Header.php';
            require_once 'Conexion.php';
        
            
            $message = '';

            $usuario = $_POST['usuario'];
            $password = $_POST['contrasenia'];

            if(!empty($_POST['usuario']) && !empty($_POST['contrasenia'])) {
                $conexion = new Conexion("localhost, 1433", "sa", "Password1234", "Proyecto");
                $_conn = $conexion->abrirConexion();
                
                $consultaCliente = sqlsrv_query($_conn, "SELECT * from Usuario_Cliente WHERE username = '".$usuario."' and pass = '".$password."'");
                $consultaTaller = sqlsrv_query($_conn, "SELECT * from Usuario_Taller WHERE username = '".$usuario."' and pass = '".$password."'");

                if(sqlsrv_fetch_array($consultaCliente)[0] > 0) {
                    session_start();
                    $_SESSION['cliente'] = $usuario;
                    header("Location: ./VistaCliente.php");
                } else if (sqlsrv_fetch_array($consultaTaller)[0] > 0) {
                    session_start();
                    $_SESSION['taller'] = $usuario;
                    header("Location: ./VistaTaller.php");
                } else {
                    $message = "<span class=estiloError>Usuario y/o contraseña es inválido</span>";
                }
                 
                sqlsrv_free_stmt($cliente, $taller);
                sqlsrv_close($_conn);
            } else {
                $message = '<span class=estiloError>Llene todos los campos</span>';
            }   
        ?>
        <section id="main-content">
            <br>
            <h1><b><p style="color:#333">Iniciar sesión</p></h1></b>
        
            <?php if(!empty($message)):  ?>
            <p><?= $message ?></p>
            <?php endif;?>
            
            <form method="POST">
                <input type="text" name="usuario" placeholder="Ingresa tu usuario" required="" autofocus="" value="" />
                <input type="password" name="contrasenia" placeholder="Ingresa tu contraseña" required="" value="" />
                <input type="submit" value="Enviar" name="enviar" />
            </form>
            <br>
        </section>
    </body>
</html>


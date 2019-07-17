<html>
    <head>
        <title>Iniciar sesión</title>
        <link rel="stylesheet" href="./CSS/InicioSesion.css">
    </head>
    <body>
        <?php
            require_once './Extra/Header.php';
            require_once 'Conexion.php';
        
            session_start();
            
            $message = '';

            $usuario = $_POST['usuario'];
            $password = $_POST['contrasenia'];

            if(!empty($_POST['usuario']) && !empty($_POST['contrasenia'])) {
                $consult = "SELECT * from Usuario_Cliente WHERE username = '".$usuario."' and pass = '".$password."'";
                $stmt= sqlsrv_query($_conn, $consult);
                $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC);
                $password = $row[0];
                
                if($row[0] > 0) {
                    
                    $_SESSION['cliente'] = $row[0];
                    header("Location: ./VistaCliente.php");
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


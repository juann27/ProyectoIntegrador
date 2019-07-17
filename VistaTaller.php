<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php
            require_once 'Conexion.php';
            
            session_start();
            if(isset($_SESSION['taller'])) {
                $conexion = new Conexion("localhost, 1433", "sa", "Password1234", "Proyecto");
                $_conn = $conexion->abrirConexion();
                $sql = "SELECT * FROM Usuario_Taller INNER JOIN Taller ON Usuario_Taller.id_taller = Taller.id_taller WHERE Usuario_Taller.username = '".$_SESSION['taller']."'";
                $stmt = sqlsrv_query($_conn, $sql);
                $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC);
                
                if($row[0] > 0) {
                   echo 'Bienvenido '. $row[5]; 
                   
                }
            }
        ?>
       <a href="./CerrarSesion.php">Cerrar sesión</a>
    </body>
</html>


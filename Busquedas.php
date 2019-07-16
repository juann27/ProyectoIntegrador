<html>
    <head>
        <title>Busquedas</title>
    </head>
    <body>
        <?php
            require 'Conexion.php';
        ?>
        <form method="POST">
            <input type="text" name="busqueda" value="" />
            <input type="submit" value="Enviar" name="enviar" />
        </form>
        
        <?php
            $busqueda = $_POST['busqueda'];
            if ($busqueda == "talleres") {
                $sql = "SELECT * FROM Talleres";
                $stmt = sqlsrv_query($conn, $sql);
                
                while ($_row=sqlsrv_fetch_array($_resultado)){
                    echo $row[0];
                }
            } else {
                $sql = "SELECT * FROM Servicios";
                $stmt = sqlsrv_query($conn, $sql);
                
                while ($_row=sqlsrv_fetch_array($_resultado)){
                    echo $row[0];
                }
            }
        ?>
    </body>
</html>



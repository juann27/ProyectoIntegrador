<html>
    <head>
        <title>Busquedas</title>
    </head>
    <body>
        <form method="POST">
            <input type="text" name="busqueda" value="" />
            <input type="submit" name="servicio" value="Servicio"/>
             <input type="submit" name="taller" value="Taller"/>
        </form>
        <?php
            require 'Conexion.php';
            
            $busqueda = $_POST['busqueda'];
            
            if (empty($busqueda)) {
                echo "";
            } else {
                if (isset($_POST['servicio'])) {
                    $sql = "SELECT * FROM Servicio WHERE descripcion like '%".$busqueda."%'";
                    $stmt = sqlsrv_query($_conn, $sql);

                    while ($_row=sqlsrv_fetch_array($stmt)){
                        echo $_row[2] . " ";
                        echo "<br>";
                    }
                } else {
                    $sql = "SELECT * FROM Taller WHERE nombre like '%".$busqueda."%'";
                    $stmt = sqlsrv_query($_conn, $sql);

                    while ($_row=sqlsrv_fetch_array($stmt)){
                        echo $_row[1] . " ";
                        echo "<br>";
                    }
                }
            }
            
            
                
            
            /*if ($busqueda == "talleres") {
                $sql = "SELECT * FROM Taller";
                $stmt = sqlsrv_query($_conn, $sql);
                
                while ($_row=sqlsrv_fetch_array($stmt)){
                    echo $_row[1] . " ";
                    echo $_row[2] . " ";
                    echo $_row[3] . " ";
                    echo $_row[4] . " ";
                    echo "<br>";
                }
            } else {
                $sql = "SELECT * FROM Servicio";
                $stmt = sqlsrv_query($_conn, $sql);
                
                while ($_row=sqlsrv_fetch_array($stmt)){
                    echo $_row[2] . " ";
                    echo "<br>";
                }
            }*/
        ?>
        
    </body>
</html>



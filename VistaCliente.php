<html>
    <head>
        <title>Vista Cliente</title>
        <link rel="stylesheet" href="CSS/InicioSesion.css">
    </head>
    <body>
        <?php
            
            require './Extra/HeaderCliente.php';
            require 'Conexion.php';
            
            session_start();
            
            $date = new DateTime('NOW');
            $fecha = $date->format('Y-m-d');
            $hora = $date->format('H:i');
            
            if(isset($_SESSION['cliente'])) {
                $conexion = new Conexion("localhost, 1433", "sa", "Password1234", "Proyecto");
                $_conn = $conexion->abrirConexion();
                
                //$sql = "SELECT * FROM Solicitud WHERE id_usuarioCliente = ".$_SESSION['cliente']."";
                $sql = "SELECT * FROM Usuario_Cliente INNER JOIN Cliente ON Usuario_Cliente.id_cliente = Cliente.id_cliente WHERE Usuario_Cliente.username = '".$_SESSION['cliente']."'";
                $stmt = sqlsrv_query($_conn, $sql);
                $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC);
                
                if($row[0] > 0) {
                    echo 'Bienvenido ' . $row[5];
                    echo '<br>';
                    
                    $sql2 = "select Servicio.descripcion, Carro.modelo, Marca.nombre, Fecha from Solicitud INNER JOIN Servicio_Taller on Solicitud.id_servicioTaller = Servicio_Taller.id_servicioTaller 
                    INNER JOIN Servicio on Servicio_Taller.id_servicio = Servicio.id_servicio INNER JOIN Carro on Solicitud.id_carro = Carro.id_carro 
                    INNER JOIN Marca on Carro.id_marca = Marca.id_marca WHERE Solicitud.id_usuarioCliente =  ".$row[0]."";
                    $stmt2 = sqlsrv_query($_conn, $sql2);
                    while ($_row=sqlsrv_fetch_array($stmt2)){
                        echo $_row[0] . " ";
                        echo $_row[1] . " ";
                        echo $_row[2] . " ";
                        echo $_row[3]->format("Y/m/d");
                    }
                    
                    
                }
            } else {
                echo 'no';
            }
            
            
            
            
        ?>
        
        <section id="main-content">
            <br>
            <h1><b><p style="color:#333">Cotizaciones</p></h1></b>
        
            <form action="Entrar.php" method="post">
                <input type="text" name="id_solicitud" placeholder="Solicitud">
                <div class="caja">
                <select name="estatus">
                    Estatus:<option>En proceso</option>
                </select>
                </div>
                <input type="text" name="opinion" placeholder="Opinion">
                <input type="submit" value="Enviar">
            </form>
            <br>
        </section>
        
    </body>
</html>
<html>
    <head>
        <title>Vista Cliente</title>
        <link rel="stylesheet" href="CSS/InicioSesion.css">
    </head>
    <body>
        <?php
            require './Extra/HeaderCliente.php';
            $date = new DateTime('NOW');
            $fecha = $date->format('Y-m-d');
            $hora = $date->format('H:i');
            
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
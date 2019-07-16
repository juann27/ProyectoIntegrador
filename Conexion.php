<?php
    $_serverName = "localhost,1433";
    $_userName = "sa";
    $_passwordName = "Password1234";
    $_dataBaseName = "Proyecto";

    $_connectionInfo = array('UID' =>$_userName , 'PWD' =>$_passwordName , 'Database' =>$_dataBaseName);
            
    $_conn = sqlsrv_connect($_serverName, $_connectionInfo);
    
    if($_conn === false) {
        echo "Conexión incorrecta<br>";
        die(print_r(sqlsrv_errors(),true));
    }
?>

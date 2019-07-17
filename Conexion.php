<?php
class Conexion {
    private $_serverName;
    private $_conn;
    private $_connectionInfo;
    
    public function __construct($_serverName, $_userName, $_passwordName, $_dataBaseName) {
        $this->_serverName = $_serverName;
        $this->_connectionInfo = array('UID' =>$_userName , 'PWD' =>$_passwordName , 'Database' =>$_dataBaseName);
    }
    
    public function abrirConexion () {
        $this->_conn = sqlsrv_connect($this->_serverName, $this->_connectionInfo);
        
        if($this->_conn === false) {
            echo "Conexión incorrecta<br>";
            die(print_r(sqlsrv_errors(),true));
        } else {
            return $this->_conn;
        } 
    }
    
    public function cerrarConexion() {
        sqlsrv_close($this->_conn);
    }
    
    public function validarUsuarioExistente($_conn, $nombreTabla, $usuario) {
        $sql = "SELECT * from $nombreTabla WHERE username = '".$usuario."'";
        $stmt= sqlsrv_query($_conn, $sql);
        $rows = sqlsrv_has_rows($stmt);
        $res = null;
        
        if ($stmt !== null) {
            if ($rows === true) {
                $res = true;
            } else {
                $res = false;
            }
        } 
        return $res;
    }
    
    public function insertarCliente($_conn, $objCliente) {
        $sql = "INSERT INTO Cliente VALUES ('".$objCliente->getNombre()."', '".$objCliente->getApellidoPaterno()."', "
                . "'".$objCliente->getApellidoMaterno()."', ".$objCliente->getTelefono().", ".$objCliente->getDireccion().")";
        
        $stmt = sqlsrv_query($_conn, $sql);
        $res = null;
        
        if (sqlsrv_execute($stmt) !== true) {
            $res = true;
        } else {
            $res = false;
        }
        return $res;
    }


    public function insertarTaller($_conn, $objTaller) {
        $sql = "INSERT INTO Taller VALUES ('".$objTaller->getNombreLocal()."', ".$objTaller->getTelefono().", "
                        . "'".$objTaller->getPaginaWeb()."', ".$objTaller->getDireccion().")";
        $stmt = sqlsrv_query($_conn, $sql);
        $res = null;
        
        if (sqlsrv_execute($stmt) !== true) {
            $res = true;
        } else {
            $res = false;
        }
        return $res;
    }
    
    public function obtenerUltimoID($_conn, $nombreCampo, $nombreTabla) {
        $sql = sqlsrv_query($_conn,"select MAX($nombreCampo) FROM $nombreTabla");
        while($row = sqlsrv_fetch_array($sql)){
            $id = $row[0];
        }
        return ($id) + 1;
    }
    
    public function insertarUsuario($_conn, $nombreTabla, $usuario, $password, $id) {
        $sql = "INSERT INTO $nombreTabla VALUES ('".$usuario."', '".$password."', $id)";
        $stmt = sqlsrv_query($_conn, $sql); 
        $res = null;
        
        if (sqlsrv_execute($stmt) !== true) {
            $res = true;
        } else {
            $res = false;
        }
        return $res;             
    }
}
?>

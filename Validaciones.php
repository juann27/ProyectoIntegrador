<?php
class Validaciones {
    
    public function __construct() {
        
    }
    
    public function validarCamposCliente($nombre, $ap, $am, $telefono, $direccion, $usuario, $password) {
        if(!empty($nombre) && !empty($ap) && !empty($am) && !empty($telefono) && !empty($direccion) && !empty($usuario) && !empty($password)) {
            return true;
        } else {
            return false;
        }  
    }
    
    public function validarCamposTaller($nombre, $telefono, $paginaWeb, $direccion, $usuario, $password) {
        if(!empty($nombre) && !empty($telefono) && !empty($paginaWeb) && !empty($direccion) && !empty($usuario) && !empty($password)) {
            return true;
        } else {
            return false;
        }
    }
}

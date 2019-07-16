<?php
require_once 'Persona.php';
class Cliente extends Persona {
    private $usuarioCliente;
    private $usuarioContrasenia;
    
    public function __construct($nombre, $ap, $am, $telefono, $direccion, $usuarioCliente,  $usuarioContrasenia) {
        parent::__construct($nombre, $ap, $am, $telefono, $direccion);
        $this->usuarioCliente = $usuarioCliente;
        $this->usuarioContrasenia =  $usuarioContrasenia;
    }
    
    function getUsuarioCliente() {
        return $this->usuarioCliente;
    }

    function getUsuarioContrasenia() {
        return $this->usuarioContrasenia;
    }

    function setUsuarioCliente($usuarioCliente) {
        $this->usuarioCliente = $usuarioCliente;
    }

    function setUsuarioContrasenia($usuarioContrasenia) {
        $this->usuarioContrasenia = $usuarioContrasenia;
    }
}

?>

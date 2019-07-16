<?php

class Taller {
    private $idTaller;
    private $nombreLocal;
    private $telefono;
    private $direccion;
    
    public function __construct($idTaller, $nombreLocal, $telefono, $direccion) {
        $this->idTaller = $idTaller;
        $this->nombreLocal = $nombreLocal;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
    }
    
    function getIdTaller() {
        return $this->idTaller;
    }

    function getNombreLocal() {
        return $this->nombreLocal;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function setIdTaller($idTaller) {
        $this->idTaller = $idTaller;
    }

    function setNombreLocal($nombreLocal) {
        $this->nombreLocal = $nombreLocal;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
}

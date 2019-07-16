<?php

class Empleado extends Persona {
    private $idEmpleado;
    private $salario;
    private $horasTrabajadas;
    private $idTaller;
    
    public function __construct($idEmpleado, $nombre, $ap, $am, $telefono, $direccion, $salario, $ht, $idTaller) {
        parent::__construct($nombre, $ap, $am, $telefono, $direccion);
        $this->idEmpleado = $idEmpleado;
        $this->salario = $salario;
        $this->horasTrabajadas = $ht;
        $this->idTaller = $idTaller;
    }
    
    function getIdEmpleado() {
        return $this->idEmpleado;
    }

    function getSalario() {
        return $this->salario;
    }

    function getHorasTrabajadas() {
        return $this->horasTrabajadas;
    }

    function getIdTaller() {
        return $this->idTaller;
    }

    function setIdEmpleado($idEmpleado) {
        $this->idEmpleado = $idEmpleado;
    }

    function setSalario($salario) {
        $this->salario = $salario;
    }

    function setHorasTrabajadas($horasTrabajadas) {
        $this->horasTrabajadas = $horasTrabajadas;
    }

    function setIdTaller($idTaller) {
        $this->idTaller = $idTaller;
    }
}

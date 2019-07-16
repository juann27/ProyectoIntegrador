<?php

class Carro {
    private $matricula;
    private $marca;
    private $modelo;
    private $color;
    private $test;
    
    public function __construct($matricula, $marca, $modelo, $color) {
        $this->matricula = $matricula;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
    }
    
    function getMatricula() {
        return $this->matricula;
    }

    function getMarca() {
        return $this->marca;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getColor() {
        return $this->color;
    }

    function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    function setColor($color) {
        $this->color = $color;
    }
}

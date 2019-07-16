<?php

class Cita {
    private $idCita;
    private $estatus;
    private $cliente;
    private $taller;
    private $fecha;
    private $hora;
    private $servicio;
    private $totalPago;
    
    public function __construct($idCita, $estatus, $cliente, $taller, $fecha, $hora, $servicio, $totalPago) {
        $this->idCita = $idCita;
        $this->estatus = $estatus;
        $this->cliente = $cliente;
        $this->taller = $taller;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->servicio = $servicio;
        $this->totalPago = $totalPago;
    }
    
    function getIdCita() {
        return $this->idCita;
    }

    function getEstatus() {
        return $this->estatus;
    }

    function getCliente() {
        return $this->cliente;
    }

    function getTaller() {
        return $this->taller;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function getServicio() {
        return $this->servicio;
    }

    function getTotalPago() {
        return $this->totalPago;
    }

    function setIdCita($idCita) {
        $this->idCita = $idCita;
    }

    function setEstatus($estatus) {
        $this->estatus = $estatus;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    function setTaller($taller) {
        $this->taller = $taller;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setServicio($servicio) {
        $this->servicio = $servicio;
    }

    function setTotalPago($totalPago) {
        $this->totalPago = $totalPago;
    }           
}

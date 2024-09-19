<?php

class Vehiculo{
    private $idvehiculos;
    private $patente;
    private $chasis;
    private $motor;
    private $año;
    private $modelos_idmodelos;

    public function __construct($idvehiculos='',$patente='',$chasis='',$motor='',$año='',$modelos_idmodelos='') {
        $this->idvehiculos = $idvehiculos;
        $this->patente = $patente;
        $this->chasis = $chasis;
        $this->motor = $motor;
        $this->año = $año;
        $this->modelos_idmodelos = $modelos_idmodelos;
    }
}
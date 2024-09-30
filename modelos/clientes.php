<?php

/**
 * Summary of Cliente
 */
class Cliente{
    private $idclientes;
    private $descripcion;

    public function __construct($idclientes='', $descripcion='') {
        $this->idclientes = $idclientes;
        $this->descripcion = $descripcion;
    }

    public function traer_todos_los_clientes(){
        $conexion = new Conexion();
        $query = "SELECT *";
    }
}
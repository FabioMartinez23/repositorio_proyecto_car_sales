<?php 

require_once('conexion.php');

class Fichas_Tenicas{
    private $idficha_tecnica;
    private $descripcion_carroceria;
    private $estado_bateria;
    private $año_bateria;
    private $descripcion_neumatico;
    private $año_neumatico;
    private $vencimiento_RTO;
    private $vehiculos_idvehiculos;

    public function __construct($idficha_tecnica='', $descripcion_carroceria='', $estado_bateria='', $año_bateria='', $descripcion_neumatico='', $año_neumatico='', $vencimiento_RTO='', $vehiculos_idvehiculos='') {
        $this->idficha_tecnica = $idficha_tecnica;
        $this->descripcion_carroceria = $descripcion_carroceria;
        $this->estado_bateria = $estado_bateria;
        $this->año_bateria =$año_bateria;
        $this->descripcion_neumatico = $descripcion_neumatico;
        $this->año_neumatico = $año_neumatico;
        $this->vencimiento_RTO = $vencimiento_RTO;
        $this->vehiculos_idvehiculos = $vehiculos_idvehiculos;
    }



    public function agregar_ficha_tecnica(){
        $conexion = new Conexion();
        $query = "INSERT INTO ficha_tecnica (descripcion_carroceria, estado_bateria, año_bateria, descripcion_neumatico, año_neumatico, vencimiento_RTO, vehiculos_idvehiculos) VALUES ('$this->descripcion_carroceria','$this->estado_bateria','$this->año_bateria','$this->descripcion_neumatico','$this->año_neumatico','$this->vencimiento_RTO','$this->vehiculos_idvehiculos')";
        return $conexion->insertar($query);
    }

    public function actualizar_ficha_tecnica(){
        $conexion = new Conexion();
        $query = "UPDATE ficha_tecnica SET descripcion_carroceria = '$this->descripcion_carroceria', estado_bateria = '$this->estado_bateria', año_bateria = '$this->año_bateria', descripcion_neumatico = '$this->descripcion_neumatico', año_neumatico = '$this->año_neumatico', vencimiento_RTO = '$this->vencimiento_RTO' WHERE idvehiculos = '$this->idficha_tecnica'";
        return $conexion->actualizar($query);
    }

    public function traer_fichas_tecnicas(){
        $conexion = new Conexion();
        $query = "SELECT ficha_tecnica.*, vehiculos.*, marcas.nombre as nombre_marca, modelos.nombre as nombre_modelo FROM ficha_tecnica INNER JOIN vehiculos on ficha_tecnica.vehiculos_idvehiculos = vehiculos.idvehiculos INNER JOIN modelos on modelos.idmodelos = vehiculos.modelos_idmodelos INNER JOIN marcas on marcas.idmarcas = modelos.marcas_idmarcas";
        return $conexion->consultar($query);
    }

    /**
     * Get the value of idficha_tecnica
     */ 
    public function getIdficha_tecnica()
    {
        return $this->idficha_tecnica;
    }

    /**
     * Set the value of idficha_tecnica
     *
     * @return  self
     */ 
    public function setIdficha_tecnica($idficha_tecnica)
    {
        $this->idficha_tecnica = $idficha_tecnica;

        return $this;
    }

    /**
     * Get the value of descripcion_carroceria
     */ 
    public function getDescripcion_carroceria()
    {
        return $this->descripcion_carroceria;
    }

    /**
     * Set the value of descripcion_carroceria
     *
     * @return  self
     */ 
    public function setDescripcion_carroceria($descripcion_carroceria)
    {
        $this->descripcion_carroceria = $descripcion_carroceria;

        return $this;
    }

    /**
     * Get the value of estado_bateria
     */ 
    public function getEstado_bateria()
    {
        return $this->estado_bateria;
    }

    /**
     * Set the value of estado_bateria
     *
     * @return  self
     */ 
    public function setEstado_bateria($estado_bateria)
    {
        $this->estado_bateria = $estado_bateria;

        return $this;
    }

    /**
     * Get the value of año_bateria
     */ 
    public function getAño_bateria()
    {
        return $this->año_bateria;
    }

    /**
     * Set the value of año_bateria
     *
     * @return  self
     */ 
    public function setAño_bateria($año_bateria)
    {
        $this->año_bateria = $año_bateria;

        return $this;
    }

    /**
     * Get the value of descripcion_neumatico
     */ 
    public function getDescripcion_neumatico()
    {
        return $this->descripcion_neumatico;
    }

    /**
     * Set the value of descripcion_neumatico
     *
     * @return  self
     */ 
    public function setDescripcion_neumatico($descripcion_neumatico)
    {
        $this->descripcion_neumatico = $descripcion_neumatico;

        return $this;
    }

    /**
     * Get the value of año_neumatico
     */ 
    public function getAño_neumatico()
    {
        return $this->año_neumatico;
    }

    /**
     * Set the value of año_neumatico
     *
     * @return  self
     */ 
    public function setAño_neumatico($año_neumatico)
    {
        $this->año_neumatico = $año_neumatico;

        return $this;
    }

    /**
     * Get the value of vencimiento_RTO
     */ 
    public function getVencimiento_RTO()
    {
        return $this->vencimiento_RTO;
    }

    /**
     * Set the value of vencimiento_RTO
     *
     * @return  self
     */ 
    public function setVencimiento_RTO($vencimiento_RTO)
    {
        $this->vencimiento_RTO = $vencimiento_RTO;

        return $this;
    }

    /**
     * Get the value of vehiculos_idvehiculos
     */ 
    public function getVehiculos_idvehiculos()
    {
        return $this->vehiculos_idvehiculos;
    }

    /**
     * Set the value of vehiculos_idvehiculos
     *
     * @return  self
     */ 
    public function setVehiculos_idvehiculos($vehiculos_idvehiculos)
    {
        $this->vehiculos_idvehiculos = $vehiculos_idvehiculos;

        return $this;
    }
}

?>
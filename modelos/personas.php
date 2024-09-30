<?php

require_once('conexion.php');

class Persona{
    private $idpersonas;
    private $nombre;
    private $apellido;
    private $fecha_nacimiento;
    private $tipo_sexo_idtipo_sexo;

    public function __construct($idpersonas='', $nombre='', $apellido='', $fecha_nacimiento='', $tipo_sexo_idtipo_sexo='') {
        $this->idpersonas = $idpersonas;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->tipo_sexo_idtipo_sexo = $tipo_sexo_idtipo_sexo;
    }

    public function agregar_persona(){
        $conexion = new Conexion();
        $query = "INSERT INTO personas (nombre, apellido, fecha_nacimiento, tipo_sexo_idtipo_sexo) VALUES ('$this->nombre','$this->apellido','$this->fecha_nacimiento','$this->tipo_sexo_idtipo_sexo')";
        // Insertamos y obtenemos el ID generado para usarlo en usuarios
        $this->idpersonas = $conexion->insertar($query);
        return $this->idpersonas;
    }

    public function actualizar_persona(){
        $conexion = new Conexion();
        $query = "UPDATE personas SET nombre = '$this->nombre', apellido = '$this->apellido', fecha_nacimiento = '$this->fecha_nacimiento', tipo_sexo_idtipo_sexo = '$this->tipo_sexo_idtipo_sexo' WHERE idpersonas = '$this->idpersonas'";
        return $conexion->actualizar($query);
    }

    public function eliminar_persona(){
        $conexion = new Conexion();
        $query = "UPDATE personas SET activo_persona = 0 WHERE idpersonas = '$this->idpersonas'";
        return $conexion->actualizar($query);
    }

    public function traer_personas(){
        $conexion = new Conexion();
        $query = "SELECT * FROM personas";
        return $conexion->consultar($query);
    }

    /**
     * Get the value of idpersonas
     */ 
    public function getIdpersonas()
    {
        return $this->idpersonas;
    }

    /**
     * Set the value of idpersonas
     *
     * @return  self
     */ 
    public function setIdpersonas($idpersonas)
    {
        $this->idpersonas = $idpersonas;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of fecha_nacimiento
     */ 
    public function getFecha_nacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * Set the value of fecha_nacimiento
     *
     * @return  self
     */ 
    public function setFecha_nacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;

        return $this;
    }

    /**
     * Get the value of tipo_sexo_idtipo_sexo
     */ 
    public function getTipo_sexo_idtipo_sexo()
    {
        return $this->tipo_sexo_idtipo_sexo;
    }

    /**
     * Set the value of tipo_sexo_idtipo_sexo
     *
     * @return  self
     */ 
    public function setTipo_sexo_idtipo_sexo($tipo_sexo_idtipo_sexo)
    {
        $this->tipo_sexo_idtipo_sexo = $tipo_sexo_idtipo_sexo;

        return $this;
    }


}

/*$new_persona = new Persona();
$new_persona->setNombre('Fulanito');
$new_persona->setApellido('Mendez');
$new_persona->setFecha_nacimiento('26-01-1994');
$new_persona->setTipo_sexo_idtipo_sexo('1');
$new_persona->agregar_persona();
$personas_idpersonas = $new_persona->getIdpersonas();

if (isset($personas_idpersonas)){
    echo 'Existe la persona con el id: '.$personas_idpersonas;
    return;
}else{
    var_dump($new_persona);
    echo 'error al cargar';
}*/
<?php

ini_set('display_errors', 1);
require_once('../../modelos/ficha_tecnica.php');

if(isset($_POST['action'])){
    if ($_POST['action'] == 'guardar'){
        $usuario_controlador = new Ficha_TecnicaControlador();
        $usuario_controlador->guardar();
    }
}


class Ficha_TecnicaControlador {

    public function guardar(){

        if(empty($_POST['descripcion_carroceria']) || empty($_POST['estado_bateria']) || empty($_POST['año_bateria']) || empty($_POST['descripcion_neumatico']) || empty($_POST['año_neumatico']) || empty($_POST['vencimiento_RTO']) || empty($_POST['vehiculos_idvehiculos'])){
            header('location: ../../index.php?page=listado_vehiculos&mensaje=Todos los datos obligarios.&status=danger');
        }
        $ficha_tecnica = new Fichas_Tenicas();
        $ficha_tecnica->setDescripcion_carroceria($_POST['descripcion_carroceria']);
        $ficha_tecnica->setEstado_bateria($_POST['estado_bateria']);
        $ficha_tecnica->setAño_bateria($_POST['año_bateria']);
        $ficha_tecnica->setDescripcion_neumatico($_POST['descripcion_neumatico']);
        $ficha_tecnica->setAño_neumatico($_POST['año_neumatico']);
        $ficha_tecnica->setVencimiento_RTO($_POST['vencimiento_RTO']);
        $ficha_tecnica->setVehiculos_idvehiculos($_POST['vehiculos_idvehiculos']);
        $ficha_tecnica->agregar_ficha_tecnica();
        header('location: ../../index.php?page=listado_ficha_tecnica&mensaje=Ficha Tecnica registrada correctamente.&status=success');
    }
}
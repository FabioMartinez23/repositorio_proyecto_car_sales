<?php

ini_set('display_errors', 1);

$total_registros = 0;

$vehiculo = new Vehiculos();
$todos_vehiculos = $vehiculo->traer_todos_vehiculos();

if(isset($_GET['idvehiculos'])){
    $vehiculo_editar = $vehiculo->traer_vehiculos_por_id($_GET['idvehiculos']);
}

$vehiculos = new Vehiculos();
$result_vehiculos_ = $vehiculos->traer_cantidad_vehiculo();
foreach($result_vehiculos_ as $vehiculo_1){
    $total_registros = $vehiculo_1['total'];
}
if (isset($_GET['pagina_actual'])){
    $vehiculos->pagina_actual = $_GET['pagina_actual'];
}
$result_vehiculos = $vehiculos->traer_vehiculos();

$color = new Colores();
$result_color = $color->traer_color();

$marca = new Marcas();
$result_marca = $marca->traer_marca();

$tipo_vehiculo = new Tipo_Vehiculos();
$result_tipo_vehiculo = $tipo_vehiculo->traer_tipo_vehiculo();

?>

<div class="container">
    <div class="row">
        <div class="col">
        <h2>Registrar Vehiculo</h2>
            <form method="POST" action="controladores/vehiculos/vehiculos.controlador.php">
            <?php if(isset($_GET['idvehiculos'])){ ?>
            <input type="hidden" name="action" value="actualizar"/>
            <input type="hidden" name="idvehiculos" value="<?= $_GET['idvehiculos'] ?>"/>
            <?php }else{?>
                <input type="hidden" name="action" value="guardar"/>

            <?php }?>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Patente</label>
                    <input <?php if(isset($_GET['idvehiculos'])){ foreach($vehiculo_editar as $vehiculo){ echo "value=".$vehiculo['patente'];}} ?> type="text" name="patente" onfocusout="validate_patente(event)" class="form-control" id="id_patente" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Chasis</label>
                    <input <?php if(isset($_GET['idvehiculos'])){ foreach($vehiculo_editar as $vehiculo){ echo "value=".$vehiculo['chasis'];}} ?> type="text" name="chasis" class="form-control" id="id_chasis" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Motor</label>
                    <input <?php if(isset($_GET['idvehiculos'])){ foreach($vehiculo_editar as $vehiculo){ echo "value=".$vehiculo['motor'];}} ?> type="text" name="motor" class="form-control" id="id_motor" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Año</label>
                    <input <?php if(isset($_GET['idvehiculos'])){ foreach($vehiculo_editar as $vehiculo){ echo "value=".$vehiculo['año'];}} ?> type="text" name="año" class="form-control" id="id_año" aria-describedby="emailHelp" min="1960" max="2024" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">kilometraje</label>
                    <input <?php if(isset($_GET['idvehiculos'])){ foreach($vehiculo_editar as $vehiculo){ echo "value=".$vehiculo['kilometraje'];}} ?> type="text" name="kilometraje" class="form-control" id="id_kilometraje" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="disabledSelect" class="form-label">Color</label>
                    <select name="colores_idcolores" id="idcolores" class="form-select">
                        <option value="">Seleccione un Color</option>
                    <?php
                        foreach($result_color as $color){
                    ?>
                        <option value="<?php echo $color['idcolores']?>"><?php echo $color['descripcion']?></option>
                    <?php
                        }
                    ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="disabledSelect" class="form-label">Marca</label>
                    <select name="idmarcas" id="idmarcas" onchange="validar_marca(this.value)" class="form-select">
                        <option value="">Seleccione una Marca</option>
                    <?php
                        foreach($result_marca as $marca){
                    ?>
                        <option value="<?php echo $marca['idmarcas']?>"><?php echo $marca['nombre']?></option>
                    <?php
                        }
                    ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="disabledSelect" class="form-label">Modelo</label>
                    <select name="modelos_idmodelos" id="idmodelos" class="form-select">
                        <option value="">Seleccione un Modelo</option>
                    <!-- Aqui iría la respuesta de ajax -->
                    </select>
                </div>

                <div class="mb-3">
                    <label for="disabledSelect" class="form-label">Tipo</label>
                    <select name="tipo_vehiculos_idtipo_vehiculos" id="idtipo_vehiculos" class="form-select">
                        <option value="">Seleccione un Tipo</option>
                    <?php
                        foreach($result_tipo_vehiculo as $tipo_vehiculo){
                    ?>
                        <option value="<?php echo $tipo_vehiculo['idtipo_vehiculos']?>"><?php echo $tipo_vehiculo['nombre']?></option>
                    <?php
                        }
                    ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Guardar
                </button>
            </form>
        </div>
        <div class="col">
        </div>
        <div class="col">
        </div>
    </div>
</div>

<script src="assets/js/validaciones/patente.js"></script>
<script src="assets/js/validaciones/validar_marca.ajax.js"></script>



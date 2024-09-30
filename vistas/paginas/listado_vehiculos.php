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

$modelo = new Modelos_Vehiculos();
$result_modelo = $modelo->traer_modelos();

$tipo_vehiculo = new Tipo_Vehiculos();
$result_tipo_vehiculo = $tipo_vehiculo->traer_tipo_vehiculo();


?>

    <!-- Modal de Ficha Técnica -->
    <div class="modal fade" id="fichaTecnicaModal" tabindex="-1" aria-labelledby="fichaTecnicaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fichaTecnicaModalLabel">Ficha Técnica del Vehículo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3 id="marcaModeloVehiculo"></h3> <!-- Aquí se mostrará la marca y modelo -->

                    <form id="nuevo-vehiculo-form" method="POST" action="controladores/ficha_tecnica/ficha_tecnica.controlador.php">
                        <input type="hidden" name="action" value="guardar">
                        <input type="hidden" name="vehiculos_idvehiculos" id="vehiculos_idvehiculos"> <!-- Campo oculto para el id del vehículo -->
                        
                        <!-- Revisión Técnica -->
                        <h2 class="mb-3">Revisión Técnica</h2>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="id_descripcion_carroceria" class="form-label">Descripción de la Carrocería:</label>
                                <input type="text" id="id_descripcion_carroceria" name="descripcion_carroceria" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="id_estado_bateria" class="form-label">Estado de la Batería:</label>
                                <input type="text" id="id_estado_bateria" name="estado_bateria" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="id_año_bateria" class="form-label">Año de la Batería:</label>
                                <input type="number" id="id_año_bateria" name="año_bateria" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="id_descripcion_neumatico" class="form-label">Descripción de los Neumáticos:</label>
                                <input type="text" id="id_descripcion_neumatico" name="descripcion_neumatico" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="id_año_neumatico" class="form-label">Año de los Neumáticos:</label>
                                <input type="number" id="id_año_neumatico" name="año_neumatico" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="id_vencimiento_RTO" class="form-label">Vencimiento de la RTO:</label>
                                <input type="date" id="id_vencimiento_RTO" name="vencimiento_RTO" class="form-control">
                            </div>
                        </div>

                        <!-- Foto del Vehículo -->
                        <div class="mb-3">
                            <label for="id_foto_vehiculo" class="form-label">Fotos del Vehículo:</label>
                            <input type="file" id="id_foto_vehiculo" name="foto_vehiculo" class="form-control">
                        </div>

                        <!-- Botón de Enviar -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Guardar Datos</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <div class="col">
        <h2>Listado de Vehiculos</h2>      
        <table class="table table-striped">
            <thead>
                <tr>
                <th>Patente</th>
                <th>Chasis</th>
                <th>Motor</th>
                <th>Año</th>
                <th>Kilometraje</th>
                <th>Color</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Tipo</th>
                <th>Ficha Tecnica</th>
                <th>Modificar</th>
                <th>Eliminar</th>
                <th>Ver</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($result_vehiculos as $vehiculo_){
                ?>
                <tr>
                <td><?= $vehiculo_['patente']; ?></td>
                <td><?= $vehiculo_['chasis']; ?></td>
                <td><?= $vehiculo_['motor']; ?></td>
                <td><?= $vehiculo_['año']; ?></td>
                <td><?= $vehiculo_['kilometraje']; ?></td>
                <td><?= $vehiculo_['nombre_color']; ?></td>
                <td><?= $vehiculo_['nombre_marca']; ?></td>
                <td><?= $vehiculo_['nombre_modelo']; ?></td>
                <td><?= $vehiculo_['nombre_tipo']; ?></td>
                <td>
                <!-- Botón para abrir el modal, con los datos de marca y modelo -->
                    <a title="Agregar Ficha" href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fichaTecnicaModal" data-marca="<?= $vehiculo_['nombre_marca']; ?>" data-modelo="<?= $vehiculo_['nombre_modelo']; ?>" data-idvehiculo="<?= $vehiculo_['idvehiculos']; ?>">
                        <i class="fa-solid fa-gears"></i>
                    </a>
                </td>

                <td>
                    <a href="index.php?page=registrar_vehiculos&idvehiculos=<?=$vehiculo_['idvehiculos']; ?>" class="btn btn-success" type="button" title="Modificar Auto">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>
                <td>
                    <form id="formEliminarVehiculo" method="POST" action="controladores/vehiculos/vehiculos.controlador.php">
                        <input type="hidden" name="action" value="eliminar">
                        <input type="hidden" name="idvehiculos" value="<?= $vehiculo_['idvehiculos'] ?>">
                        <button onclick="confirmarAccion(event, 'eliminar', 'formEliminarVehiculo')" class="btn btn-danger" type="submit" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
                <td>
                    <a href="index.php?page=listado_ficha_tecnica&idvehiculos=<?=$vehiculo_['idvehiculos']; ?>" class="btn btn-warning" type="button" title="Ver Mas">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                </td>
                </tr>
                        <?php
                        }
                        ?>
            </tbody>
        </table>


        <nav aria-label="...">
            <ul class="pagination">
            <li class="page-item <?php if($vehiculos->pagina_actual == 0){echo 'disabled';} ?>"> <!-- disabled -->
                <a class="page-link" href="index.php?page=listado_vehiculos&pagina_actual=<?= $vehiculos->pagina_actual - 1 ?>">Previo</a>
            </li>
            <li class="page-item"><a class="page-link" href="index.php?page=listado_vehiculos&pagina_actual=<?= $vehiculos->pagina_actual - 1 ?>"><?= $vehiculos->pagina_actual ?></a></li>
            <li class="page-item"><a class="page-link" href="index.php?page=listado_vehiculos&pagina_actual=<?= $vehiculos->pagina_actual ?>"><?= $vehiculos->pagina_actual + 1 ?></a></li>
            <li class="page-item"><a class="page-link" href="index.php?page=listado_vehiculos&pagina_actual=<?= $vehiculos->pagina_actual + 1 ?>"><?= $vehiculos->pagina_actual + 2 ?></a></li>
            <li class="page-item <?php if($vehiculos->pagina_actual == $total_registros - 1){echo 'disabled';} ?>">
                <a class="page-link" href="index.php?page=listado_vehiculos&pagina_actual=<?= $vehiculos->pagina_actual + 1 ?>">Siguiente</a>
            </li>
            </ul>
        </nav>
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    var fichaTecnicaModal = document.getElementById('fichaTecnicaModal');

    fichaTecnicaModal.addEventListener('show.bs.modal', function (event) {
    // Botón que disparó el modal
    var button = event.relatedTarget;
    
    // Extraer la información de los atributos data-*
    var marca = button.getAttribute('data-marca');
    var modelo = button.getAttribute('data-modelo');
    var idvehiculo = button.getAttribute('data-idvehiculo');

    // Actualizar el título con la marca y el modelo
    var marcaModeloText = marca + ' - ' + modelo;
    var marcaModeloVehiculo = document.getElementById('marcaModeloVehiculo');
    marcaModeloVehiculo.textContent = marcaModeloText;

    // Actualizar el campo hidden con el id del vehículo
    var inputIdVehiculo = document.getElementById('vehiculos_idvehiculos');
    inputIdVehiculo.value = idvehiculo;
    });
});
</script>




<?php

ini_set('display_errors', 1);

$total_registros = 0;

$perfil = new Perfil();
$perfiles = $perfil->traer_perfiles();

$usuario = new Usuario();
$result_usuarios_ = $usuario->traer_cantidad_usuario();
foreach($result_usuarios_ as $usuario_1){
    $total_registros = $usuario_1['total'];
}
if (isset($_GET['pagina_actual'])){
    $usuario->pagina_actual = $_GET['pagina_actual'];
}
$result_usuarios = $usuario->traer_clientes();

$tipo_sexo = new Tipo_Sexos();
$result_tipo_sexo = $tipo_sexo->traer_tipo_sexo();

?>


<div class="col">
        <h2>Listado de Clientes</h2>      
        <table id="tabla_clientes" class="table table-striped">
            <thead>
                <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Username</th>
                <th>Fecha de Alta</th>
                <th>Modificar</th>
                <th>Resetear Pass</th>
                <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($result_usuarios as $usuario_){
                ?>
                <tr>
                <td><?= $usuario_['nombre']; ?></td>
                <td><?= $usuario_['apellido']; ?></td>
                <td><?= $usuario_['email']; ?></td>
                <td><?= $usuario_['username']; ?></td>
                <td><?= $usuario_['fecha_alta']; ?></td>
                <td>
                    <a href="index.php?page=listado_usuarios&idusuarios=<?=$usuario_['idusuarios']; ?>&nombre=<?=$usuario_['username'];?>" class="btn btn-success" type="button" title="Modificar Cliente">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>
                <td>
                    <form id="formulario-resetear-<?= $usuario_['idusuarios']; ?>" method="POST" action="controladores/usuarios/usuarios.controlador.php">
                        <input type="hidden" name="action" value="resetear_cliente">
                        <input type="hidden" name="idusuarios" value="<?= $usuario_['idusuarios'] ?>">
                        <button onclick="confirmarAccion(event, 'resetear', 'formulario-resetear-<?= $usuario_['idusuarios']; ?>')" class="btn btn-primary" type="button" title="Resetear Password"><i class="fa-solid fa-rotate-right"></i></button>
                    </form>
                </td>
                <td>
                    <form id="formulario-eliminar-<?= $usuario_['idusuarios']; ?>" method="POST" action="controladores/usuarios/usuarios.controlador.php">
                        <input type="hidden" name="action" value="eliminar_cliente">
                        <input type="hidden" name="idusuarios" value="<?= $usuario_['idusuarios'] ?>">
                        <button onclick="confirmarAccion(event, 'eliminar', 'formulario-eliminar-<?= $usuario_['idusuarios']; ?>')" class="btn btn-danger" type="button" title="Eliminar Cliente"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
                </tr>
                        <?php
                        }
                        ?>
            </tbody>
        </table>

        <nav aria-label="...">
            <ul class="pagination">
            <li class="page-item <?php if($usuario->pagina_actual == 0){echo 'disabled';} ?>"> <!-- disabled -->
                <a class="page-link" href="index.php?page=listado_clientes&pagina_actual=<?= $usuario->pagina_actual - 1 ?>">Previo</a>
            </li>
            <li class="page-item"><a class="page-link" href="index.php?page=listado_clientes&pagina_actual=<?= $usuario->pagina_actual - 1 ?>"><?= $usuario->pagina_actual ?></a></li>
            <li class="page-item"><a class="page-link" href="index.php?page=listado_clientes&pagina_actual=<?= $usuario->pagina_actual ?>"><?= $usuario->pagina_actual + 1 ?></a></li>
            <li class="page-item"><a class="page-link" href="index.php?page=listado_clientes&pagina_actual=<?= $usuario->pagina_actual + 1 ?>"><?= $usuario->pagina_actual + 2 ?></a></li>
            <li class="page-item <?php if($usuario->pagina_actual == $total_registros - 1){echo 'disabled';} ?>">
                <a class="page-link" href="index.php?page=listado_clientes&pagina_actual=<?= $usuario->pagina_actual + 1 ?>">Siguiente</a>
            </li>
            </ul>
        </nav>
    </div>
</div>
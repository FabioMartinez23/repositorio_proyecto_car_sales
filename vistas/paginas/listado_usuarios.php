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
$result_usuarios = $usuario->traer_usuarios();

$tipo_sexo = new Tipo_Sexos();
$result_tipo_sexo = $tipo_sexo->traer_tipo_sexo();

?>

<div class="row">
    <div class="col">
        <h2>Registrar Usuario</h2>

        <form method="POST" action="controladores/usuarios/usuarios.controlador.php">
        <input type="hidden" name="action" value="guardar">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="id_nombre" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellido</label>
                <input type="text" name="apellido" class="form-control" id="id_apellido" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control" id="id_fecha_nacimiento" aria-describedby="emailHelp" onchange="verificarEdad()">
            </div>

            <div class="mb-3">
                <label for="disabledSelect" class="form-label">Tipo de Sexo</label>
                <select name="tipo_sexo_idtipo_sexo" id="id_tipo_sexo" class="form-select">
                    <option value="">Seleccione un Sexo</option>
                <?php
                    foreach($result_tipo_sexo as $tipo_sexo){
                ?>
                    <option value="<?php echo $tipo_sexo['idtipo_sexo']?>"><?php echo $tipo_sexo['descripcion']?></option>
                <?php
                    }
                ?>
                </select>

            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" name="username" onfocusout="validate_username(event)" class="form-control" id="id_username" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="email" onfocusout="validate_email(event)" class="form-control" id="id_email" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="disabledSelect" class="form-label">Perfiles</label>
                <select name="perfiles_idperfiles" id="id_perfiles" class="form-select">
                    <option value="">Seleccione un Perfil</option>
                <?php
                    foreach($perfiles as $perfil){
                ?>
                    <option value="<?php echo $perfil['idperfiles']?>"><?php echo $perfil['descripcion']?></option>
                <?php
                    }
                ?>
                </select>

            </div>

            <button type="submit" class="btn btn-primary" onclick="return validarFormulario()">
                Guardar
            </button>
        </form>
    </div>

    <div class="col">
        <h2>Listado de Usuarios</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Perfil</th>
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
                <td><?= $usuario_['username']; ?></td>
                <td><?= $usuario_['email']; ?></td>
                <td><?= $usuario_['descripcion']; ?></td>
                <td>
                    <a href="index.php?page=listado_usuarios&idusuarios=<?=$usuario_['idusuarios']; ?>&nombre=<?=$usuario_['username'];?>" class="btn btn-success" type="button" title="Modificar Usuario">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>
                <td>
                    <form id="formulario-resetear-<?= $usuario_['idusuarios']; ?>" method="POST" action="controladores/usuarios/usuarios.controlador.php">
                        <input type="hidden" name="action" value="resetear">
                        <input type="hidden" name="idusuarios" value="<?= $usuario_['idusuarios'] ?>">
                        <button onclick="confirmarAccion(event, 'resetear', 'formulario-resetear-<?= $usuario_['idusuarios']; ?>')" class="btn btn-primary" type="button"><i class="fa-solid fa-rotate-right" title="Resetear Password"></i></button>
                    </form>
                </td>
                <td>
                    <form id="formulario-eliminar-<?= $usuario_['idusuarios']; ?>" method="POST" action="controladores/usuarios/usuarios.controlador.php">
                        <input type="hidden" name="action" value="eliminar">
                        <input type="hidden" name="idusuarios" value="<?= $usuario_['idusuarios'] ?>">
                        <button onclick="confirmarAccion(event, 'eliminar', 'formulario-eliminar-<?= $usuario_['idusuarios']; ?>')" class="btn btn-danger" type="button" title="Eliminar Usuario"><i class="fa-solid fa-trash"></i></button>
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
                <a class="page-link" href="index.php?page=listado_usuarios&pagina_actual=<?= $usuario->pagina_actual - 1 ?>">Previo</a>
            </li>
            <li class="page-item"><a class="page-link" href="index.php?page=listado_usuarios&pagina_actual=<?= $usuario->pagina_actual - 1 ?>"><?= $usuario->pagina_actual ?></a></li>
            <li class="page-item"><a class="page-link" href="index.php?page=listado_usuarios&pagina_actual=<?= $usuario->pagina_actual ?>"><?= $usuario->pagina_actual + 1 ?></a></li>
            <li class="page-item"><a class="page-link" href="index.php?page=listado_usuarios&pagina_actual=<?= $usuario->pagina_actual + 1 ?>"><?= $usuario->pagina_actual + 2 ?></a></li>
            <li class="page-item <?php if($usuario->pagina_actual == $total_registros - 1){echo 'disabled';} ?>">
                <a class="page-link" href="index.php?page=listado_usuarios&pagina_actual=<?= $usuario->pagina_actual + 1 ?>">Siguiente</a>
            </li>
            </ul>
        </nav>
    </div>
</div>

<script src="assets/js/validaciones/verificar_edad.js"></script>
<script src="assets/js/validaciones/usuarios.js"></script>
<script src="assets/js/validaciones/email.js"></script>

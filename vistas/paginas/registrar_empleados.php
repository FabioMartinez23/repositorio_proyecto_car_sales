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
        <h2>Registrar Empleado</h2>
        <form method="POST" action="controladores/usuarios/usuarios.controlador.php">
        <input type="hidden" name="action" value="guardar_empleado">

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
            
            <input type="hidden" name="perfiles_idperfiles" value="4">

            <button type="submit" class="btn btn-primary" onclick="return validarFormulario()">
                Guardar
            </button>
        </form>
    </div>
    <div class="col"></div>
</div>

<script src="assets/js/validaciones/verificar_edad.js"></script>
<script src="assets/js/validaciones/usuarios.js"></script>
<script src="assets/js/validaciones/email.js"></script>
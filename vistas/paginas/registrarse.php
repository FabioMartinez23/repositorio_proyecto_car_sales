<?php

$tipo_sexo = new Tipo_Sexos();
$result_tipo_sexo = $tipo_sexo->traer_tipo_sexo();

?>


<div class="row">
    <div class="col"></div>
    <div class="col login" >
    <h1 style="text-align: center;">Registrar Nuevo Usuario</h1>
    <p style="text-align: center;">Acceso rapido, tenga en cuenta que la CONTRASEÑA por defecto es el mismo que el Username</p>
        <form id="id_form" method="POST" action="controladores/login.controlador.php">
            <input type="hidden" name="action" value="registrarse">

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

            <div class="form-floating mb-3 mt-3">
                <input type="text" name="username" onfocusout="validate_username(event)" class="form-control" id="username" aria-describedby="emailHelp">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mb-3 mt-3">
                <input type="email" name="email" onfocusout="validate_email(event)" class="form-control" id="email" aria-describedby="emailHelp">
                <label for="floatingInput">Email</label>
            </div>
            <input type="hidden" name="perfiles_idperfiles" value="2">
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-primary">
                    Registrarse
                </button>
            </div>
        </form>
    </div>
    <div class="col"></div>
</div>

<script src="assets/js/validaciones/verificar_edad.js"></script>
<script src="assets/js/validaciones/usuarios.js"></script>
<script src="assets/js/validaciones/email.js"></script>
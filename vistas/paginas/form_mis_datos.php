<?php
ini_set('display_errors', 0);
session_start();

if (isset($_SESSION['idusuarios'])){
    $idusuarios = $_SESSION['idusuarios'];
    echo "mi idusuario es= ".$idusuarios;
}else{
    echo "error";
}

$usuario = new Usuario();
$result_usuarios = $usuario->traer_usuarios_y_personas($idusuarios);

?>

<h1>Mis Datos</h1>
<form class="row g-3">
    <div class="col-md-2">
        <label for="inputEmail4" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="id_nombre" <?php foreach($result_usuarios as $usuarios){ echo "value=".$usuarios['nombre'];} ?> >
    </div>
    <div class="col-md-2">
        <label for="inputPassword4" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="id_apellido" <?php foreach($result_usuarios as $usuarios){ echo "value=".$usuarios['apellido'];} ?> >
    </div>
    <div class="col-md-2">
        <label for="inputPassword4" class="form-label">Fecha de Nacimiento</label>
        <input type="date" class="form-control" id="id_fecha_nacimiento" <?php foreach($result_usuarios as $usuarios){ echo "value=".$usuarios['fecha_nacimiento'];} ?>>
    </div>
    <div class="col-md-3">
        <label for="inputEmail4" class="form-label">Username</label>
        <input type="text" class="form-control" id="id_username" <?php foreach($result_usuarios as $usuarios){ echo "value=".$usuarios['username'];} ?> >
    </div>
    <div class="col-md-5">
        <label for="inputPassword4" class="form-label">Email</label>
        <input type="email" class="form-control" id="id_email" <?php foreach($result_usuarios as $usuarios){ echo "value=".$usuarios['email'];} ?> >
    </div>

    <div class="col-md-4">
        <label for="inputPassword4" class="form-label">Contacto</label>
        <input type="email" class="form-control" id="id_contacto">
    </div>
    <div class="col-5">
        <label for="inputAddress" class="form-label">Domicilio</label>
        <input type="text" class="form-control" id="id_domicilio" placeholder="Agregar Domicilio Aquí">
    </div>
    <div class="col-md-4">
        <label for="inputCity" class="form-label">Localidad</label>
        <select id="id_localidad" class="form-select">
        <option selected>Choose...</option>
        <option>...</option>
        </select>
    </div>
    <div class="col-md-4">
        <label for="inputState" class="form-label">Provincia</label>
        <select id="id_provincia" class="form-select">
        <option selected>Choose...</option>
        <option>...</option>
        </select>
    </div>
    <div class="col-md-4">
        <label for="inputState" class="form-label">Pais</label>
        <select id="id_pais" class="form-select">
        <option selected>Choose...</option>
        <option>...</option>
        </select>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Modificar Datos</button>
        <a type="button" class="btn btn-primary" href="index.php?page=cambiar_password">Cambiar Contraseña</a>
    </div>
</form>
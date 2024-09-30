<?php

ini_set('display_errors', 1);
require_once('../../modelos/usuarios.php');
require_once('../../modelos/personas.php');

if(isset($_POST['action'])){
    if ($_POST['action'] == 'guardar'){
        $usuario_controlador = new UsuarioControlador();
        $usuario_controlador->guardar();
    }
    if ($_POST['action'] == 'guardar_cliente'){
        $usuario_controlador = new UsuarioControlador();
        $usuario_controlador->guardar_cliente();
    }
    if ($_POST['action'] == 'guardar_empleado'){
        $usuario_controlador = new UsuarioControlador();
        $usuario_controlador->guardar_empleado();
    }
    if ($_POST['action'] == 'eliminar'){
        $usuario_controlador = new UsuarioControlador();
        $usuario_controlador->eliminar();
    }
    if ($_POST['action'] == 'eliminar_cliente'){
        $usuario_controlador = new UsuarioControlador();
        $usuario_controlador->eliminar_cliente();
    }
    if ($_POST['action'] == 'eliminar_empleado'){
        $usuario_controlador = new UsuarioControlador();
        $usuario_controlador->eliminar_empleado();
    }
    if ($_POST['action'] == 'resetear'){
        $usuario_controlador = new UsuarioControlador();
        $usuario_controlador->resetear();
    }
    if ($_POST['action'] == 'resetear_cliente'){
        $usuario_controlador = new UsuarioControlador();
        $usuario_controlador->resetear_cliente();
    }
    if ($_POST['action'] == 'resetear_empleado'){
        $usuario_controlador = new UsuarioControlador();
        $usuario_controlador->resetear_empleado();
    }
    if ($_POST['action'] == 'cambiar_password'){
        $usuario_controlador = new UsuarioControlador();
        $usuario_controlador->cambiar_password();
    }
}


class UsuarioControlador {

    public function guardar(){

        if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['perfiles_idperfiles']) || empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['fecha_nacimiento']) || empty($_POST['tipo_sexo_idtipo_sexo'])){
            header('location: ../../index.php?page=listado_usuarios&mensaje=Todos los datos obligarios.&status=danger');
            return;
        }

            // Validar que el usuario tenga al menos 18 años
            $fecha_nacimiento = new DateTime($_POST['fecha_nacimiento']);
            $hoy = new DateTime();
            $edad = $hoy->diff($fecha_nacimiento)->y; // Calcula la edad en años
    
            if ($edad < 18) {
                header('location: ../../index.php?page=listado_usuarios&mensaje=Debes ser mayor de 18 años para registrarte.&status=danger');
                return;
            }

        $persona = new Persona();
        $persona->setNombre($_POST['nombre']);
        $persona->setApellido($_POST['apellido']);
        $persona->setFecha_nacimiento($_POST['fecha_nacimiento']);
        $persona->setTipo_sexo_idtipo_sexo($_POST['tipo_sexo_idtipo_sexo']);
        $persona->agregar_persona();
        $personas_idpersonas = $persona->getIdpersonas();

        if (!$personas_idpersonas){
            header('location: ../../index.php?page=listado_usuarios&mensaje=Error al cargar Persona.&status=danger');
            return;
        }else{
            $usuarios = new Usuario();
            $usuarios->setUsername($_POST['username']);
            $usuarios->setEmail($_POST['email']);
            $usuarios->setPassword($_POST['username']);
            $usuarios->setPerfiles_id($_POST['perfiles_idperfiles']);
            $usuarios->setPersonas_idpersonas($personas_idpersonas);
            $usuarios->guardar();
            header('location: ../../index.php?page=listado_usuarios&mensaje=Usuario registrado correctamente.&status=success');
        }

    }

    public function guardar_empleado(){

        if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['perfiles_idperfiles']) || empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['fecha_nacimiento']) || empty($_POST['tipo_sexo_idtipo_sexo'])){
            header('location: ../../index.php?page=registrar_empleados&mensaje=Todos los datos obligarios.&status=danger');
            return;
        }

            // Validar que el usuario tenga al menos 18 años
            $fecha_nacimiento = new DateTime($_POST['fecha_nacimiento']);
            $hoy = new DateTime();
            $edad = $hoy->diff($fecha_nacimiento)->y; // Calcula la edad en años
    
            if ($edad < 18) {
                header('location: ../../index.php?page=registrar_empleados&mensaje=Debes ser mayor de 18 años para registrarte.&status=danger');
                return;
            }

        $persona = new Persona();
        $persona->setNombre($_POST['nombre']);
        $persona->setApellido($_POST['apellido']);
        $persona->setFecha_nacimiento($_POST['fecha_nacimiento']);
        $persona->setTipo_sexo_idtipo_sexo($_POST['tipo_sexo_idtipo_sexo']);
        $persona->agregar_persona();
        $personas_idpersonas = $persona->getIdpersonas();

        if (!$personas_idpersonas){
            header('location: ../../index.php?page=registrar_empleados&mensaje=Error al cargar Persona.&status=danger');
            return;
        }else{
            $usuarios = new Usuario();
            $usuarios->setUsername($_POST['username']);
            $usuarios->setEmail($_POST['email']);
            $usuarios->setPassword($_POST['username']);
            $usuarios->setPerfiles_id($_POST['perfiles_idperfiles']);
            $usuarios->setPersonas_idpersonas($personas_idpersonas);
            $usuarios->guardar();
            header('location: ../../index.php?page=listado_empleados&mensaje=Empleado registrado correctamente.&status=success');
        }

    }

    public function guardar_cliente(){

        if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['perfiles_idperfiles']) || empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['fecha_nacimiento']) || empty($_POST['tipo_sexo_idtipo_sexo'])){
            header('location: ../../index.php?page=registrar_clientes&mensaje=Todos los datos obligarios.&status=danger');
            return;
        }

            // Validar que el usuario tenga al menos 18 años
            $fecha_nacimiento = new DateTime($_POST['fecha_nacimiento']);
            $hoy = new DateTime();
            $edad = $hoy->diff($fecha_nacimiento)->y; // Calcula la edad en años
    
            if ($edad < 18) {
                header('location: ../../index.php?page=registrar_clientes&mensaje=Debes ser mayor de 18 años para registrarte.&status=danger');
                return;
            }

        $persona = new Persona();
        $persona->setNombre($_POST['nombre']);
        $persona->setApellido($_POST['apellido']);
        $persona->setFecha_nacimiento($_POST['fecha_nacimiento']);
        $persona->setTipo_sexo_idtipo_sexo($_POST['tipo_sexo_idtipo_sexo']);
        $persona->agregar_persona();
        $personas_idpersonas = $persona->getIdpersonas();

        if (!$personas_idpersonas){
            header('location: ../../index.php?page=registrar_clientes&mensaje=Error al cargar Persona.&status=danger');
            return;
        }else{
            $usuarios = new Usuario();
            $usuarios->setUsername($_POST['username']);
            $usuarios->setEmail($_POST['email']);
            $usuarios->setPassword($_POST['username']);
            $usuarios->setPerfiles_id($_POST['perfiles_idperfiles']);
            $usuarios->setPersonas_idpersonas($personas_idpersonas);
            $usuarios->guardar();
            header('location: ../../index.php?page=listado_clientes&mensaje=Cliente registrado correctamente.&status=success');
        }

    }

    public function eliminar(){
        $usuario = new Usuario();
        $usuario->setIdUsuarios($_POST['idusuarios']);
        $usuario->eliminar();
        header('location: ../../index.php?page=listado_usuarios&mensaje=Usuario eliminado correctamente.&status=success');
    }

    public function eliminar_cliente(){
        $usuario = new Usuario();
        $usuario->setIdUsuarios($_POST['idusuarios']);
        $usuario->eliminar();
        header('location: ../../index.php?page=listado_clientes&mensaje=Cliente eliminado correctamente.&status=success');
    }

    public function eliminar_empleado(){
        $usuario = new Usuario();
        $usuario->setIdUsuarios($_POST['idusuarios']);
        $usuario->eliminar();
        header('location: ../../index.php?page=listado_empleados&mensaje=Empleado eliminado correctamente.&status=success');
    }

    public function cambiar_password() {
        if (!isset($_POST['password_actual'], $_POST['new_password'], $_POST['new_password_confirm'])) {
            header('location: ../../index.php?page=cambiar_password&mensaje=Todos los datos son obligatorios&status=danger');
            return;
        }
    
        if (empty($_POST['password_actual']) || empty($_POST['new_password']) || empty($_POST['new_password_confirm'])) {
            header('location: ../../index.php?page=cambiar_password&mensaje=Todos los datos son obligatorios&status=danger');
            return;
        }
    

        $usuario = new Usuario();
        $usuario->setIdUsuarios($_POST['idusuarios']);
        $usuario_actual = $usuario->validar_usuario_por_id(); 
    

        if (!$usuario_actual) {
            header('location: ../../index.php?page=cambiar_password&mensaje=Usuario no encontrado&status=danger');
            return;
        }
    
        if (!password_verify($_POST['password_actual'], $usuario_actual['password']) && $_POST['password_actual'] != $usuario->getUsername()) {
            header('location: ../../index.php?page=cambiar_password&mensaje=La contraseña actual no coincide&status=danger');
            return;
        }
    
        if ($_POST['new_password'] != $_POST['new_password_confirm']) {
            header('location: ../../index.php?page=cambiar_password&mensaje=Las contraseñas nuevas no coinciden&status=danger');
            return;
        }
    
        $usuario->setPassword($_POST['new_password']);
        $usuario->cambiar_password();
    
        session_start();
        session_unset();
        session_destroy();
    
        header('location: ../../index.php?page=login&mensaje=Contraseña cambiada correctamente.&status=success');
    }
    
    public function resetear(){
        $usuario = new Usuario();
        $usuario->setIdUsuarios($_POST['idusuarios']);
        $usuario_info = $usuario->traer_usuario_id($_POST['idusuarios']);
        
        if ($usuario_info) {
            $nuevo_password = $usuario_info['username'];
            $usuario->setPassword($nuevo_password);
            $usuario->cambiar_password();
            // Redirigir con mensaje de éxito
            header('location: ../../index.php?page=listado_usuarios&mensaje=Contraseña reseteada correctamente.&status=success');
        } else {
            // Si no se encontró el usuario, redirigir con un mensaje de error
            header('location: ../../index.php?page=listado_usuarios&mensaje=Usuario no encontrado.&status=danger');
        }
    }

    public function resetear_cliente(){
        $usuario = new Usuario();
        $usuario->setIdUsuarios($_POST['idusuarios']);
        $usuario_info = $usuario->traer_usuario_id($_POST['idusuarios']);
        
        if ($usuario_info) {
            $nuevo_password = $usuario_info['username'];
            $usuario->setPassword($nuevo_password);
            $usuario->cambiar_password();
            // Redirigir con mensaje de éxito
            header('location: ../../index.php?page=listado_clientes&mensaje=Contraseña del Cliente reseteada correctamente.&status=success');
        } else {
            // Si no se encontró el usuario, redirigir con un mensaje de error
            header('location: ../../index.php?page=listado_empleados&mensaje=Cliente no encontrado.&status=danger');
        }
    }

    public function resetear_empleado(){
        $usuario = new Usuario();
        $usuario->setIdUsuarios($_POST['idusuarios']);
        $usuario_info = $usuario->traer_usuario_id($_POST['idusuarios']);
        
        if ($usuario_info) {
            $nuevo_password = $usuario_info['username'];
            $usuario->setPassword($nuevo_password);
            $usuario->cambiar_password();
            // Redirigir con mensaje de éxito
            header('location: ../../index.php?page=listado_empleados&mensaje=Contraseña del Empleado reseteada correctamente.&status=success');
        } else {
            // Si no se encontró el usuario, redirigir con un mensaje de error
            header('location: ../../index.php?page=listado_empleados&mensaje=Empleado no encontrado.&status=danger');
        }
    }
    
}


?>
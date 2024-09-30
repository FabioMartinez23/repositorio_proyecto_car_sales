<?php
ini_set('display_errors', 0);
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAR SALES - PROYECTO</title>
        <!-- Latest compiled and minified CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/22690a9605.js" crossorigin="anonymous"></script>
    

    <!-- <link rel="shortcut icon" href="assets/img/LOGO-Modificado.png" type="image/x-icon"> -->
    <!-- <link rel="shortcut icon" href="assets/img/CAR_SALE-1-1.png" type="image/x-icon"> -->
</head>
<body>

    <!-- / navbar-start -->
    <?php

        // Comprobar si el usuario está autenticado
        if(isset($_SESSION['descripcion'])){
            switch($_SESSION['descripcion']){
                case "Administrador":
                    include('vistas/componentes/navbar_admin.php');
                    break;
                case "Empleado":
                    include('vistas/componentes/navbar_empleado.php');
                    break;
                case "Cliente":
                    include('vistas/componentes/navbar_cliente.php');
                    break;
                default:
                    include('vistas/componentes/navbar_principal.php');
                    break;
            }
        } else {
            include('vistas/componentes/navbar_principal.php');
        }
    ?>
        <!-- / navbar end -->
        
        <!-- Modal de Confirmación -->
        <div class="modal fade" id="modalConfirmacion" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Confirmación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="mensajeConfirmacion">¿Estás seguro de que deseas realizar esta acción?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="btnConfirmar">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>

    
    <!-- Mensaje de alerta -->
    <?php
        if(isset($_GET['mensaje'])){
            echo '<div class="alert alert-'.$_GET['status'].'" role="alert">'.$_GET['mensaje'].'</div>';
        }
    ?>

    <div class="container">

        <?php
                    
            if(isset($_SESSION['descripcion'])) {
                switch($_SESSION['descripcion']) {
                    case 'Administrador':
                        $paginasPermitidas = ['inicio','bienvenida','login', 'contacto', 'nosotros', 'comprar_vehiculo', 'form_contacto', 'registrarse', 'simulador', 'listado_usuarios', 'listado_modulos', 'listado_vehiculos', 'cambiar_password', 'bienvenida', 'formulario_perfil', 'form_tablas_maestras', 'salida', 'form_mis_datos', 'listado_clientes', 'listado_empleados', 'registrar_vehiculos', 'ficha_tecnica', 'listado_ficha_tecnica', 'registrar_clientes', 'registrar_empleados', 'listado_ventas', 'listado_compras','registrar_ventas','listado_ventas','detalle_ventas', 'form_financiamiento'];
                        break;

                    case 'Empleado':
                        $paginasPermitidas = ['inicio','bienvenida','login', 'contacto', 'nosotros', 'comprar_vehiculo', 'form_contacto', 'registrarse', 'simulador', 'listado_vehiculos', 'listado_clientes', 'cambiar_password', 'bienvenida', 'salida', 'form_mis_datos','listado_clientes', 'registrar_vehiculos', 'ficha_tecnica', 'listado_ficha_tecnica', 'registrar_clientes','listado_ventas','listado_compras', 'registrar_ventas','listado_ventas','detalle_ventas','form_financiamiento'];
                        break;

                    case 'Cliente':
                        $paginasPermitidas = ['inicio','bienvenida','login', 'contacto', 'nosotros', 'comprar_vehiculo', 'form_contacto', 'registrarse', 'mis_datos','cambiar_password', 'simulador','salida', 'form_mis_datos'];
                        break;

                    default:
                        $paginasPermitidas = ['inicio','login', 'contacto', 'nosotros', 'comprar_vehiculo', 'form_contacto', 'registrarse','salida', 'simulador'];
                        break;
                }
            } else {
                $paginasPermitidas = ['inicio','login', 'contacto', 'nosotros', 'comprar_vehiculo', 'form_contacto', 'registrarse','salida', 'simulador'];
            }

            if(isset($_GET['page']) && in_array($_GET['page'], $paginasPermitidas)) {
                include('vistas/paginas/'.$_GET['page'].'.php');
            } else {
                include('vistas/paginas/errores/403.php');
            }

        ?>
    </div>


        <!-- Jquery -->
        <script src="assets/js/jquery-3.7.1.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/select2.min.js"></script>
        <script src="assets/js/datatables.min.js"></script>
        <script>
            $(document).ready(function() {
            $('#idperfiles').select2();
            $('#tabla_cliente').DataTable();
            });
        </script>
        

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let accionPendiente = '';
                let formularioId = '';

                // Función para mostrar el modal de confirmación
                function mostrarModal(mensaje, accion, formId) {
                    document.getElementById('mensajeConfirmacion').textContent = mensaje;
                    accionPendiente = accion;
                    formularioId = formId;
                    var modal = new bootstrap.Modal(document.getElementById('modalConfirmacion'));
                    modal.show();
                }

                // Evento para confirmar la acción dentro del modal
                document.getElementById('btnConfirmar').addEventListener('click', function() {
                    if (accionPendiente && formularioId) {
                        const formulario = document.getElementById(formularioId);
                        if (formulario) {
                            formulario.submit();
                        } else {
                            console.error('Formulario no encontrado: ' + formularioId);
                        }
                    }
                });

                // Función para confirmar la acción y mostrar el modal
                window.confirmarAccion = function(event, accion, formId) {
                    event.preventDefault(); // Previene el envío inmediato del formulario
                    let mensaje = '';

                    // Definir el mensaje según el tipo de acción
                    if (accion === 'eliminar') {
                        mensaje = '¿Estás seguro de que deseas eliminar este elemento?';
                    } else if (accion === 'resetear') {
                        mensaje = '¿Estás seguro de que deseas resetear la contraseña?';
                    }

                    mostrarModal(mensaje, accion, formId);
                };
            });
        </script>



</body>
</html>
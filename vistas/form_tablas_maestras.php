<?php
ini_set('display_errors', 0);
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas Maestras</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/select2.min.css" rel="stylesheet" />
    <script src="../assets/js/22690a9605.js" crossorigin="anonymous"></script>
</head>
<body>

<?php
    include('componentes/navbar_tablas_maestras.php');
?>
<h1>Gestion de Tablas Maestras</h1>
</header>

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

    <?php
        if(isset($_GET['mensaje'])){
            echo '<div class="alert alert-'.$_GET['status'].'" role="alert">'.$_GET['mensaje'].'</div>';
        }
    ?>


    <div class="container">
        <?php
            if(isset($_GET['page'])){
                    if($_GET['page'] == 'form_tipo_sexo'
                    || $_GET['page'] == 'form_marca'
                    || $_GET['page'] == 'form_tipo_vehiculo'
                    || $_GET['page'] == 'form_modelo_vehiculo'
                    || $_GET['page'] == 'form_tipo_documento'
                    || $_GET['page'] == 'form_tipo_contacto'
                    || $_GET['page'] == 'form_tipo_domicilio'
                    || $_GET['page'] == 'form_barrio'
                    || $_GET['page'] == 'form_localidad'    
                    || $_GET['page'] == 'form_provincia'    
                    || $_GET['page'] == 'form_pais'
                    || $_GET['page'] == 'form_tipo_pago'
                    || $_GET['page'] == 'form_tipo_puesto'    
                    || $_GET['page'] == 'form_modulo'    
                    || $_GET['page'] == 'form_perfiles'
                    || $_GET['page'] == 'form_color'
                    ){
                        include('paginas/tablas_maestras/'.$_GET['page'].'.php');
                    }
                }
        ?>


    <!-- Jquery -->
    <script src="../assets/js/jquery-3.7.1.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/select2.min.js"></script>
    <script src="../assets/js/validaciones/tablas_maestras.validaciones.ajax.js"></script>
    <script>
        $(document).ready(function() {
        $('#id_tipo_').select2();
        $('#id_perfil').select2();
        });
    </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let accionPendiente = '';
                let formulario;

                function mostrarModal(mensaje, accion) {
                    document.getElementById('mensajeConfirmacion').textContent = mensaje;
                    accionPendiente = accion;
                    formulario = document.getElementById('formulario');
                    var modal = new bootstrap.Modal(document.getElementById('modalConfirmacion'));
                    modal.show();
                }

                document.getElementById('btnConfirmar').addEventListener('click', function() {
                    if (accionPendiente === 'eliminar') {
                        console.log('Elemento eliminado');
                        formulario.submit();
                    } else if (accionPendiente === 'resetear') {
                        console.log('Contraseña reseteada');
                        formulario.submit();
                    }
                });

                // Función para confirmar la acción y mostrar el modal
                window.confirmarAccion = function(event, accion) {
                    event.preventDefault(); // Previene el envío inmediato del formulario
                    mostrarModal('¿Estás seguro de que deseas ' + (accion === 'eliminar' ? 'eliminar esto?' : 'resetear la contraseña?'), accion);
                };
            });


        </script>
</body>
</html>
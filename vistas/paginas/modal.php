<!-- Modal -->
<div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nombre_auto"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <img src="img/auto1.jpg" class="d-block w-100 mb-3" alt="Volkswagen Gol 1" class="img-fluid" width="100">
                    <ul>
                        <li><strong>Precio:</strong> $<span id="precio_auto"></span></li>
                        <li><strong>Motor:</strong> <span id="motor_auto"></span></li>
                        <li><strong>Transmición:</strong> <span id="transmision_auto"></span></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <a type="button" href="#" id="btn-simulacion" onclick="redireccionarSimulacion(this)" class="btn btn-success mt-2 mb-2">Crear Simulación</a>
                </div>
            </div>
        </div>
    </div>
</div>
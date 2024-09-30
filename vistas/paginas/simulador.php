
    <?php
    $autosArray = [
        [
            "id" => 12,
            "nombre" => 'Chevrolet Corsa 1.6 AA',
            "tipo" => 'SEDAN 3 PUERTAS',
            "anio" => '2002',
            "color" => 'blanco',
            "km" => '185.104 km',
            "motor" => "MSI 1.6",
            "transmision" => "MT",
            "precio" => 250000
        ],
        [
            "id" => 15,
            "nombre" => 'Chevrolet Corsa 1.6 AA',
            "tipo" => 'SEDAN 3 PUERTAS',
            "anio" => '2002',
            "color" => 'blanco',
            "km" => '185.104 km',
            "motor" => "MSI 1.6",
            "transmision" => "AT",
            "precio" => 250000
        ]
    ];
    if (isset($_GET['id'])) {
        // Obtener el valor del parámetro 'id'
        $id = $_GET['id'];
        $autoData = [];
        foreach ($autosArray as $key => $auto) {
            if ($auto['id'] == $id) {
                $autoData = $auto;
                break;
            }
        }
    } else {
        echo "No se ha proporcionado el ID.";
    }
    ?>

    <div id="simulador" class="container mt-5">
        <div class="text-center">
            <h1>Simulador de Vehículos</h1>
        </div>
        
        <div class="mt-4">
            <div class="mb-3">
                <label for="precioContado" class="form-label">Precio de Contado:</label>
                <input type="text" id="precioContado" name="precioContado" class="form-control" value="<?php echo $autoData['precio'] ?>" placeholder="Precio Contado" readonly>
            </div>

            <label for="vehiculoEntrega" class="form-label">¿Tiene un vehículo para entregar como parte de pago?</label>
            <select id="vehiculoEntrega" name="vehiculoEntrega" class="form-select" onchange="manejarVehiculoEntrega()">
                <option value="no">NO</option>
                <option value="si">SÍ</option>
            </select>

            <div id="opcionVenta" class="alert alert-info mt-3" style="display: none;">
                <p>Por favor, póngase en contacto con la concesionaria para más información 
                    sobre la entrega de su vehículo como parte de pago. También puede completar nuestro 
                    formulario de venta <a href="formulario.html">aquí</a>.</p>
            </div>

            <!-- Campos de anticipo y cuotas -->
            <div id="camposSimulacion" class="mt-4">
                <div class="mb-3">
                    <label for="anticipo" class="form-label">Anticipo:</label>
                    <input type="text" id="anticipo" name="anticipo" class="form-control" placeholder="Anticipo" required>
                </div>
                <div class="mb-3">
                    <label for="cuotas" class="form-label">Cuotas:</label>
                    <input type="text" id="cuotas" name="cuotas" class="form-control" placeholder="Cuotas" required>
                </div>
            </div>

            <!-- Botón de simulación -->
            <button id="simular" class="btn btn-primary" onclick="calcularSimulacion()">Calcular Simulación</button>

            <!-- Resultado de la simulación -->
            <div id="resultadoSimulacion" class="mt-4"></div>
        </div>
    </div>

<script src="assets/js/simulador.js"></script>


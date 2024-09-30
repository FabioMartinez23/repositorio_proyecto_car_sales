<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Financiamiento - Concesionaria</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Gestión de Financiamiento</h1>

        <!-- Formulario para la simulación de financiamiento -->
        <div class="card mb-5">
            <div class="card-header">Simulación de Financiamiento</div>
            <div class="card-body">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="cliente" class="form-label">Cliente</label>
                            <input type="text" class="form-control" id="cliente" placeholder="Nombre del cliente">
                        </div>
                        <div class="col-md-6">
                            <label for="vehiculo" class="form-label">Vehículo</label>
                            <input type="text" class="form-control" id="vehiculo" placeholder="Descripción del vehículo">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="monto" class="form-label">Monto Solicitado</label>
                            <input type="number" class="form-control" id="monto" placeholder="Monto del crédito">
                        </div>
                        <div class="col-md-6">
                            <label for="cuota-inicial" class="form-label">Cuota Inicial</label>
                            <input type="number" class="form-control" id="cuota-inicial" placeholder="Cuota inicial">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="plazo" class="form-label">Plazo del Crédito (meses)</label>
                            <input type="number" class="form-control" id="plazo" placeholder="Plazo en meses">
                        </div>
                        <div class="col-md-6">
                            <label for="interes" class="form-label">Tasa de Interés (%)</label>
                            <input type="number" class="form-control" id="interes" placeholder="Tasa de interés">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Calcular Cuota Mensual</button>
                </form>
            </div>
        </div>

        <!-- Tabla para mostrar los financiamientos gestionados -->
        <div class="card">
            <div class="card-header">Listado de Financiamientos</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Vehículo</th>
                            <th>Monto Solicitado</th>
                            <th>Plazo</th>
                            <th>Cuota Mensual</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Juan Pérez</td>
                            <td>Ford Focus 2021</td>
                            <td>$1,000,000</td>
                            <td>60 meses</td>
                            <td>$20,000</td>
                            <td>Aprobado</td>
                            <td>
                                <button class="btn btn-info btn-sm">Detalles</button>
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </td>
                        </tr>
                        <!-- Más filas de ejemplo -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
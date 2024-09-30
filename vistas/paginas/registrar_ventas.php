
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Venta de Auto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Formulario para Crear Venta de Auto</h1>
        <form id="ventaForm" action="procesar_venta.php" method="POST">
            <h3>Datos del Cliente</h3>
            <div class="mb-3">
                <label for="clienteNombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="clienteNombre" name="clienteNombre" required>
            </div>
            <div class="mb-3">
                <label for="clienteDNI" class="form-label">DNI:</label>
                <input type="text" class="form-control" id="clienteDNI" name="clienteDNI" required>
            </div>
            <div class="mb-3">
                <label for="clienteTelefono" class="form-label">Teléfono:</label>
                <input type="text" class="form-control" id="clienteTelefono" name="clienteTelefono" required>
            </div>
            <div class="mb-3">
                <label for="clienteDireccion" class="form-label">Dirección:</label>
                <input type="text" class="form-control" id="clienteDireccion" name="clienteDireccion" required>
            </div>

            <h3>Datos del Auto</h3>
            <div class="mb-3">
                <label for="autoMarca" class="form-label">Marca:</label>
                <input type="text" class="form-control" id="autoMarca" name="autoMarca" required>
            </div>
            <div class="mb-3">
                <label for="autoModelo" class="form-label">Modelo:</label>
                <input type="text" class="form-control" id="autoModelo" name="autoModelo" required>
            </div>
            <div class="mb-3">
                <label for="autoAnio" class="form-label">Año:</label>
                <input type="number" class="form-control" id="autoAnio" name="autoAnio" min="1886" max="2024" required>
            </div>
            <div class="mb-3">
                <label for="autoColor" class="form-label">Color:</label>
                <input type="text" class="form-control" id="autoColor" name="autoColor" required>
            </div>

            <h3>Datos de la Venta</h3>
            <div class="mb-3">
                <label for="vendedor" class="form-label">Vendedor:</label>
                <input type="text" class="form-control" id="vendedor" name="vendedor" required>
            </div>
            <div class="mb-3">
                <label for="fechaVenta" class="form-label">Fecha de Venta:</label>
                <input type="date" class="form-control" id="fechaVenta" name="fechaVenta" required>
            </div>
            <div class="mb-3">
                <label for="tipoPago" class="form-label">Tipo de Pago:</label>
                <select class="form-select" id="tipoPago" name="tipoPago" required>
                    <option value="Efectivo">Efectivo</option>
                    <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
                    <option value="Transferencia">Transferencia</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="monto" class="form-label">Monto:</label>
                <input type="number" class="form-control" id="monto" name="monto" required>
            </div>
            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones:</label>
                <textarea class="form-control" id="observaciones" name="observaciones"></textarea>
            </div>

            <button type="button" class="btn btn-primary"><a href="index.php?page=detalle_ventas">Registrar Venta</a></button>
            <a href="index.php?page=registrar_vehiculos" class="btn btn-warning">Volver a la Lista de Ventas</a>
        </form>
    </div>
</body>
</html>
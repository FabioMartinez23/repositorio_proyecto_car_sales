
<?php
// Simulando la obtención de datos de una base de datos
// En un escenario real, debes conectar a tu base de datos y realizar una consulta para obtener los datos de la venta específica

// Ejemplo de datos simulados para la venta
$venta = [
    'nro_venta' => 1,
    'cliente' => [
        'nombre' => 'Juan Pérez',
        'dni' => '12345678',
        'telefono' => '987654321',
        'direccion' => 'Av. Siempre Viva 742',
    ],
    'auto' => [
        'marca' => 'Toyota',
        'modelo' => 'Corolla',
        'anio' => 2020,
        'color' => 'Rojo',
    ],
    'vendedor' => 'Pedro López',
    'fecha_venta' => '2023-08-01',
    'tipo_pago' => 'Tarjeta de Crédito',
    'monto' => 20000,
    'observaciones' => 'Cliente satisfecho con la compra.',
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Venta - Nro <?php echo $venta['nro_venta']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Detalles de Venta - Nro <?php echo $venta['nro_venta']; ?></h1>

        <h2>Datos del Cliente</h2>
        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>Nombre:</strong> <?php echo $venta['cliente']['nombre']; ?></li>
            <li class="list-group-item"><strong>DNI:</strong> <?php echo $venta['cliente']['dni']; ?></li>
            <li class="list-group-item"><strong>Teléfono:</strong> <?php echo $venta['cliente']['telefono']; ?></li>
            <li class="list-group-item"><strong>Dirección:</strong> <?php echo $venta['cliente']['direccion']; ?></li>
        </ul>

        <h2>Datos del Auto</h2>
        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>Marca:</strong> <?php echo $venta['auto']['marca']; ?></li>
            <li class="list-group-item"><strong>Modelo:</strong> <?php echo $venta['auto']['modelo']; ?></li>
            <li class="list-group-item"><strong>Año:</strong> <?php echo $venta['auto']['anio']; ?></li>
            <li class="list-group-item"><strong>Color:</strong> <?php echo $venta['auto']['color']; ?></li>
        </ul>

        <h2>Datos de la Venta</h2>
        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>Vendedor:</strong> <?php echo $venta['vendedor']; ?></li>
            <li class="list-group-item"><strong>Fecha de Venta:</strong> <?php echo $venta['fecha_venta']; ?></li>
            <li class="list-group-item"><strong>Tipo de Pago:</strong> <?php echo $venta['tipo_pago']; ?></li>
            <li class="list-group-item"><strong>Monto:</strong> $<?php echo number_format($venta['monto'], 2); ?></li>
            <li class="list-group-item"><strong>Observaciones:</strong> <?php echo $venta['observaciones']; ?></li>
        </ul>

        <div class="text-center">
            <a href="index.php?page=listado_ventas" class="btn btn-warning">Volver a la Lista de Ventas</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Ventas de Autos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Lista de Compras de Autos</h1>
        <a type="button" href="crear_venta.php" class="btn btn-success mt-2 mb-2">Crear Nueva Compra</a>
        <table id="ventasTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Nro de Venta</th>
                    <th>Cliente</th>
                    <th>Auto</th>
                    <th>Comprador</th>
                    <th>Fecha de Venta</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Simulando datos de ventas
                $ventas = [
                    ['nro_venta' => 1, 'cliente' => 'Juan Pérez', 'auto' => 'Toyota Corolla', 'vendedor' => 'Pedro López', 'fecha' => '2023-08-01'],
                    ['nro_venta' => 2, 'cliente' => 'Ana García', 'auto' => 'Ford Fiesta', 'vendedor' => 'María Sánchez', 'fecha' => '2023-08-05'],
                    ['nro_venta' => 3, 'cliente' => 'Luis Martínez', 'auto' => 'Volkswagen Golf', 'vendedor' => 'Carlos Ramírez', 'fecha' => '2023-08-10'],
                    // Agrega más ventas aquí si es necesario
                ];

                foreach ($ventas as $venta) {
                    echo "<tr>
                            <td>{$venta['nro_venta']}</td>
                            <td>{$venta['cliente']}</td>
                            <td>{$venta['auto']}</td>
                            <td>{$venta['vendedor']}</td>
                            <td>{$venta['fecha']}</td>
                            <td>
                                <a href='detalle_venta.php?nro_venta={$venta['nro_venta']}' class='text-primary' title='Ver Más'>
                                    <i class='fas fa-eye'></i>
                                </a>
                            </td>
                            </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#ventasTable').DataTable(); // Inicializar el DataTable
        });
    </script>
</body>
</html>
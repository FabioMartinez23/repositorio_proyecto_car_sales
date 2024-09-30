
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAR SALES</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

    <main class="container mt-4">
        <section class="row">
            <aside class="col-md-4">
                <h2>VEHÍCULOS EN VENTA</h2>
                <!-- <h2>COMPRAR VEHÍCULOS</h2> -->
                <form id="filtroForm">
                    <div class="mb-3">
                        <label for="marca" class="form-label">Marca:</label>
                        <select id="marca" name="marca" class="form-select">
                            <option value="">Todas</option>
                            <option value="volkswagen">Volkswagen</option>
                            <option value="chevrolet">Chevrolet</option>
                            <option value="toyota">Toyota</option>
                            <option value="ford">Ford</option>
                            <option value="honda">Honda</option>
                            <option value="nissan">Nissan</option>
                            <option value="fiat">Fiat</option>
                            <option value="peugeot">Peugeot</option>
                            <option value="renault">Renault</option>
                            <option value="bmw">BMW</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="modelo" class="form-label">Modelo:</label>
                        <select id="modelo" name="modelo" class="form-select">
                            <option value="">Todos</option>
                            <option value="gol">Gol</option>
                            <option value="onix">Onix</option>
                            <option value="corolla">Corolla</option>
                            <option value="focus">Focus</option>
                            <option value="civic">Civic</option>
                            <option value="sentra">Sentra</option>
                            <option value="punto">Punto</option>
                            <option value="308">308</option>
                            <option value="duster">Duster</option>
                            <option value="serie 3">Serie 3</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="año" class="form-label">Año:</label>
                        <select id="año" name="año" class="form-select">
                            <option value="">Todos</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="color" class="form-label">Color:</label>
                        <select id="color" name="color" class="form-select">
                            <option value="">Todos</option>
                            <option value="negro">Negro</option>
                            <option value="azul">Azul</option>
                            <option value="rojo">Rojo</option>
                            <option value="blanco">Blanco</option>
                            <option value="gris">Gris</option>
                            <option value="plateado">Plateado</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="kilometraje" class="form-label">Kilometraje:</label>
                        <input type="number" id="kilometraje" name="kilometraje" class="form-control" min="0">
                    </div>
                </form>
                <button type="button" id="toggleFiltroButton" class="btn btn-secondary">Ocultar Filtro</button>
                
            </aside>

            <section class="col-md-8">
                
                <div class="mb-3 mp-5">
                    <label for="sort" class="form-label">Ordenar por:</label>
                    <select id="sort" name="sort" class="form-select">
                        <option value="relevancia">Relevancia</option>
                        <option value="precio_asc">Precio (Ascendente)</option>
                        <option value="precio_desc">Precio (Descendente)</option>
                        <option value="año_asc">Año (Ascendente)</option>
                        <option value="año_desc">Año (Descendente)</option>
                    </select>
                </div>
                <div class="row mt-3">
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
                    foreach ($autosArray as $key => $auto) {

                        include('cards.php');
                    }
                ?>
                </div>
            </section>
        </section>
    </main>
    <?php include('modal.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Función para generar las opciones de año dinámicamente
        const añoSelect = document.getElementById('año');
        const startYear = 2000;
        const endYear = new Date().getFullYear(); // Año actual

        for (let year = endYear; year >= startYear; year--) {
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            añoSelect.appendChild(option);
        }

        // Funcionalidad para ocultar/mostrar el formulario de filtros
        //document.getElementById('toggleFiltroButton').addEventListener('click', function() {
        //    const filtroForm = document.getElementById('filtroForm');
        //    if (filtroForm.classList.contains('d-none')) {
        //        filtroForm.classList.remove('d-none');
        //        this.textContent = 'Ocultar Filtro';
        //    } else {
        //        filtroForm.classList.add('d-none');
        //        this.textContent = 'Mostrar Filtro';
        //    }
        //});
        $("#toggleFiltroButton").on("click", function(){ //aca tenes un ejemplo de lo mismo que arriba pero mas corto
            let filtroForm = $('#filtroForm');
            if (filtroForm.hasClass('d-none')) {
                filtroForm.removeClass('d-none');
                $("#toggleFiltroButton").text('Ocultar Filtro');
            } else {
                filtroForm.addClass('d-none');
                $("#toggleFiltroButton").text('Mostrar Filtro');
            }
        })
        function mostrarModal(auto) {
            console.log(auto);
            $("#miModal").modal('show');
            $("#nombre_auto").text(auto.nombre);
            $("#precio_auto").text(auto.precio);
            $("#transmision_auto").text(auto.transmision);
            $("#motor_auto").text(auto.motor);
            $("#motor_auto").text(auto.motor);
            $("#btn-simulacion").attr("data-id", auto.id);
        }
        function redireccionarSimulacion(element){
            console.log(element);
            let autoId = $(element).data('id');
            window.location = "index.php?page=simulador&id=" + autoId;
        }
    </script>
</body>
</html>
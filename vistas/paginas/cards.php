<div class="col-md-6 mb-4">
    <div class="card">
        <!-- <img src="vehiculos.jpg" class="card-img-top" alt="Chevrolet Corsa 1.6 AA"> -->
        <?php include('carrousel.php'); ?>
        <div class="card-body">
            <h5 class="card-title"><?php  echo $auto['nombre'] ?></h5>
            <p>Tipo: <?php  echo $auto['tipo'] ?></p>
            <p>Año: <?php  echo $auto['anio'] ?></p>
            <p>Color: <?php  echo $auto['color'] ?></p>
            <p>Kilometraje: <?php  echo $auto['km'] ?></p>
            <a href="#" class="btn btn-primary" onclick='mostrarModal(<?php echo htmlspecialchars(json_encode($auto), ENT_QUOTES, 'UTF-8'); ?>)'>Ver más</a>

        </div>
    </div>
</div>
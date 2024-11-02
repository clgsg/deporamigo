<h1>Actividades / <strong>Show</strong></h1>
<!-- htmlspecialchars allows us to escape especial caracters for html rendering -->
<?php foreach ($actividades as $actividad): ?>
    <h2>Número de actividad: 
        <?= 
        var_dump($actividad);
        htmlspecialchars($actividad["id_actividad"]) ?>
    </h2>
    <p>Actividad: 
        <?= htmlspecialchars($actividad["deporte"]) ?>
    </p>
    <p>Fecha: 
        <?= htmlspecialchars($actividad["fecha"]) ?>
    </p>
    <p>Lugar: 
        <?= htmlspecialchars($actividad["instalaciones"]) ?>
    </p>
    
<?php endforeach; ?>    
    </body>
</html>
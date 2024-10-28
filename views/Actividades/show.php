<h1>Actividades / <strong>Show</strong></h1>
<!-- htmlspecialchars allows us to escape especial caracters for html rendering -->
<?php foreach ($actividades as $actividad): ?>
    <h2>Número de actividad: <?= htmlspecialchars($actividad["id_actividad"]) ?></h2>
    <p>Actividad: <?= htmlspecialchars($actividad["fk_deporte"]) ?></p>
    <p>Lugar: <?= htmlspecialchars($actividad["fk_instalacion"]) ?></p>
    
<?php endforeach; ?>    
    </body>
</html>
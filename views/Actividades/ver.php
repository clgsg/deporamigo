<h1>Actividades / Ver </h1>
<!-- htmlspecialchars allows us to escape especial caracters for html rendering -->
<?php foreach ($actividades as $actividad): ?>
    <h2>Número de actividad: <?= htmlspecialchars($actividad["id_actividad"]) ?></h2>
    <p>Actividad: <?= htmlspecialchars($actividad["deporte"]) ?></p>
    <p>Lugar: <?= htmlspecialchars($actividad["lugar"]) ?></p>
    
<?php endforeach; ?>    
    </body>
</html>
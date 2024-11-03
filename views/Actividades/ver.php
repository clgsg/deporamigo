<h1>Actividades / Ver </h1>
<!-- htmlspecialchars allows us to escape especial caracters for html rendering -->
<?php foreach ($actividades as $actividad): ?>
    <!--<p>Número de actividad: <?= htmlspecialchars($actividad["id_actividad"]) ?></p> -->
    <p>Deporte: <?= htmlspecialchars($actividad["deporte"]) ?></p>
    <p>Fecha: <?= htmlspecialchars($actividad["fecha"]) ?></p>
    <p>Lugar: <?= htmlspecialchars($actividad["lugar"]) ?></p>
    <br>
    
<?php endforeach; ?>    
    </body>
</html>
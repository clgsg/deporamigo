<h1>Actividades / Mostrar </h1>

<!-- htmlspecialchars allows us to escape especial caracters for html rendering -->

<?php foreach ($actividades as $actividad): ?>
    <h2>Número de actividad: 
        <?= 
        htmlspecialchars($actividad["id_actividad"]) ?>
    </h2>
    <p>Actividad: 
        <?= htmlspecialchars($actividad["deporte"]) ?>
    </p>
    <p>Fecha: 
        <?= htmlspecialchars($actividad["fecha"]) ?>
    </p>
    <p>Lugar: 
        <?= htmlspecialchars($actividad["lugar"]) ?>
    </p>
    <br>
<?php endforeach; ?>  




    </body>
</html>
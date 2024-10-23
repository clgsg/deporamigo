
<h2>Esta es la página Actividades/show</h2>
<?php foreach ($actividades as $actividad): ?>
    <h2>Id actividad <?= htmlspecialchars($actividad["id_actividad"]) ?></h2>
    <p>Actividad: <?= htmlspecialchars($actividad["apodo"]) ?></p>
    <p>Lugar: <?= htmlspecialchars($actividad["nombre"]) ?></p>
    <p>Fecha: <?= htmlspecialchars($actividad["apellido1"])?> 
    <p>Segundo apellido: <?= htmlspecialchars($actividad["apellido2"])?></p>
<?php endforeach; ?>    
</body>
</html>
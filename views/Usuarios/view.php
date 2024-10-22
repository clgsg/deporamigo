    

<h1>Usuarios</h1>
<!-- htmlspecialchars allows us to escape especial caracters for html rendering -->
<?php foreach ($usuarios as $usuario): ?>
    <h2>Usuario número <?= htmlspecialchars($usuario["id_usuario"]) ?></h2>
    <p>Apodo: <?= htmlspecialchars($usuario["apodo"]) ?></p>
    <p>Nombre: <?= htmlspecialchars($usuario["nombre"]) ?></p>
    <p>Primer apellido: <?= htmlspecialchars($usuario["apellido1"])?> 
    <p>Segundo apellido: <?= htmlspecialchars($usuario["apellido2"])?></p>
<?php endforeach; ?>    
    </body>
</html>
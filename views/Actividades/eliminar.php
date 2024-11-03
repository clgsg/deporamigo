<h1>Eliminar actividad</h1>

<form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

<p>¿Eliminar esta actividad?</p>

<button class="lightButton">No eliminar</button>
<button class="redButton">Sí, eliminar</button>

</form>

<p><a href="/actividades/<?= $actividad["id"] ?>/mostrar">Volver a la actividad</a></p>

</body>
</html>
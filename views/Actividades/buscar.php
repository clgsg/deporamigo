<h1>Crear actividad</h1>
<form class="form" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div style="color:red" hidden>
        <label for="apodo">Apodo (usuario conectado)</label>
        <input type="text" name="apodo" id="apodo" >
    </div>
    <br>
    <div class="formField">
        <label class="formLabel" for="tipoActividad">Tipo de actividad</label>
        <select name="tipoActividad" id="tipoActividad" placeholder="Elige un deporte" size="1" required>
            <option>Deporte 1   </option>
            <option>Deporte 2   </option>
            <option>Deporte 3   </option>
            <option>Deporte 4   </option>
            <option>Deporte 5   </option>
            <option>Deporte 6   </option>
        </select>
    </div>
    <br>
    <div class="formField">
        <label class="formLabel" for="lugar">Lugar</label>
        <select name="lugar" id="lugar" placeholder="Elige un deporte" size="1" required>
                <!-- TODO: añadir foreach que recupere deportes en el desplegable  -->
            <option value="P.M. Alejandra Valle"> 
                <?php $lugar=htmlspecialchars("P.M. Alejandra Valle"); echo "P.M. Alejandra Valle"; ?> 
            </option>
            <option value="DeporFit"> 
                <?php $lugar=htmlspecialchars("DeporFit");  echo "DeporFit"; ?>  
            </option>
            <option value="P.M. Santa Cecilia">
                <?php $lugar=htmlspecialchars("P.M. Santa Cecilia");  echo "P.M. Santa Cecilia"; ?> 
            </option>
            <option value="P.M. Vallelado">
                 <?php $lugar=htmlspecialchars("P.M. Vallelado");  echo "P.M. Vallelado"; ?> 
                </option>
            <option value="otro">
                 <?php $lugar=htmlspecialchars("otro");  echo "otro (añadir Notas)"; ?> 
            </option>
            
        </select>
    </div>
  <br>
    <div class="formField">
        <label class="formLabel" for="fecha">Fecha y hora</label>
        <input id="fecha" type="datetime-local" class="formInput" name="fecha">
    </div>
    <br>
    <div class="formField">
        <label class="formLabel" for="partMin">Part. mín.</label>
        <input id="partMin" type="text" class="formInput" placeholder="0" name="partMin">
    </div>
    <br>
    <div class="formField">
        <label class="formLabel" for="partMax">Part. máx.</label>
        <input id="partMax" type="text" class="formInput" placeholder="0" name="partMax">
    </div>
    <br>
    <div class="formField">
        <label class="formLabel" for="notasBox">Notas</label>
        <textarea id="notasBox" name="notas" rows="5" cols="50" placeholder="¿Algo que añadir? (Ejemplo: Falta equipamiento, se mantiene en caso de lluvia, etc.)"></textarea>
    </div>
    <br>
    <div>
    <button class="lightButton">Limpiar formulario</button>
    <button class="darkButton">Crear actividad</button>
    </div>
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


</form>

</body>
</html>
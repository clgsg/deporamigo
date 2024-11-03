<h1>Crear actividad</h1>
<form class="form" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div style="color:red" hidden>
        <label for="apodo">Apodo (usuario conectado)</label>
        <input type="text" name="apodo" id="apodo" >
    </div>
    <br>
    <div class="formField">
        <label class="formLabel" for="deporte">Deporte/Actividad</label>
        <select name="deporte" id="deporte" size="1" required>
            <option selected="selected">Elige un deporte</option>
            <?php 
            foreach($deportes as $deporte) :
            ?>
                <option value="<?php echo htmlspecialchars($deporte) ?>">
            <?php echo htmlspecialchars($deporte); ?>
            </option>
            <?php  
            endforeach; ?>
        </select>
    </div>
    <br>
    <div class="formField">
        <label class="formLabel" for="fecha">Fecha y hora</label>
        <input id="fecha" type="datetime-local" class="formInput" name="fecha">
    </div>
    <br>
    <div class="formField">
    <label class="formLabel" for="lugar">Lugar</label>
        <select name="lugar" id="lugar" size="1" required>
            <option selected="selected">Elige un lugar</option>
            <?php foreach($lugares as $lugar) { ?>
                <option value="<?php echo htmlspecialchars($lugar["lugar"]); ?>">
            <?php echo htmlspecialchars($lugar["lugar"]); ?>
            </option>
            <?php  } ?>
        </select>
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
</form>

</body>
</html>
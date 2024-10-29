<h1>Crear actividad</h1>
<form class="form" method="post">
    <div class="formField">
        <label class="formLabel" for="tipoActividad">Tipo de actividad</label>
        <select name="tipoActividad" id="tipoActividad" placeholder="Elige un deporte" size="1" required>
                <!-- TODO: añadir foreach que recupere deportes en el desplegable  -->
            <option value="bádminton">bádminton </option>
            <option value="baloncesto">baloncesto </option>
            <option value="caminata">caminata</option>
            <option value="ciclismo">ciclismo</option>
            <option value="fútbol">fútbol</option>
            
        </select>
    </div>
    <div class="formField">
        <label class="formLabel" for="lugar">Lugar</label>
        <input id="lugar" type="select" class="formInput" placeholder="Lugar" name="lugar">
    </div>
    <div class="formField">
        <label class="formLabel" for="cuando">Fecha y hora</label>
        <input id="cuando" type="datetime-local" class="formInput" name="cuando">
    </div>
    
    <div class="formField">
        <label class="formLabel" for="partMin">Part. mín.</label>
        <input id="partMin" type="text" class="formInput" placeholder="0" name="partMin">
    </div>
    <div class="formField">
        <label class="formLabel" for="partMax">Part. máx.</label>
        <input id="partMax" type="text" class="formInput" placeholder="0" name="partMax">
    </div>
    <div class="formField">
        <label class="formLabel" for="notasBox">Notas</label>
        <textarea id="notasBox" name="notas" rows="5" cols="50" placeholder="¿Algo que añadir? (Ejemplo: Falta equipamiento, se mantiene en caso de lluvia, etc.)"></textarea>
    </div>
    <div>
    <button class="lightButton">Borrar formulario</button>
    <button class="darkButton">Crear actividad</button>
    </div>
</form>

</body>
</html>
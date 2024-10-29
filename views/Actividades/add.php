
    

<h1>Crear actividad</h1>
<form class="form" method="post">
    <div class="formField">
        <label class="formLabel" for="tipoActividad">Tipo de actividad</label>
        <select name="tipoActividad" id="tipoActividad">
            <option value="<?php echo $value['profile']; ?>">
                <?php echo $value['profile']; ?>
            </option> 
        </select>
    </div>
    <div class="formField">
        <label class="formLabel" for="cuando">Fecha y hora</label>
        <input id="cuando" type="datetime-local" class="formInput" name="cuando">
    </div>
    <div class="formField">
        <label class="formLabel" for="lugar">Lugar</label>
        <input id="lugar" type="select" class="formInput" placeholder="Lugar" name="lugar">
    </div>
    
    <div class="formField">
        <label class="formLabel" for="pwd">Contraseña</label>
        <input id="pwd" type="password" class="formInput" placeholder="Contraseña" name="contraseña">
    </div>

    <input class="clearButton"  type="clear" value="Borrar formulario">
    <input class="submitButton"  type="submit" value="Crear actividad">
</form>

</body>
</html>
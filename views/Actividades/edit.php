<h1>Editar actividad</h1>
<form class="form" method="post">
    
    <div class="formField">
        <label class="disabledFormLabel" for="tipoActividad">Tipo de actividad</label>
        <input class="disabledField" name="tipoActividad" id="tipoActividad" disabled value="Deporte seleccionado">
    </div>
    <div class="formField">
        <label class="formLabel" for="lugar">Lugar</label>
        <select name="lugar" id="lugar" placeholder="Elige un deporte" size="1"  >
                <!-- TODO: añadir foreach que recupere deportes en el desplegable  -->
            <option value="P.M. Alejandra Valle"> 
                <?php $nombre_instalacion=htmlspecialchars("P.M. Alejandra Valle"); echo "P.M. Alejandra Valle"; ?> 
            </option>
            <option value="DeporFit"> 
                <?php $nombre_instalacion=htmlspecialchars("DeporFit");  echo "DeporFit"; ?>  
            </option>
            <option value="P.M. Santa Cecilia">
                <?php $nombre_instalacion=htmlspecialchars("P.M. Santa Cecilia");  echo "P.M. Santa Cecilia"; ?> 
            </option>
            <option value="P.M. Vallelado">
                 <?php $nombre_instalacion=htmlspecialchars("P.M. Vallelado");  echo "P.M. Vallelado"; ?> 
                </option>
            <option value="otro">
                 <?php $nombre_instalacion=htmlspecialchars("otro");  echo "otro (añadir Notas)"; ?> 
            </option>
            
        </select>
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
    
    <button class="lightButton">Limpiar formulario</button>
    <button class="darkButton">Guardar cambios</button>
    <button class="redButton">Eliminar actividad</button>
    </div>
</form>

</body>
</html>
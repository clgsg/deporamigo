

<h2 class="login_header><?php echo "DEPORAMIGO";?></h2>

<p class="login_text">Inicia sesión o regístrate</p>

<form class="form" method="post">
    <div class="formField">
        <label class="formLabel" for="email">Correo electrónico</label>
        <input id="email" type="email" class="formInput" placeholder="Email con el que te registraste" name="email">
    </div>
    <br>
    <div class="formField">
        <label class="formLabel" for="pwd">Contraseña</label>
        <input id="pwd" type="password" class="formInput" placeholder="Contraseña" name="contraseña">
    </div>
    <br>
    <input class="submitButton"  type="submit" value="Iniciar sesión">
</form>
<div class="">
    <a class="darkLink" href="/usuarios/registrarse">Darme de alta en el servicio</a>
    <br>
    <a class="darkLink" href="/usuarios/pwd">Olvidé mi contraseña</a>

    
</div>


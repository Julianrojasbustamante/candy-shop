<!--incio login-->
<div id="fondo"></div>
<div class="login-box">
    <div class="login-logo">
        <img class="img-responsive" src="vista/img/logo-ingreso.png" alt="Oso rojo">
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Ingrese su nueva contraseña</p>
        <form method="POST">
            <div class="form-group has-feedback">
                <input type="hidden" name="formulario_nueva_contrasena_fecha" id="formulario_nueva_contrasena_fecha" value="<?php echo $GLOBALS["fecha"] ?>">
                <label class="control-label">Nueva contraseña</label>
                <input type="password" name="formulario_nueva_contrasena" id="formulario_nueva_contrasena" class="form-control" placeholder="Minimo 6 caracteres" minlength="6" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <label class="control-label">Repetir contraseña</label>
                <input type="password" name="verificar_formulario_nueva_contrasena" id="verificar_formulario_nueva_contrasena" class="form-control" placeholder="Minimo 6 caracteres" minlength="6" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
        </form>
        <div class="row">
            <div class="col-xs-8">
                <a href="login">Regresar</a>
            </div>
            <div class="col-xs-4">
                <button type="submit" class="btn btn-login btn-block btn-flat" id="formulario_nueva_contrasena">Enviar</button>
            </div>
        </div>
    </div>
</div>
<div id="frase">
    <div class="row">
        <div class="col-xs-12">
            <h1>"El futuro depende de lo que hagas ahora"</h1>
        </div>
    </div>
</div>

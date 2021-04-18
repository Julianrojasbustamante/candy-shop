<div id="fondo"></div>
<div class="login-box">
    <div class="login-logo">
        <img class="img-responsive" src="vista/img/logo-ingreso.png" alt="Oso rojo">
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Ingrese su correo electrónico</p>
        <form method="POST">
            <div class="form-group has-feedback">
                <input type="hidden" name="formulario_recuperar_contrasena_fecha" id="formulario_recuperar_contrasena_fecha" value="<?php echo $GLOBALS["fecha"] ?>">
                <input type="email" name="formulario_recuperar_contrasena_correo" id="formulario_recuperar_contrasena_correo" class="form-control" placeholder="Correo electrónico" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
        </form>
        <div class="row">
            <div class="col-xs-8">
                <a href="login">Regresar</a>
            </div>
            <div class="col-xs-4">
                <button type="submit" class="btn btn-login btn-block btn-flat recuperar_contrasena_correo">Enviar</button>
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

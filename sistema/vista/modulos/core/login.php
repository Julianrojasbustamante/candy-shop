<!--incio login-->
<div id="fondo" style="background:linear-gradient(to right,rgba(247, 4, 174, 0.705),rgba(3, 253, 253, 0.664)); color:white; font-size:2rem; opacity:0.6;"></div>
<div class="login-box">
    <div class="login-logo">
        <img class="img-circle" whidht="200px" height="250px" src="vista/img/logo-ingreso.png" alt="Oso rojo">
    </div>
    <div class="login-box-body fomulario-login" >
        <p class="login-box-msg"  style="font-family: 'Lobster', cursive; font-size:3rem;">Inicar sesion</p>
        <form method="POST">
            <?php
                $ingreso = new Administrador_Controlador();
                $ingreso -> administrador_ingreso_controlador();
            ?>
            <div class="form-group has-feedback">
                <input type="email" name="ingresoCorreo" class="form-control" placeholder="Correo electrónico" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="ingresoContrasena" class="form-control" placeholder="Contraseña" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div  class="col-xs-8">
                    <a style="color:white; font-size:16px;" href="recuperar-contrasena">Recuperar contraseña</a>
                </div>
                <div class="col-xs-4">
                    <button type="submit"  style="color:white; background:rgba(247, 4, 174, 0.705);" class="btn btn-block">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="frase">
    <div class="row">
        <div class="col-xs-12">
            <h1 style="font-family: 'Lobster', cursive;" >"As sweet as you"</h1>
        </div>
    </div>
</div>

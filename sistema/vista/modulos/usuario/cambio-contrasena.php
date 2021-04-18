<div class="content-wrapper">
    <!-- inicio menu superior contenido---->
    <section class="content-header">
        <h1>Usuario
            <small>Cambio contraseña</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active">Cambio contraseña</li>
        </ol>
    </section>
    <!-- inicio contenido-->
    <section class="content">
        <div class="row">
            <section class="col-xs-12 col-lg-6 col-lg-offset-3">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Actualizar contraseña</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="alert alert-warning text-center"><i class="icon fa fa-warning"></i><strong>ATENCIÓN:</strong><br> Como es la primera vez que ingresas a nuestro sistema, por <strong>seguridad</strong> es necesario que actualices tu contraseña, cuando lo hagas deberás iniciar sesión de nuevo.<br><strong>Gracias</strong></div>
                        <form method="POST">
                            <div class="form-group has-feedback">
                                <input type="hidden" id="id_usuario_nueva_contrasena" name="id_usuario_nueva_contrasena" value="<?php echo $_SESSION["id"];?>">
                                <label class="control-label">Nueva contraseña</label>
                                <input type="password" class="form-control" id="nueva_contrasena" name="nueva_contrasena" placeholder="Minimo 6 caracteres" minlength="6" required>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label class="control-label">Repetir contraseña</label>
                                <input type="password" class="form-control" id="verificar_nueva_contrasena" name="verificar_nueva_contrasena" placeholder="Minimo 6 caracteres" minlength="6" required>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                        </form>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default pull-left borrar-formulario">Borrar</button>
                            <button type="submit" class="btn btn-success pull-right cambio-contrasena">Enviar</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</div>

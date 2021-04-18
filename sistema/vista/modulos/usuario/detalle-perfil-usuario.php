<?php if(!isset($_SESSION["id"])){ echo '<script>window.location = "login";</script>'; exit();};?>

<div class="content-wrapper">
    <!-- inicio menu superior contenido---->
    <section class="content-header">
        <h1>
            Usuarios
            <small>Perfil usuario</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active">Perfil usuario</li>
        </ol>
    </section>
    <!-- inicio contenido-->
    <section class="content">
        <div class="row">
            <section class="col-xs-12 col-md-3">
                <?php
                    $perfil = new Usuario_Controlador();
                    $perfil -> perfil_usuario_controlador();
                ?>
            </section>
            <section class="col-xs-12 col-lg-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos usuario</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <?php
                            $usuario = new Usuario_Controlador();
                            $usuario -> editar_usuario_controlador();
                        ?>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-warning pull-left perfil-cambiar-contrasena" data-toggle="modal" data-target="#modal_perfil_cambiar_contrasena">Cambiar contraseña</button>
                            <button type="submit" class="btn btn-success pull-right perfil-editar-usuario">Enviar</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div id="modal_perfil_cambiar_contrasena" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background:var(--color-principal); color:white">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cambiar contraseña</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body" id="formulario-modal">
                            <form method="POST">
                            <div id="aviso_verificar_contrasena" class="form-group "></div>
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
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-success cambio-contrasena">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="modal_perfil_cambiar_avatar" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background:var(--color-principal); color:white">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cambiar imagen de perfil</h4>
                    </div>
                    <div class="modal-body text-center">
                        <div class="box-body">
                            <form method="POST">
                                <div class="form-group has-feedback">
                                    <p class="help-block">Tamaño recomendado 200px * 200px</p>
                                    <input type="hidden" id="perfil_editar_avatar_id_usuario" value="<?php echo$_SESSION["id"];?>">
                                    <input type="file" id="perfil_editar_avatar_usuario">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-success editar-perfil-avatar">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

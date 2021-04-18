<?php if(!isset($_SESSION["id"])){ echo '<script>window.location = "login";</script>'; exit();};?>
<?php if($_SESSION["rol"] != 1){ echo '<script>window.location = "inicio";</script>'; exit();};?>

<div class="content-wrapper">
    <!-- inicio menu superior contenido---->
    <section class="content-header">
        <h1>
            Usuarios
            <small>Gestión usuarios</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active">Gestión usuarios</li>
        </ol>
    </section>
    <!-- inicio contenido-->
    <section class="content">
        <div class="row">
            <!-- columna izquierda -->
            <section class="col-xs-12 col-lg-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nuevo usuario</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form method="POST">
                            <div class="form-group has-feedback">
                                <label class="control-label">Nombres y apellidos</label>
                                <input type="hidden" id="nuevo_usuario_auditoria_usuario" value="<?php echo $_SESSION["id"];?>">
                                <input type="hidden" id="nuevo_usuario_auditoria_creado" value="<?php echo $GLOBALS["fecha"];?>">
                                <input type="text" class="form-control requerir_letras" id="nuevo_usuario_nombres" name="nuevo_usuario_nombres" placeholder="Nombres y apellidos" required>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label class= "control-label">Correo electrónico</label>
                                <input type="email" class="form-control requerir_correo" id="nuevo_usuario_email" name="nuevo_usuario_email" placeholder="usuario@correo.com" required>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label class="control-label">Rol</label>
                                <select class="form-control requerir_letras" id="nuevo_usuario_rol" name="nuevo_usuario_rol" required>
                                    <option value="">Elige una opción</option>
                                    <?php
                                        $rol = new Usuario_Controlador();
                                        $rol -> formulario_rol_controlador();
                                    ?>
                                </select>
                            </div>
                        </form>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default pull-left borrar-formulario">Borrar</button>
                            <button type="submit" class="btn btn-success pull-right nuevo-usuario btn_enviar">Enviar</button>
                        </div>
                    </div>
                </div>
            </section>
            <!-- columna derecha -->
            <section class="col-xs-12 col-lg-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Listado usuarios</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <?php
                            $listado_usuario = new Usuario_Controlador();
                            $listado_usuario -> lista_usuario_controlador();
                        ?>
                    </div>
                </div>
            </section>
        </div>
        <div id="modal_editar_perfil_usuario" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background:var(--color-principal); color:white">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Perfil Usuario</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body" id="formulario-modal">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-success actualizar-usuario">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="modal_eliminar_usuario" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background:var(--color-principal); color:white">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Eliminar Usuario</h4>
                    </div>
                    <div class="modal-body text-center">
                        <div class="box-body" id="formulario-modal-eliminar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-success borrar-usuario">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

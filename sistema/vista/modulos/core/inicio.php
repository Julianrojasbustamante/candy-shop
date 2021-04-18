<?php if(!isset($_SESSION["id"])){ echo '<script>window.location = "login";</script>'; exit();};?>

<div class="content-wrapper">
    <!-- inicio menu superior contenido---->
    <section class="content-header">
        <h1>
            Inicio
            <small>Estadísticas</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active">Estadísticas</li>
        </ol>
    </section>
    <!-- inicio contenido-->
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <?php
                            $usuarios = new Usuario_Controlador();
                            $usuarios -> total_usuario_controlador();
                        ?>

                        <p>Usuarios</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="usuario" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <?php
                            $solicitudes = new Cliente_Controlador();
                            $solicitudes -> total_solicitud_controlador();
                        ?>

                        <p>Solicitudes</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <a href="solicitudes" class="small-box-footer">ver más <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <?php
                            $clientes = new Cliente_Controlador();
                            $clientes -> total_cliente_controlador();
                        ?>

                        <p>Clientes</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <a href="nuevo-cliente" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>548</h3>

                        <p>Cotizaciones</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <a href="#" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- columna izquierda -->
            <section class="col-lg-6">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure nam maxime veniam cupiditate sunt enim reprehenderit ad, beatae quae quia nemo repellendus deleniti sit aspernatur atque. Corporis aperiam, impedit doloremque!</p>
            </section>
            <!-- /columna izquierda -->
            <!-- columna derecha -->
            <section class="col-lg-6">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure nam maxime veniam cupiditate sunt enim reprehenderit ad, beatae quae quia nemo repellendus deleniti sit aspernatur atque. Corporis aperiam, impedit doloremque!</p>
            </section>
            <!-- columna derecha -->
        </div>
    </section>
</div>

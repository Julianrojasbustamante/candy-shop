<!--incio encabezado-->
<header class="main-header">
    <!-- inicio logo-->
    <a href="inicio" class="logo text-black" >
        <span class="logo-mini"><img src="vista/img/logo.png" class="img-responsive" width="320"; height="320"; alt="Candy Shop"></span>
        <b  style="font-family: 'Lobster', cursive; font-size:3rem;">Candy shop</b>
    </a>
    <!-- inicio opciones cabecera-->
    <nav class="navbar navbar-static-top" style="background:linear-gradient(to right,rgba(247, 4, 174, 0.705),rgba(3, 253, 253, 0.664));  ">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- inicio notificaciones -->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Tienes 4 mensages</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="vista/img/avatar/usuario.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Soporte
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">Ver todos los mensajes</a></li>
                    </ul>
                </li>
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Tienes 10 notificaciones</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> Lorem ipsum dolor sit amet
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> Lorem ipsum dolor sit amet
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-red"></i> Lorem ipsum dolor sit amet
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> Lorem ipsum dolor sit amet
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user text-red"></i> Lorem ipsum dolor sit amet
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">Ver todas las notificaiones</a></li>
                    </ul>
                </li>
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Tienes 9 tareas</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <h3>
                                            Lorem ipsum dolor sit amet
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <h3>
                                        Lorem ipsum dolor sit amet
                                        <small class="pull-right">40%</small>
                                    </h3>
                                    <div class="progress xs">
                                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">40% Complete</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <h3>
                                    Lorem ipsum dolor sit amet
                                    <small class="pull-right">60%</small>
                                </h3>
                                <div class="progress xs">
                                    <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h3>
                                Lorem ipsum dolor sit amet
                                <small class="pull-right">80%</small>
                            </h3>
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only">80% Complete</span>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="footer">
            <a href="#">Ver todas las tareas</a>
        </li>
    </ul>
</li>
<!-- inicio perfil usuario -->
<?php include "perfil-usuario.php";?>
<!-- <li>
    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
</li> -->
<li>
    <a href="salir"><i class="fas fa-power-off"></i></a>
</li>
</ul>
</div>
</nav>
</header>
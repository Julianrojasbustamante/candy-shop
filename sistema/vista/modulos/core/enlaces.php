<?php
if($_SESSION["rol"] == 1){
    echo '<ul class="sidebar-menu" data-widget="tree">
        <li>
            <a href="inicio">
                <i class="fas fa-home"></i><span> Inicio</span>
            </a>
        </li>
        <li>
            <a href="usuario">
                <i class="fa fa-users"></i><span> Usuarios</span>
            </a>
        </li>
        <li>
            <a href="nuevo-cliente">
                <i class="fas fa-user-tie"></i><span> Clientes</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-scissors"></i><span> Servicios</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="active"><a href="gestion-producto"><i class="fa fa-circle-o"></i> Gestor de servicios</a></li>
                <li class="active"><a href="gestion-categoria"><i class="fa fa-circle-o"></i> Gestor de categorias</a></li>
            </ul>
        </li>
    </ul>';
}

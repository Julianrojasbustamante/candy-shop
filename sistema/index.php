<?php
require_once "modelo/ruta.php";
require_once "modelo/core.php";
require_once "modelo/usuario.php";

require_once "controlador/plantilla.php";
require_once "controlador/ruta.php";
require_once "controlador/core.php";
require_once "controlador/usuario.php";

$plantilla = new Plantilla_Controlador();
$plantilla -> plantilla();

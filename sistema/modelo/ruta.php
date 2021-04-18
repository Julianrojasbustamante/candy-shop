<?php

class Ruta_Sistema_Modelo{

    public function fecha_modelo(){
        date_default_timezone_set("America/Bogota");
        $fecha_servidor = date("Y-m-d H:i:sa");
        return  $fecha_servidor;
    }

    public function raiz_modelo(){
        return  "http://localhost/replica-oso-rojo/sistema/";
    }
    
    static public function ruta_modelo($enlace){
        if ($enlace == "inicio" ||
            $enlace == "perfil-usuario" ||
            $enlace == "salir") {
            $modulo = "vista/modulos/core/".$enlace.".php";
        }
        else if ($enlace == "usuario" ||
            $enlace == "cambio-contrasena" ||
            $enlace == "recuperar-contrasena" ||
            $enlace == "nueva-contrasena" ||
            $enlace == "detalle-perfil-usuario") {
            $modulo = "vista/modulos/usuario/".$enlace.".php";
        }
        else if ($enlace == "solicitudes" ||
            $enlace == "nuevo-cliente" ||
            $enlace == "gestion-cliente") {
            $modulo = "vista/modulos/cliente/".$enlace.".php";
        }

        else if ($enlace == "producto" ||
            $enlace == "gestion-producto" ||
            $enlace == "gestion-categoria" ||
            $enlace == "gestion-subcategoria") {
            $modulo = "vista/modulos/producto/".$enlace.".php";
        }
        else if ($enlace == "mensajes") {
            $modulo = "vista/modulos/mensaje/".$enlace.".php";
        }
        else if ($enlace == "index") {
            $modulo = "vista/modulos/core/login.php";
        }
        else {
            $modulo = "vista/modulos/core/login.php";
        }
        return $modulo;
    }
}


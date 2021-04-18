<?php
class Ruta_Controlador{

    public function fecha_controlador(){
        $respuesta = Ruta_Sistema_Modelo::fecha_modelo();
        return $respuesta;
    }
    
    public function raiz_controlador(){
        $respuesta = Ruta_Sistema_Modelo::raiz_modelo();
        return $respuesta;
    }

    public function enlace_controlador(){
        if(isset($_GET["accion"])) {
            $enlace = $_GET["accion"];
        }
        else {
            $enlace = "index";
        }
        $respuesta = Ruta_Sistema_Modelo::ruta_modelo($enlace);
        include $respuesta;
    }
}

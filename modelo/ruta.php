<?php

class Ruta_Modelo{

    public function raiz_modelo(){
        return  "http://localhost/BarberShopJJ/";
    }

    static public function enlace_modelo($enlace){
        if ($enlace == "") {
            $modulo = "vista/modulo/".$enlace.".php";
        }else {
            $modulo = "vista/modulo/inicio.php";
        }
        return $modulo;
    }
}
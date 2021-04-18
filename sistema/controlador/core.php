<?php

class Administrador_Controlador{
    public function administrador_ingreso_controlador(){
        if(isset($_POST["ingresoCorreo"]) && isset($_POST["ingresoContrasena"])) {
            $encriptar = crypt(htmlspecialchars($_POST["ingresoContrasena"]), '$2a$07$GSVs6pSNqiKLkHE6dOtZPejPtcf/bRSl2n2WvmNE2yIZAEW7t9J.a');
            $dato_ingreso = array("correo"=>htmlspecialchars($_POST["ingresoCorreo"]), "contrasena"=>$encriptar);
            $respuesta = Administrador_Modelo::administrador_ingreso_modelo("usuario", $dato_ingreso);
            if($respuesta != false && $_POST["ingresoContrasena"] != 'UsuarioSistema'){
                date_default_timezone_set("America/Bogota");
                $fecha = date("Y-m-d H:i:sa");
                $datos_registro_ingreso = array("idUsuario"=>$respuesta["id"], "fecha"=>$fecha);
                $ingreso = Administrador_Modelo::administrador_registro_ingreso_modelo("usuario", $datos_registro_ingreso);
                $_SESSION["id"] = $respuesta["id"];
                $_SESSION["rol"] = $respuesta["rol"];
                $_SESSION["validar_sesion"] = "ok";
                setcookie ("usuario", $respuesta["id"]);
                setcookie ("raiz", $GLOBALS["raiz"]);
                setcookie ("rol", $_SESSION["rol"]);
                echo '<script type="text/javascript">
                var pagina = "inicio";
                var segundos = 0;
                function redireccion() {
                    document.location.href=pagina;
                }
                setTimeout("redireccion()",segundos);
                </script>';
            }
            else if($respuesta != false && $encriptar == '$2a$07$GSVs6pSNqiKLkHE6dOtZPelYlIQQPV/f2H6on4TRJk3qk4W6fxuS2'){
                date_default_timezone_set("America/Bogota");
                $fecha = date("Y-m-d H:i:sa");
                $datos_registro_ingreso = array("idUsuario"=>$respuesta["id"], "fecha"=>$fecha);
                $ingreso = Administrador_Modelo::administrador_registro_ingreso_modelo("usuario", $datos_registro_ingreso);
                $_SESSION["id"] = $respuesta["id"];
                $_SESSION["validar_sesion"] = "pendiente";
                echo '<script type="text/javascript">
                var pagina = "cambio-contrasena";
                var segundos = 0;
                function redireccion() {
                    document.location.href=pagina;
                }
                setTimeout("redireccion()",segundos);
                </script>';
            }
            else if(isset($_SESSION["id"]) && isset($_SESSION["validar_sesion"])){
                echo '<script type="text/javascript">
                        var pagina = "inicio";
                        var segundos = 0;
                        function redireccion() {
                            document.location.href=pagina;
                        }
                        setTimeout("redireccion()",segundos);
                    </script>';
            }else {
                echo '<div class="alert alert-danger text-center">Error al ingresar, verifique sus datos.</div>';
            }
        }
    }

    public function perfil_administrador_controlador(){
        $respuesta = Administrador_Modelo::perfil_administrador_modelo("usuario", $_SESSION["id"]);
            echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="'.$GLOBALS['raiz'].'/vista/img/avatar/'.$respuesta["avatar"].'" class="user-image" alt="User Image">
                <span class="hidden-xs">'.$respuesta["nombres"].'</span>
            </a>
            <ul class="dropdown-menu">
                <li class="user-header">
                    <img src="'.$GLOBALS['raiz'].'/vista/img/avatar/'.$respuesta["avatar"].'" class="img-circle" alt="User Image">
                    <p>
                        '.$respuesta["nombres"].'
                        <small>'.$respuesta["rol"].'</small>

                </li>
                <li class="user-footer">
                    <div class="pull-left">
                        <a href="detalle-perfil-usuario" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                        <a href="salir" class="btn btn-default btn-flat">Salir</a>
                    </div>
                </li>
            </ul>';
    }
}

<?php
require_once "../../modelo/usuario.php";
require_once "../../controlador/usuario.php";

class Usuario_Ajax{

    public $verificar_usuario_email;
    public function verificar_usuario_email_ajax(){
        $datos = $this->verificar_usuario_email;
        $respuesta = Usuario_Controlador::verificar_usuario_email_controlador($datos);
        return $respuesta;
    }

    public $nuevo_usuario_auditoria_usuario;
    public $nuevo_usuario_auditoria_creado;
    public $nuevo_usuario_nombres;
    public $nuevo_usuario_email;
    public $nuevo_usuario_rol;
    public function registro_usuario_ajax(){
        $datos = array("nuevo_usuario_auditoria_usuario"=>htmlspecialchars($this->nuevo_usuario_auditoria_usuario),
                        "nuevo_usuario_auditoria_creado"=>htmlspecialchars($this->nuevo_usuario_auditoria_creado),
                        "nuevo_usuario_nombres"=>htmlspecialchars($this->nuevo_usuario_nombres),
                        "nuevo_usuario_email"=>htmlspecialchars($this->nuevo_usuario_email),
                        "nuevo_usuario_rol"=>htmlspecialchars($this->nuevo_usuario_rol));
        $respuesta = Usuario_Controlador::registro_usuario_controlador($datos);
        echo $respuesta;
    }

    public $estado_usuario_id;
    public $estado_auditoria_usuario;
    public $estado_usuario;
    public function estado_usuario_ajax(){
        $datos = array("estado_usuario_id"=>htmlspecialchars($this->estado_usuario_id),
                        "estado_auditoria_usuario"=>htmlspecialchars($this->estado_auditoria_usuario),
                        "estado_usuario"=>htmlspecialchars($this->estado_usuario));
        $respuesta = Usuario_Controlador::actualizar_estado_usuario_controlador($datos);
        echo $respuesta;
    }

    public $formulario_editar_id_usuario;
    public $formulario_editar_actualizado_por;
    public function formulario_editar_usuario_ajax(){
        $datos = array("formulario_editar_id_usuario"=>$this->formulario_editar_id_usuario,
                        "formulario_editar_actualizado_por"=>$this->formulario_editar_actualizado_por);
        $respuesta = Usuario_Controlador::formulario_actualizar_usuario_controlador($datos);
        return $respuesta;
    }

    public $editar_id_usuario;
    public $editar_actualizado_por;
    public $editar_nombres;
    public $editar_email;
    public $editar_rol;
    public function actualizar_usuario_ajax(){
        $datos = array("editar_id_usuario"=>htmlspecialchars($this->editar_id_usuario),
                        "editar_actualizado_por"=>htmlspecialchars($this->editar_actualizado_por),
                        "editar_nombres"=>htmlspecialchars($this->editar_nombres),
                        "editar_email"=>htmlspecialchars($this->editar_email),
                        "editar_rol"=>htmlspecialchars($this->editar_rol));
        $respuesta = Usuario_Controlador::actualizar_usuario_controlador($datos);
        echo $respuesta;
    }

    public $formulario_eliminar_id_usuario;
    public $formulario_eliminar_actualizado_por;
    public function formulario_eliminar_usuario_ajax(){
        $datos = array("formulario_eliminar_id_usuario"=>$this->formulario_eliminar_id_usuario,
                        "formulario_eliminar_actualizado_por"=>$this->formulario_eliminar_actualizado_por);
        $respuesta = Usuario_Controlador::formulario_eliminar_usuario_controlador($datos);
        return $respuesta;
    }

    public $eliminar_id_usuario;
    public $eliminar_actualizado_por;
    public function eliminar_usuario_ajax(){
        $datos = array("eliminar_id_usuario"=>$this->eliminar_id_usuario,
                        "eliminar_actualizado_por"=>$this->eliminar_actualizado_por);
        $respuesta = Usuario_Controlador::eliminar_usuario_controlador($datos);
        echo $respuesta;
    }

    public $id_usuario_nueva_contrasena;
    public $nueva_contrasena;
    public function nueva_contrasena_usuario_ajax(){
        $datos = array("id_usuario_nueva_contrasena"=>htmlspecialchars($this->id_usuario_nueva_contrasena),
                        "nueva_contrasena"=>htmlspecialchars($this->nueva_contrasena));
        $respuesta = Usuario_Controlador::nueva_contrasena_usuario_controlador($datos);
        echo $respuesta;
    }

    public $formulario_recuperar_contrasena_correo;
    public $formulario_recuperar_contrasena_fecha;
    public function formulario_solicitar_contrasena_ajax(){
        $datos = array("formulario_recuperar_contrasena_correo"=>htmlspecialchars($this->formulario_recuperar_contrasena_correo),
                        "formulario_recuperar_contrasena_fecha"=>htmlspecialchars($this->formulario_recuperar_contrasena_fecha));
        // $respuesta = Usuario_Controlador::formulario_solicitar_contrasena_controlador($datos);
        // echo $respuesta;
        print_r($datos);
    }

    public $formulario_nueva_contrasena;
    public $formulario_llave_contrasena;
    public $formulario_nueva_contrasena_fecha;
    public function formulario_actualizar_contrasena_ajax(){
        $datos = array("formulario_nueva_contrasena"=>htmlspecialchars($this->formulario_nueva_contrasena),
                        "formulario_llave_contrasena"=>htmlspecialchars($this->formulario_llave_contrasena),
                        "formulario_nueva_contrasena_fecha"=>htmlspecialchars($this->formulario_nueva_contrasena_fecha));
        $respuesta = Usuario_Controlador::actualizar_contrasena_controlador($datos);
        echo $respuesta;
    }

    public $perfil_editar_id_usuario;
    public $perfil_editar_usuario_nombres;
    public $perfil_editar_usuario_email;
    public function perfil_actualizar_usuario_ajax(){
        $datos = array("perfil_editar_id_usuario"=>htmlspecialchars($this->perfil_editar_id_usuario),
                        "perfil_editar_usuario_nombres"=>htmlspecialchars($this->perfil_editar_usuario_nombres),
                        "perfil_editar_usuario_email"=>htmlspecialchars($this->perfil_editar_usuario_email));
        $respuesta = Usuario_Controlador::perfil_actualizar_usuario_controlador($datos);
        echo $respuesta;
    }

    public $perfil_editar_avatar_id_usuario;
    public $perfil_editar_avatar_usuario;
    public function perfil_editar_avatar_usuario_ajax(){
        $datos = array("perfil_editar_avatar_id_usuario"=>$this->perfil_editar_avatar_id_usuario,
                       "perfil_editar_avatar_usuario"=>$this->perfil_editar_avatar_usuario);
        $respuesta = Usuario_Controlador::perfil_editar_avatar_usuario_controlador($datos);
        echo $respuesta;
        // print_r($datos);
    }
}

if(isset($_POST["verificar_usuario_email"])){
    $usuario = new usuario_Ajax();
    $usuario -> verificar_usuario_email = $_POST["verificar_usuario_email"];
    $usuario -> verificar_usuario_email_ajax();
}

if($_POST["nuevo_usuario_email"] != "" && isset($_POST["nuevo_usuario_auditoria_usuario"]) && isset($_POST["nuevo_usuario_email"]) && isset($_POST["nuevo_usuario_rol"])){
    $usuario = new Usuario_Ajax();
    $usuario -> nuevo_usuario_auditoria_usuario = $_POST["nuevo_usuario_auditoria_usuario"];
    $usuario -> nuevo_usuario_auditoria_creado = $_POST["nuevo_usuario_auditoria_creado"];
    $usuario -> nuevo_usuario_nombres = $_POST["nuevo_usuario_nombres"];
    $usuario -> nuevo_usuario_email = $_POST["nuevo_usuario_email"];
    $usuario -> nuevo_usuario_rol = $_POST["nuevo_usuario_rol"];
    $usuario -> registro_usuario_ajax();
}

if(isset($_POST["estado_usuario_id"]) && isset($_POST["estado_auditoria_usuario"]) && isset($_POST["estado_usuario"])){
    $usuario = new Usuario_Ajax();
    $usuario -> estado_usuario_id = $_POST["estado_usuario_id"];
    $usuario -> estado_auditoria_usuario = $_POST["estado_auditoria_usuario"];
    $usuario -> estado_usuario = $_POST["estado_usuario"];
    $usuario -> estado_usuario_ajax();
}

if(isset($_POST["formulario_editar_id_usuario"])){
    $usuario = new Usuario_Ajax();
    $usuario -> formulario_editar_id_usuario = $_POST["formulario_editar_id_usuario"];
    $usuario -> formulario_editar_actualizado_por = $_POST["formulario_editar_actualizado_por"];
    $usuario -> formulario_editar_usuario_ajax();
}

if(isset($_POST["editar_id_usuario"]) && isset($_POST["editar_nombres"]) && isset($_POST["editar_email"])){
    $usuario = new Usuario_Ajax();
    $usuario -> editar_id_usuario = $_POST["editar_id_usuario"];
    $usuario -> editar_actualizado_por = $_POST["editar_actualizado_por"];
    $usuario -> editar_nombres = $_POST["editar_nombres"];
    $usuario -> editar_email = $_POST["editar_email"];
    $usuario -> editar_rol = $_POST["editar_rol"];
    $usuario -> actualizar_usuario_ajax();
}

if(isset($_POST["formulario_eliminar_id_usuario"]) && isset($_POST["formulario_eliminar_actualizado_por"])){
    $usuario = new Usuario_Ajax();
    $usuario -> formulario_eliminar_id_usuario = $_POST["formulario_eliminar_id_usuario"];
    $usuario -> formulario_eliminar_actualizado_por = $_POST["formulario_eliminar_actualizado_por"];
    $usuario -> formulario_eliminar_usuario_ajax();
}

if(isset($_POST["eliminar_id_usuario"]) && isset($_POST["eliminar_actualizado_por"])){
    $usuario = new Usuario_Ajax();
    $usuario -> eliminar_id_usuario = $_POST["eliminar_id_usuario"];
    $usuario -> eliminar_actualizado_por = $_POST["eliminar_actualizado_por"];
    $usuario -> eliminar_usuario_ajax();
}

if(isset($_POST["id_usuario_nueva_contrasena"]) && isset($_POST["nueva_contrasena"])){
    $usuario = new Usuario_Ajax();
    $usuario -> id_usuario_nueva_contrasena = $_POST["id_usuario_nueva_contrasena"];
    $usuario -> nueva_contrasena = $_POST["nueva_contrasena"];
    $usuario -> nueva_contrasena_usuario_ajax();
}

if(isset($_POST["formulario_recuperar_contrasena_correo"]) && isset($_POST["formulario_recuperar_contrasena_fecha"])){
    $solicitarContrasena = new usuario_Ajax();
    $solicitarContrasena -> formulario_recuperar_contrasena_correo = $_POST["formulario_recuperar_contrasena_correo"];
    $solicitarContrasena -> formulario_recuperar_contrasena_fecha = $_POST["formulario_recuperar_contrasena_fecha"];
    $solicitarContrasena -> formulario_solicitar_contrasena_ajax();
}

if(isset($_POST["formulario_nueva_contrasena"]) && isset($_POST["formulario_llave_contrasena"])){
    $nuevaContrasena = new usuario_Ajax();
    $nuevaContrasena -> formulario_nueva_contrasena = $_POST["formulario_nueva_contrasena"];
    $nuevaContrasena -> formulario_llave_contrasena = $_POST["formulario_llave_contrasena"];
    $nuevaContrasena -> formulario_nueva_contrasena_fecha = $_POST["formulario_nueva_contrasena_fecha"];
    $nuevaContrasena -> formulario_actualizar_contrasena_ajax();
}

if(isset($_POST["perfil_editar_id_usuario"]) && isset($_POST["perfil_editar_usuario_nombres"]) && isset($_POST["perfil_editar_usuario_email"])){
    $usuario = new Usuario_Ajax();
    $usuario -> perfil_editar_id_usuario = $_POST["perfil_editar_id_usuario"];
    $usuario -> perfil_editar_usuario_nombres = $_POST["perfil_editar_usuario_nombres"];
    $usuario -> perfil_editar_usuario_email = $_POST["perfil_editar_usuario_email"];
    $usuario -> perfil_actualizar_usuario_ajax();
}

if(isset($_FILES["perfil_editar_avatar_usuario"]) && isset($_POST["perfil_editar_avatar_id_usuario"])){
    $usuario = new Usuario_Ajax();
    $usuario -> perfil_editar_avatar_id_usuario = $_POST["perfil_editar_avatar_id_usuario"];
    $usuario -> perfil_editar_avatar_usuario = $_FILES["perfil_editar_avatar_usuario"];
    $usuario -> perfil_editar_avatar_usuario_ajax();
}

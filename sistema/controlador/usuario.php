<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Usuario_Controlador{

    public function total_usuario_controlador(){
        $respuesta = Usuario_Modelo::total_usuario_modelo("usuario");
        echo '<h3>'.$respuesta["total"].'</h3>';
    }

    static public function verificar_usuario_email_controlador($datos){
        $respuesta = Usuario_Modelo::verificar_usuario_email_modelo("usuario", $datos);
        if($respuesta == NULL){
            echo 'usuario valido';
        }
        else if($respuesta["email"] == $datos && $respuesta["estado"] == 1){
            echo 'El usuario existe y esta inactivo!';
        }else if($respuesta["email"] == $datos && $respuesta["estado"] == 2){
            echo 'El usuario existe y esta activo!';
        }else if($respuesta["email"] == $datos && $respuesta["estado"] == 3){
            echo 'El usuario existe y esta borrado, comunicate con soporte técnico!';
        }
    }

    public function formulario_rol_controlador(){
        $respuesta = Usuario_Modelo::formulario_rol_modelo("rol");
        foreach ($respuesta as $fila => $item) {
            echo '<option value="'.$item["id"].'">'.$item["rol"].'</option>';
        }
    }

    public function formularioEstadoControlador(){
        $respuesta = Usuario_Modelo::formularioEstadoModelo("estado");
        foreach ($respuesta as $fila => $item) {
            echo '<option value="'.$item["id"].'">'.$item["estado"].'</option>';
        }
    }

    static public function registro_usuario_controlador($datos){
        $contrasena = crypt('UsuarioSistema', '$2a$07$GSVs6pSNqiKLkHE6dOtZPejPtcf/bRSl2n2WvmNE2yIZAEW7t9J.a');
        $avatar = 'usuario.jpg';
        $estado = 2;
        $datos_base = array ("nuevo_usuario_auditoria_usuario" => $datos["nuevo_usuario_auditoria_usuario"],
                        "nuevo_usuario_auditoria_creado" => $datos["nuevo_usuario_auditoria_creado"],
                        "nuevo_usuario_nombres" => $datos["nuevo_usuario_nombres"],
                        "nuevo_usuario_email" => $datos["nuevo_usuario_email"],
                        "nuevo_usuario_rol" => $datos["nuevo_usuario_rol"],
                        "nuevo_usuario_contrasena" => $contrasena,
                        "nuevo_usuario_avatar" => $avatar,
                        "nuevo_usuario_estado" => $estado);
        $respuesta = Usuario_Modelo::registro_usuario_modelo("usuario", $datos_base);
        // if($respuesta == "ok"){
        //     $correo = $datos["nuevo_usuario_email"];
        //     $asunto = 'Registro usuario';
        //     $mensage = '<div style="width:100%; background:#999; position:relative; font-family:sans-serif; padding-bottom:40px">
        //                     <center>
        //                         <img style="padding:20px;" src="http://osorojo.com.co/vista/img/logo.png">
        //                     </center>
        //                     <div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
        //                         <center>
        //                             <img style="padding:20px; width:15%" src="http://osorojo.com.co/vista/img/icono-email.png">
        //                             <h3 style="font-weight:100; color:#999">Registro de usuario</h3>
        //                             <hr style="border:1px solid #ccc; width:80%">
        //                             <h4 style="font-weight:100; color:#999; padding:0 20px">Hola '.$datos["nuevo_usuario_nombres"].'</h4>
        //                             <h4 style="font-weight:100; color:#999; padding:0 20px">haz sido registrado en nuestro sistema.</h4>
        //                             <h4 style="font-weight:100; color:#999; padding:0 20px">Tus datos de ingreso son:</h4>
        //                             <h4 style="font-weight:100; color:#999; padding:0 20px">Usuario: '.$datos["nuevo_usuario_email"].'</h4>
        //                             <h4 style="font-weight:100; color:#999; padding:0 20px">Contraseña: UsuarioSistema</h4>
        //                             <h4 style="font-weight:100; color:#999; padding:0 20px">Para activar tu usuario debes hacer clic en el sigueinte enlace:</h4>
        //                             <a href="http://osorojo.com.co/sistema" target="_blank" style="text-decoration:none"><div style="line-height:60px; background:#BF0411; width:60%; color:white">Activar usuario</div></a>
        //                             <br>
        //                             <hr style="border:1px solid #ccc; width:80%">
        //                             <h3 style="font-weight:100; color:#999">Gracias.</h3>
        //                         </center>
        //                     </div>
        //                 </div>';
        //     $cabecera = "MIME-Version: 1.0" . "\r\n";
        //     $cabecera .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        //     $cabecera .= 'From: <sistema@osorojo.com.co>' . "\r\n";
        //     mail($correo, $asunto, $mensage, $cabecera);
        // }
        return $respuesta;
    }

    public function lista_usuario_controlador(){
        $respuesta = Usuario_Modelo::lista_usuario_modelo("usuario");
        if ($respuesta == NULL){
            echo '<div class="box-body">
                    <div class="alert alert-warning text-center"><i class="icon fa fa-warning"></i><strong>ATENCIÓN:</strong><br> No hay Usuarios registrados.</div>
                </div>';
        }else {
            echo '<div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                            <tr>
                                <th>Avatar</th>
                                <th>Nombres</th>
                                <th>Rol</th>
                                <th>Ultimo ingreso</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>';
            foreach ($respuesta as $fila => $item) {
                if($item["estado"] == 'Activo'){
                        $boton_estado = '<button class="btn btn-success btn-xs cambiar-estado-usuario" estado_usuario_id="'.$item["id"].'" estado_auditoria_usuario="'.$_SESSION["id"].'" estado_usuario="'.$item["estado"].'">'.$item["estado"].'</button></td>';
                    }else if($item["estado"] == 'Inactivo'){
                        $boton_estado = '<button class="btn btn-danger btn-xs cambiar-estado-usuario" estado_usuario_id="'.$item["id"].'" estado_auditoria_usuario="'.$_SESSION["id"].'" estado_usuario="'.$item["estado"].'">'.$item["estado"].'</button></td>';
                    }
                echo '<tr>
                            <td><img src="'.$GLOBALS['raiz'].'/vista/img/avatar/'.$item["avatar"].'" width="50" height="50" class="img-circle" alt="Avatar"></td>
                            <td>'.$item["nombres"].'</td>
                            <td>'.$item["rol"].'</td>
                            <td>'.$item["ingreso"].'</td>
                            <td>'.$boton_estado.'</td>
                            <td>
                                <div class="btn-group">
                                <button type="button" formulario_editar_id_usuario="'.$item["id"].'" formulario_editar_actualizado_por="'.$_SESSION["id"].'" class="btn btn-success btn-sm editar-usuario" title="Editar" data-toggle="modal" data-target="#modal_editar_perfil_usuario"><i class="fa fa-edit"></i></button>
                                <button type="button" formulario_eliminar_id_usuario="'.$item["id"].'" formulario_eliminar_actualizado_por="'.$_SESSION["id"].'" class="btn btn-danger btn-sm eliminar-usuario" title="Eliminar" data-toggle="modal" data-target="#modal_eliminar_usuario"><i class="fa fa-trash-o"></i></button>
                                </div>
                            </td>
                        </tr>';
            }
            echo '</tbody>
                </table>
            </div>';
        }
    }

    static public function actualizar_estado_usuario_controlador($datos){
        if ($datos["estado_usuario"] == 'Activo'){
            $nuevo_estado = 1;
        }else if($datos["estado_usuario"] == 'Inactivo'){
            $nuevo_estado = 2;
        }
        $dato_base = array("estado_usuario_id"=>$datos["estado_usuario_id"],
                            "estado_auditoria_usuario"=>$datos["estado_auditoria_usuario"],
                            "estado_usuario"=>$nuevo_estado);
        $respuesta = Usuario_Modelo::actualizar_estado_usuario_modelo("usuario", $dato_base);
        if ($respuesta == 'ok' && $nuevo_estado == 1){
            echo 'Usuario bloqueado, no podrá ingresar al sistema!';
        }else if($respuesta == 'ok' && $nuevo_estado == 2){
            echo 'Usuario activado, ahora podrá ingresar al sistema!';
        }
    }

    static public function formulario_actualizar_usuario_controlador($datos){
        $id_usuario = $datos["formulario_editar_id_usuario"];
        $formulario_editar_actualizado_por = $datos["formulario_editar_actualizado_por"];
        $respuesta = Usuario_Modelo::perfil_usuario_modelo("usuario", $id_usuario);
        echo '<div class="box-body">
                <form method="post">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="registroNombres" class="control-label">Nombres y apellidos</label>
                            <input type="hidden" id="editar_id_usuario" value="'.$id_usuario.'">
                            <input type="hidden" id="editar_actualizado_por" value="'.$formulario_editar_actualizado_por.'">
                            <input type="text" class="form-control" name="editar_nombres" id="editar_nombres" placeholder="Nombres" value="'.$respuesta["nombres"].'" required>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="registroEmail" class="control-label">Correo electrónico</label>
                            <input type="email" class="form-control" name="editar_email" id="editar_email" placeholder="Correo electrónico" value="'.$respuesta["email"].'" required>
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label for="registroEstado" class="control-label">Rol</label>
                            <select class="form-control select2" style="width: 100%;" name="editar_rol" id="editar_rol" required>
                                <option value="'.$respuesta["id_rol"].'">'.$respuesta["rol"].'</option>
                                <option value="">Elige una opción</option>';
                                $rol = new Usuario_Controlador();
                                $rol -> formulario_rol_controlador();
                            echo '</select>
                        </div>
                    </div>
                </form>
            </div>';
    }

    static public function actualizar_usuario_controlador($datos){
        $respuesta = Usuario_Modelo::actualizar_usuario_modelo("usuario", $datos);
        return $respuesta;
    }

    static public function formulario_eliminar_usuario_controlador($datos){
        $eliminar_id_usuario = $datos["formulario_eliminar_id_usuario"];
        $eliminar_actualizado_por = $datos["formulario_eliminar_actualizado_por"];
        echo '<div class="alert alert-danger text-center">
                <i class="icon fa fa-ban"></i><strong>ATENCIÓN:</strong><br>
                <h5>Al eliminar este usuario ya no podrá acceder al sistema !</h5>
                <h6>Para recuperarlo deberá comunicarse con soporte técnico.</h6>
                <form method="post" class="form-horizontal">
                    <input type="hidden" id="eliminar_id_usuario" value="'.$eliminar_id_usuario.'">
                    <input type="hidden" id="eliminar_actualizado_por" value="'.$eliminar_actualizado_por.'">
                </form>
            </div>';
    }

    static public function eliminar_usuario_controlador($datos){
        $respuesta = Usuario_Modelo::eliminar_usuario_modelo("usuario", $datos);
        return $respuesta;
    }

    static public function nueva_contrasena_usuario_controlador($datos){
        if(isset($datos["id_usuario_nueva_contrasena"]) && isset($datos["nueva_contrasena"])) {
            date_default_timezone_set("America/Bogota");
            $fecha = date("Y-m-d H:i:s");
            $encriptar = crypt($datos["nueva_contrasena"], '$2a$07$GSVs6pSNqiKLkHE6dOtZPejPtcf/bRSl2n2WvmNE2yIZAEW7t9J.a');
            $datos_nueva_contrasena = array("id_usuario"=>$_POST["id_usuario_nueva_contrasena"], "contrasena"=>$encriptar, "actualizado"=>$fecha);
            $respuesta = Usuario_Modelo::nueva_contrasena_usuario_modelo("usuario", $datos_nueva_contrasena);
            return $respuesta;
        }
    }

    static public function formulario_solicitar_contrasena_controlador($datos){
        $respuesta = Usuario_Modelo::formulario_solicitar_contrasena_modelo("usuario", $datos);
        if($respuesta == NULL){
            echo 'Usuario no registrado!';
        }else if($respuesta["email"] == $datos["formulario_recuperar_contrasena_correo"] && $respuesta["estado"] == 1){
            echo 'El usuario existe y esta inactivo, comunicate con el administrador del sistema!';
        }else if($respuesta["email"] == $datos["formulario_recuperar_contrasena_correo"] && $respuesta["estado"] == 3){
            echo 'El usuario existe y esta borrado, comunicate con el administrador del sistema!';
        }else if($respuesta["email"] == $datos["formulario_recuperar_contrasena_correo"] && $respuesta["estado"] == 2 && $respuesta["contrasena_intento"] <= 5){
            $intentos = $respuesta["contrasena_intento"]+1;
            $enlace = $datos["formulario_recuperar_contrasena_correo"].$datos["formulario_recuperar_contrasena_fecha"];
            $llave = md5($enlace);
            $datos_intentos = array('email' => $datos["formulario_recuperar_contrasena_correo"],
                                    'contrasena_fecha' => $datos["formulario_recuperar_contrasena_fecha"],
                                    'contrasena_intento' => $intentos,
                                    'contrasena_llave' => $llave);
            $solicitar = Usuario_Modelo::formulario_intentos_contrasena_modelo("usuario", $datos_intentos);
            if ($solicitar == "ok"){
                echo 'Hemos enviado un mensaje a tu correo para restablecer tu contraseña, este mensaje será valido por 40 minutos!';
                $enlace = "sistema/nueva-contrasena?enlace=".$llave."";
                $correo_solicitante = $datos["formulario_recuperar_contrasena_correo"];
                try {
                    require_once '../librerias/PHPmailer/Exception.php';
                    require_once '../librerias/PHPmailer/PHPMailer.php';
                    require_once '../librerias/PHPmailer/SMTP.php';
                    $mail = new PHPMailer(true);
                    $mail->SMTPDebug = 0;
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'proyectos@inextgroup.com';
                    $mail->Password   = 'nyuuckxlgaqdpzlt';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port       = 587;
                    $mail->setFrom('proyectos@inextgroup.com', 'Oso Rojo');
                    $mail->addAddress($datos["formulario_recuperar_contrasena_correo"]);
                    $mail->isHTML(true);
                    $mail->CharSet = 'UTF-8';
                    $mail->Subject = 'Recuperar contraseña';
                    $mail->Body    = '<div style="width:100%; background:#005574; position:relative; font-family:sans-serif; padding-bottom:40px">
                                    <div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
                                    <center>
                                        <img style="padding:20px;" width="180" height="180" src="vista/img/logo-ingreso.png">
                                        <h3 style="font-weight:100"><b> Recuperar contraseña </b></h3>
                                        <hr style="border:1px solid #f5e025; width:80%">
                                        <h4 style="font-weight:100; padding:0 20px">Hola '.$respuesta["nombres"].'!</h4>
                                        <h4 style="font-weight:100; padding:0 20px">Para actualizar tu contraseña debes hacer clic en el siguiente enlace, recuerda que tienes 40 minutos para este procedimiento.</h4>
                                        <a href="'.$enlace.'" target="_blank" style="text-decoration:none">
                                            <div style="line-height:60px; background:#BF0411; width:60%; color:white">Recuperar contraseña</div>
                                        </a>
                                        <h4 style="font-weight:100; padding:0 20px">Si no solicitaste tu contraseña, por favor comunicalo al administrador, Gracias.</h4>
                                    </center>
                                    </div>
                                </div>';
                    $mail->send();
                } catch (Exception $e) {
                        echo 'Ha ocurrido un error inesperado!';
                }
            }
        }else if($respuesta["email"] == $datos["formulario_recuperar_contrasena_correo"] && $respuesta["estado"] == 2 && $respuesta["contrasena_intento"] <= 6){
            $desactivar = Usuario_Modelo::desactivar_usuario_modelo("usuario", $datos["formulario_recuperar_contrasena_correo"]);
            if ($desactivar == "ok"){
                echo 'El usuario ha sido desactivo, por superar el numero de intentos permitidos!';
                $correo_solicitante = $datos["formulario_recuperar_contrasena_correo"];
                $asunto = 'Recuperar contraseña';
                $mensage = '<div style="width:100%; background:#999; position:relative; font-family:sans-serif; padding-bottom:40px">
                                <center>
                                    <img style="padding:20px;" src="http://osorojo.com.co/vista/img/logo.png">
                                </center>
                                <div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
                                <center>
                                    <img style="padding:20px; width:15%" src="http://osorojo.com.co/vista/img/icono-email.png">
                                    <h3 style="font-weight:100; color:#999">Recuperar contraseña</h3>
                                    <hr style="border:1px solid #ccc; width:80%">
                                    <h4 style="font-weight:100; color:#999; padding:0 20px">Hola '.$respuesta["nombres"].'</h4>
                                    <h4 style="font-weight:100; color:#999; padding:0 20px">Tu usuario ha sido desactivo por superar el numero de intentos permitidos para recuperar contraseña, comunicate con el administrador del sistema, Gracias.</h4>
                                    <br>
                                    <hr style="border:1px solid #ccc; width:80%">
                                    <h5 style="font-weight:100; color:#999">Si no solicitaste tu contraseña, por favor comunicalo al administrador, Gracias.</h5>
                                </center>
                                </div>
                            </div>';
                $cabecera = "MIME-Version: 1.0" . "\r\n";
                $cabecera .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $cabecera .= 'From: <sistema@osorojo.com.co>' . "\r\n";
                mail($correo_solicitante, $asunto, $mensage, $cabecera);
            }
        }
    }

    static public function actualizar_contrasena_controlador($datos){
        $respuesta = Usuario_Modelo::formulario_cambio_contrasena_modelo("usuario", $datos["formulario_llave_contrasena"]);
        if ($respuesta == NULL){
            echo 'El enlace no es valido!';
        }else{
            $segundos =  strtotime($datos["formulario_nueva_contrasena_fecha"]) - strtotime($respuesta["contrasena_fecha"]);
            $tiempo = abs(floor($segundos/60));
            if ($tiempo > 40){
                echo 'El enlace ha caducado!';
            }else{
                $encriptar = crypt($datos["formulario_nueva_contrasena"], '$2a$07$GSVs6pSNqiKLkHE6dOtZPejPtcf/bRSl2n2WvmNE2yIZAEW7t9J.a');
                $actualizar = Usuario_Modelo::actualizar_contrasena_modelo("usuario", $datos, $encriptar);
                    if ($actualizar == "ok"){
                        echo 'Contraseña actualizada correctamente!';
                    }
            }
        }
    }

    public function perfil_usuario_controlador(){
        $respuesta = Usuario_Modelo::perfil_usuario_modelo("usuario", $_SESSION["id"]);
        echo '<div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Perfil usuario</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="'.$GLOBALS['raiz'].'/vista/img/avatar/'.$respuesta["avatar"].'" alt="User profile picture">
                    <h3 class="profile-username text-center">'.$respuesta["nombres"].'</h3>
                    <p class="text-muted text-center">'.$respuesta["rol"].'</p>
                    <a href="#" class="btn btn-warning btn-block imagen-pefil" data-toggle="modal" data-target="#modal_perfil_cambiar_avatar"><b>Cambiar imagen de perfil</b></a>
                </div>
            </div>
        </div>';
    }

    public function editar_usuario_controlador(){
        $respuesta = Usuario_Modelo::perfil_usuario_modelo("usuario", $_SESSION["id"]);
        echo '<form method="POST">
            <div class="form-group has-feedback">
                <label class="control-label">Nombres y apellidos</label>
                <input type="hidden" id="perfil_actualizado_por" value="'.$_SESSION["id"].';?>">
                <input type="text" class="form-control" id="perfil_editar_usuario_nombres" name="perfil_editar_usuario_nombres" value="'.$respuesta["nombres"].'" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <label class= "control-label">Correo electrónico</label>
                <input type="email" class="form-control" id="perfil_editar_usuario_email" name="perfil_editar_usuario_email" value="'.$respuesta["email"].'" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
        </form>';
    }

    static public function perfil_actualizar_usuario_controlador($datos){
        $respuesta = Usuario_Modelo::perfil_actualizar_usuario_modelo("usuario", $datos);
        return $respuesta;
    }

    static public function perfil_editar_avatar_usuario_controlador($datos){
        if(isset($datos["perfil_editar_avatar_usuario"]["tmp_name"])){
            list($ancho, $alto) = getimagesize($datos["perfil_editar_avatar_usuario"]["tmp_name"]);
            $nuevo_ancho = 200;
            $nuevo_alto = 200;
            $destino = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
            if ($datos["perfil_editar_avatar_usuario"]["type"] == "image/jpeg"){
                $ruta = "../img/avatar/".$datos["perfil_editar_avatar_id_usuario"].".jpg";
                $origen = @imagecreatefromjpeg($datos["perfil_editar_avatar_usuario"]["tmp_name"]);
                $destino = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
                @imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
                imagejpeg($destino, $ruta);
                $avatar_base = $datos["perfil_editar_avatar_id_usuario"].".jpg";
            }
            if ($datos["perfil_editar_avatar_usuario"]["type"] == "image/png"){
                $ruta = "../img/avatar/".$datos["perfil_editar_avatar_id_usuario"].".png";
                $origen = @imagecreatefrompng($datos["perfil_editar_avatar_usuario"]["tmp_name"]);
                imagealphablending($destino, FALSE);
                @imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
                imagepng($destino, $ruta);
                $avatar_base = $datos["perfil_editar_avatar_id_usuario"].".png";
            }
        }
        $respuesta = Usuario_Modelo::perfil_editar_avatar_usuario_modelo("usuario", $datos, $avatar_base);
        return $respuesta;
    }
}

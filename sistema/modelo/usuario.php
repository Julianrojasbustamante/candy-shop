<?php
require_once "conexion.php";

class Usuario_Modelo{

    static public function total_usuario_modelo($tabla){
        $consulta = Conexion::conectar()->prepare("SELECT COUNT(id) AS total FROM $tabla WHERE rol != 1 AND estado != 3");
        $consulta->execute();
        return $consulta-> fetch();
        $consulta->close();
        $consulta = null;
    }

    static public function verificar_usuario_email_modelo($tabla, $datos){
        $consulta = Conexion::conectar()->prepare("SELECT email, estado FROM $tabla WHERE email = :email");
        $consulta->bindParam(":email", $datos, PDO::PARAM_STR);
        $consulta->execute();
        return $consulta-> fetch();
        $consulta->close();
        $consulta = null;
    }

    static public function formulario_rol_modelo($tabla){
        $consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id != 1 ORDER BY id ASC");
        $consulta->execute();
        return $consulta-> fetchAll();
        $consulta->close();
        $consulta = null;
    }

    static public function formularioEstadoModelo($tabla){
        $consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");
        $consulta->execute();
        return $consulta-> fetchAll();
        $consulta->close();
        $consulta = null;
    }

    static public function registro_usuario_modelo($tabla, $datos_base){
        $consulta = Conexion::conectar()->prepare("INSERT INTO $tabla (email, contrasena, nombres, rol, avatar, estado, creado, modificado) VALUES (:email, :contrasena, :nombres, :rol, :avatar, :estado, :auditoria_creado, :auditoria_usuario)");
        $consulta->bindParam(":auditoria_usuario", $datos_base["nuevo_usuario_auditoria_usuario"], PDO::PARAM_INT);
        $consulta->bindParam(":auditoria_creado", $datos_base["nuevo_usuario_auditoria_creado"], PDO::PARAM_STR);
        $consulta->bindParam(":nombres", $datos_base["nuevo_usuario_nombres"], PDO::PARAM_STR);
        $consulta->bindParam(":email", $datos_base["nuevo_usuario_email"], PDO::PARAM_STR);
        $consulta->bindParam(":rol", $datos_base["nuevo_usuario_rol"], PDO::PARAM_INT);
        $consulta->bindParam(":contrasena", $datos_base["nuevo_usuario_contrasena"], PDO::PARAM_STR);
        $consulta->bindParam(":avatar", $datos_base["nuevo_usuario_avatar"], PDO::PARAM_STR);
        $consulta->bindParam(":estado", $datos_base["nuevo_usuario_estado"], PDO::PARAM_INT);
        if($consulta -> execute()){
            return "ok";
        }else{
            return "error";
        }
        $consulta->close();
        $consulta = null;
    }

    static public function lista_usuario_modelo($tabla){
        $consulta = Conexion::conectar()->prepare("SELECT usuario.id,
            usuario.nombres,
            rol.rol,
            usuario.avatar,
            estado.estado,
            usuario.ingreso
            FROM $tabla, rol, estado
            WHERE usuario.rol != 1
            AND usuario.estado != 3
            AND usuario.rol = rol.id
            AND usuario.estado = estado.id
            ORDER BY usuario.id ASC");
        $consulta->execute();
        return $consulta->fetchAll();
        $consulta->close();
        $consulta = null;
    }

    static public function perfil_usuario_modelo($tabla, $id_usuario){
        $consulta = Conexion::conectar()->prepare("SELECT usuario.nombres,
            usuario.email,
            usuario.rol AS id_rol,
            rol.rol,
            usuario.avatar,
            usuario.estado AS id_estado,
            estado.estado
            FROM $tabla, rol, estado
            WHERE usuario.id = :id_usuario
            AND usuario.rol = rol.id
            AND usuario.estado = estado.id
            ORDER BY usuario.id ASC");
        $consulta->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetch();
        $consulta->close();
        $consulta = null;
    }

    static public function actualizar_estado_usuario_modelo($tabla, $dato_base){
        $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET
                estado = :estado,
                modificado = :modificado
                WHERE id = :id");
        $consulta->bindParam(":id", $dato_base["estado_usuario_id"], PDO::PARAM_INT);
        $consulta->bindParam(":modificado", $dato_base["estado_auditoria_usuario"], PDO::PARAM_INT);
        $consulta->bindParam(":estado", $dato_base["estado_usuario"], PDO::PARAM_INT);
        if($consulta -> execute()){
            return "ok";
        }else{
            return "error";
        }
        $consulta->close();
        $consulta = null;
    }

    static public function actualizar_usuario_modelo($tabla, $datos){
        $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET
                email = :email,
                nombres = :nombres,
                rol = :rol,
                modificado = :modificado
                WHERE id = :id");
        $consulta->bindParam(":id", $datos["editar_id_usuario"], PDO::PARAM_INT);
        $consulta->bindParam(":modificado", $datos["editar_actualizado_por"], PDO::PARAM_INT);
        $consulta->bindParam(":nombres", $datos["editar_nombres"], PDO::PARAM_STR);
        $consulta->bindParam(":email", $datos["editar_email"], PDO::PARAM_STR);
        $consulta->bindParam(":rol", $datos["editar_rol"], PDO::PARAM_INT);
        $consulta->execute();
        if($consulta -> execute()){
		    return "ok";
		}else{
			return "error";
		}
        $consulta->close();
        $consulta = null;
    }

    static public function eliminar_usuario_modelo($tabla, $datos){
        $estado = 3;
        $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET
                estado = :estado,
                modificado = :modificado
                WHERE id = :id");
        $consulta->bindParam(":id", $datos["eliminar_id_usuario"], PDO::PARAM_INT);
        $consulta->bindParam(":estado", $estado, PDO::PARAM_INT);
        $consulta->bindParam(":modificado", $datos["eliminar_actualizado_por"], PDO::PARAM_INT);
        $consulta->execute();
        if($consulta -> execute()){
		    return "ok";
		}else{
			return "error";
		}
        $consulta->close();
        $consulta = null;
    }

    static public function nueva_contrasena_usuario_modelo($tabla, $datos_nueva_contrasena){
        $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET
                contrasena = :contrasena,
                actualizado = :actualizado,
                modificado = :modificado
                WHERE id = :id");
        $consulta->bindParam(":id", $datos_nueva_contrasena["id_usuario"], PDO::PARAM_INT);
        $consulta->bindParam(":contrasena", $datos_nueva_contrasena["contrasena"], PDO::PARAM_STR);
        $consulta->bindParam(":actualizado", $datos_nueva_contrasena["actualizado"], PDO::PARAM_STR);
        $consulta->bindParam(":modificado", $datos_nueva_contrasena["id_usuario"], PDO::PARAM_INT);
        $consulta->execute();
        if($consulta -> execute()){
		    return "ok";
		}else{
			return "error";
		}
        $consulta->close();
        $consulta = null;
    }

    static public function formulario_solicitar_contrasena_modelo($tabla, $datos){
        $consulta = Conexion::conectar()->prepare("SELECT nombres, email, contrasena_intento, estado FROM $tabla WHERE email = :email");
        $consulta->bindParam(":email", $datos["formulario_recuperar_contrasena_correo"], PDO::PARAM_STR);
        $consulta->execute();
        return $consulta-> fetch();
        $consulta->close();
        $consulta = null;
    }

    static public function formulario_intentos_contrasena_modelo($tabla, $datos_intentos){
        $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET contrasena_fecha = :contrasena_fecha, contrasena_intento = :contrasena_intento, contrasena_llave = :contrasena_llave WHERE email = :email");
        $consulta->bindParam(":email", $datos_intentos["email"], PDO::PARAM_STR);
        $consulta->bindParam(":contrasena_fecha", $datos_intentos["contrasena_fecha"], PDO::PARAM_STR);
        $consulta->bindParam(":contrasena_intento", $datos_intentos["contrasena_intento"], PDO::PARAM_INT);
        $consulta->bindParam(":contrasena_llave", $datos_intentos["contrasena_llave"], PDO::PARAM_STR);
        $consulta->execute();
        if($consulta -> execute()){
		    return "ok";
		}else{
			return "error";
		}
        $consulta->close();
        $consulta = null;
    }

    static public function desactivar_usuario_modelo($tabla, $datos){
        $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET estado = 1, modificado = 0 WHERE email = :email");
        $consulta->bindParam(":email", $datos, PDO::PARAM_STR);
        $consulta->execute();
        if($consulta -> execute()){
		    return "ok";
		}else{
			return "error";
		}
        $consulta->close();
        $consulta = null;
    }

    static public function formulario_cambio_contrasena_modelo($tabla, $datos){
        $consulta = Conexion::conectar()->prepare("SELECT contrasena_fecha, contrasena_intento FROM $tabla WHERE contrasena_llave = :contrasena_llave");
        $consulta->bindParam(":contrasena_llave", $datos, PDO::PARAM_STR);
        $consulta->execute();
        return $consulta-> fetch();
        $consulta->close();
        $consulta = null;
    }

    static public function actualizar_contrasena_modelo($tabla, $datos, $encriptar){
        $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET contrasena = :contrasena, contrasena_intento = 0, modificado = 0 WHERE contrasena_llave = :contrasena_llave");
        $consulta->bindParam(":contrasena", $encriptar, PDO::PARAM_STR);
        $consulta->bindParam(":contrasena_llave", $datos["formulario_llave_contrasena"], PDO::PARAM_STR);
        $consulta->execute();
        if($consulta -> execute()){
		    return "ok";
		}else{
			return "error";
		}
        $consulta->close();
        $consulta = null;
    }

    static public function perfil_actualizar_usuario_modelo($tabla, $datos){
        $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET
                nombres = :nombres,
                email = :email,
                modificado = :modificado
                WHERE id = :id");
        $consulta->bindParam(":id", $datos["perfil_editar_id_usuario"], PDO::PARAM_INT);
        $consulta->bindParam(":nombres", $datos["perfil_editar_usuario_nombres"], PDO::PARAM_STR);
        $consulta->bindParam(":email", $datos["perfil_editar_usuario_email"], PDO::PARAM_STR);
        $consulta->bindParam(":modificado", $datos["perfil_editar_id_usuario"], PDO::PARAM_INT);
        $consulta->execute();
        if($consulta -> execute()){
            return "ok";
        }else{
            return "error";
        }
        $consulta->close();
        $consulta = null;
    }

    static public function perfil_editar_avatar_usuario_modelo($tabla, $datos, $avatar_base){
        $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET
                avatar = :avatar,
                modificado = :usuario
                WHERE id = :usuario");
        $consulta->bindParam(":usuario", $datos["perfil_editar_avatar_id_usuario"], PDO::PARAM_INT);
        $consulta->bindParam(":avatar", $avatar_base, PDO::PARAM_STR);
        if($consulta -> execute()){
		    return "ok";
		}else{
			return "error";
		}
        $consulta->close();
        $consulta = null;
    }
}

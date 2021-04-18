<?php
require_once "conexion.php";

class Administrador_Modelo{

    static public function administrador_ingreso_modelo($tabla, $dato_ingreso){
        $consulta = Conexion::conectar()->prepare("SELECT id, rol FROM $tabla WHERE email = :correo AND contrasena = :contrasena AND estado = 2");
        $consulta->bindParam(":correo", $dato_ingreso["correo"], PDO::PARAM_STR);
        $consulta->bindParam(":contrasena", $dato_ingreso["contrasena"], PDO::PARAM_STR);
        $consulta->execute();
        return $consulta-> fetch();
        $consulta->close();
        $consulta = null;
    }

    static public function administrador_registro_ingreso_modelo($tabla, $datos_registro_ingreso){
        $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET ingreso = :ingreso WHERE id = :id");
        $consulta->bindParam(":id", $datos_registro_ingreso["idUsuario"], PDO::PARAM_INT);
        $consulta->bindParam(":ingreso", $datos_registro_ingreso["fecha"], PDO::PARAM_STR);
        $consulta->execute();
        if($consulta -> execute()){
		    return "ok";
		}else{
			return "error";
		}
        $consulta->close();
        $consulta = null;
    }

    static public function perfil_administrador_modelo($tabla, $perfil){
        $consulta = Conexion::conectar()->prepare("SELECT usuario.nombres,
            usuario.avatar,
            rol.rol
        FROM $tabla, rol
        WHERE usuario.id = :id
        AND usuario.rol = rol.id");
        $consulta->bindParam(":id", $perfil, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta-> fetch();
        $consulta->close();
        $consulta = null;
    }
}

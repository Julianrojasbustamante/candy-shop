/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE IF NOT EXISTS `barber-shop` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `barber-shop`;

CREATE TABLE IF NOT EXISTS `barbero_puntaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barbero` int(11) DEFAULT NULL,
  `puntaje` int(11) DEFAULT NULL,
  `cliente` int(11) DEFAULT NULL,
  `solicitud` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `auditoria_usuario` int(11) DEFAULT NULL,
  `auditoria_creado` datetime DEFAULT NULL,
  `auditoria_modificado` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `barbero_puntaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `barbero_puntaje` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `cargo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT IGNORE INTO `cargo` (`id`, `cargo`) VALUES
	(1, 'Super administrador'),
	(2, 'Administrador'),
	(3, 'Barbero');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto_perfil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena_fecha` datetime NOT NULL,
  `contrasena_intento` int(1) NOT NULL,
  `contrasena_llave` int(50) NOT NULL,
  `estado` int(1) NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `auditoria_creado` datetime NOT NULL,
  `auditoria_usuario` int(3) NOT NULL,
  `auditoria_modificado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT IGNORE INTO `estado` (`id`, `estado`) VALUES
	(1, 'Desactivado'),
	(2, 'Activado'),
	(3, 'Eliminado');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `servcio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servicio` varchar(50) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `auditoria_usuario` int(11) DEFAULT NULL,
  `auditoria_creado` datetime DEFAULT NULL,
  `auditoria_modificado` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `servcio` DISABLE KEYS */;
INSERT IGNORE INTO `servcio` (`id`, `servicio`, `valor`, `categoria`, `estado`, `auditoria_usuario`, `auditoria_creado`, `auditoria_modificado`) VALUES
	(1, 'Corte cabello', 15000, 1, 2, 1, '2020-06-19 13:56:00', '2020-06-19 15:39:16');
/*!40000 ALTER TABLE `servcio` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `servicio_categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `auditoria_usuario` int(11) DEFAULT NULL,
  `auditoria_creado` datetime DEFAULT NULL,
  `auditoria_modificado` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `servicio_categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicio_categoria` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `solicitud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barbero` int(11) DEFAULT NULL,
  `cliente` int(11) DEFAULT NULL,
  `servicio` int(11) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `auditoria_usuario` int(11) DEFAULT NULL,
  `auditoria_creado` datetime DEFAULT NULL,
  `auditoria_modificado` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `solicitud` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena_fecha` datetime NOT NULL,
  `contrasena_intento` int(1) NOT NULL,
  `contrasena_llave` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rol` int(1) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(1) NOT NULL,
  `ingreso` datetime NOT NULL,
  `creado` datetime NOT NULL,
  `modificado` int(2) NOT NULL,
  `actualizado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT IGNORE INTO `usuario` (`id`, `email`, `contrasena`, `contrasena_fecha`, `contrasena_intento`, `contrasena_llave`, `nombres`, `rol`, `avatar`, `estado`, `ingreso`, `creado`, `modificado`, `actualizado`) VALUES
	(1, 'rafaelmedinamendez@inextgroup.com', '$2a$07$GSVs6pSNqiKLkHE6dOtZPeLTsOzq9BQrgE.8R7.//l5rHrQwN0EEu', '0000-00-00 00:00:00', 0, '', 'Rafael Andrés Medina', 1, '1.jpg', 2, '2019-10-10 22:08:00', '2019-04-19 00:00:00', 1, '2019-10-10 22:08:00'),
	(7, 'andres@gmail.com', '$2a$07$GSVs6pSNqiKLkHE6dOtZPetaNlCAApH52VUr5V8qnQAO/CW9yVHba', '2019-05-15 16:43:05', 0, '89c71def3963a1a94350373e7ece056f', 'Andrés Medina', 3, 'usuario.jpg', 2, '2019-05-20 09:44:47', '2019-04-26 04:28:05', 7, '2019-04-29 16:53:05'),
	(8, 'pepito@correo.com', '$2a$07$GSVs6pSNqiKLkHE6dOtZPetaNlCAApH52VUr5V8qnQAO/CW9yVHba', '2019-05-21 12:12:52', 0, '8d643b6d8000388ec2acd16fd3ff2b9c', 'Pepito Prueba', 3, 'usuario.jpg', 2, '0000-00-00 00:00:00', '2019-04-27 11:03:15', 1, '2019-05-21 12:24:35'),
	(9, 'miguel@gmail.com', '$2a$07$GSVs6pSNqiKLkHE6dOtZPetaNlCAApH52VUr5V8qnQAO/CW9yVHba', '2019-05-21 12:27:06', 0, 'ce72756bd434803010668b9a3b26668c', 'Miguel Martinez', 3, '9.jpg', 2, '2019-06-02 18:05:56', '2019-04-29 09:50:55', 1, '2019-07-06 20:59:52'),
	(10, 'ramon@correo.com', '$2a$07$GSVs6pSNqiKLkHE6dOtZPelYlIQQPV/f2H6on4TRJk3qk4W6fxuS2', '0000-00-00 00:00:00', 0, '', 'Ramón Valdez', 3, 'usuario.jpg', 3, '0000-00-00 00:00:00', '2019-05-20 11:50:02', 1, '2019-05-20 13:26:18'),
	(11, 'julianrjs15@gmail.com', '$2a$07$GSVs6pSNqiKLkHE6dOtZPeTI0WQn/iqLrvjtpv9a62SKqdTq7l8Re', '0000-00-00 00:00:00', 0, '', 'Julian Rojas Bustamante', 1, 'usuario.jpg', 2, '2020-07-13 18:15:01', '2019-08-22 20:50:36', 11, '2020-07-13 18:15:01'),
	(12, 'jonatangarcia@inextgroup.com', '$2a$07$GSVs6pSNqiKLkHE6dOtZPeYXEvaVV2BWb7DYTt5D8FGW9GsjPHqMO', '0000-00-00 00:00:00', 0, '', 'Jonatan Garcia', 1, '12.jpg', 2, '2020-05-22 20:00:03', '2020-04-19 14:03:36', 12, '2020-05-22 20:00:03'),
	(13, '', '$2a$07$GSVs6pSNqiKLkHE6dOtZPelYlIQQPV/f2H6on4TRJk3qk4W6fxuS2', '0000-00-00 00:00:00', 0, '', '', 0, 'usuario.jpg', 2, '0000-00-00 00:00:00', '2020-05-22 20:00:05', 12, '2020-05-22 20:00:08'),
	(14, '', '$2a$07$GSVs6pSNqiKLkHE6dOtZPelYlIQQPV/f2H6on4TRJk3qk4W6fxuS2', '0000-00-00 00:00:00', 0, '', '', 0, 'usuario.jpg', 2, '0000-00-00 00:00:00', '2020-05-22 20:02:12', 12, '2020-05-22 20:02:14'),
	(15, '', '$2a$07$GSVs6pSNqiKLkHE6dOtZPelYlIQQPV/f2H6on4TRJk3qk4W6fxuS2', '0000-00-00 00:00:00', 0, '', '', 0, 'usuario.jpg', 2, '0000-00-00 00:00:00', '2020-05-22 20:02:36', 12, '2020-05-22 20:02:38'),
	(16, '', '$2a$07$GSVs6pSNqiKLkHE6dOtZPelYlIQQPV/f2H6on4TRJk3qk4W6fxuS2', '0000-00-00 00:00:00', 0, '', '', 0, 'usuario.jpg', 2, '0000-00-00 00:00:00', '2020-05-22 20:02:42', 12, '2020-05-22 20:03:05');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena_fecha` datetime NOT NULL,
  `contrasena_intento` int(1) NOT NULL,
  `contrasena_llave` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` int(2) NOT NULL,
  `foto_perfil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ingreso` datetime DEFAULT NULL,
  `telefono` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` int(1) NOT NULL,
  `auditoria_creado` datetime NOT NULL,
  `auditoria_usuario` int(2) NOT NULL,
  `auditoria_actualizado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

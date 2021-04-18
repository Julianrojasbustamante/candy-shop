<?php

class Conexion{
	public function conectar(){
		$conexionDb = new PDO("mysql:host=localhost;dbname=barber-shop","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		return $conexionDb;
	}
	// public function conectar(){
	// 	$conexionDb = new PDO("mysql:host=localhost;dbname=pruebasi_imocom_3_0","pruebasi_root","{mcWZo=v6u{[",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //                       PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	// 	return $conexionDb;
	// }
}

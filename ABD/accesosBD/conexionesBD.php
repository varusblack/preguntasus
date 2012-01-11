<?php

// Función que crea una conexión con la base de datos
function crearConexion() {
	$host = "localhost";
	$usuario = "root";
	$password = "";
	$conexion = null;
	try {
		$conexion = new PDO("mysql:host=$host;dbname=preguntasus;charset=UTF-8", $usuario, $password);
		$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion -> query('SET NAMES utf8');
	} catch(PDOException $e) {
        Header("Location: /abd/error.php");
		die();
	}
 	return $conexion;

}

// Función que destruye una conexión con la base de datos
function cerrarConexion($conexion) {
	$conexion = null;
}
?>
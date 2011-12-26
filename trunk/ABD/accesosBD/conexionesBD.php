<?php
function crearConexion() {
	$host = "127.0.0.1";
	$usuario = "root";
	$password = "";
	$conexion = null;
	try {
		$conexion = new PDO("mysql:host=$host;dbname=abdblog;charset=UTF-8", $usuario, $password);
		$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion -> query('SET NAMES utf8');
	} catch(PDOException $e) {
		Header("Location:error.php");
	}
	return $conexion;

}

function cerrarConexion($conexion) {
	$conexion = null;
}
?>
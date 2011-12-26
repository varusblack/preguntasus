<?php
function obtenerTodasLasVisitas($conexion) {
	try {
		$SQL = "SELECT * FROM visita";
	} catch(PDOException $e) {

	}
}

function obtenerVisitaPorId($id, $conexion) {
	try {
		$SQL = "SELECT * FROM visita WHERE id=$id";
	} catch(PDOException $e) {

	}
}

function insertarVisita(Visita $visita, $conexion) {
	try {
		$idElemento = $visita -> __get("idelemento");
		$idusuario = $visita -> __get("idusuario");
		$SQL = "INSERT INTO visita(idelemento,idusuario) VALUES ('$idElemento','$idusuario')";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {

	}
}

function modificarVisita(Visita $visita, $conexion) {
	try {
		$idVisita = $visita -> __get("id");
		$idElemento = $visita -> __get("idelemento");
		$idusuario = $visita -> __get("idusuario");
		$SQL = "UPDATE visita SET idelemento=$idElemento,idusuario=$idusuario WHERE id=$idVisita";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {

	}
}

function borrarVisita(Visita $visita, $conexion) {
	try {
		$idVisita = $visita -> __get("id");
		$SQL = "DELETE FROM visita WHERE id=$idVisita";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {

	}
}
?>
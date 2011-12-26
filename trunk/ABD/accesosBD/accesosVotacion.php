<?php
function obtenerTodasLasVotaciones($conexion) {
	try {
		$SQL = "SELECT * FROM votacion";
	} catch(PDOException $e) {

	}
}

function obtenerVotacionPorId($id, $conexion) {
	try {
		$SQL = "SELECT * FROM votacion WHERE id=$id";
	} catch(PDOException $e) {

	}
}

function insertarVotacion(Votacion $votacion, $conexion) {
	try {
		$idElemento = $votacion -> __get("idelemento");
		$idusuario = $votacion -> __get("idusuario");
		$SQL = "INSERT INTO votacion(idelemento,idusuario) VALUES ('$idElemento','$idusuario')";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {

	}
}

function modificarVotacion(Votacion $votacion, $conexion) {
	try {
		$idVotacion = $votacion -> __get("id");
		$idElemento = $votacion -> __get("idelemento");
		$idusuario = $votacion -> __get("idusuario");
		$SQL = "UPDATE votacion SET idelemento=$idElemento,idusuario=$idusuario WHERE id=$idVotacion";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {

	}
}

function borrarVotacion(Votacion $votacion, $conexion) {
	try {
		$idVotacion = $votacion -> __get("id");
		$SQL = "DELETE FROM votacion WHERE id=$idVotacion";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {

	}
}
?>
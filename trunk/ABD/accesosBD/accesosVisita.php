<?php
function obtenerTodasLasVisitas($conexion) {
	try {
		$SQL = "SELECT * FROM visita";
		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		Header("Location: error.php");
	}
}

function obtenerVisitaPorId($id, $conexion) {
	try {
		$SQL = "SELECT * FROM visita WHERE id=$id";
		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		Header("Location: error.php");
	}
}

function insertarVisita(Visita $visita, $conexion) {
	try {
		$idElemento = $visita -> __get("idelemento");
		$idusuario = $visita -> __get("idusuario");
		$SQL = "INSERT INTO visita(idelemento,idusuario) VALUES ('$idElemento','$idusuario')";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: error.php");
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
		Header("Location: error.php");
	}
}

function borrarVisita(Visita $visita, $conexion) {
	try {
		$idVisita = $visita -> __get("id");
		$SQL = "DELETE FROM visita WHERE id=$idVisita";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: error.php");
	}
}

function creaElementos($stmt) {
    $resultado = array();
	foreach($stmt as $row){
		$objeto = new Visita();
		$objeto->__set("id", $row["id"]);
        $objeto->__set("idelemento", $row["idelemento"]);
        $objeto->__set("idusuario", $row["idusuario"]);
		$resultado[$row["id"]] = $objeto;
	}
    return $resultado;
}
?>
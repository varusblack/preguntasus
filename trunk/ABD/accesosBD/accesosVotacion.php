<?php
function obtenerTodasLasVotaciones($conexion) {
	try {
		$SQL = "SELECT * FROM votacion";
		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

function obtenerVotacionPorId($id, $conexion) {
	try {
		$SQL = "SELECT * FROM votacion WHERE id=$id";
		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

function insertarVotacion(Votacion $votacion, $conexion) {
	try {
		$idElemento = $votacion -> __get("idelemento");
		$idusuario = $votacion -> __get("idusuario");
		$SQL = "INSERT INTO votacion(idelemento,idusuario) VALUES ('$idElemento','$idusuario')";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
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
		Header("Location: error.php");
		die();
	}
}

function borrarVotacion(Votacion $votacion, $conexion) {
	try {
		$idVotacion = $votacion -> __get("id");
		$SQL = "DELETE FROM votacion WHERE id=$idVotacion";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

function creaElementos($stmt) {
    $resultado = array();
	foreach($stmt as $row){
		$objeto = new Votacion();
		$objeto->__set("id", $row["id"]);
        $objeto->__set("idelemento", $row["idelemento"]);
        $objeto->__set("idusuario", $row["idusuario"]);
		$resultado[$row["id"]] = $objeto;
	}
    return $resultado;
}
?>
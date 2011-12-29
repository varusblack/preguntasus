<?php
function obtenerTodasLasVisitas($conexion) {
	try {
		$SQL = "SELECT * FROM visita";
		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

function obtenerVisitaPorId($id, $conexion) {
	try {
		$SQL = "SELECT * FROM visita WHERE id=$id";
		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

function insertarVisita(Visita $visita, $conexion) {
	try {
		$idElemento = $visita -> idelemento;
		$idusuario = $visita -> idusuario;
		$SQL = "INSERT INTO visita(idelemento,idusuario) VALUES ('$idElemento','$idusuario')";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

function modificarVisita(Visita $visita, $conexion) {
	try {
		$idVisita = $visita -> id;
		$idElemento = $visita -> idelemento;
		$idusuario = $visita -> idusuario;
		$SQL = "UPDATE visita SET idelemento=$idElemento,idusuario=$idusuario WHERE id=$idVisita";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

function borrarVisita(Visita $visita, $conexion) {
	try {
		$idVisita = $visita ->id;
		$SQL = "DELETE FROM visita WHERE id=$idVisita";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

function creaElementos($stmt) {
    $resultado = array();
	foreach($stmt as $row){
		$objeto = new Visita();
		$objeto->id= $row["id"];
        $objeto->idelemento=$row["idelemento"];
        $objeto->idusuario= $row["idusuario"];
		$resultado[$row["id"]] = $objeto;
	}
    return $resultado;
}
?>
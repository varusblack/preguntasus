<?php

// La entidad Visita veo que carece de sentido alguno y es candidata a ser cruelmente borrada
// No lo veo util
// function obtenerTodasLasVisitas($conexion) {
	// try {
		// $SQL = "SELECT * FROM visita";
		// $stmt = $conexion->query($SQL);
		// return creaElementos($stmt);
	// } catch(PDOException $e) {
		// Header("Location: error.php");
		// die();
	// }
// }


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

function obtenerNumeroDeVisitasDeElemento(Elemento $elemento,$conexion){
	try {
		$idElemento = $elemento->id;
		$SQL = "SELECT COUNT(*) AS cuenta FROM visita WHERE idElemento=$idElemento";
		$stmt = $conexion->query($SQL);
		return creaUnicoDatoVisita($stmt);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

function insertarVisita(Elemento $elemento, Usuario $usuario, $conexion) {
	try {
		$idElemento = $elemento -> id;
		$idusuario = $usuario -> id;
		$SQL = "INSERT INTO visita(idelemento,idusuario) VALUES ('$idElemento','$idusuario')";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

// No lo veo util
// function modificarVisita(Visita $visita, $conexion) {
	// try {
		// $idVisita = $visita -> id;
		// $idElemento = $visita -> idelemento;
		// $idusuario = $visita -> idusuario;
		// $SQL = "UPDATE visita SET idelemento=$idElemento,idusuario=$idusuario WHERE id=$idVisita";
		// $conexion -> exec($SQL);
	// } catch(PDOException $e) {
		// Header("Location: error.php");
		// die();
	// }
// }

function borrarElementoYVisitas(Elemento $elemento, $conexion) {
	try {
		$idElemento = $elemento ->id;
		$SQL = "DELETE FROM visita WHERE idelemento=$idElemento";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

function borrarTodasLasVisitasDeUsuario(Usuario $usuario, $conexion){
	try {
		$idUsuario = $usuario ->id;
		$SQL = "DELETE FROM visita WHERE idusuario=$idUsuario";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

// Posiblemente carezca de sentido
function borrarUnicaVisita(Elemento $elemento, Usuario $usuario, $conexion){
	try {
		$idElemento = $elemento ->id;
		$idUsuario = $usuario ->id;
		$SQL = "DELETE FROM visita WHERE idelemento=$idElemento AND idusuario=$idUsuario";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

// No lo veo util
// function creaElementos($stmt) {
    // $resultado = array();
	// foreach($stmt as $row){
		// $objeto = new Visita();
		// $objeto->id= $row["id"];
        // $objeto->idelemento=$row["idelemento"];
        // $objeto->idusuario= $row["idusuario"];
		// $resultado[$row["id"]] = $objeto;
	// }
    // return $resultado;
// }

function creaUnicoDatoVisita($stmt) {
	$dato = NULL;
	foreach($stmt as $row){
		$dato = $row["cuenta"];
	}
	return $dato;
}
?>
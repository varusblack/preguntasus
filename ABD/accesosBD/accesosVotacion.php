<?php
// La entidad Votacion veo que carece de sentido alguno y es candidata a ser cruelmente borrada

// Lo veo inutil
// function obtenerTodasLasVotaciones($conexion) {
	// try {
		// $SQL = "SELECT * FROM votacion";
		// $stmt = $conexion->query($SQL);
		// return creaElementos($stmt);
	// } catch(PDOException $e) {
		// Header("Location: error.php");
		// die();
	// }
// }

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

function obtenerNumeroDeVotosDeElemento(Elemento $elemento, $conexion){
	try {
		$idElemento = $elemento ->id;
		$SQL = "SELECT COUNT(*) AS cuenta FROM votacion WHERE idelemento=$idElemento";
		$stmt = $conexion->query($SQL);
		return creaUnicoDatoVotacion($stmt);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

function insertarVotacion(Votacion $votacion, $conexion) {
	try {
		$idElemento = $votacion ->idelemento;
		$idusuario = $votacion ->idusuario;
		$SQL = "INSERT INTO votacion(idelemento,idusuario) VALUES ('$idElemento','$idusuario')";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

// Lo veo inutil
// function modificarVotacion(Votacion $votacion, $conexion) {
	// try {
		// $idVotacion = $votacion -> __get("id");
		// $idElemento = $votacion -> __get("idelemento");
		// $idusuario = $votacion -> __get("idusuario");
		// $SQL = "UPDATE votacion SET idelemento=$idElemento,idusuario=$idusuario WHERE id=$idVotacion";
		// $conexion -> exec($SQL);
	// } catch(PDOException $e) {
		// Header("Location: error.php");
		// die();
	// }
// }

function borrarElementoYVotos(Elemento $elemento, $conexion) {
	try {
		$idElemento = $elemento ->id;
		$SQL = "DELETE FROM voto WHERE idelemento=$idElemento";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

function borrarTodosLosVotosDeUsuario(Usuario $usuario, $conexion){
	try {
		$idUsuario = $usuario ->id;
		$SQL = "DELETE FROM voto WHERE idusuario=$idUsuario";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

// Posiblemente carezca de sentido
function borrarUnicoVoto(Elemento $elemento, Usuario $usuario, $conexion){
	try {
		$idElemento = $elemento ->id;
		$idUsuario = $usuario ->id;
		$SQL = "DELETE FROM voto WHERE idelemento=$idElemento AND idusuario=$idUsuario";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

// Lo veo inutil
// function creaElementos($stmt) {
    // $resultado = array();
	// foreach($stmt as $row){
		// $objeto = new Votacion();
		// $objeto->id= $row["id"];
        // $objeto->idelemento= $row["idelemento"];
        // $objeto->idusuario= $row["idusuario"];
		// $resultado[$row["id"]] = $objeto;
	// }
    // return $resultado;
// }

function creaUnicoDatoVotacion($stmt) {
	$dato = NULL;
	foreach($stmt as $row){
		$dato = $row["cuenta"];
	}
	return $dato;
}
?>
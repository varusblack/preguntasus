<?php

// La entidad Visita veo que carece de sentido alguno y es candidata a ser cruelmente borrada
// No lo veo util
// function obtenerTodasLasVisitas($conexion) {
	// try {
		// $SQL = "SELECT * FROM visita";
		// $stmt = $conexion->query($SQL);
		// return creaElementos($stmt);
	// } catch(PDOException $e) {
		// Header("Location: /abd/error.php");
		// die();
	// }
// }

// Veo que carece de sentido
// function obtenerVisitaPorId($id, $conexion) {
	// try {
		// $SQL = "SELECT * FROM visita WHERE id=$id";
		// $stmt = $conexion->query($SQL);
		// return creaElementos($stmt);
	// } catch(PDOException $e) {
		// Header("Location: /abd/error.php");
		// die();
	// }
// }

// Función que dado un elemento devuelve el número de veces que ha sido visitado
function obtenerNumeroDeVisitasDeElemento(Elemento $elemento,$conexion){
	try {
		$idElemento = $elemento->id;
		$SQL = "SELECT COUNT(*) AS cuenta FROM visita WHERE idElemento=$idElemento";
		$stmt = $conexion->query($SQL);
		return creaUnicoDatoVisita($stmt);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}

// Función que dado un usuario y un elemento devuelve true si el usuario ha visitado
// el elemento, false en caso contrario
function usuarioHaVisitadoElemento(Usuario $usuario,Elemento $elemento,$conexion){
    try {
		$SQL = "SELECT count(*) as cuenta FROM visita WHERE idElemento=$elemento->id AND idUsuario=$usuario->id";
		$stmt = $conexion->query($SQL);
		$dato= $stmt->fetch(PDO::FETCH_ASSOC);
        return $dato["cuenta"]>0;
	} catch(PDOException $e) {
		echo $e;
		die();
	}
}

// Función que dado un elemento y un usuario establece que el usuario ha visitado
// el elemento siempre y cuando no lo haya hecho antes.
function insertarVisita(Elemento $elemento, Usuario $usuario, $conexion) {
	try {
        if(!usuarioHaVisitadoElemento($usuario, $elemento, $conexion)){
			$idElemento = $elemento -> id;
			$idusuario = $usuario -> id;
			$SQL = "INSERT INTO visita(idelemento,idusuario) VALUES ('$idElemento','$idusuario')";
			$conexion -> exec($SQL);
       	}
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
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
		// Header("Location: /abd/error.php");
		// die();
	// }
// }

// Función que dado un elemento borra todas las visitas de usuarios asociados a este
function borrarElementoYVisitas(Elemento $elemento, $conexion) {
	try {
		$idElemento = $elemento ->id;
		$SQL = "DELETE FROM visita WHERE idelemento=$idElemento";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}

// Función que dado un usuario borra todas las visitas que este ha realizado
function borrarTodasLasVisitasDeUsuario(Usuario $usuario, $conexion){
	try {
		$idUsuario = $usuario ->id;
		$SQL = "DELETE FROM visita WHERE idusuario=$idUsuario";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
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
		Header("Location: /abd/error.php");
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

// Función que recorre el PDOStatement pasado como parámetro y devuelve
// un único dato
function creaUnicoDatoVisita($stmt) {
	$dato = NULL;
	foreach($stmt as $row){
		$dato = $row["cuenta"];
	}
	return $dato;
}
?>
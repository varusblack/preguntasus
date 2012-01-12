<?php

// Función que dado un elemento devuelve el número de veces que ha sido votado
function obtenerNumeroDeVotosDeElemento(Elemento $elemento, $conexion){
	try {
		$idElemento = $elemento ->id;
		$SQL = "SELECT COUNT(*) AS cuenta FROM votacion WHERE idelemento=$idElemento";
		$stmt = $conexion->query($SQL);
		return creaUnicoDatoVotacion($stmt);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}

// Función que dado un usuario devuelve el número de veces que ha votado
function obtenerVotosUsuario(Usuario $usuario, $conexion){
	try {
		$idUsuario = $usuario ->id;
		$SQL = "SELECT COUNT(*) AS cuenta FROM votacion WHERE idusuario=$idUsuario";
		$stmt = $conexion->query($SQL);
		$resultado= creaUnicoDatoVotacion($stmt);
                return $resultado["cuenta"];
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}

// Función que dado un id de elemento y un id de usuario establece que un usuario con la id pasada
// ha votado al elemento con la id dada.
function insertarVotacion($idElemento,$idUsuario, $conexion) {
	try {
		$SQL = "INSERT INTO votacion(idelemento,idusuario) VALUES ('$idElemento','$idUsuario')";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}

// Función que dado un elemento elimina todos los sus votos 
function borrarElementoYVotos(Elemento $elemento, $conexion) {
	try {
		$idElemento = $elemento ->id;
		$SQL = "DELETE FROM voto WHERE idelemento=$idElemento";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}

// Función que dado un usuario elimina todas sus votaciones 
function borrarTodosLosVotosDeUsuario(Usuario $usuario, $conexion){
	try {
		$idUsuario = $usuario ->id;
		$SQL = "DELETE FROM voto WHERE idusuario=$idUsuario";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}

// Función que recorre el PDOStatement pasado como parámetro y devuelve
// un único dato
function creaUnicoDatoVotacion($stmt) {
	$dato = NULL;
	foreach($stmt as $row){
		$dato = $row["cuenta"];
	}
	return $dato;
}

// Función que dado un elemento y un usuario devuelve true si el usuario ha votado
// al elemento, false en caso contrario
function usuarioHaVotadoAElemento(Elemento $elemento,Usuario $usuario,$conexion){
    try {
		$SQL = "SELECT count(*) as cuenta FROM votacion WHERE idElemento=$elemento->id AND idUsuario=$usuario->id";
		$stmt = $conexion->query($SQL);
		$dato= creaUnicoDatoVotacion($stmt);
        return $dato["cuenta"]>0;
	} catch(PDOException $e) {
		echo $e;
		die();
	}
}
?>

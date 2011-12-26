<?php
function encontrarTodosLosElementos($conexion) {
	try {
		$SQL = "SELECT * FROM elemento";
	} catch(PDOException $e) {

	}
}

function encontrarElementoPorId($id, $conexion) {
	try {
		$SQL = "SELECT * FROM elemento WHERE id=$id";
	} catch(PDOException $e) {

	}
}

function encontrarElementosDeUsuario(Usuario $usuario, $conexion) {
	try {
		$idUsuario = $usuario -> __get("id");
		$SQL = "SELECT * FROM elemento WHERE idUsuario=$idUsuario";
	} catch(PDOException $e) {

	}
}

function encontrarRespuestas(Elemento $elemento, $conexion) {
	try {
		$idRespuesta = $elemento -> __get("idrespuesta");
		$SQL = "SELECT * FROM elemento WHERE idrespuesta=$idRespuesta";
	} catch(PDOException $e) {

	}
}

function encontrarElementosPorTag(Tag $tag, $conexion) {
	try {

	} catch(PDOException $e) {

	}
}

function encontrarElementosPorPalabras($cadena, $conexion) {
	try {

	} catch(PDOException $e) {

	}
}

function insertarElemento(Elemento $elemento, $conexion) {
	try {
		$idAutor = $elemento -> __get("idautor");
		$titulo = $elemento -> __get("titulo");
		$cuerpo = $elemento -> __get("cuerpo");
		$idRespuesta = $elemento -> __get("idrespuesta");
		$SQL = "INSERT INTO elemento (idautor,titulo,cuerpo,idrespuesta,fechapregunta) VALUES". 
		"('$idAutor','$titulo','$cuerpo','$idRespuesta',NOW())";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {

	}
}

function modificarElemento(Elemento $elemento, $conexion) {
	try {
		$idElemento = $elemento -> __get("id");
		$idAutor = $elemento -> __get("idautor");
		$titulo = $elemento -> __get("titulo");
		$cuerpo = $elemento -> __get("cuerpo");
		$idRespuesta = $elemento -> __get("idrespuesta");
		$SQL = "UPDATE elemento SET idautor=$idAutor,titulo=$titulo,cuerpo=$cuerpo,".
		"idrespuesta=$idRespuesta WHERE id=$idElemento";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {

	}
}

function borrarElemento(Elemento $elemento, $conexion) {
	try {
		$idElemento = $elemento -> __get("id");
		$SQL = "DELETE FROM elemento WHERE id=$idElemento";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {

	}
}
?>
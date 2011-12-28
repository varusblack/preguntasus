<?php
function encontrarTodosLosElementos($conexion) {
	try {
		$SQL = "SELECT * FROM elemento";
		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

function encontrarElementoPorId($id, $conexion) {
	try {
		$SQL = "SELECT * FROM elemento WHERE id=$id";
		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

function encontrarElementosDeUsuario(Usuario $usuario, $conexion) {
	try {
		$idUsuario = $usuario -> __get("id");
		$SQL = "SELECT * FROM elemento WHERE idUsuario=$idUsuario";
		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

function encontrarRespuestas(Elemento $elemento, $conexion) {
	try {
		$idRespuesta = $elemento -> __get("idrespuesta");
		$SQL = "SELECT * FROM elemento WHERE idrespuesta=$idRespuesta";
		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}
function encontrarElementosPorTag(Tag $tag, $conexion) {
	try {
		$idTag = $tag->__get("id");
		$SQL = "SELECT * FROM elemento e INNER JOIN tagsdeelementos t ON t.idelemento=e.id AND t.idtag=$idTag";
		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

function encontrarElementosPorPalabras($cadena, $conexion) {
	try {
		$cadmins = strtolower($cadena);
		$cadPrimMay = ucfirst($cadmins);
		$SQL = "SELECT * FROM elemento WHERE titulo LIKE '%$cadmins%' OR titulo LIKE '%$cadPrimMay%'";
		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
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
		Header("Location: error.php");
		die();
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
		Header("Location: error.php");
		die();
	}
}

function borrarElemento(Elemento $elemento, $conexion) {
	try {
		$idElemento = $elemento -> __get("id");
		$SQL = "DELETE FROM elemento WHERE id=$idElemento";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

function creaElementos($stmt) {
	$resultado = array();	
	foreach($stmt as $row){
		$objeto = new Elemento();
		$objeto->__set("id", $row["id"]);
		$objeto->__set("idautor", $row["idautor"]);
		$objeto->__set("titulo", $row["titulo"]);
		$objeto->__set("cuerpo", $row["cuerpo"]);
		$objeto->__set("idrespuesta", $row["idrespuesta"]);
		$objeto->__set("fechapregunta", $row["fechapregunta"]);
		$resultado[$row["id"]]=$objeto;
	}
	return $arrayADevolver;
}
?>
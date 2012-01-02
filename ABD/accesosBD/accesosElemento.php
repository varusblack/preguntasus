<?php
function encontrarTodosLosElementos($conexion) {
	try {
		$SQL = "SELECT * FROM elemento";
		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		die();
	}
}

function encontrarElementoPorId($id, $conexion) {
	try {
		$SQL = "SELECT * FROM elemento WHERE id=$id";
		$stmt = $conexion->query($SQL);
		return creaUnicoElemento($stmt);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

function encontrarElementosDeUsuario(Usuario $usuario, $conexion) {
	try {
		$idUsuario = $usuario -> id;
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
		$idRespuesta = $elemento -> id;
		$SQL = "SELECT * FROM elemento WHERE idrespuesta=$idRespuesta";
		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

function obtenerNumeroDeRespuestasDeElemento(Elemento $elemento,$conexion){
	try {
		$idRespuesta = $elemento -> id;
		$SQL = "SELECT COUNT(*) as cuenta FROM elemento WHERE idrespuesta=$idRespuesta";
		$stmt = $conexion->query($SQL);
		return creaUnicoDatoDeElemento($stmt);
	} catch(PDOException $e) {
		Header("Location: error.php");
		die();
	}
}

function encontrarElementosPorTag(Tag $tag, $conexion) {
	try {
		$idTag = $tag->id;
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

function encontrarElementosPorPalabrasYTag($cadena,Tag $tag, $conexion){
	try {
		$cadmins = strtolower($cadena);
		$cadPrimMay = ucfirst($cadmins);
		$idTag = $tag->id;
		$SQL = "SELECT e.id AS id,e.idautor AS idautor,e.titulo AS titulo, ".
		"e.idrespuesta AS idrespuesta,e.fechapregunta AS fechapregunta ". 
		"FROM elemento e,tagsdeelementos te WHERE e.id=te.idelemento AND te.idtag=$idTag ". 
		"AND e.titulo LIKE '%$cadmins%' OR e.titulo LIKE '%$cadPrimMay%'";
		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		echo $e;
		//Header("Location: error.php");
		die();
	} 
}

function insertarElemento(Elemento $elemento, $conexion) {
	try {
		$idAutor = $elemento -> idautor;
		$titulo = $elemento -> titulo;
		$cuerpo = $elemento ->cuerpo;
		$idRespuesta = $elemento -> idrespuesta;
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
		$idElemento = $elemento ->id;
		$idAutor = $elemento -> idautor;
		$titulo = $elemento -> titulo;
		$cuerpo = $elemento ->cuerpo;
		$idRespuesta = $elemento -> idrespuesta;
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
		$idElemento = $elemento -> id;
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
		$objeto->id= $row["id"];
		$objeto->idautor= $row["idautor"];
		$objeto->titulo= $row["titulo"];
		$objeto->cuerpo= $row["cuerpo"];
		$objeto->idrespuesta= $row["idrespuesta"];
		$objeto->fechapregunta= $row["fechapregunta"];
		$resultado[$row["id"]]=$objeto;
	}
	return $arrayADevolver;
}

function creaUnicoElemento($stmt) {
	$objeto = new Elemento();
	foreach($stmt as $row){
		$objeto->id= $row["id"];
		$objeto->idautor= $row["idautor"];
		$objeto->titulo= $row["titulo"];
		$objeto->cuerpo= $row["cuerpo"];
		$objeto->idrespuesta= $row["idrespuesta"];
		$objeto->fechapregunta= $row["fechapregunta"];
	}
	return $objeto;
}

function creaUnicoDatoDeElemento($stmt) {
	$dato = NULL;
	foreach($stmt as $row){
		$dato = $row["cuenta"];
	}
	return $dato;
}
?>
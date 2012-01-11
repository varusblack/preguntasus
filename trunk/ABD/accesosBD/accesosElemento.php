<?php

// Función que devuelve un array de todos los elementos
function encontrarTodosLosElementos($conexion) {
	try {
		$SQL = "SELECT * FROM elemento";
		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}

// Función que dado un id devuelve un único elemento
function encontrarElementoPorId($id, $conexion) {
	try {
		$SQL = "SELECT * FROM elemento WHERE id=$id";
		$stmt = $conexion->query($SQL);
		return creaUnicoElemento($stmt);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}

// Función que devuelve un array de todas las preguntas por fecha decreciente
function encontrarElementosOrdenadosPorFechaDecreciente($conexion){
	try {
		$SQL = "SELECT * FROM elemento WHERE idrespuesta IS NULL ORDER BY fechapregunta DESC";
 		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}

// Función que devuelve un array de todas las preguntas
function encontrarPreguntas($conexion){
	try {
		$SQL = "SELECT * FROM elemento WHERE idrespuesta IS NULL";
 		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}

// Función que dado un usuario devuelve un array de todos los elementos
// de los que es autor
function encontrarElementosDeUsuario(Usuario $usuario, $conexion) {
	try {
		$idUsuario = $usuario -> id;
		$SQL = "SELECT * FROM elemento WHERE idautor=$idUsuario";
		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}

// Función que dado un usuario devuelve un array de todas las respuestas
// de los que es autor
function encontrarRespuestasDeUsuario(Usuario $usuario,$conexion){
	try {
		$idUsuario = $usuario -> id;
		$SQL = "SELECT * FROM elemento WHERE idautor=$idUsuario AND idrespuesta IS NOT NULL";
		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}

// Función que devuelve un array de todas las respuestas
function encontrarRespuestas(Elemento $elemento, $conexion) {
	try {
		$idRespuesta = $elemento -> id;
		$SQL = "SELECT * FROM elemento WHERE idrespuesta=$idRespuesta";
		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}

// Función que dado una pregunta devuelve el número de respuestas que tiene 
function obtenerNumeroDeRespuestasDeElemento(Elemento $elemento,$conexion){
	try {
		$idRespuesta = $elemento -> id;
		$SQL = "SELECT COUNT(*) as cuenta FROM elemento WHERE idrespuesta=$idRespuesta";
		$stmt = $conexion->query($SQL);
		return creaUnicoDatoDeElemento($stmt);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}

// Función que dado un tag devuelve un array de todas los elementos
// con dicho tag
function encontrarElementosPorTag(Tag $tag, $conexion) {
	try {
		$idTag = $tag->id;
		$SQL = "SELECT * FROM elemento e INNER JOIN tagsdeelementos t ON t.idelemento=e.id AND t.idtag=$idTag";
		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}
// Función que dada una cadena de caracteres devuelve un array de todas los elementos
// que cuyo titulo contiene toda o parte de la cadena de caracteres
function encontrarElementosPorPalabras($cadena, $conexion) {
	try {
		$cadmins = strtolower($cadena);
		$cadPrimMay = ucfirst($cadmins);
		$SQL = "SELECT * FROM elemento WHERE titulo LIKE '%$cadmins%' OR titulo LIKE '%$cadPrimMay%'";
		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}

// Función que dado un tag y una cadena de caracteres devuelve un array de todas los elementos
// con dicho tag y que cuyo titulo contiene toda o parte de la cadena de caracteres
function encontrarElementosPorPalabrasYTag($cadena,Tag $tag, $conexion){
	try {
		$cadmins = strtolower($cadena);
		$cadPrimMay = ucfirst($cadmins);
		$idTag = $tag->id;
		$SQL = "SELECT e.id AS id,e.idautor AS idautor,e.titulo AS titulo, ".
		"e.idrespuesta AS idrespuesta,e.fechapregunta AS fechapregunta ". 
		"FROM elemento e,tagsdeelementos te WHERE e.id=te.idelemento AND te.idtag=$idTag ". 
		"AND (e.titulo LIKE '%$cadmins%' OR e.titulo LIKE '%$cadPrimMay%')";
		$stmt = $conexion->query($SQL);
		return creaElementos($stmt);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	} 
}

// Función que inserta una pregunta en la base de datos devolviendo el id de esta
function insertarPregunta(Elemento $elemento, $conexion) {
	try {
		$idAutor = $elemento -> idautor;
		$titulo = $elemento -> titulo;
		$cuerpo = $elemento ->cuerpo;
		$idRespuesta = $elemento -> idrespuesta;
		$SQL = "INSERT INTO elemento (idautor,titulo,cuerpo,fechapregunta) VALUES". 
		"('$idAutor','$titulo','$cuerpo',NOW())";
		$conexion -> exec($SQL);
		$var = $conexion->lastInsertId('elemento');
		return($var);
		//return( mysql_insert_id($conexion -> exec($SQL)));
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}

// Función que inserta un elemento en la base de datos
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
		echo $e;
		die();
	}
}

// Función que actualiza un elemento en la base de datos
function modificarElemento(Elemento $elemento, $conexion) {
	try {
		$idElemento = $elemento ->id;
		$idAutor = $elemento -> idautor;
		$titulo = $elemento -> titulo;
		$cuerpo = $elemento ->cuerpo;
		$idRespuesta = $elemento -> idrespuesta;
		$SQL = "UPDATE elemento SET idautor=$idAutor,titulo='$titulo',cuerpo='$cuerpo',".
		"idrespuesta=$idRespuesta WHERE id=$idElemento";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}

// Función que elimina un elemento de la base de datos
function borrarElemento(Elemento $elemento, $conexion) {
	try {
		$idElemento = $elemento -> id;
		$SQL = "DELETE FROM elemento WHERE id=$idElemento";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}

// Función que recorre el PDOStatement pasado como parámetro y devuelve
// un array de elementos
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
	return $resultado;
}

// Función que recorre el PDOStatement pasado como parámetro y devuelve
// un único elemento
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

// Función que recorre el PDOStatement pasado como parámetro y devuelve
// un único dato
function creaUnicoDatoDeElemento($stmt) {
	$dato = NULL;
	foreach($stmt as $row){
		$dato = $row["cuenta"];
	}
	return $dato;
}
?>
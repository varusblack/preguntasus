<?php

// Función que devuelve un array de todos los tags
function obtenerTodosLosTags($conexion){
	try{
		$SQL = "SELECT * FROM tag";
		$stmt = $conexion->query($SQL);                        
		return creaTags($stmt);
	}catch (PDOException $e){
		Header("Location: /abd/error.php"); 		
		die();
	}
}

// Función que dado un id devuelve un único tag
function obtenerTagPorId($id,$conexion){
	try{
		$SQL = "SELECT * FROM tag WHERE tag.id=$id";
		$stmt = $conexion->query($SQL);
		return creaUnicoTag($stmt);
	}catch(PDOException $e){
		Header("Location: /abd/error.php");	
		die();		
	}
}

// Función que dado un nombre de tag devuelve un único tag
function obtenerTagPorNombre($tag,$conexion){
	try{
		$SQL = "SELECT * FROM tag WHERE tag='$tag'";
		$stmt = $conexion->query($SQL);
		return creaUnicoTag($stmt);
	}catch(PDOException $e){
		Header("Location: /abd/error.php");	
		die();		
	}
}

// Función que inserta un tag en la base de datos
function insertarTag(Tag $tag,$conexion){
	try{
		$nombre = $tag->tag;
		$SQL = "INSERT INTO tag (tag) VALUES ('$nombre')";
		$conexion -> exec($SQL);
	}catch(PDOException $e){
		Header("Location: /abd/error.php");	
		die();		
	}
}

// Función que actualiza un tag en la base de datos
function modificarTag(Tag $tag,$conexion){
	try{
		$id = $tag->id;
		$nombre = $tag->tag;
		$SQL = "UPDATE tag SET tag=$nombre WHERE id=$id";
		$conexion -> exec($SQL);
	}catch(PDOException $e){
		Header("Location: /abd/error.php");
		die();			
	}
}

// Función que elimina un tag de la base de datos
function borrarTag(Tag $tag,$conexion){
	try{
		$idTag = $tag->id;
		$SQL="DELETE FROM tag WHERE id=$idTag";
		$conexion->exec($SQL);
	}catch(PDOException $e){
		Header("Location: /abd/error.php");
		die();
	}
}

// Función que recorre el PDOStatement pasado como parámetro y devuelve
// un array de tags
function creaTags($stmt) {
    $resultado = array();		
	foreach($stmt as $row){
		$objeto = new Tag();
		$objeto->id=$row["id"];
        $objeto->tag= $row["tag"];
		$resultado[$row["id"]] = $objeto;
	}
    return $resultado;
}

// Función que recorre el PDOStatement pasado como parámetro y devuelve
// un único tag
function creaUnicoTag($stmt) {
	$objeto = new Tag();
	foreach($stmt as $row){
		$objeto->id=$row["id"];
        $objeto->tag= $row["tag"];
	}
	return $objeto;
}
?>
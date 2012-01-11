<?php
function obtenerTagsDeElemento(Elemento $elemento,$conexion){
	try{
		$idElemento = $elemento ->id;
		$SQL = "SELECT t.id AS id,t.tag AS tag FROM tag t,tagsdeelementos te ".
		"WHERE t.id=te.idtag AND te.idelemento=$idElemento";
		$stmt = $conexion->query($SQL);
        return creaListadoTags($stmt);			
	}catch (PDOException $e){
		Header("Location: /abd/error.php"); 		
		die();
	}
}

function insertarTagDeElemento(Elemento $elemento,Tag $tag, $conexion) {
	try {
		$idElemento = $elemento ->id;
		$idTag = $tag ->id;
		$SQL = "INSERT INTO tagsdeelementos(idelemento,idtag) VALUES ('$idElemento','$idTag')";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}


function borrarElementoYTags(Elemento $elemento,$conexion){
	try {
		$idElemento = $elemento ->id;
		$SQL = "DELETE FROM tagsdeelementos WHERE idelemento=$idElemento";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}

function borrarTagDeElemento(Elemento $elemento,Tag $tag, $conexion) {
	try {
		$idElemento = $elemento ->id;
		$idTag = $tag->id;
		$SQL = "DELETE FROM tagsdeelementos WHERE idelemento=$idElemento AND idtag=$idTag";
		$conexion -> exec($SQL);
	} catch(PDOException $e) {
		Header("Location: /abd/error.php");
		die();
	}
}

function creaListadoTags($stmt) {
    $resultado = array();		
	foreach($stmt as $row){
		$objeto = new Tag();
		$objeto->id=$row["id"];
        $objeto->tag= $row["tag"];
		$resultado[$row["id"]] = $objeto;
	}
    return $resultado;
}
?>
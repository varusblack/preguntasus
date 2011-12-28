<?php
    function obtenerTodosLosTags($conexion){
    	try{
    		$SQL = "SELECT tag FROM tag";
			$stmt = $conexion->query($SQL);
			return creaElementos($stmt);
    	}catch (PDOException $e){
   			Header("Location: error.php"); 		
			die();
    	}
    }
	
	function obtenerTagPorId($id,$conexion){
		try{
			$SQL = "SELECT * FROM tag WHERE id=$id";
			$stmt = $conexion->query($SQL);
			return creaElementos($stmt);
		}catch(PDOException $e){
			Header("Location: error.php");	
			die();		
		}
	}
	
	function insertarTag(Tag $tag,$conexion){
		try{
			$nombre = $tag->__get("tag");
			$SQL = "INSERT INTO tag (tag) VALUES ($nombre)";
			$conexion -> exec($SQL);
		}catch(PDOException $e){
			Header("Location: error.php");	
			die();		
		}
	}
	
	function modificarTag(Tag $tag,$conexion){
		try{
			$id = $tag->__get("id");
			$nombre = $tag->__get("tag");
			$SQL = "UPDATE tag SET tag=$nombre WHERE id=$id";
			$conexion -> exec($SQL);
		}catch(PDOException $e){
			Header("Location: error.php");
			die();			
		}
	}
	
	function borrarTag(Tag $tag,$conexion){
		try{
			$idTag = $tag->__get("id");
			$SQL="DELETE FROM tag WHERE id=$idTag";
			$conexion->exec($SQL);
		}catch(PDOException $e){
			Header("Location: error.php");
			die();
		}
	}
	
	function creaElementos($stmt) {
        $resultado = array();		
		foreach($stmt as $row){
			$objeto = new Tag();
			$objeto->__set("id", $row["id"]);
            $objeto->__set("tag", $row["tag"]);
			$resultado[$row["id"]] = $objeto;
		}
        return $resultado;
    }
?>
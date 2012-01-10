<?php
    function obtenerTodosLosTags($conexion){
    	try{
    		$SQL = "SELECT * FROM tag";
			$stmt = $conexion->query($SQL);                        
			return creaTags($stmt);
    	}catch (PDOException $e){
   			Header("Location: error.php"); 		
			die();
    	}
    }
	
	function obtenerTagPorId($id,$conexion){
		try{
			$SQL = "SELECT * FROM tag WHERE tag.id=$id";
			$stmt = $conexion->query($SQL);
			return creaUnicoTag($stmt);
		}catch(PDOException $e){
			Header("Location: error.php");	
			die();		
		}
	}
	
	function obtenerTagPorNombre($tag,$conexion){
		try{
			$SQL = "SELECT * FROM tag WHERE tag.tag=$tag";
			$stmt = $conexion->query($SQL);
			return creaUnicoTag($stmt);
		}catch(PDOException $e){
			Header("Location: error.php");	
			die();		
		}
	}
	
	function insertarTag(Tag $tag,$conexion){
		try{
			$nombre = $tag->tag;
			$SQL = "INSERT INTO tag (tag) VALUES ($nombre)";
			$conexion -> exec($SQL);
		}catch(PDOException $e){
			Header("Location: error.php");	
			die();		
		}
	}
	
	function modificarTag(Tag $tag,$conexion){
		try{
			$id = $tag->id;
			$nombre = $tag->tag;
			$SQL = "UPDATE tag SET tag=$nombre WHERE id=$id";
			$conexion -> exec($SQL);
		}catch(PDOException $e){
			Header("Location: error.php");
			die();			
		}
	}
	
	function borrarTag(Tag $tag,$conexion){
		try{
			$idTag = $tag->id;
			$SQL="DELETE FROM tag WHERE id=$idTag";
			$conexion->exec($SQL);
		}catch(PDOException $e){
			Header("Location: error.php");
			die();
		}
	}
	
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
    
    function creaUnicoTag($stmt) {
		$objeto = new Tag();
		foreach($stmt as $row){
			$objeto->id=$row["id"];
            $objeto->tag= $row["tag"];
		}
		return $objeto;
	}
?>
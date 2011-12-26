<?php
    function obtenerTodosLosTags($conexion){
    	try{
    		$SQL = "SELECT tag FROM tag";
    	}catch (PDOException $e){
    		
    	}
    }
	
	function obtenerTagPorId($id,$conexion){
		try{
			$SQL = "SELECT * FROM tag WHERE id=$id";
		}catch(PDOException $e){
			
		}
	}
	
	function insertarTag(Tag $tag,$conexion){
		try{
			$nombre = $tag->__get("tag");
			$SQL = "INSERT INTO tag (tag) VALUES ($nombre)";
			$conexion -> exec($SQL);
		}catch(PDOException $e){
			
		}
	}
	
	function modificarTag(Tag $tag,$conexion){
		try{
			$id = $tag->__get("id");
			$nombre = $tag->__get("tag");
			$SQL = "UPDATE tag SET tag=$nombre WHERE id=$id";
			$conexion -> exec($SQL);
		}catch(PDOException $e){
			
		}
	}
	
	function borrarTag(Tag $tag,$conexion){
		try{
			$idTag = $tag->__get("id");
			$SQL="DELETE FROM tag WHERE id=$idTag";
			$conexion->exec($SQL);
		}catch(PDOException $e){
			
		}
	}
?>
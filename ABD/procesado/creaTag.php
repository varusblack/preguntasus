<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/accesosBD/conexionesBD.php");
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/accesosBD/accesosTag.php");
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/entidades/Tag.php" );
	
    session_start();
	
	$creacion = $_POST["crear"];
	
// 	Si se ha iniciado la creación en la página correspondiente comenzará el proceso de creación
	if(isset($creacion)){
		$conexion = crearConexion();
		$nombreTag = $_POST["nombreTag"];
		$tagExistente = obtenerTagPorNombre($nombreTag,$conexion);
// 		Si el campo es vacío se interrumpirá el proceso, en caso contrario continua
		if(strlen($nombreTag)<1){
			$_SESSION["error"] = "El nombre del tag no puedeser vacío";
		}else{
// 			Si no existe un tag con el mismo nombre se insertará un nuevo tag en 
// 			la base de datos, en caso contrario se interrumpe el proceso
			if($tagExistente->id == null){
				$nuevoTag = new Tag();
				$nuevoTag->tag = $nombreTag;
				insertarTag($nuevoTag,$conexion);
				$_SESSION["mensajes"] = "Tag creado satisfactoriamente";
			}else{
				$_SESSION["error"] = "Ya existe un tag con este nombre";
			}
			
		}
		cerrarConexion($conexion);
		Header("Location:/abd/administrartags.php");
		exit();
		
	}else{
		Header("Location:/abd/index.php");
		exit();
	}
	
?>
<?php
    /**
     * VALIDAR CON LA SESSION COMO SE VE EN CLASE
     */
    
    /*
	 * Llega una cadena de "$palabras"
	 * llega un idTag desde "$tag"
	 */
	
	session_start();
	$buscarPreguntas=$_SESSION["buscarPreguntas"];
	$erroresBuscarPreguntas=$_SESSION["erroresBuscarPregunta"];
	
	if(isset($buscarPreguntas)){
		$buscarPreguntas["palabras"] = $_REQUEST["palabras"];
		$buscarPreguntas["tag"]=$_REQUEST["tag"];
		
		$_SESSION["buscarPalabras"]=$buscarPreguntas;
		if(!isset($buscarPreguntas["palabras"]) && !isset($buscarPreguntas["tag"])){
			$erroresBuscarPreguntas[1]="Los dos campos no pueden ser vacios";
			Header("Location:buscar.php");
			die();
		}else{			
			/**
			 * ¿A dónde mandará esto cuando sean correctos los campos?
			 */
			Header();
			die();
		}				
	}    
?>
<?php
   
	session_start();
	$buscarPreguntas = $_SESSION["buscarPreguntas"];
	$erroresBuscarPreguntas = $_SESSION["erroresBuscarPregunta"];
	$_SESSION["haBuscado"] = TRUE;

	if (isset($buscarPreguntas)) {
		$buscarPreguntas["palabras"] = $_REQUEST["palabras"];
		$buscarPreguntas["tag"] = $_REQUEST["tag"];

		$_SESSION["buscarPalabras"] = $buscarPreguntas;
		if (strlen($buscarPreguntas["palabras"]) == 0 && strlen($buscarPreguntas["tag"]) == 0) {
			$erroresBuscarPreguntas[1] = "Los dos campos no pueden ser vacios";
			$_SESSION["erroresBuscarPregunta"] = $erroresBuscarPreguntas;
			Header("Location: ../buscar.php");
			die();
		} else {
			if (strlen($buscarPreguntas["palabras"]) > 0 && strlen($buscarPreguntas["tag"]) > 0) {
				$_SESSION["tipobusqueda"] = 1;
			}
			if (strlen($buscarPreguntas["palabras"]) > 0 && strlen($buscarPreguntas["tag"]) == 0) {
				$_SESSION["tipobusqueda"] = 2;
			}
			if (strlen($buscarPreguntas["palabras"]) == 0 && strlen($buscarPreguntas["tag"]) > 0) {
				$_SESSION["tipobusqueda"] = 3;
			}	
			$_SESSION["erroresBuscarPregunta"] = NULL;		
			Header("Location: ../buscar.php");
			die();
		}				
	} else {
		$erroresBuscarPreguntas[1] = "No se pudo realizar la búsqueda";
		$_SESSION["erroresBuscarPregunta"] = $erroresBuscarPreguntas;
		Header("Location: ../buscar.php");
		die();
	}
?>
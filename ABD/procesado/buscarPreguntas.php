<?php
   
	session_start();
	$erroresBuscarPreguntas = $_SESSION["erroresBuscarPregunta"];
	$busqueda = $_REQUEST["buscar"];
	$_SESSION["haBuscado"] = TRUE;
	
	if (isset($busqueda)) {
		$palabras = $_REQUEST["palabras"];
		$tag = $_REQUEST["tag"];

		if (strlen($palabras) == 0 && strlen($tag) == 0) {
			$erroresBuscarPreguntas[1] = "Los dos campos no pueden ser vacios";
			$_SESSION["erroresBuscarPregunta"] = $erroresBuscarPreguntas;
			$_SESSION["tipobusqueda"] = NULL;
			$_SESSION["tag"] = NULL;
			$_SESSION["palabras"] = NULL;
			Header("Location: ../buscar.php");
			die();
		} else {
			if (strlen($palabras) > 0 && strlen($tag) > 0) {
				$_SESSION["tipobusqueda"] = 1;
			}
			if (strlen($palabras) > 0 && strlen($tag) == 0) {
				$_SESSION["tipobusqueda"] = 2;
			}
			if (strlen($palabras) == 0 && strlen($tag) > 0) {
				$_SESSION["tipobusqueda"] = 3;
			}
			$_SESSION["palabras"] = $palabras;
			$_SESSION["tag"] = $tag;
			$_SESSION["erroresBuscarPregunta"] = NULL;		
			Header("Location: ../buscar.php");
			die();
		}		
		die();	
	}
?>
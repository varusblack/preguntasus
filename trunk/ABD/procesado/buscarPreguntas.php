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
			Header("Location: /abd/buscar.php");
			die();
		} else {
// 			Dependiendo de qué campos contengan datos el tipo de búsqueda será distinto:
// 			Tipo de busqueda = 1 --> Palabras y tag no son vacios
// 			Tipo de busqueda = 2 --> Palabras no es vacío mientra que tag si lo es
// 			Tipo de busqueda = 3 --> Palabras es vacío mientra que tag no lo es
			
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
			Header("Location: /abd/buscar.php");
			die();
		}		
		die();	
	}
?>
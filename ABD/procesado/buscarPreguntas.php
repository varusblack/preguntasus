<?php
	$tipoBusqueda=NULL;
   	$cadena = $_REQUEST["palabras"];
	$tag = $_REQUEST["tag"];
   
   	$errores = array();
	
	if(!isset($cadena) && !isset($tag)){
		$errores[1]="Los dos campos no pueden ser vacios";
	}	
	if(isset($cadena) && isset($tag)){
		$tipobusqueda=1;
	}
	if(isset($cadena) && !isset($tag)){
		$tipobusqueda=2;
	}
	if(!isset($cadena) && isset($tag)){
		$tipobusqueda=3;
	}
	
// 	
//    
	// $buscarPreguntas=$_SESSION["buscarPreguntas"];
	// $erroresBuscarPreguntas=$_SESSION["erroresBuscarPregunta"];
// 	
// 	
// 	
// 	
// 	
	// if(isset($buscarPreguntas)){
		// $buscarPreguntas["palabras"] = $_REQUEST["palabras"];
		// $buscarPreguntas["tag"]=$_REQUEST["tag"];
// 		
		// $_SESSION["buscarPalabras"]=$buscarPreguntas;
		// if(!isset($buscarPreguntas["palabras"]) && !isset($buscarPreguntas["tag"])){
			// $erroresBuscarPreguntas[1]="Los dos campos no pueden ser vacios";
// 			
		// }else{
			// if(isset($buscarPreguntas["palabras"]) && isset($buscarPreguntas["tag"])){
				// $_SESSION["tipobusqueda"]=1;
			// }
			// if(isset($buscarPreguntas["palabras"]) && !isset($buscarPreguntas["tag"])){
				// $_SESSION["tipobusqueda"]=2;
			// }
			// if(!isset($buscarPreguntas["palabras"]) && isset($buscarPreguntas["tag"])){
				// $_SESSION["tipobusqueda"]=3;
			// }				
		// }	
		// Header("Location:buscar.php");
		// die();			
	// }    else{
		// echo "COPON DE NEGRO PA TI";
	// }
?>
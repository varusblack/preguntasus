<?php
   
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
			if(isset($buscarPreguntas["palabras"]) && isset($buscarPreguntas["tag"])){
				$_SESSION["tipobusqueda"]=1;
			}
			if(isset($buscarPreguntas["palabras"]) && !isset($buscarPreguntas["tag"])){
				$_SESSION["tipobusqueda"]=2;
			}
			if(!isset($buscarPreguntas["palabras"]) && isset($buscarPreguntas["tag"])){
				$_SESSION["tipobusqueda"]=3;
			}			
			Header("Location:buscar.php");
			die();
		}				
	}    else{
		echo "COPON DE NEGRO PA TI";
	}
?>
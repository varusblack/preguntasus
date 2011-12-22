<?php
    require $_SERVER['DOCUMENT_ROOT']."/preguntasus/lib/autoloader.php";
	
	$elementoDAO = new ElementoDAOImpl();
	
	$preguntas = $elementoDAO->encontrarElementosPorTag($tag)
?>
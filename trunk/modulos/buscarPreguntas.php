<?php
require $_SERVER['DOCUMENT_ROOT'] . "/preguntasus/lib/autoloader.php";

$elementoDAO = new ElementoDAOImpl();
$tagsDAO = new TagDAOImpl();
$tags = $tagsDAO -> getAll();

$palabrasClave = $_REQUEST["palabras"];
$tag = $_REQUEST["selectTags"];

if (!isset($tag) && !isset($palabraClave)) {
	$elementos = array();
} else {

	if ($tag == "") {
		$elementos = $elementoDAO -> encontrarElementosPorPalabra($palabrasClave);
	} else {
		if ($palabrasClave == "") {
			$elemantos = $elementoDAO -> encontrarElementosPorTag($tag);
		} else {
			$elementos = $elementoDAO -> encontrarElementosPorTagYPalabra($tag, $palabrasClave);
		}
	}
}
$parametros=array();
$parametros["tags"] = $tags;
$parametros["elementos"] = $elementos;

echo show::mostrar("buscar", $parametros);
?>
<?php
	require $_SERVER['DOCUMENT_ROOT']."/preguntasus/lib/autoloader.php";
    $dao = new TagDAOImpl();
	$tags=$dao->getAll();
	
	
	echo show::mostrar("buscar", $tags);
?>
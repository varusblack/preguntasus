<?php

interface ElementoDAO extends DAO{

    function encontrarRespuestas(Elemento $elemento);

    function encontrarElementosDeUsuario(Usuario $usuario);
	
	function encontrarElementosPorTag(Tag $tag);
	
	function encontrarElementosPorPalabra($cadena);
    
}
 
?>

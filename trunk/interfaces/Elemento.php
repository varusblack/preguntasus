<?php
    interface Elemento extends Iterator{
    	function encontrarTodasPreguntas();
		function encontrarRespuestas(Elemento $elemento);
		function encontrarElementosDeUsuario(Usuario $usuario);
		function encontrarElementoPorID($id);
		function insertarElemento(Elemento $elemento);
		function editarElemento(Elemento $elemento);
		function borrarElemento(Elemento $elemento);
    }
?>
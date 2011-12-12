<?php

interface ElementoDAO extends DAO{

    function encontrarRespuestas(Elemento $elemento);

    function encontrarElementosDeUsuario(Usuario $usuario);
    
}
 
?>

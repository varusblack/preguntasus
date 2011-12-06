<?php

interface Elemento extends DAO{

    function encontrarRespuestas(Elemento $elemento);

    function encontrarElementosDeUsuario(Usuario $usuario);
}

?>
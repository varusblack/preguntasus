<?php

class UsuarioImpl extends TransferObjectGenerico implements Usuario {

    private $atributos = array();

    public function __construct() {
        $this->atributos["id"] = NULL;
        $this->atributos["email"] = NULL;
        $this->atributos["password"] = NULL;
        $this->atributos["fecharegistro"] = NULL;
        $this->atributos["preguntasrealizadas"] = NULL;
        $this->atributos["preguntasrespondidas"] = NULL;
        $this->atributos["puntos"] = NULL;
        $this->atributos["nombre"] = NULL;
        $this->atributos["apellidos"] = NULL;
        $this->atributos["fechanacimiento"] = NULL;
    }

}

?>
<?php

class ElementoImpl implements Elemento {

    private $atributos = array();

    public function __construct() {
        $this->atributos["id"] = NULL;
        $this->atributos["idautor"] = NULL;
        $this->atributos["titulo"] = NULL;
        $this->atributos["cuerpo"] = NULL;
        $this->atributos["idrespuesta"] = NULL;
        $this->atributos["fechapregunta"] = NULL;
    }

}

?>
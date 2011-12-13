<?php

class ElementoImpl extends TransferObjectGenerico implements Elemento {

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
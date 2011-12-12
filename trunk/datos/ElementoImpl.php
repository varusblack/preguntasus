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

    public function __get($atributo) {
        if (array_key_exists($atributo, $this->atributos)) {
            return $this->atributos[$atributo];
        } else {
            return NULL;
        }
    }

    public function __set($atributo, $valor) {
        if (array_key_exists($atributo, $this->atributos)) {
            $this->atributos[$atributo] = $valor;
        }
    }

}

?>
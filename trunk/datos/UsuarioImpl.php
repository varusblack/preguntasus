<?php

class UsuarioImpl implements Usuario{

    private $atributos = array();

    function __construct() {
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

    public function __get($atributo) {
        if (isset($this->atributos[$atributo])) {
            return $this->atributos($atributo);
        } else {
            return NULL;
        }
    }

    public function __set($atributo, $valor) {
        if (isset($this->atributos[$atributo])) {
            $this->atributos($atributo) = $valor;
        }
    }

}

?>
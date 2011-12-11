<?php

class ElementoImpl implements Elemento {

    private $atributos = array();
	
	public function __construct(){
		$this->atributos["id"]=NULL;
		$this->atributos["idautor"]=NULL;
		$this->atributos["titulo"]=NULL;
		$this->atributos["cuerpo"]=NULL;
		$this->atributos["idrespuesta"]=NULL;
		$this->atributos["fechapregunta"]=NULL;
	}
   
   
    public function __get($atributo) {
        if (isset($this->atributos[$atributo])) {
            return $this->atributos[$atributo];
        } else {
            return NULL;
        }
    }

    public function __set($atributo, $valor) {
        if (isset($this->atributos[$atributo])) {
            $this->atributos[$atributo] = $valor;
        }
    }

}

?>
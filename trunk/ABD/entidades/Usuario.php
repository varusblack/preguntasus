<?php
class Usuario {

	private $atributos = array();

	public function __construct() {
		$this -> atributos["id"] = NULL;
		$this -> atributos["email"] = NULL;
		$this -> atributos["password"] = NULL;
		$this -> atributos["fecharegistro"] = NULL;
		$this -> atributos["preguntasrealizadas"] = NULL;
		$this -> atributos["preguntasrespondidas"] = NULL;
		$this -> atributos["puntos"] = NULL;
		$this -> atributos["nombre"] = NULL;
		$this -> atributos["apellidos"] = NULL;
		$this -> atributos["fechanacimiento"] = NULL;
		$this -> atributos["tipoUsuario"] = NULL;
	}

	public function __get($atributo) {
		if (array_key_exists($atributo, $this -> atributos)) {
			return $this -> atributos[$atributo];
		} else {
			return NULL;
		}
	}

	public function __set($atributo, $valor) {
		if (array_key_exists($atributo, $this -> atributos)) {
			$this -> atributos[$atributo] = $valor;
		}
	}

}
?>
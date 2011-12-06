<?php

    class ElementoImpl implements Elemento{
    	
		private $atributos = array();
		
		function ElementoImpl($email,$password,$nombre=NULL,$apellidos=NULL,$fechanacimiento=NULL){
			$this->atributos["email"]=$email;
			$this->atributos["password"]=$password;			
			$this->atributos["nombre"]=$nombre;			
			$this->atributos["apellidos"]=$apellidos;
			$this->atributos["fechanacimiento"]=$fechanacimiento;
		}
		
		public function __get($atributo){
			if(isset($this->atributos[$atributo])){
				return $this->atributos($atributo);
			}else{
				return NULL;
			}			
		}
		
		public function __set($atributo,$valor){
			if(isset($this->atributos[$atributo])){
				$this->atributos($atributo)=$valor;
			}			
		}
    }
?>
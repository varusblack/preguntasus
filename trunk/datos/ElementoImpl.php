<?php

class ElementoImpl implements Elemento, Iterator {

    private $atributos = array();
    private $conexion;
    private $resultados=array();

    public function __construct() {
        $this->conexion = new MySQL();
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

    public function delete($elemento) {
        
    }

    public function encontrarElementosDeUsuario(Usuario $usuario) {
        
    }

    public function encontrarRespuestas(Elemento $elemento) {
        
    }

    public function getAll() {
        $consulta = "SELECT * FROM elemento";
        $resultado = $this->conexion->query($consulta);
        while($registro=$resultado->fetch_array(MYSQLI_ASSOC)){
            $this->resultados[]=$registro;
        }
    }

    public function getById($id) {
        
    }

    public function insert($elemento) {
        
    }

    public function update($elemento) {
        
    }

    public function current() {
        return $this->resultados->current();
        
    }

    public function key() {
        return $this->resultados->key();
    }

    public function next() {
        $this->resultados->next();
    }

    public function rewind() {
        rewind($this->resultados);
    }

    public function valid() {
        $this->resultados->valid();
    }

}

?>
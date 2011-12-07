<?php

class ElementoImpl implements Elemento, Iterator {

    private $atributos = array();
    private $conexion;
    private $resultados=array();
    private $numResultados;
    private $posicion;

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
        $this->numResultados=$resultado->num_rows;
        
        while($registro=$resultado->fetch_array(MYSQLI_ASSOC)){
            $this->resultados[]=$registro;
        }
        $this->posicion=0;
        $this->atributos=$this->resultados[$this->posicion];
        
    }

    public function getById($id) {
        $consulta="SELECT * FROM elemento WHERE id=$id";
        $resultado = $this->conexion->query($consulta);
        $this->numResultados=$resultado->num_rows;
        
        while($registro=$resultado->fetch_array(MYSQLI_ASSOC)){
            $this->resultados[]=$registro;
        }
        $this->posicion=0;
        $this->atributos=$this->resultados[$this->posicion];
        
    }

    public function insert($elemento) {
        
    }

    public function update($elemento) {
        
    }

    public function current() {
        return $this;
    }

    public function key() {
        return $this->posicion;
    }

    public function next() {
        $this->posicion++;
    }

    public function rewind() {
        $this->posicion=0;
    }

    public function valid() {
        $ret=$this->posicion<$this->numResultados;
        if($ret){
            $this->atributos=$this->resultados[$this->posicion];
        }
        return $ret;
    }
    
    public function getNumElementos() {
        return $this->numResultados;
    }

}

?>
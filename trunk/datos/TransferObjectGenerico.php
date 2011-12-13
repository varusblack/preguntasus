<?

class TransferObjectGenerico {

    protected $atributos = array();
    
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
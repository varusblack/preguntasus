<?
class TagImpl extends TrasferObjectGenerico implements Tag {

    private $atributos = array();

    public function __construct() {
        $this->atributos["id"] = NULL;
        $this->atributos["tag"] = NULL;
    }

}

?>
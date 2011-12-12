<?
class VisitaImpl extends TrasferObjectGenerico implements Visita {

    private $atributos = array();

    public function __construct() {
        $this->atributos["id"] = NULL;
        $this->atributos["idelemento"] = NULL;
        $this->atributos["idusuario"] = NULL;
    }
}

?>
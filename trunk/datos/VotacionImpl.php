<?
class Votacion extends TrasferObjectGenerico implements VotacionImpl {

    private $atributos = array();

    public function __construct() {
        $this->atributos["id"] = NULL;
        $this->atributos["idelemento"] = NULL;
        $this->atributos["idusuario"] = NULL;
    }
}
 
?>
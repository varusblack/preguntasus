<?
class Votacion extends TrasferObjectGenerico implements VotacionImpl {

    public function __construct() {
        $this->atributos["id"] = NULL;
        $this->atributos["idelemento"] = NULL;
        $this->atributos["idusuario"] = NULL;
    }
}
 
?>
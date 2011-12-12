<?php


class VisitaDAOImpl implements VisitaDAO {

    private $conexion;

    public function __construct() {
        $this->conexion = new MySQL();
    }

    public function delete(Visita $elemento) {
        $consulta = "DELETE FROM visita WHERE id=" . $this->conexion->clean($elemento->id);

        $this->conexion->query($consulta);
    }

    private function creaElementos($resultado) {
        $arrayADevolver = array();

        while ($registro = $resultado->fetch_array(MYSQLI_ASSOC)) {
            $objeto = new TagImpl();
            $objeto->__set("id", $registro["id"]);
            $objeto->__set("idelemento", $registro["idelemento"]);
            $objeto->__set("idusuario", $registro["idusuario"]);
            $arrayADevolver[$registro["id"]] = $objeto;
        }
        return $arrayADevolver;
    }

    public function getAll() {
        $consulta = "SELECT * FROM visita";
        $resultado = $this->conexion->query($consulta);

        return $this->creaElementos($resultado);
    }

    public function getById($id) {
        $consulta = "SELECT * FROM visita WHERE id=$id";
        $resultado = $this->conexion->query($consulta);

        $objeto = new TagImpl();
        while ($registro = $resultado->fetch_array(MYSQLI_ASSOC)) {

            $objeto->__set("id", $registro["id"]);
            $objeto->__set("idelemento", $registro["elemento"]);
            $objeto->__set("idusuario", $registro["idusuario"]);
        }
        return $objeto;
    }

    public function insert($elemento) {
        $consulta = "INSERT INTO visita (idelemento,idusuaro) VALUES (";
        $consulta.=$this->conexion->clean($elemento->__get("idelemento"));
        $consulta.=",";
        $consulta.=$this->conexion->clean($elemento->__get("idusuario"));
        $consulta.=")";

        $this->conexion->query($consulta);
    }

    public function update($elemento) {
        $consulta = "UPDATE visita SET idelemento=" . $this->conexion->clean($elemento->idelemento);
        $consulta.=",";
        $consulta.="idusuario=".$this->conexion->clean($elemento->idusuario);
        $consulta.=" WHERE id=" . $this->conexion->clean($elemento->id);
        $this->conexion->query($consulta);
    }
}

?>

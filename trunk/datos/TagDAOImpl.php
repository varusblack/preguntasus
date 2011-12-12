<?php


class TagDAOImpl implements tagDAO {

    private $conexion;

    public function __construct() {
        $this->conexion = new MySQL();
    }

    public function delete(Tag $elemento) {
        $consulta = "DELETE FROM tag WHERE id=" . $this->conexion->clean($elemento->id);

        $this->conexion->query($consulta);
    }

    private function creaElementos($resultado) {
        $arrayADevolver = array();

        while ($registro = $resultado->fetch_array(MYSQLI_ASSOC)) {
            $objeto = new TagImpl();
            $objeto->__set("id", $registro["id"]);
            $objeto->__set("tag", $registro["tag"]);
            $arrayADevolver[$registro["id"]] = $objeto;
        }
        return $arrayADevolver;
    }

    public function getAll() {
        $consulta = "SELECT * FROM tag";
        $resultado = $this->conexion->query($consulta);

        return $this->creaElementos($resultado);
    }

    public function getById($id) {
        $consulta = "SELECT * FROM tag WHERE id=$id";
        $resultado = $this->conexion->query($consulta);

        $objeto = new TagImpl();
        while ($registro = $resultado->fetch_array(MYSQLI_ASSOC)) {

            $objeto->__set("id", $registro["id"]);
            $objeto->__set("tag", $registro["tag"]);
        }
        return $objeto;
    }

    public function insert($elemento) {
        $consulta = "INSERT INTO tag (tag) VALUES (";
        $consulta.=$this->conexion->clean($elemento->__get("tag"));
        $consulta.=")";

        $this->conexion->query($consulta);
    }

    public function update($elemento) {
        $consulta = "UPDATE tag SET tag=" . $this->conexion->clean($elemento->tag);
        $consulta.="WHERE id=" . $this->conexion->clean($elemento->id);
        $this->conexion->query($consulta);
    }
}

?>

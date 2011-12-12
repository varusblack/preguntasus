<?php

class ElementoDAOImpl implements ElementoDAO {

    private $conexion;

    public function __construct() {
        $this->conexion = new MySQL();
    }

    public function delete($elemento) {
        $consulta = "DELETE FROM elemento WHERE id=" . $this->conexion->clean($elemento->id);

        $this->conexion->query($consulta);
    }

    public function encontrarElementosDeUsuario(Usuario $usuario) {
        $consulta = "SELECT * FROM elemento WHERE idUsuario=" . $this->conexion->clean($usuario->__get("id"));
        $resultado = $this->conexion->query($consulta);

        return $this->creaElementos($resultado);
    }

    public function encontrarRespuestas(Elemento $elemento) {
        $consulta = "SELECT * FROM elemento WHERE idrespuesta=" . $this->conexion->clean($elemento->__get("id"));
        $resultado = $this->conexion->query($consulta);

        return $this->creaElementos($resultado);
    }

    private function creaElementos($resultado) {
        $arrayADevolver = array();

        while ($registro = $resultado->fetch_array(MYSQLI_ASSOC)) {
            $objeto = new ElementoImpl();
            $objeto->__set("id", $registro["id"]);
            $objeto->__set("idautor", $registro["idautor"]);
            $objeto->__set("titulo", $registro["titulo"]);
            $objeto->__set("cuerpo", $registro["cuerpo"]);
            $objeto->__set("idrespuesta", $registro["idrespuesta"]);
            $objeto->__set("fechapregunta", $registro["fechapregunta"]);
            $arrayADevolver[$registro["id"]] = $objeto;
        }
        return $arrayADevolver;
    }

    public function getAll() {
        $consulta = "SELECT * FROM elemento";
        $resultado = $this->conexion->query($consulta);

        return $this->creaElementos($resultado);
    }

    public function getById($id) {
        $consulta = "SELECT * FROM elemento WHERE id=$id";
        $resultado = $this->conexion->query($consulta);

        $objeto = new ElementoImpl();
        while ($registro = $resultado->fetch_array(MYSQLI_ASSOC)) {

            $objeto->__set("id", $registro["id"]);
            $objeto->__set("idautor", $registro["idautor"]);
            $objeto->__set("titulo", $registro["titulo"]);
            $objeto->__set("cuerpo", $registro["cuerpo"]);
            $objeto->__set("idrespuesta", $registro["idrespuesta"]);
            $objeto->__set("fechapregunta", $registro["fechapregunta"]);
        }
        return $objeto;
    }

    public function insert($elemento) {
        $consulta = "INSERT INTO elemento (idautor,titulo,cuerpo,idrespuesta,fechapregunta) VALUES (";
        $consulta.=$this->conexion->clean($elemento->__get("idautor"));
        $consulta.=",";
        $consulta.="'" . $this->conexion->clean($elemento->__get("titulo")) . "'";
        $consulta.=",";
        $consulta.="'" . $this->conexion->clean($elemento->__get("cuerpo")) . "'";
        $consulta.=",";
        if ($elemento->__get("idrespuesta") == NULL) {
            $consulta.='NULL';
        } else {
            $consulta.=$this->conexion->clean($elemento->__get("idrespuesta"));
        }
        $consulta.=",";
        $consulta.="now()";

        $consulta.=")";

        $this->conexion->query($consulta);
    }

    public function update($elemento) {
        $consulta = "UPDATE elemento SET idautor=" . $this->conexion->clean($elemento->idautor);
        $consulta.=",";
        $consulta.="titulo='" . $this->conexion->clean($elemento->titulo) . "'";
        $consulta.=",";
        $consulta.="cuerpo='" . $this->conexion->clean($elemento->cuerpo) . "'";
        $consulta.=",";
        $consulta.="idrespuesta='" . $this->conexion->clean($elemento->idrespuesta) . "'";
        $consulta.=",";
        $consulta.="fechapregunta='" . $this->conexion->clean($elemento->fechapregunta) . "'";
        $consulta.="WHERE id=" . $this->conexion->clean($elemento->id);

        $this->conexion->query($consulta);
    }

}

?>
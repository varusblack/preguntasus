<?php

class UsuarioDAOImpl implements UsuarioDAO {

    private $conexion;

    public function __construct() {
        $this->conexion = new MySQL();
    }

    public function delete($elemento) {
        $consulta = "DELETE FROM usuario WHERE id=" . $this->conexion->clean($elemento->id);

        $this->conexion->query($consulta);
    }

    
    private function creaElementos($resultado) {
        $arrayADevolver = array();

        while ($registro = $resultado->fetch_array(MYSQLI_ASSOC)) {
            $objeto = new UsuarioImpl();
            $objeto->__set("id", $registro["id"]);
            $objeto->__set("email", $registro["email"]);
            $objeto->__set("password", $registro["password"]);
            $objeto->__set("fecharegistro", $registro["fecharegistro"]);
            $objeto->__set("preguntasrespondidas", $registro["preguntasrespondidas"]);
            $objeto->__set("puntos", $registro["puntos"]);
            $objeto->__set("nombre", $registro["nombre"]);
            $objeto->__set("apellidos", $registro["apellidos"]);
            $objeto->__set("fechanacimiento", $registro["fechanacimiento"]);
            $arrayADevolver[$registro["id"]] = $objeto;
        }
        return $arrayADevolver;
    }

    public function getAll() {
        $consulta = "SELECT * FROM usuario";
        $resultado = $this->conexion->query($consulta);

        return $this->creaElementos($resultado);
    }

    public function getById($id) {
        $consulta = "SELECT * FROM usuario WHERE id=$id";
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
        $consulta = "INSERT INTO usuario (email,password,fecharegistro,nombre,apellidos,fechanacimiento) VALUES (";
        $consulta.="'".$this->conexion->clean($elemento->__get("email"))."'";
        $consulta.=",";
        $consulta.="'" . $this->conexion->clean($elemento->__get("password")) . "'";
        $consulta.=",";
        $consulta.="now()";
        $consulta.=",";
        $consulta.="'".$this->conexion->clean($elemento->__get("nombre"))."'";
        $consulta.=",";
        $consulta.="'".$this->conexion->clean($elemento->__get("apellidos"))."'";
        $consulta.=",";
        $consulta.="'".$this->conexion->clean($elemento->__get("fechanacimiento"))."'";

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
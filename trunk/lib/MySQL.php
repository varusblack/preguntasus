<?php

class MySQL {

    protected $enlace;

    public function __construct() {
        $host = "localhost";
        $nombreUsuario = "root";
        $password = "";
        $basededatos = "preguntasus";

        try {
            $this->enlace = new mysqli($host, $nombreUsuario, $password, $basededatos);
        } catch (Exception $e) {
            die("No se puedo realizar la conexion");
        }
    }

    public function query($consulta) {
         $resultado = $this->enlace->query($consulta);
        if ($resultado == NULL) {
            die($enlace->error);
        }
        return $resultado;
    }
    
    public function __destruct() {
        $this->enlace->close();
    }

}

?>
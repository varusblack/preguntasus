<?php

class MySQL  {

    protected static $enlace = NULL;

    private static function getInstance() {
        if (!isset(self::$enlace)) {
            $host = "localhost";
            $nombreUsuario = "root";
            $password = "";
            $basededatos = "preguntasus";

            try {
                self::$enlace = new mysqli($host, $nombreUsuario, $password, $basededatos);
            } catch (Exception $e) {
                die("No se puedo realizar la conexion");
            }
        }
        self::$enlace->autocommit(false);
        return self::$enlace;
    }

    public function __construct() {
        self::getInstance();
    }

    public function query($consulta) {

        $resultado=self::$enlace->query($consulta);
        if ($resultado == NULL) {
            self::rollback();
            die(self::$enlace->error . " - " . $consulta);
        }
        return $resultado;
    }

    public function clean($texto) {
       
        return self::$enlace->real_escape_string($texto);
    }
    
    public static function commit(){
        self::getInstance();
        self::$enlace->commit();
    }
    
    public static function rollback(){
        self::getInstance();
        self::$enlace->rollback();
    }

}

?>
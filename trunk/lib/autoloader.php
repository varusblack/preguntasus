<?php
class Autoloader{
    public static function cargarInterfaces($class){
        $path=$_SERVER['DOCUMENT_ROOT']."/preguntaus/interfaces/{$class}.php";
        if (is_readable($path)){
            require($path);
        }
    }
    public static function cargarDatos($class){
        $path=$_SERVER['DOCUMENT_ROOT']."/preguntaus/datos/{$class}.php";
        if (is_readable($path)){
            require($path);
        }
    }
    public static function cargarLib($class){
        $path=$_SERVER['DOCUMENT_ROOT']."/preguntaus/lib/{$class}.php";
        if (is_readable($path)){
            require($path);
        }
    }
 
}
spl_autoload_register('autoloader::cargarInterfaces');
spl_autoload_register('autoloader::cargarDatos');
spl_autoload_register('autoloader::cargarLib');
?>

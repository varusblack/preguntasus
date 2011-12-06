<?php
class show{
    public static function show($pagina){
        if(file_exists("vistas/$pagina.php")){
            ob_start();
            include("vistas/$pagina.php");
            $retornar=ob_get_clean();
            
            
        }else{
            $retornar="No encuentro vista";
        }
        return $retornar;
    }
    
}
<?php

class show {

    public static function mostrar($pagina,$parametro=NULL) {

        if (file_exists($_SERVER['DOCUMENT_ROOT']."/preguntasus/vistas/$pagina.php")) {
        	
            ob_start();
			
            include($_SERVER['DOCUMENT_ROOT']."/preguntasus/vistas/$pagina.php");
            $retornar = ob_get_clean();
        } else {
            $retornar = "No encuentro vista";
        }
        return $retornar;
    }

}

?>
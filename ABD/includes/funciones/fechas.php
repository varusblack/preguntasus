<?php

function mysql2fecha($fecha) {
    return date("d/m/Y", strtotime($fecha));
}

function fecha2mysql($fecha) {
    $res = substr($fecha, 6, 4) . "/" . substr($fecha, 3, 2) . "/" . substr($fecha, 0, 2);
    return $res;
}

function validafecha($fecha) {
    $dia = substr($fecha, 0, 2);
    $mes = substr($fecha, 3, 2);
    $anno = substr($fecha, 6, 4);
    settype($dia, "integer");
    settype($mes, "integer");
    settype($anno, "integer");

    if ($mes < 1) {
        return false; //Mes menor que 1
    }
    if ($mes > 12) {
        return false; //Mes mayor que 12
    }
    if ($dia < 1) {
        return false; //Dia menor que 1
    }
    if (($mes == 1) || ($mes == 3) || ($mes == 5) || ($mes == 7) || ($mes == 8) || ($mes == 10) || ($mes == 12)) {
        if ($dia > 31) {
            return false; //Dia mayor que 31 en mes largo
        }
    }
    if (($mes == 4) || ($mes == 6) || ($mes == 9) || ($mes == 11)) {
        if ($dia > 30) {
            return false; //Dia mayor que 30 en mes corto
        }
    }
    if ($mes == 2) {
        if (esBisiesto($anno)) {
            if ($dia > 29) {
                return false; //Dia mayor que 29 en febrero bisiesto
            }
        } else {
            if ($dia > 28) {
                return false;
                echo "Día mayor que 28"; //Dia mayor que 28 en febrero normal
            }
        }
    }
    return true;
}

function esBisiesto($anno){
    $resultado=false;
    if($anno%4){
        if(!$anno%100){
            if($anno%400){
                $resultado=true;
            }
        }else{
            $resultado=true;
        }
    }
    return $resultado;
}

?>

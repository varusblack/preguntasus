<?php

// Función que dada una cadena de caracteres devuelve true si
// coincide con el patrón de un correo electrónico
function valida_email($email) {

    $resultado = false;
    if (preg_match ("/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is", $email)) {
        $resultado = true;
    }
    return $resultado;
}
?>
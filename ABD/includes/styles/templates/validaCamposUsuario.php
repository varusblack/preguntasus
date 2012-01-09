<?php

$erroresArray = array();
if ($_POST["email"] == "") {
    $erroresArray[] = "No se ha indicado el correo electrónico";
}
if (!valida_email($_POST["email"])) {
    $erroresArray[] = "El email no es válido";
}
if ($_POST["pass1"] == "" && $_POST["submit"] != "Editar perfil") {
    $erroresArray[] = "No se ha indicado la contraseña";
}
if ($_POST["pass1"] != $_POST["pass2"]) {
    $erroresArray[] = "Las contraseñas no son iguales";
}
if ($_POST["nombre"] == "") {
    $erroresArray[] = "No se ha indicado el nombre";
}
if ($_POST["apellidos"] == "") {
    $erroresArray[] = "No se ha indicado los apellidos";
}
if ($_POST["fechaNacimiento"] == "") {
    $erroresArray[] = "No se ha indicado la fecha de nacimiento";
} else {
    if (!validaFecha($_POST["fechaNacimiento"])) {
        $erroresArray[] = "La fecha de nacimiento no es válida. El formato debe ser dd/mm/aaaa";
    }
}
if (existeUsuarioConEmail($_POST["email"], $conexion)) {
    if ($_POST["submit"] != "Editar perfil") {
        $erroresArray[] = "Ya existe un usuario con ese email";
    } else {
        if ($_POST["email"] != $usuario->email) {
            $erroresArray[] = "Ya existe un usuario con ese email";
        }
    }
}
if (isset($_FILES["fotoPerfil"])) {
    if ($_FILES["fotoPerfil"]["size"] > 1048576) {
        $erroresArray[] = "La foto de perfil es demasiado grande";
    }


    if ($_FILES["fotoPerfil"]["type"] != "image/jpeg") {
        $erroresArray[] = "La extensión de la foto de perfil no es válida";
    }
    if (!getimagesize($_FILES["fotoPerfil"]["tmp_name"])) {
        $erroresArray[] = "El archivo con la foto de perfil parace no ser válido";
    }
}
?>
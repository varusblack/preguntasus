<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/abd/includes/funciones/fechas.php');

// Función que devuelve un array de todos los usuarios
function obtenerTodosLosUsuarios($conexion) {
    try {
        $SQL = "SELECT * FROM usuario";
        $stmt = $conexion->query($SQL);
        return creaUsuarios($stmt);
    } catch (PDOException $e) {
        Header("Location: /abd/error.php");
        die();
    }
}

// Función que dado un id devuelve un único usuario
function obtenerUsuarioPorId($id, $conexion) {
    try {
        $SQL = "SELECT * FROM usuario WHERE id=$id";
        $stmt = $conexion->query($SQL);
        return creaUnicoUsuario($stmt);
    } catch (PDOException $e) {
        Header("Location: /abd/error.php");
        die();
    }
}

// Función que dado un email y una contraseña devuelve un único usuario
function obtenerUsuarioPorEmailYPass($email, $pass, $conexion) {
    try {
        $SQL = "SELECT * FROM usuario WHERE email='$email' AND password='$pass'";
        $stmt = $conexion->query($SQL);
        return creaUnicoUsuario($stmt);
    } catch (PDOException $e) {
        echo $e;
        //Header("Location: /abd/error.php");
        //die();
    }
}

// Función que dado un email devuelve true si existe un usuario con tal email
// y false en caso contrario
function existeUsuarioConEmail($email, $conexion) {
    try {
        $SQL = "SELECT count(*) as cuenta FROM usuario WHERE email='$email'";
        $stmt = $conexion->query($SQL);
        $dato = $stmt->fetch();
        return $dato["cuenta"] > 0;
    } catch (PDOException $e) {
        echo $e;
        //Header("Location: /abd/error.php");
        //die();
    }
}

// Función que inserta un usuario en la base de datos y devuelve el id de este
function insertarUsuario(Usuario $usuario, $conexion) {
    try {
        $email = $usuario->email;
        $password = $usuario->password;
        $nombre = $usuario->nombre;
        $apellidos = $usuario->apellidos;
        $fechaNacimiento = fecha2mysql($usuario->fechanacimiento);

        $SQL = "INSERT INTO usuario (email,password,fecharegistro,preguntasrealizadas," .
                "preguntasrespondidas,puntos,nombre,apellidos,fechanacimiento,tipousuario)" .
                " VALUES ('$email','$password',NOW(),'0','0','0','$nombre','$apellidos','$fechaNacimiento',0)";
        $conexion->exec($SQL);
        $var = $conexion->lastInsertId('elemento');
        return($var);
    } catch (PDOException $e) {
        Header("Location: /abd/error.php");
        die();
    }
}

// Función que actualiza un usuario en la base de datos
function modificarUsuario(Usuario $usuario, $conexion) {
    try {
        $idUsuario = $usuario->id;
        $email = $usuario->email;
        $password = $usuario->password;
        $nombre = $usuario->nombre;
        $apellidos = $usuario->apellidos;
        $fechaNacimiento = fecha2mysql($usuario->fechanacimiento);
		$tipoUsuario = $usuario->tipousuario;

        $SQL = "UPDATE usuario SET email='$email',password='$password'," .
                "nombre='$nombre',apellidos='$apellidos',fechanacimiento='$fechaNacimiento'," .
                "tipoUsuario=$tipoUsuario WHERE id=$idUsuario";
        $conexion->exec($SQL);
    } catch (PDOException $e) {
        echo $e;
        die();
    }
}

// Función que elimina un usuario de la base de datos
function borrarUsuario(Usuario $usuario, $conexion) {
    try {
        $idUsuario = $usuario->id;
        $SQL = "DELETE FROM usuario WHERE id=$idUsuario";
        $conexion->exec($SQL);
    } catch (PDOException $e) {
        Header("Location: /abd/error.php");
        die();
    }
}

// Función que dado un usuario incrementa sus puntos en una unidad
function incrementaPuntosUsuario(Usuario $usuario, $conexion) {
    try {
        $idUsuario = $usuario->id;
        $SQL = "UPDATE usuario SET puntos=puntos+1 WHERE id='$idUsuario'";
        $conexion->exec($SQL);
    } catch (PDOException $e) {
        echo $e;
        die();
    }
}

// Función que recorre el PDOStatement pasado como parámetro y devuelve
// un array de usuarios
function creaUsuarios($stmt) {
    $resultado = array();
    foreach ($stmt as $row) {
        $objeto = new Usuario();
        $objeto->id = $row["id"];
        $objeto->email = $row["email"];
        $objeto->password = $row["password"];
        $objeto->fecharegistro = $row["fecharegistro"];
        $objeto->preguntasrespondidas = $row["preguntasrespondidas"];
        $objeto->puntos = $row["puntos"];
        $objeto->nombre = $row["nombre"];
        $objeto->apelldios = $row["apellidos"];
        $objeto->fechanacimiento = $row["fechanacimiento"];
        $objeto->tipousuario = $row["tipoUsuario"];
        $resultado[$row["id"]] = $objeto;
    }
    return $resultado;
}

// Función que recorre el PDOStatement pasado como parámetro y devuelve
// un único usuario
function creaUnicoUsuario($stmt) {
    $objeto = new Usuario();
    foreach ($stmt as $row) {
        $objeto->id = $row["id"];
        $objeto->email = $row["email"];
        $objeto->password = $row["password"];
        $objeto->fecharegistro = $row["fecharegistro"];
        $objeto->preguntasrespondidas = $row["preguntasrealizadas"];
        $objeto->preguntasrespondidas = $row["preguntasrespondidas"];
        $objeto->puntos = $row["puntos"];
        $objeto->nombre = $row["nombre"];
        $objeto->apellidos = $row["apellidos"];
        $objeto->fechanacimiento = $row["fechanacimiento"];
        $objeto->tipousuario = $row["tipoUsuario"];
    }
    return $objeto;
}

?>

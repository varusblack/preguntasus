<?php
session_start();
require ($_SERVER["DOCUMENT_ROOT"] . '/abd/accesosBD/conexionesBD.php');
require ($_SERVER["DOCUMENT_ROOT"] . '/abd/accesosBD/accesosUsuario.php');
require ($_SERVER["DOCUMENT_ROOT"] . '/abd/entidades/Usuario.php');
require ($_SERVER["DOCUMENT_ROOT"] . '/abd/includes/funciones/emails.php');

$conexion = crearConexion();
$nuevoUsuario = new Usuario();
include $_SERVER["DOCUMENT_ROOT"] . "/abd/includes/styles/templates/validaCamposUsuario.php";

// Si hay errores se interrumpirá el proceso de registro y se mostrarán notificaciones en pantalla.
// En caso contrario continua.
if (count($erroresArray) != 0) {

    $datosArray = array();
    $datosArray["email"] = $_POST["email"];
    $datosArray["nombre"] = $_POST["nombre"];
    $datosArray["apellidos"] = $_POST["apellidos"];
    $datosArray["fechaNacimiento"] = $_POST["fechaNacimiento"];

    $_SESSION["errores"] = $erroresArray;
    $_SESSION["datos"] = $datosArray;

    header("Location: /abd/registrarse.php");
    exit();
} else {

    $conexion = crearConexion();
    $nuevoUsuario = new Usuario();

    $nuevoUsuario->email = $_POST["email"];
    $nuevoUsuario->password = $_POST["pass1"];
    $nuevoUsuario->nombre = $_POST["nombre"];
    $nuevoUsuario->apellidos = $_POST["apellidos"];
    $nuevoUsuario->fechanacimiento = $_POST["fechaNacimiento"];

    $nuevoIdUsuario = insertarUsuario($nuevoUsuario, $conexion);

    if (isset($_FILES["fotoPerfil"]["size"])) {
        move_uploaded_file($_FILES["fotoPerfil"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"] . '/abd/fotosPerfil/' . $nuevoIdUsuario . '.jpg');
    }

    cerrarConexion($conexion);
    require_once ($_SERVER["DOCUMENT_ROOT"] . "/abd/includes/styles/templates/cabecera.php");

    ?>
    <div id="contenedor_cuerpo">
        <div id="cuadroRegistrarse">
            <p>El usuario se ha creado correctamente</p>
            <p><a href="/abd/">Volver a la página princial</a></p>
        </div>    
    </div>

    <?php
    require_once ($_SERVER["DOCUMENT_ROOT"] . "/abd/includes/styles/templates/pie.php");
}
?>

<?php
session_start();
require ($_SERVER["DOCUMENT_ROOT"] . '/abd/accesosBD/conexionesBD.php');
require ($_SERVER["DOCUMENT_ROOT"] . '/abd/accesosBD/accesosUsuario.php');
require ($_SERVER["DOCUMENT_ROOT"] . '/abd/entidades/Usuario.php');
require ($_SERVER["DOCUMENT_ROOT"] . '/abd/includes/funciones/emails.php');

$conexion = crearConexion();
$usuario = unserialize($_SESSION["usuario"]);
$nuevoUsuario = obtenerUsuarioPorId($usuario->id, $conexion);

include $_SERVER["DOCUMENT_ROOT"] . "/abd/includes/styles/templates/validaCamposUsuario.php";

// Si hay errores se interrumpirá el proceso de modificación de perfil. En caso contrario continua
if (count($erroresArray) != 0) {

    $datosArray = array();
    $datosArray["email"] = $_POST["email"];
    $datosArray["nombre"] = $_POST["nombre"];
    $datosArray["apellidos"] = $_POST["apellidos"];
    $datosArray["fechaNacimiento"] = $_POST["fechaNacimiento"];

    $_SESSION["errores"] = $erroresArray;
    $_SESSION["datos"] = $datosArray;

    header("Location: /abd/perfil.php");
    exit();
    
} else {
    $nuevoUsuario->id=$usuario->id;
    $nuevoUsuario->email = $_POST["email"];
    if ($_POST["pass1"] != '') {
        $nuevoUsuario->password = $_POST["pass1"];
    } else {
        $nuevoUsuario->password = $usuario->password;
    }
    $nuevoUsuario->nombre = $_POST["nombre"];
    $nuevoUsuario->apellidos = $_POST["apellidos"];
    $nuevoUsuario->fechanacimiento = $_POST["fechaNacimiento"];
	$nuevoUsuario->tipousuario = $_POST["tipoUsuario"];

     modificarUsuario($nuevoUsuario, $conexion);

    if (isset($_FILES["fotoPerfil"]["size"])) {
        move_uploaded_file($_FILES["fotoPerfil"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"] . '/abd/fotosPerfil/' . $nuevoUsuario->id . '.jpg');
    }

    $nuevoUsuario = obtenerUsuarioPorId($usuario->id, $conexion);
    $_SESSION["usuario"] = serialize($nuevoUsuario);
    cerrarConexion($conexion);
    require_once ($_SERVER["DOCUMENT_ROOT"] . "/abd/includes/styles/templates/cabecera.php");

    ?>
	    <div id="contenedor_cuerpo">
	        <div id="cuadroRegistrarse">
	            <p>El usuario se ha modificado correctamente</p>
	            <p><a href="/abd/">Volver a la página princial</a></p>
	        </div>    
	    </div>

    <?php
    require_once ($_SERVER["DOCUMENT_ROOT"] . "/abd/includes/styles/templates/pie.php");
}
?>

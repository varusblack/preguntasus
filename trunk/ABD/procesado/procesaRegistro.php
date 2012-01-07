<?php

session_start();
require ($_SERVER["DOCUMENT_ROOT"]. '/abd/accesosBD/conexionesBD.php');
require ($_SERVER["DOCUMENT_ROOT"]. '/abd/accesosBD/accesosUsuario.php');
require ($_SERVER["DOCUMENT_ROOT"]. '/abd/entidades/Usuario.php');
require ($_SERVER["DOCUMENT_ROOT"]. '/abd/includes/funciones/emails.php');

    $conexion = crearConexion();
    $nuevoUsuario = new Usuario();


$erroresArray = array();
if ($_POST["email"] == "") {
    $erroresArray[] = "No se ha indicado el correo electrónico";
}
if(!valida_email($_POST["email"])){
    $erroresArray[]="El email no es válido";
}
if($_POST["pass1"]=="" && $_POST["submit"]!="Editar perfil"){
    $erroresArray[]="No se ha indicado la contraseña";
}
if($_POST["pass1"]!=$_POST["pass2"]){
    $erroresArray[]="Las contraseñas no son iguales";
}
if($_POST["nombre"]==""){
    $erroresArray[]="No se ha indicado el nombre";
}
if($_POST["apellidos"]==""){
    $erroresArray[]="No se ha indicado los apellidos";
}
if($_POST["fechaNacimiento"]==""){
    $erroresArray[]="No se ha indicado la fecha de nacimiento";
}else{
    if(!validaFecha($_POST["fechaNacimiento"])){
        $erroresArray[]="La fecha de nacimiento no es válida. El formato debe ser dd/mm/aaaa";
    }
}
if(existeUsuarioConEmail($_POST["email"], $conexion)){
    $erroresArray[]="Ya existe un usuario con ese email";
}


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

    insertarUsuario($nuevoUsuario, $conexion);
    
	cerrarConexion($conexion);
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/includes/styles/templates/cabecera.php");
	
	// $ruta = $_SERVER['REQUEST_URI'];
	// if ($ruta == '/ABD/') {
		// require_once ("./includes/widgets/login.php");
	// }
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/includes/widgets/login.php");
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/includes/widgets/barranavegacion.php");
?>
<div id="contenedor_cuerpo">
    <div id="cuadroRegistrarse">
        <p>El usuario se ha creado correctamente</p>
        <p><a href="/abd/">Volver a la página princial</a></p>
    </div>    
</div>

<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/includes/styles/templates/pie.php");
}
?>

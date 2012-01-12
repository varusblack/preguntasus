<?php
    require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/accesosBD/conexionesBD.php");
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/accesosBD/accesosTag.php");
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/accesosBD/accesosUsuario.php");
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/entidades/Tag.php" );
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/entidades/Usuario.php" );
	session_start();
	
	$usuarioEnSesion = unserialize($_SESSION["usuario"]);
// 	Si el usuario logeado no es administrador se interrumpirá el proceso de eliminación de tag
	if($usuarioEnSesion->tipousuario){
		$idTagABorrar = $_GET["id"];
		$conexion = crearConexion();
		$tag = obtenerTagPorId($idTagABorrar,$conexion);
		borrarTag($tag,$conexion);
		cerrarConexion($conexion);
		$_SESSION["mensaje"]="Tag borrado satisfactoriamente";
		Header("Location: /abd/administrartags.php");
		exit();
	}else{
		Header("Location: /abd/index.php");
    	exit();
	}
?>
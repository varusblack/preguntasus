<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/accesosBD/conexionesBD.php");
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/accesosBD/accesosUsuario.php");
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/entidades/Usuario.php" );
	session_start();
	
	$usuarioEnSesion = unserialize($_SESSION["usuario"]);
// 	Si el usuario no es administrador se interrumpirá el proceso de eliminación de usuario
	if($usuarioEnSesion->tipousuario){
		$idUsuarioABorrar = $_GET["id"];
		$conexion = crearConexion();
		$user = obtenerUsuarioPorId($idUsuarioABorrar,$conexion);
		borrarUsuario($user,$conexion);
		cerrarConexion($conexion);
		$_SESSION["mensaje"]="Usuario borrado satisfactoriamente";
		Header("Location: /abd/administrarusuarios.php");
		exit();
	}else{
		Header("Location: /abd/index.php");
    	exit();
	}
?>
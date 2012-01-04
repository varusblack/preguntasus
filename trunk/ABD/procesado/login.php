<?php
	require_once ("../accesosBD/conexionesBD.php");
	require_once ("../accesosBD/accesosUsuario.php");
	require_once ("../entidades/Usuario.php");
	session_start();

    $email = $_REQUEST["email"];
	$pass = $_REQUEST["pass"];
	
	$conexion = crearConexion();
	$usuario = obtenerUsuarioPorEmailYPass($email,$pass,$conexion);
	cerrarConexion($conexion);
		
	if($usuario->id==null){
		/**
		 * Redirección a posible pantalla de login
		 */
	}
	else{
		$_SESSION["usuario"] = $usuario;
		Header("Location:../index.php");
		die();
	}
?>
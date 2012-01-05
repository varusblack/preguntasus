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
	
	if($email == null || $pass==null){
		if($email == null){
			$erroresBuscarPreguntas[1] = "El campo email no puede ser vacio.";
			$_SESSION["erroresBuscarPregunta"] = $erroresBuscarPreguntas;
		}
		if($pass == null){
			if(isset($erroresBuscarPreguntas[1])){
				$erroresBuscarPreguntas[2] = "El campo contraseña no puede ser vacio.";
				$_SESSION["erroresBuscarPregunta"] = $erroresBuscarPreguntas;
			}else{
				$erroresBuscarPreguntas[1] = "El campo contraseña no puede ser vacio.";
				$_SESSION["erroresBuscarPregunta"] = $erroresBuscarPreguntas;
			}
		}	
		Header("Location:../login.php");
		die();	
	}else{
		if($usuario->id==null){
			$erroresBuscarPreguntas = null;
			$erroresBuscarPreguntas[1] = "No existe usuario con tales datos.";
			$_SESSION["erroresBuscarPregunta"] = $erroresBuscarPreguntas;
			Header("Location:../login.php");
			die();
		}else{
			$_SESSION["usuario"] = $usuario;
			$_SESSION["erroresBuscarPregunta"] = null;
			Header("Location:../index.php");
			die();
		}
	}	
		
?>
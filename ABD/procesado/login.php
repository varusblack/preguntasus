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
	
// 	Si el email o la contraseña son nulos se interrumpirá el proceso de login y se 
//  mostrará una notificación por pantalla de ello. En caso contrario continua.
	if($email == null || $pass==null){
		if($email == null){
			$erroresLogin[1] = "El campo email no puede ser vacio.";
			$_SESSION["erroresLogin"] = $erroresLogin;
		}
		if($pass == null){
			if(isset($erroresLogin[1])){
				$erroresLogin[2] = "El campo contraseña no puede ser vacio.";
				$_SESSION["erroresLogin"] = $erroresLogin;
			}else{
				$erroresLogin[1] = "El campo contraseña no puede ser vacio.";
				$_SESSION["erroresLogin"] = $erroresLogin;
			}
		}	
		Header("Location:/abd/index.php");
		die();	
	}else{
// 		Si no existe un usuario con el email y la contraseña dados se interrumpirá el proceso de
// 		login y se mostrará por pantalla una notificación de ello. En caso contrario se 
// 		inserta al usuario en sesión y se da por completado el proceso
		if($usuario->id==null){
			$erroresLogin = null;
			$erroresLogin[1] = "No existe usuario con tales datos.";
			$_SESSION["erroresLogin"] = $erroresLogin;
			Header("Location:/abd/index.php");
			die();
		}else{
			$_SESSION["usuario"] = serialize($usuario);
                        
			$_SESSION["erroresLogin"] = null;
			Header("Location:/abd/index.php");
			die();
		}
	}	
		
?>
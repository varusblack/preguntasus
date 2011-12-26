<?php
    function obtenerTodosLosUsuarios($conexion){
    	try{
			$SQL="SELECT * FROM usuario";
		}catch(PDOException $e){
			
		}
    }
	
	function obtenerUsuarioPorId($id,$conexion){
		try{
			$SQL="SELECT * FROM usuario WHERE id=$id";
		}catch(PDOException $e){
			
		}
	}
	
	function insertarUsuario(Usuario $usuario,$conexion){
		try{
			$email = $usuario->__get("email");
			$password = $usuario->__get("password");
			$puntos = $usuario->__get("puntos");
			$nombre = $usuario->__get("nombre");
			$apellidos = $usuario->__get("apellidos");
			$fechaNacimiento = $usuario->__get("fechanacimiento");
			
			$SQL = "INSERT INTO usuario (email,password,fecharegistro,preguntasrealizadas,".
			"preguntasrespondidas,puntos,nombre,apellidos,fechanacimiento)".
			" VALUES ('$email','$password',NOW(),'0','0','0','$nombre','$apellidos','$fechaNacimiento')";
			$conexion -> exec($SQL);
		}catch(PDOException $e){
			
		}
	}
	
	function modificarUsuario(Usuario $usuario,$conexion){
		try{
			$idUsuario = $usuario->__get("id");
			$email = $usuario->__get("email");
			$password = $usuario->__get("password");
			$preguntasRealizadas = $usuario->__get("preguntasrealizadas");
			$preguntasRespondidas = $usuario->__get("preguntasrespondidas");
			$puntos = $usuario->__get("puntos");
			$nombre = $usuario->__get("nombre");
			$apellidos = $usuario->__get("apellidos");
			$fechaNacimiento = $usuario->__get("fechanacimiento");
			
			$SQL = "UPDATE usuario SET email=$email,password=$password,".
			"preguntasrealizadas=$preguntasRealizadas,preguntasrespondidas=$preguntasRespondidas".
			"puntos=$puntos,nombre=$nombre,apellidos=$apellidos,fechanacimiento=$fechaNacimiento".
			"WHERE id=$idUsuario";
			$conexion -> exec($SQL);
		}catch(PDOException $e){
			
		}
	}
	
	function borrarUsuario(Usuario $usuario,$conexion){
		try{
			$idUsuario = $usuario->__get("id");
			$SQL = "DELETE FROM usuario WHERE id=$idUsuario";
			$conexion -> exec($SQL);
		}catch(PDOException $e){
			
		}
	}
?>
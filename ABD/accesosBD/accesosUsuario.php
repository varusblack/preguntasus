<?php
    function obtenerTodosLosUsuarios($conexion){
    	try{
			$SQL="SELECT * FROM usuario";
			$stmt = $conexion->query($SQL);
			return creaElementos($stmt);
		}catch(PDOException $e){
			Header("Location: error.php");
		}
    }
	
	function obtenerUsuarioPorId($id,$conexion){
		try{
			$SQL="SELECT * FROM usuario WHERE id=$id";
			$stmt = $conexion->query($SQL);
			return creaElementos($stmt);
		}catch(PDOException $e){
			Header("Location: error.php");
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
			Header("Location: error.php");
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
			Header("Location: error.php");
		}
	}
	
	function borrarUsuario(Usuario $usuario,$conexion){
		try{
			$idUsuario = $usuario->__get("id");
			$SQL = "DELETE FROM usuario WHERE id=$idUsuario";
			$conexion -> exec($SQL);
		}catch(PDOException $e){
			Header("Location: error.php");
		}
	}
	
	function creaElementos($stmt) {
        $resultado = array();		
		foreach($stmt as $row){
			$objeto = new Usuario();
			$objeto->__set("id", $row["id"]);
            $objeto->__set("email", $row["email"]);
            $objeto->__set("password", $row["password"]);
            $objeto->__set("fecharegistro", $row["fecharegistro"]);
            $objeto->__set("preguntasrespondidas", $row["preguntasrespondidas"]);
            $objeto->__set("puntos", $row["puntos"]);
            $objeto->__set("nombre", $row["nombre"]);
            $objeto->__set("apellidos", $row["apellidos"]);
            $objeto->__set("fechanacimiento", $row["fechanacimiento"]);
            $resultado[$row["id"]] = $objeto;
		}        
        return $resultado;
    }
?>
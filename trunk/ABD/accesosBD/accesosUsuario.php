<?php
    function obtenerTodosLosUsuarios($conexion){
    	try{
			$SQL="SELECT * FROM usuario";
			$stmt = $conexion->query($SQL);
			return creaElementos($stmt);
		}catch(PDOException $e){
			Header("Location: error.php");
			die();
		}
    }
	
	function obtenerUsuarioPorId($id,$conexion){
		try{
			$SQL="SELECT * FROM usuario WHERE id=$id";
			$stmt = $conexion->query($SQL);
			return creaElementos($stmt);
		}catch(PDOException $e){
			Header("Location: error.php");
			die();
		}
	}
	
	function insertarUsuario(Usuario $usuario,$conexion){
		try{
			$email = $usuario->email;
			$password = $usuario->password;
			$puntos = $usuario->puntos;
			$nombre = $usuario->nombre;
			$apellidos = $usuario->apellidos;
			$fechaNacimiento = $usuario->fechanacimiento;
			
			$SQL = "INSERT INTO usuario (email,password,fecharegistro,preguntasrealizadas,".
			"preguntasrespondidas,puntos,nombre,apellidos,fechanacimiento)".
			" VALUES ('$email','$password',NOW(),'0','0','0','$nombre','$apellidos','$fechaNacimiento')";
			$conexion -> exec($SQL);
		}catch(PDOException $e){
			Header("Location: error.php");
			die();
		}
	}
	
	function modificarUsuario(Usuario $usuario,$conexion){
		try{
			$idUsuario = $usuario->id;
			$email = $usuario->email;
			$password = $usuario->password;
			$preguntasRealizadas =$usuario->preguntasrealizadas;
			$preguntasRespondidas = $usuario->preguntasrespondidas;
			$puntos = $usuario->puntos;
			$nombre = $usuario->nombre;
			$apellidos = $usuario->apellidos;
			$fechaNacimiento = $usuario->fechanacimiento;
			
			$SQL = "UPDATE usuario SET email=$email,password=$password,".
			"preguntasrealizadas=$preguntasRealizadas,preguntasrespondidas=$preguntasRespondidas".
			"puntos=$puntos,nombre=$nombre,apellidos=$apellidos,fechanacimiento=$fechaNacimiento".
			"WHERE id=$idUsuario";
			$conexion -> exec($SQL);
		}catch(PDOException $e){
			Header("Location: error.php");
			die();
		}
	}
	
	function borrarUsuario(Usuario $usuario,$conexion){
		try{
			$idUsuario = $usuario->id;
			$SQL = "DELETE FROM usuario WHERE id=$idUsuario";
			$conexion -> exec($SQL);
		}catch(PDOException $e){
			Header("Location: error.php");
			die();
		}
	}
	
	function creaElementos($stmt) {
        $resultado = array();		
		foreach($stmt as $row){
			$objeto = new Usuario();
			$objeto->id= $row["id"];
            $objeto->email= $row["email"];
            $objeto->password= $row["password"];
            $objeto->fecharegistro=$row["fecharegistro"];
            $objeto->preguntasrespondidas= $row["preguntasrespondidas"];
            $objeto->puntos= $row["puntos"];
            $objeto->nombre= $row["nombre"];
            $objeto->apelldios= $row["apellidos"];
            $objeto->fechanacimiento= $row["fechanacimiento"];
            $resultado[$row["id"]] = $objeto;
		}        
        return $resultado;
    }
?>
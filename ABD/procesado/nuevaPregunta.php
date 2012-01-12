<?php
	require_once ("../accesosBD/conexionesBD.php");
	require_once ("../accesosBD/accesosElemento.php");
	require_once ("../accesosBD/accesosTag.php");
	require_once ("../accesosBD/accesosTagsDeElementos.php");
	require_once ("../accesosBD/accesosUsuario.php");
	require_once ("../entidades/Elemento.php");
	require_once ("../entidades/Usuario.php");
	require_once ("../entidades/Tag.php");
	session_start();
	
	
	$formulario["titulo"] = $_POST["titulo"];  
	$formulario["tag"] = $_POST["tag"];
	$formulario["cuerpo"] = $_POST["cuerpo"];
	$_SESSION["formularioPregunta"] = $formulario;  
	$errores = validar($formulario);
	if (count($errores) > 0) {
		$_SESSION["formularioPregunta"] = $formulario;  
	   	$_SESSION["errores"] = $errores;
	   	Header("Location:preparaPreguntar.php");
	} else{
		$conexion=crearConexion();		
	   	$elemento=new Elemento();
		$tag=new Tag();
		$usuario=unserialize($_SESSION['usuario']);
		$elemento->titulo=$formulario["titulo"];
		$elemento->cuerpo=$formulario["cuerpo"];
		$elemento->idautor=$usuario->id;
		$elemento->idrespuesta="NULL";
		
		$elemento->id=insertarPregunta($elemento,$conexion);
		$tag=obtenerTagPorId($formulario["tag"],$conexion);
		
		insertarTagDeElemento($elemento,$tag,$conexion);	
		
		cerrarConexion($conexion);
		Header("Location:/ABD/index.php"); 
		exit();
	  }
	  
// 	Función que comprueba si alguno de los campos del formulario no cumple los requisitos y en ese
//  caso devuelve un array de errores
	function validar($formulario) {
		global $errores;  
		if (!(isset($formulario['titulo']) && strlen($formulario['titulo'])>0))  // Modo resumido: if (empty($formulario['nombre']))
		$errores[] = 'El campo <b>Titulo</b> no puede ser vacio';
		  
		if (!(isset($formulario['tag']) && strlen($formulario['tag'])>0))
		$errores[] = 'El campo <b>Tag</b> no puede ser vacio';
		    
		if (!(isset($formulario['cuerpo']) && strlen($formulario['cuerpo'])>0))
		$errores[] = 'El campo <b>Pregunta</b> no puede ser vacio';
	  
	  	return $errores;    
	}
?>
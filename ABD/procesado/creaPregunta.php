<?php
	require_once ("../accesosBD/conexionesBD.php");
	require_once ("../accesosBD/accesosElemento.php");
	require_once ("../accesosBD/accesosTag.php");
	require_once ("../accesosBD/accesosTagsDeElementos.php");
	require_once ("../accesosBD/accesosUsuario.php");
	require_once ("../entidades/Elemento.php");
	require_once ("../entidades/Usuario.php");
	require_once ("../entidades/Tag.php");
	
  	//Recuperacion de los datos de la sesion
	session_start();
	$form=$_SESSION["formularioPregunta"];
	if(isset($form)){ //si tiene valores lo reseteamos para que al volver a atras no haya nada
		$_SESSION["formularioPregunta"]="";
		$_SESSION["errors"]=null;
		$conexion=crearConexion();		
	}		
	$elemento=new Elemento();
	$tag=new Tag();
	$usuario=unserialize($_SESSION['usuario']);
	$elemento->titulo=$form["titulo"];
	$elemento->cuerpo=$form["cuerpo"];
	$elemento->idautor=$usuario->id;
	$elemento->idrespuesta="NULL";
	
	$elemento->id=insertarPregunta($elemento,$conexion);
	$tag=obtenerTagPorId($form["tag"],$conexion);
	
	insertarTagDeElemento($elemento,$tag,$conexion);	
	
	cerrarConexion($conexion);
	Header("Location:../index.php"); 
	exit();
?>
<?php
require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/entidades/Elemento.php");
require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/accesosBD/conexionesBD.php");
require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/accesosBD/accesosElemento.php");
require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/entidades/Usuario.php" );
 
session_start();

$nuevaRespuesta = trim($_REQUEST['mi-respuesta']); 
$idpreguntarespondida= $_REQUEST['idelemento']; 
$errores = valida($nuevaRespuesta);

if (!empty($errores)) {
   		$_SESSION['errores'] = $errores;
   		Header("Location:../preguntaRespuesta.php");
}else{
	$_SESSION['errores'] = "";
	$usuario=unserialize($_SESSION['usuario']);
	
	 preparaInsercion($nuevaRespuesta,$idpreguntarespondida,$usuario);
		
	Header("Location:/abd/preguntaRespuesta.php?idsolicitado=".$idpreguntarespondida);
	exit();	
}

function valida($nuevaRespuesta) {
	$error="";
  	if (!(isset($nuevaRespuesta['respuesta']) && strlen($nuevaRespuesta['respuesta'])>0)) //Si la variable nuevaRespuesta esta vacia
  	 $error = 'El campo <b>Respuesta</b> no puede ser vacio';  
   	return $error;      
}
function preparaInsercion($nuevaRespuesta, $idpreguntarespondida,$usuario){	
	$conexion=crearConexion();
	$elemento=new Elemento();		
	$elemento->idautor=$usuario->id;
	$elemento->titulo="RESPUESTA";
	$elemento->cuerpo=$nuevaRespuesta;	
	$elemento->idrespuesta=$idpreguntarespondida;
	
	insertarElemento($elemento,$conexion);
	cerrarConexion($conexion);
}
?>
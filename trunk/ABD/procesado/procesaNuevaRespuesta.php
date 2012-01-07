<?php
require_once ("../entidades/Elemento.php");
require_once ("../accesosBD/conexionesBD.php");
require_once ("../accesosBD/accesosElemento.php");
 
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
	print_r($usuario);
	echo $usuario->id;
	preparaInsercion($nuevaRespuesta,$idpreguntarespondida,$usuario);
		
//	Header("Location:../preguntaRespuesta.php?idsolicitado=".$idpreguntarespondida);
	
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
	
	echo $elemento->titulo;
	echo $elemento->idautor."autor era";
	echo $elemento->cuerpo;
	echo $elemento->idrespuesta;
	
	//insertarElemento($elemento,$conexion);
	cerrarConexion($conexion);
}
//}
?>
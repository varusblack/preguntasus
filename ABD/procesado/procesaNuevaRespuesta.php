<?php
require_once ("../entidades/Elemento.php");
require_once ("../accesosBD/conexionesBD.php");
require_once ("../accesosBD/accesosElemento.php");
 
/*if ($_POST[cancelar]="cancelar"){
	Header("Location:../index.php");
}else{*/
 
session_start();
$nuevaRespuesta = $_SESSION['nuevaRespuesta'];


if (isset($nuevaRespuesta)) {// si está creada en la sesion
  $nuevaRespuesta['respuesta'] = trim($_REQUEST['mi-respuesta']);  
  $_SESSION['nuevaRespuesta'] = $nuevaRespuesta;
} else
		Header("Location:../preguntaRespuesta.php");

$errores = valida($nuevaRespuesta);

if (!empty($errores)) {
   		$_SESSION['errores'] = $errores;
   		Header("Location:../preguntaRespuesta.php");
}else{
	$_SESSION['errores'] = "";
	preparaInsercion($nuevaRespuesta);	
	Header("Location:../preguntaRespuesta.php");
}

function valida($nuevaRespuesta) {
	$error="";
  	if (!(isset($nuevaRespuesta['respuesta']) && strlen($nuevaRespuesta['respuesta'])>0)) //Si la variable nuevaRespuesta esta vacia
  	 $error = 'El campo <b>Respuesta</b> no puede ser vacio';  
   	return $error;      
}
function preparaInsercion($nuevaRespuesta){
	$conexion=crearConexion();
	$elemento=new Elemento();
	$elemento=$nuevaRespuesta['elemento'];
	$elemento->cuerpo=$nuevaRespuesta['respuesta'];
	$elemento->idrespuesta=$nuevaRespuesta['idelemento'];
	insertarElemento($elemento,$conexion);
	cerrarConexion($conexion);
}
//}
?>
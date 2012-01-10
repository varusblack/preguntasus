<?php
require_once ("../entidades/Elemento.php");
require_once ("../accesosBD/conexionesBD.php");
require_once ("../accesosBD/accesosElemento.php");

session_start();
$formulario = $_SESSION["formularioRespuesta"];

if (isset($formulario)) {// si el formulario contiene datos
  $formulario["respuestaModificada"] = $_REQUEST["respuestaModificada"];
  $_SESSION["formularioRespuesta"] = $formulario;
  $idpregunta=$formulario["idpregunta"];
} else
	Header("Location:preparaModificaRespuesta.php");
	$errores = validar($formulario);
if (count($errores) > 0) {	
   	$_SESSION["errores"] = $errores;
   	Header("Location:../preparaModificaRespuesta.php?idsolicitado=".$idpregunta);
} else{
	modificaRespuesta($formulario);
	Header("Location:../preguntaRespuesta.php?idsolicitado=".$idpregunta);
	exit();
}

function modificaRespuesta($formulario){
	$conexion=crearConexion();	
	$elemento = new Elemento();	
	$elemento=encontrarElementoPorId($formulario["id"],$conexion);
	$elemento->cuerpo=$formulario["respuestaModificada"];
	modificarElemento($elemento,$conexion);
   	cerrarConexion($conexion);
}
function validar($formulario) {
  if (!(isset($formulario['respuestaModificada']) && strlen($formulario['respuestaModificada'])>0))  // Modo resumido: if (empty($formulario['nombre']))
    $errores = 'El campo <b>Respuesta no Puede Estar Vacio</b> no puede ser vacío';
   return $errores;    
  }
?>
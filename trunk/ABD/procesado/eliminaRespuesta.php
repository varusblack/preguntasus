<?php
require_once ("../entidades/Elemento.php");
require_once ("../accesosBD/conexionesBD.php");
require_once ("../accesosBD/accesosElemento.php");
 
session_start();
$eliminaRespuesta =$_SESSION['eliminaRespuesta'];


if (isset($eliminaRespuesta)) {// si está creada en la sesion
  	realizaEliminacion($eliminaRespuesta);
  
} else
	Header("Location:../preguntaRespuesta.php");

function realizaEliminacion($eliminaRespuesta){
	/*HACER ¡¡¡¡¡¡¡¡¡¡¡¡¡¡
	 * $conexion=crearConexion();
	$elemento=new Elemento();
	$elemento=$nuevaRespuesta['elemento'];
	$elemento->cuerpo=$nuevaRespuesta['respuesta'];
	$elemento->idrespuesta=$nuevaRespuesta['idelemento'];
	insertarElemento($elemento,$conexion);
	cerrarConexion($conexion);
	 * */
	 
}
?>
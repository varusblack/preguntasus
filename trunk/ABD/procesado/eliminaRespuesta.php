<?php
require_once ("../entidades/Elemento.php");
require_once ("../accesosBD/conexionesBD.php");
require_once ("../accesosBD/accesosElemento.php");
 
session_start();
$eliminaRespuesta =$_SESSION['eliminaRespuesta'];
$idpregunta= $_SESSION['codigoPregunta']; 

// Control que evite acceder directamente a esta página
if (isset($eliminaRespuesta)) {// si está creada en la sesion
  	realizaEliminacion($eliminaRespuesta);  
} 
Header("Location:../preguntaRespuesta.php?idsolicitado=".$idpregunta);
exit();


function realizaEliminacion($eliminaRespuesta){
	$elemento=new Elemento();
	$elemento=$eliminaRespuesta['elemento'];
	$conexion=crearConexion();
	borrarElemento($elemento,$conexion);
	cerrarConexion($xonexion);
}
?>
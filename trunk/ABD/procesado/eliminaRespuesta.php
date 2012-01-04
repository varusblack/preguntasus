<?php

include_once ("../includes/styles/templates/cabecera.php");
require_once ("../includes/widgets/login.php");
require_once ("../includes/widgets/barranavegacion.php");
require_once ("../accesosBD/conexionesBD.php");
require_once ("../accesosBD/accesosElemento.php");
require_once ("../entidades/Elemento.php");

session_start();
$conexion=crearConexion();
$elemento=new Elemento();
$idElemento=$_REQUEST['cod'];
echo $idElemento;
$elemento=encontrarElementoPorId($idElemento,$conexion);


?>
<?php
	require_once ("../includes/styles/templates/pie.php");
?>
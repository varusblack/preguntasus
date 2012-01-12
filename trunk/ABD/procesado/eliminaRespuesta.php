<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/entidades/Elemento.php");
    require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/accesosBD/conexionesBD.php");
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/accesosBD/accesosElemento.php");
 
	session_start();
	$eliminaRespuesta =$_SESSION['eliminaRespuesta'];
	$idpregunta= $_SESSION['codigoPregunta']; 
	
// 	Si se ha realizado realizado la petición de borrado se llevará a cabo el proceso, en
//  caso contrario se interrumpe el proceso
	if (isset($eliminaRespuesta)) {
	  	realizaEliminacion($eliminaRespuesta);  
	} 
	Header("Location:/abd/preguntaRespuesta.php?idsolicitado=".$idpregunta);
	exit();
	
// 	Función que crea la conexión con la base de datos, borra el elemento pasado como parametro
//  y finaliza la conexión
	function realizaEliminacion($eliminaRespuesta){
		$elemento=new Elemento();
		$elemento=$eliminaRespuesta['elemento'];
		$conexion=crearConexion();
		borrarElemento($elemento,$conexion);
		cerrarConexion($xonexion);
	}
?>